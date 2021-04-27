@extends('layout')

@section('content')
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
                    value="{{ old('document', $document->document) }}">
            </div>
            @error('document')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Keywords: </label>
            <div class="control">
                <input
                    name="keywords"
                    class="input @error('keywords') is-danger @enderror"
                    type="text"
                    value="{{ old('keywords', $document->keywords) }}">
            </div>
            @error('keywords')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Language: </label>
            <div class="control">
                <input
                    name="language"
                    class="input @error('language') is-danger @enderror"
                    type="text"
                    value="{{ old('language', $document->language) }}">
            </div>
            @error('language')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- Here are the form buttons: save, reset and cancel --}}
        <div class="outer">
            <div class="inner">
                <button
                    type="submit"
                    class="button"
                    id="button1">
                    Save</button>
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
                Delete</button>
        </form>
    </div>

    <div class="inner">
        <form action="/documents" method="GET">
            <button
                type="submit"
                class="button"
                id="button3">
                Cancel</button>
        </form>
    </div>
@endsection





