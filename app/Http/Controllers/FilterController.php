<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Filter;
use App\Models\Junction;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = Filter::all();
        $documenten = Document::all();
        return view('filter.index', compact('documenten', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function showFiltered(Request $request)
    {
        $filterIds = $request->filters;
        $filters = Filter::all();
        $z = Document::with('filters')->whereHas('filters', function ($q) use ($filterIds){
            $q->whereIn('filter_id', $filterIds);
        }, '=', count($filterIds))->get();

        return view('filter.show', compact('z', 'filters'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Filter $filter
     * @return \Illuminate\Http\Response
     */
//    public function show(Filter $filter)
//    {
//        $documentsWithFilter = Junction::all()->where('filter_id', $filter->id);
//        $allDocuments = [];
//        foreach($documentsWithFilter as $document){
//            $filterDocument = Document::all()->where('id', $document->document_id);
//            array_push($allDocuments, $filterDocument);
//        }
//
//        return view('filter.show', compact('allDocuments'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Filter $filter
     * @return \Illuminate\Http\Response
     */
    public function edit(Filter $filter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Filter $filter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filter $filter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Filter $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filter $filter)
    {
        //
    }
}
