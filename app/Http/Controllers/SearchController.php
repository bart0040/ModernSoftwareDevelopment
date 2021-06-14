<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Filter;
use App\Models\Keyword;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        $filters = Filter::all();

        $keywords = Keyword::query()
            ->where('keyword', 'LIKE', "%{$search}%")
            ->get();

        $documents_keywords = [];

        $documents = Document::query()
            ->where('project_name', 'LIKE', "%{$search}%")
            ->orWhere('document_name', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
            ->get();

        foreach ($keywords as $keyword) {

            array_push($documents_keywords, Document::where($keyword->document_id, 'id'));
        }
            // Return the search view with the results compacted
            return view('documents.index')
                ->with(compact('documents'))
                ->with(compact('filters'))
                ->with(compact('keywords'))
                ->with(compact('documents_keywords'));
        }

}
