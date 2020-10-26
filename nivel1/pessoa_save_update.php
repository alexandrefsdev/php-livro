<?php

$dados = $_POST;
if ($dados['id']) {

    $serverName = "172.22.8.16";
    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");

    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $sql = "UPDATE livro.dbo.pessoa SET nome = '{$dados['nome']}',
                                        endereco = '{$dados['endereco']}',
                                        bairro = '{$dados['bairro']}',
                                        telefone = '{$dados['telefone']}',
                                        email = '{$dados['email']}',
                                        id_cidade = {$dados['id_cidade']}
                                        WHERE id = {$dados['id']}";

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
        echo "Registro Atualizado com Sucesso!<br />". PHP_EOL;
        echo '<a href="pessoa_list.php" class="btn btn-warning" > Voltar para Listagem</a>';
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
