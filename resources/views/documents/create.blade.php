<table>
    <form action="/documents" method="POST" enctype="multipart/form-data">
        @csrf
        <tr>
            <td>
                <label for="author"><strong>Author:</strong></label>
            </td>
            <td>
                <input type="text" id="author" name="author" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="project_name"><strong>Project Name:</strong></label>
            </td>
            <td>
                <input type="text" id="project_name" name="project_name" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="project_name"><strong>Filter A:</strong></label>
            </td>
            <td>
                <input type="checkbox" id="filter_id" name="filter_ids[]" value="1">
            </td>
        </tr>

        <tr>
            <td>
                <label for="project_name"><strong>Filter B:</strong></label>
            </td>
            <td>
                <input type="checkbox" id="filter_id" name="filter_ids[]" value="2">
            </td>
        </tr>


        <tr>
            <td>
                <label for="project_name"><strong>Filter C:</strong></label>
            </td>
            <td>
                <input type="checkbox" id="filter_id" name="filter_ids[]" value="3">
            </td>
        </tr>

        <tr>
            <td>
                <label for="project_name"><strong>Filter D:</strong></label>
            </td>
            <td>
                <input type="checkbox" id="filter_id" name="filter_ids[]" value="4">
            </td>
        </tr>
        <tr>
            <td>
                <label for="document_name"><strong>Document Name:</strong></label>
            </td>
            <td>
                <input type="text" id="document_name" name="document_name">
            </td>
        </tr>
        <tr>
            <td>
                <label for="keywords"><strong>Keywords:</strong></label>
            </td>
            <td>
                <input type="text" id="keywords" name="keywords">
            </td>
        </tr>
        <tr>
            <td>
                <label for="language"><strong>Language:</strong></label>
            </td>
            <td>
                <input type="text" id="language" name="language">
            </td>
        </tr>
        <tr>
            <td>
                <label for="document"><strong>Document:</strong></label>
            </td>
            <td>
                <input type="text" id="document" name="document">
            </td>
        </tr>
{{--        <tr>--}}
{{--            <td>--}}
{{--                <label><strong>Upload File:</strong></label>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <input type="file" name="file" class="form-control">--}}
{{--            </td>--}}
{{--        </tr>--}}
        <tr>
            <td>
                <input type="submit" value="Submit">
            </td>
        </tr>
    </form>
    <td>
        <form action="/documents" method="GET">
            <input type="submit" value="cancel">
        </form>
    </td>



</table>
