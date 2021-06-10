<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Filter;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        $filters = Filter::all();

        $documents = Document::query()
            ->where('project_name', 'LIKE', "%{$search}%")
            ->orWhere('document_name', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
//            ->orWhere('keyword_id', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the results compacted
        return view('documents.index', compact('documents', 'filters'));
    }
}
