@extends('layout')

@section('content')
    @if(Auth::check())
        <h1 id="editH1">Edit document {{$document->document_name}}</h1>
        <br>
        <form method="POST" action="{{ route('documents.update', $document) }}">
            @csrf
            @method('PUT')

            {{-- Here are all the form fields --}}
            <div class="field">
                <label class="label">Author: </label>
                <div class="control">
                    <input
                        name="author"
                        class="input @error('author') is-danger @enderror"
                        type="text"
                        value="{{ old('author', $document->author) }}">
                </div>
                @error('author')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="field">
                <label class="label">Project name: </label>
                <div class="control">
                    <input
                        name="project_name"
                        class="input @error('project_name') is-danger @enderror"
                        type="text"
                        value="{{ old('project_name', $document->project_name) }}">
                </div>
                @error('project_name')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <br>
            <br>
            <label class="label">Filters: </label>
            <br>
            @foreach($filters as $filter)
                <br>
                <div class="field">
                    <input class="form-control" id="name" name="filters[]" value="{{ $filter->id }}" type="checkbox"
                           @foreach($filterIds as $id)
                           @if($id == $filter->id)
                           checked
                        @endif
                        @endforeach>
                    <label>{{ $filter->filterName }}</label>
                </div>
            @endforeach
            <br>
            <br>
            <div class="field">
                <label class="label">Document name: </label>
                <div class="control">
                    <input
                        name="document_name"
                        class="input @error('document_name') is-danger @enderror"
                        type="text"
                        value="{{ old('document_name', $document->document_name) }}">
                </div>
                @error('document_name')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <br>
            <div class="field">
                <label class="label">Keywords: </label>
            </div>
            <br>
            <br>
            <div class="control">
                <table id="keywordsTable">

                    @foreach($document->keywords as $keyword)
                        <tr>
                            <td>
                                <input
                                    name="keywords_name[]"
                                    class="input @error('keywords') is-danger @enderror"
                                    type="text"
                                    value="{{ old('keywords', $keyword->keyword) }}" required>

                            </td>
                            <td>
                                <button type='button' class='button' id='button2' value="Delete"
                                        onclick='deleteRow(this)'>-
                                </button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endforeach

                </table>
                <table>
                    <tr>
                        <td>
                            <button type='button' class='button' id='button1' onclick='addKeyword()'>+</button>
                        </td>
                    </tr>
                </table>
            </div>
            <br>

            {{-- Here are the form buttons: save, reset and cancel --}}
            <div class="outer">
                <div class="inner">
                    <button
                        type="submit"
                        class="button"
                        id="button1">
                        Save
                    </button>
                </div>
            </div>
        </form>

        <div class="inner">
            <form action="/documents/{{ $document->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="button"
                    id="button2">
                    Delete
                </button>
            </form>
        </div>

        <div class="inner">
            <form action="/documents" method="GET">
                <button
                    type="submit"
                    class="button"
                    id="button3">
                    Cancel
                </button>
            </form>
        </div>

    @endif

    @guest
        <h2 style="text-align: center">You are not authorised to edit this document. Please click the button below to
            log in.</h2>
        <form action="/login">
            <br>
            <button style="position: relative; left: 49%" type="submit">Log in</button>
        </form>
    @endguest
@endsection







