@extends('layout')

@section('content')

    @can('test')
    <style>
        h1 {
            font-size: 120%;
        }

    </style>

    <form action="/documents" method="POST" enctype="multipart/form-data">
        @csrf

                <div class="field">
                    <label for="author" class="label"><strong>Author:</strong></label>
                    <div class="control">
                        <input class="input" type="text" id="author" name="author" required>
                    </div>
                </>

                <div class="field">
                    <label for="project_name" class="label"><strong>Project Name:</strong></label>
                    <div class="control">
                        <input class="input" type="text" id="project_name" name="project_name" required>
                    </div>
                </div>

        <div class="columns">
            <div class="column">
                <div class="box">
                    <h1><strong>Language filters</strong></h1>
                    <br>
                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="1">Nederlands</label>
                        </div>
                    </div>

                    <br>

                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="2">Engels</label>
                        </div>
                    </div>

                    <br>
                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="3">Overige Taal</label>
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            <br>

            <div class="column">
                <div class="box">
                    <h1><strong>File type filters</strong></h1>
                    <br>
                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="4">Word bestand</label>
                        </div>
                    </div>

                    <br>

                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="5">Powerpoint bestand</label>
                        </div>
                    </div>

                    <br>

                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="6">Pdf bestand</label>
                        </div>
                    </div>

                    <br>

                    <div class="field">
                        <label for="project_name" class="checkbox">
                        <div class="control">
                            <input type="checkbox" id="filter_id" name="filter_ids[]" value="7">Overig bestand</label>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>


        <br>

        <div class="field">
            <label for="document_name" class="label"><strong>Document Name:</strong></label>
            <div class="control">
                <input class="input" type="text" id="document_name" name="document_name" required>
            </div>
        </div>

        <br>

        <div class="field">
            <label for="keywords" class="label"><strong>Keywords:</strong></label>
            <br>
        </div>

        <table id="keywordsTable">
            <tr>
                <td>
                    <input class="input" name="keywords_name[]" id="keywords" type="text"
                        placeholder="Keyword here please..." required value="">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <button type='button' class='button' id='button1' onclick='addKeyword()'>+</button>
                </td>
            </tr>
        </table>
        <br>


        <div class="field">
            <label for="document" class="label"><strong>Document:</strong></label>
            <input class="input" type="file" id="document" name="document" required>
        </div>


        <input type="submit" class="button" id="button1" value="Submit">
    </form>

    <form action="/documents" method="GET">
        <input type="submit" class="button" id="button3" value="Cancel">
    </form>
    @endcan

@endsection
