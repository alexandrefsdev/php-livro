<?php
function listaComboCidades($id = null) {
    $output = '';

    $conn =  mysqli_connect("127.0.0.1", "root", "123456789", "livro");
    $query = 'SELECT id, nome FROM cidade';

    $resultSet = mysqli_query($conn,$query);

    if($resultSet) {
        while ($row = mysqli_fetch_assoc($resultSet)) {
            $check = ($row['id'] == $id) ? 'selected=1' : '';
            $output .= "<option $check value= '{$row['id']}'> {$row['nome']} </option>\n";
        }
    }
    mysqli_close($conn);
    return $output;
}