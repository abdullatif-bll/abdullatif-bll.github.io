function jsonToTable ($data)
{
    $table = '
    <table class="json-table" width="100%">
    ';
    foreach ($data as $key => $value) {
        $table .= '
        <tr valign="top">
        ';
        if ( ! is_numeric($key)) {
            $table .= '
            <td>
                <strong>'. $key .':</strong>
            </td>
            <td>
            ';
        } else {
            $table .= '
            <td colspan="2">
            ';
        }
        if (is_object($value) || is_array($value)) {
            $table .= jsonToTable($value);
        } else {
            $table .= $value;
        }
        $table .= '
            </td>
        </tr>
        ';
    }
    $table .= '
    </table>
    ';
    return $table;
}

<?php
echo jsonToTable(json_decode('https://says.bsi.ac.id/scholar/index.php?id=202110265|FQaI7T0AAAAJ'));
?>
