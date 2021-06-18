<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Filter;
use App\Models\Keyword;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($data)
    {
        // Get the search value from the request
        $search = $data->input('search');

        $filters = Filter::all();

        if (env('DB_CONNECTION') === 'mysql') {
            $documents = Document::query()
                ->where('project_name', 'LIKE', "%{$search}%")
                ->orWhere('document_name', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%")
                ->get();

            $keywords = Keyword::query()
                ->where('keyword', 'LIKE', "%{$search}%")
                ->get();
        } else {

            $documents = Document::query()
                ->where('project_name', 'ILIKE', "%{$search}%")
                ->orWhere('document_name', 'ILIKE', "%{$search}%")
                ->orWhere('author', 'ILIKE', "%{$search}%")
                ->get();

            $keywords = Keyword::query()
                ->where('keyword', 'ILIKE', "%{$search}%")
                ->get();
        }



        foreach ($keywords as $keyword) {


            $documents->push($keyword->document);
        }

        $documents = $documents->unique();

        // Return the search view with the results compacted
        return view('documents.index')
            ->with(compact('documents'))
            ->with(compact('filters'));
    }

}
