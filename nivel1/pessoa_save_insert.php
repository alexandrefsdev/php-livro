<?php

$dados = $_POST;

$serverName = "172.22.8.16"; //serverName\instanceName
$connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$query = "SELECT max(id) as next FROM pessoa";
$stmt = sqlsrv_query($conn, $query);
// pegando o resultado do ultimo id e adicionando mais 1 para a insercao
$next = (int) sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)['next'] + 1;

$sql = "INSERT INTO livro.dbo.pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
        VALUES ({$next}, '{$dados['nome']}', '{$dados['endereco']}', '{$dados['bairro']}', '{$dados['telefone']}', '{$dados['email']}', {$dados['id_cidade']} );";


$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
            echo "code: " . $error['code'] . "<br />";
            echo "message: " . $error['message'] . "<br />";
        }
    }
} else {
    echo "Registro Inserido com Sucesso!<br />". PHP_EOL;
    echo '<a href="pessoa_list.php" class="btn btn-warning" > Voltar para Listagem</a>';
}

sqlsrv_close($conn);
