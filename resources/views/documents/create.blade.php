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
            <label for="project_name" class="checkbox"><strong>Filter A:</strong></label>
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="1">
        </div>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Filter B:</strong></label>
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="2">
        </div>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Filter C:</strong></label>
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="3">
        </div>

        <div class="field">
            <label for="project_name" class="checkbox"><strong>Filter D:</strong></label>
            <input
                type="checkbox"
                id="filter_id"
                name="filter_ids[]"
                value="4">
        </div>

        <div class="field">
            <label for="document_name" class="label"><strong>Document Name:</strong></label>
            <input
                class="input"
                type="text"
                id="document_name"
                name="document_name">
        </div>

        <label for="keywords" class="label"><strong>Keywords:</strong></label>
        <input
            class="input"
            type="text"
            id="keywords"
            name="keywords">

        <label for="language" class="label"><strong>Language:</strong></label>
        <input
            class="input"
            type="text"
            id="language"
            name="language">

        <label for="document" class="label"><strong>Document:</strong></label>
        <input
            class="input"
            type="text"
            id="document"
            name="document">

        {{--        <tr>--}}
        {{--            <td>--}}
        {{--                <label><strong>Upload File:</strong></label>--}}
        {{--            </td>--}}
        {{--            <td>--}}
        {{--                <input type="file" name="file" class="form-control">--}}
        {{--            </td>--}}
        {{--        </tr>--}}

        <input type="submit" class="button" id="button1" value="Submit">
    </form>
    <td>
        <form action="/documents" method="GET">
            <input type="submit" class="button" id="button3" value="Cancel">
        </form>
    </td>
@endsection
