<?php
function listaComboCidades($id = null) {
    $output = '';

    $serverName = "172.22.8.16"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"livro", "UID"=>"sa", "PWD"=>"237homologacao2211");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

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