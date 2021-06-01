@extends('layout')

@section('content')
    <br>
    <form method="POST" action="/showFiltered">
        @csrf
        <div id="parentDiv">

            @if()<div id="filterOptions">
                <p> Taal </p>
                @foreach($filters as $filter)
                    <input
                        class="form-control"
                        id="name" name="filters[]"
                        value="{{ $filter->id }}"
                        type="checkbox">
                    <label>{{ $filter->filterName }}</label>
                    <br>
                    @if($filter->id == 3)
                        <br>
                        <p> Heading </p>
                    @endif
                @endforeach


            </div>


            <div id="tableDiv">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Document Name</th>
                        <th>Author</th>
                        <th>Document</th>
                        <th>Keywords</th>
                        <th>Language</th>
                        <th>Created at</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->project_name }}</td>
                            <td>{{ $document->document_name }}</td>
                            <td>{{ $document->author }}</td>
                            <td><a href="{{Storage::url($document->file_path)}}">download</a></td>
                            <td>{{ $document->keywords }}</td>
                            <td>{{ $document->language }}</td>
                            <td>{{ $document->updated_at }}</td>
                            <td><a href="{{ route('documents.edit', $document->id) }}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>


        </div>
    </form>

    <a href="/documents/create">
        <button class="button" id="addDocBut"> Add new document</button>
    </a>

@endsection
