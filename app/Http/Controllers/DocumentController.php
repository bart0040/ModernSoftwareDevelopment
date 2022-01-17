<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Filter;
use App\Models\Junction;
use App\Models\Keyword;
use Exception;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $documents = Document::all()
        $filters = Filter::all();


        return view('documents.index', compact('documents', 'filters'));
    }

    public function searchFilterBoth(Request $request)
    {
        $data = $request;

        if ($request->search != null && $request->filters != null) {
            $search = $request->input('search');

            $filters = Filter::all();


            $keywordDocs = Document::query()
                ->where('project_name', 'LIKE', "%{$search}%")
                ->orWhere('document_name', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%")
                ->get();

            $keywords = Keyword::query()
                ->where('keyword', 'LIKE', "%{$search}%")
                ->get();

            foreach ($keywords as $keyword) {


                $keywordDocs->push($keyword->document);
            }
            $keywordDocs = $keywordDocs->unique();

            $filterIds = $request->filters;
            if ($filterIds === null) {
                return redirect('/documents');
            }

            $filterDocs = Document::with('filters')->whereHas('filters', function ($q) use ($filterIds) {
                $q->whereIn('filter_id', $filterIds);
            }, '=', count($filterIds))->get();

            $documents = $keywordDocs->intersect($filterDocs);

            return view('documents.index', compact('documents', 'filters', 'filterIds', 'search'));

        } elseif ($request->search != null && $request->filters == null) {
            return $this->search($data);

        } elseif ($request->search == null && $request->filters != null) {
            return $this->showFiltered($data);
        } else {
            return redirect('/documents');
        }
    }

    public function showFiltered($data)
    {
        $filterIds = $data->filters;
        if ($filterIds === null) {
            return redirect('/documents');
        }
        $filters = Filter::all();
        $documents = Document::with('filters')->whereHas('filters', function ($q) use ($filterIds) {
            $q->whereIn('filter_id', $filterIds);
        }, '=', count($filterIds))->get();

        return view('documents.index', compact('documents', 'filters', 'filterIds'));
    }

    public function search($data)
    {
        // Get the search value from the request
        $search = $data->input('search');

        $filters = Filter::all();


        $documents = Document::query()
            ->where('project_name', 'LIKE', "%{$search}%")
            ->orWhere('document_name', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
            ->get();

        $keywords = Keyword::query()
            ->where('keyword', 'LIKE', "%{$search}%")
            ->get();

        foreach ($keywords as $keyword) {


            $documents->push($keyword->document);
        }

        $documents = $documents->unique();

        // Return the search view with the results compacted
        return view('documents.index')
            ->with(compact('documents'))
            ->with(compact('search'))
            ->with(compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Document $document
     * @return Application|Factory|View|Response
     */
    public function create(Document $document)
    {
        if (Auth::check()) {
            return view('documents.create', ['document' => $document]);
        } else {
            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
//        dd($request);

        $path = $request->file('document')->store('files');
        $request->merge(['file_path' => $path]);
        //Code for saving a file
        //$request
        $document = Document::create($this->validateDocument($request));

        $document_id = $document->id;

        if($request->filter_ids != null){
        foreach ($request->filter_ids as $filter_id) {
            \DB::table('junctions')->insert(array('document_id' => $document_id, 'filter_id' => $filter_id));
        }
    }

        /**
         * The foreach is responsible for making an array of keywords and keeping the correct document id
         */
        foreach ($request->keywords_name as $keyword_name) {
            \DB::table('keywords')->insert(array('keyword' => $keyword_name, 'document_id' => $document_id));

        }


        return redirect(route('documents.index'))->with('status', 'Document created successful');

    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return Response
     */
    public function show(Document $document): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return Application|Factory|View|Response
     */
    public function edit(Document $document)
    {
        $filters = Filter::all();
        $documentId = $document->id;
        $f = Document::find($documentId)->filters;
        $filterIds = [];
        foreach ($f as $filter) {
            array_push($filterIds, $filter->id);
        }
        return view('documents.edit', compact('document', 'filterIds', 'filters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, Document $document)
    {

        $document->keywords()->delete();
        $document->filters()->sync($request->filters);

        if($request->file('document') == null){
            $request->merge(['file_path' => $document->file_path]);
        }else{
            //removes old file
            $path = public_path() . "/files/" . $document->file_path;
            if(file_exists($path)){
                unlink($path);
            }
            //adds new file
            $path = $request->file('document')->store('files');
            $request->merge(['file_path' => $path]);
        }

        $document_id = $document->id;

        /**
         * The foreach is responsible for making an array of keywords and keeping the correct document id
         */
        if ($request->keywords_name != null) {
            foreach ($request->keywords_name as $keyword_name) {
                \DB::table('keywords')->insert(array('keyword' => $keyword_name, 'document_id' => $document_id));
            }
        }


        $document->update($this->validateDocument($request));
        return redirect('/documents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(Document $document)
    {
        $path = public_path() . "/files/" . $document->file_path;
        if(file_exists($path)){
        unlink($path);
        }
        $document->delete();
        return redirect(route('documents.index'))->with('status', 'document is deleted');
    }

    public function validateDocument(Request $request): array
    {
        return $request->validate([
            'author' => 'required',
            'project_name' => 'required',
            'document_name' => 'required',
            'file_path' => 'required',
        ]);
    }
}
