<form method="POST" action="{{ route('documents.update', $document) }}">
    @csrf
    @method('PUT')
    <header>
        <p>
            Edit this Document
        </p>
    </header>

    {{-- Here are all the form fields --}}
    <div class="field">
        <label class="label">Project name: </label>
        <div class="control">
            <input name="projectName" class="input @error('projectName') is-danger @enderror"
                   type="text" value="{{ old('projectName', $document->project_name) }}">
        </div>
        @error('projectName')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Document name: </label>
        <div class="control">
            <input name="documentName" class="input @error('documentName') is-danger @enderror"
                   type="text" value="{{ old('documentName', $document->document_name) }}">
        </div>
        @error('documentName')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Author: </label>
        <div class="control">
            <input name="author" class="input @error('author') is-danger @enderror"
                   type="text" value="{{ old('author', $document->author) }}">
        </div>
        @error('author')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Document: </label>
        <div class="control">
            <input name="document" class="input @error('document') is-danger @enderror"
                   type="text" value="{{ old('document', $document->document) }}">
        </div>
        @error('document')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Keywords: </label>
        <div class="control">
            <input name="keywords" class="input @error('keywords') is-danger @enderror"
                   type="text" value="{{ old('keywords', $document->keywords) }}">
        </div>
        @error('keywords')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Language: </label>
        <div class="control">
            <input name="language" class="input @error('language') is-danger @enderror"
                   type="text" value="{{ old('language', $document->language) }}">
        </div>
        @error('language')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- Here are the form buttons: save, reset and cancel --}}
    <div class="control">
        <a type="submit" href="{{route('documents.edit', $document) }}" class="">Save</a>
    </div>
    <div class="control">
        <a type="delete" href="{{route('documents.destroy', $document) }}" class="" value="delete">Delete</a>
    </div>
    <div class="control">
        <a type="button" href="{{route('documents.index')}}" class="">Cancel</a>
    </div>


</form>
