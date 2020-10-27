<?php

$serverName = "172.22.8.16"; //serverName\instanceName
$connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
}
// CONEXÃO ATÉ AQUI

if (!empty($_GET['action']) and $_GET['action'] == 'delete') {

    $id = (int) $_GET['id'];
    $query = "DELETE FROM pessoa WHERE id='{$id}'";
    $stmt = sqlsrv_query($conn, $query);

}

$query = "SELECT * FROM pessoa ORDER BY id";
$stmt = sqlsrv_query($conn, $query);

$items = '';

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

    $item = file_get_contents('html/item.html');
    $item = str_replace('{id}', $row['id'], $item);
    $item = str_replace('{nome}', $row['nome'], $item);
    $item = str_replace('{endereco}', $row['endereco'], $item);
    $item = str_replace('{bairro}', $row['bairro'], $item);
    $item = str_replace('{telefone}', $row['telefone'], $item);
    $items .= $item;

}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);
echo $list;
