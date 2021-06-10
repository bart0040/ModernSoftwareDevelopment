@extends('layout')

@section('content')
    <br>
    <form method="POST" action="/showFiltered">
        @csrf
        <div id="parentDiv">

            <div id="filterOptions">
                <p class="header"> Taal </p>
                @foreach($filters as $filter)
                    <input
                        class="form-control"
                        id="name"
                        name="filters[]"
                        value="{{ $filter->id }}"
                        type="checkbox">
                    <label>{{ $filter->filterName }}</label>
                    <br>
                    @if($filter->id == 3)
                        <br>
                        <p class="header"> Bestandstype </p>
                    @endif
                @endforeach

                <input
                    type="submit"
                    value="Submit"
                    class="submitFilter">
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
                            <td><a href="{{Storage::url($document->file_path)}}">Download File</a></td>
                            <td>
                                <select>
                                    @foreach($document->keywords as $keyword)
                                        <option value="keyword">
                                            {{ $keyword->keyword }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
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

    @if(Auth::check()){
    <a href="/documents/create">
        <button class="button" id="addDocBut"> Add new document</button>
    </a>
    @endif

@endsection
