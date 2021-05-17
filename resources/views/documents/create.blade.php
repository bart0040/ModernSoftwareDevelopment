@extends('layout')

@section('content')

    <form action="/documents" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label for="author" class="label"><strong>Author:</strong></label>
            <div class="control">
                <input
                    class="input"
                    type="text"
                    id="author"
                    name="author"
                    required>
            </div>
        </div>

        <div class="field">
            <label for="project_name" class="label"><strong>Project Name:</strong></label>
            <div class="control">
                <input
                    class="input"
                    type="text"
                    id="project_name"
                    name="project_name"
                    required>
            </div>
        </div>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Nederlands:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="1">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Engels:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="2">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Overige Taal:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="3">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Word bestand:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="4">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Powerpoint bestand:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="5">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Pdf bestand:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="6">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Overig bestand:</strong></label>
            <div class="control">
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="7">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="document_name" class="label"><strong>Document Name:</strong></label>
            <div class="control">
            <input
                class="input"
                type="text"
                id="document_name"
                name="document_name">
            </div>
        </div>

        <br>

        <div class="field">
            <label for="keywords" class="label"><strong>Keywords:</strong></label>
            <input
                class="input"
                type="text"
                id="keywords"
                name="keywords">
        </div>

        <div class="field">
            <label for="language" class="label"><strong>Language:</strong></label>
            <select
                class="input"
                type="text"
                id="language"
                name="language">
                <option value="Dutch">Dutch</option>
                <option value="English">English</option>
                <option value="Other">Other</option>
            </select>
        </div>

{{--        <div class="field">--}}
{{--            <label for="file_type" class="label"><strong>File type:</strong></label>--}}
{{--            <select--}}
{{--                class="input"--}}
{{--                type="text"--}}
{{--                id="file_type"--}}
{{--                name="file_type">--}}
{{--                <option value="Word">Word</option>--}}
{{--                <option value="Powerpoint">Powerpoint</option>--}}
{{--                <option value="Excel">Excel</option>--}}
{{--                <option value="Pdf">Pdf</option>--}}
{{--            </select>--}}
{{--        </div>--}}

        <div class="field">
            <label for="document" class="label"><strong>Document:</strong></label>
            <input
                class="input"
                type="file"
                id="document"
                name="document">
        </div>

        <input
            type="submit"
            class="button"
            id="button1"
            value="Submit">
    </form>

    <form action="/documents" method="GET">
        <input
            type="submit"
            class="button"
            id="button3"
            value="Cancel">
    </form>

@endsection
