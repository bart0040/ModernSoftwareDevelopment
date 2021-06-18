/**
 * this function adds a keyword input row
 *
 */
function addKeyword() {
    document.getElementById("keywordsTable").insertRow().innerHTML =`
        <tr><td>
        <input class='input' name='keywords_name[]' id='keywords' type='text' placeholder='Keyword here please...' value='' required>
        </td><td><button type='button' class='button' id='button2' value='Delete' onclick='deleteRow(this)'>-</button>
        </td><td>
        </td></tr>`
}

/**
 * this function deletes an added keyword input row
 *
 */
function deleteRow(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("keywordsTable").deleteRow(i);
}
