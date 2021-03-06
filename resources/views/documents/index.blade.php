@extends('layout')

@section('content')

    @can('test')
    @if(Auth::check())
        <a href="/documents/create">
            <button style="margin-left: 23.82%;" class="button" id="addDocBut"> Add new document</button>
        </a>
    @endif
    @endcan
    <br>
    <form method="POST" action="/search&filter">
        @csrf
        <div id="parentDiv">

            <div class="box" id="filterOptions">
                <div id="filterMargin"></div>
                <p class="header">Search</p>
                <input type="text" name="search" value="@isset($search) {{$search}} @endisset"/>
                <br>
                <br>
                <p class="header"> Taal </p>
                @foreach($filters as $filter)
                <label>
                    <input
                        class="form-control"
                        id="name"
                        name="filters[]"
                        value="{{ $filter->id }}"
                        type="checkbox"
                        @isset($filterIds)
                        @foreach($filterIds as $id)
                        @if($id == $filter->id)
                        checked
                     @endif
                     @endforeach
                        @endisset>
                    {{ $filter->filterName }}</label>
                    <br>
                    @if($filter->id == 3)
                        <br>
                        <p class="header"> Bestandstype </p>
                    @endif
                @endforeach
                <br>

                <input
                class="button is-info"
                    type="submit"
                    value="Submit"
                    class="submitFilter">
            </div>
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
                    @can('test')
                    @if(Auth::check())
                        <th>Edit</th>
                    @endif
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->project_name }}</td>
                        <td>{{ $document->document_name }}</td>
                        <td>{{ $document->author }}</td>
                        <td><a href="/files/{{$document->file_path}}">Download File</a></td>
                        <td>
                            <div class="select">
                            <select>
                                @foreach($document->keywords as $keyword)
                                    <option value="keyword">
                                        {{ $keyword->keyword }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                        </td>
                        <td>{{ $document->updated_at }}</td>
                        @can('test')
                        @if(Auth::check())
                            <td><a href="{{ route('documents.edit', $document->id) }}">Edit</a></td>
                        @endif
                        @endcan()
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        </div>
    </form>
    <br>



@endsection
