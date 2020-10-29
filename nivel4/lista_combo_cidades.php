<?php
function listaComboCidades($id = null) {
    $output = '';

    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $query = 'SELECT id, nome FROM livro.dbo.cidade';

    $stmt = sqlsrv_query($conn,$query);

    if($stmt) {
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $check = ($row['id'] == $id) ? 'selected=1' : '';
            $output .= "<option $check value= '{$row['id']}'> {$row['nome']} </option>\n";
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    return $output;

}