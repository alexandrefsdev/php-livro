<?php

$dados = $_GET;

if (!empty($dados['id'])) {
    $serverName = "172.22.8.16";
    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");

    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $sql = "DELETE livro.dbo.pessoa WHERE id = {$dados['id']}";

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
        echo "Registro Excluido com sucesso!<br />". PHP_EOL;
        echo '<a href="pessoa_list.php" class="btn btn-warning" > Voltar para Listagem</a>';
    }
}
