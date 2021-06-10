@extends('layout')

@section('content')
    @if(Auth::check())
        <h1 id="editH1">Edit document {{$document->document_name}}</h1>
        <form method="POST" action="{{ route('documents.update', $document) }}">
            @csrf
            @method('PUT')

            {{-- Here are all the form fields --}}
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

            @foreach($filters as $filter)
                <div class="field">
                    <input class="form-control" id="name" name="filters[]" value="{{ $filter->id }}" type="checkbox"
                           @foreach($filterIds as $id)
                           @if($id == $filter->id)
                           checked
                        @endif
                        @endforeach>
                    <label>{{ $filter->filterName }}</label>
                </div>
                <br>
            @endforeach

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

            <div class="field">
                <label class="label">Document: </label>
                <div class="control">
                    <input
                        name="document"
                        class="input @error('document') is-danger @enderror"
                        type="text"
                        value="{{ old('document', $document->document_name) }}">
                </div>
                @error('document')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Keywords: </label>

            </div>
            <div class="control">
                <table id="keywordsTable">
                    @foreach($document->keywords as $keyword)
                        <tr>
                            <td>
                                <input
                                    name="keywords_name[]"
                                    class="input @error('keywords') is-danger @enderror"
                                    type="text"
                                    value="{{ old('keywords', $keyword->keyword) }}">
                            </td>
                            <td>
                                <button type='button' class='button' id='button1' onclick='addKeyword()'>+</button>
                            </td>
                            <td>
                                <button type='button' class='button' id='button2' onclick='deleteKeyword()'>-</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

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

<script>
    let i = 1;

    /**
     * this function adds a keyword input row
     *
     */
    function addKeyword() {
        i++
        document.getElementById("keywordsTable").insertRow().innerHTML =
            "<tr><td>" +
            "<input class='input' name='keywords_name[]' id='keywords' type='text' placeholder='Keyword here please...' value=''>" +
            "</td><td>" +
            "<button type='button' class='button' id='button1' onclick='addKeyword()'>+</button>" +
            "</td><td><button type='button' class='button' id='button2' onclick='deleteKeyword()'>-</button>" +
            "</td></tr>";

    }

    /**
     * this function deletes an added keyword input row
     *
     */
    function deleteKeyword() {
        i--
        document.getElementById("keywordsTable").deleteRow(i);
    }

</script>






