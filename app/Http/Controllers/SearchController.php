<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Filter;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search($data)
    {
        // Get the search value from the request
        $search = $data->input('search');

        $filters = Filter::all();

        if (env('DB_CONNECTION') === 'mysql') {
            $documents = Document::where('project_name', 'LIKE', "%{$search}%")
                ->orWhere('document_name', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%")
                ->get();

            $keywords = Keyword::where('keyword', 'LIKE', "%{$search}%")
                ->get();
        } else {


            $documents = Document::where(DB::raw('lower(project_name)'), 'like', '%' . strtolower($search) . '%')
                ->orWhere(DB::raw('lower(document_name)'), 'like', '%' . strtolower($search) . '%')
                ->orWhere(DB::raw('lower(author)'), 'like', '%' . strtolower($search) . '%')
                ->get();

            $keywords = Keyword::where(DB::raw('lower(keyword)'), 'like', '%' . strtolower($search) . '%')
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
