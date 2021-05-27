<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Filter;
use App\Models\Junction;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class DocumentController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $documents = Document::all();
        $filters = Filter::all();
        return view('documents.index', compact('documents', 'filters'));
    }

    public function showFiltered(Request $request)
    {
        $filterIds = $request->filters;
        $filters = Filter::all();
        $z = Document::with('filters')->whereHas('filters', function ($q) use ($filterIds) {
            $q->whereIn('filter_id', $filterIds);
        }, '=', count($filterIds))->get();

        return view('documents.filtered', compact('z', 'filters', 'filterIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Document $document
     * @return Application|Factory|View|Response
     */
    public function create(Document $document)
    {
        $this->middleware('auth');

        return view('documents.create', ['document' => $document]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        //Code for saving a file
        //$request
        $document = Document::create($this->validateDocument($request));

        $d_id = $document->id;

        foreach ($request->filter_ids as $f_id) {
            \DB::table('junctions')->insert(array('document_id' => $d_id, 'filter_id' => $f_id));
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
        foreach($f as $filter){
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
        $document->filters()->sync($request->filters);
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
        $document->delete();
        return redirect(route('documents.index'))->with('status', 'document is deleted');
    }

    public function validateDocument(Request $request): array
    {
        return $request->validate([
            'author' => 'required',
            'project_name' => 'required',
            'document_name' => 'required',
            'keywords' => 'required',
            'language' => 'required',
            'document' => 'required',
        ]);
    }
}
