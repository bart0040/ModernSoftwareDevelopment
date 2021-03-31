<table>
    <form action="/documents" method="POST">
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
        <tr>
            <td>
                <input type="submit" value="Submit">
            </td>
    </form>
    <td>
        <form action="/documents" method="GET">
            <input type="submit" value="cancel">
        </form>
    </td>
    </tr>


</table>
