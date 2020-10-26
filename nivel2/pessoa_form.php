<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <link rel="stylesheet" type="text/css" href="css/form.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<?php

$id = $nome = $endereco = $bairro = $telefone = $email = $id_cidade = '';

if (!empty($_REQUEST['action'])) {
    $serverName = "172.22.8.16"; //serverName\instanceName
    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    if ($_REQUEST['action'] == 'edit') {
        $id = (int) $_GET['id'];
        $stmt = sqlsrv_query($conn, "SELECT * FROM livro.dbo.pessoa WHERE id='{$id}'");

        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

            $id = $row['id'];
            $nome = $row['nome'];
            $endereco = $row['endereco'];
            $bairro = $row['bairro'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $id_cidade = $row['id_cidade'];

        }

    } else if ($_REQUEST['action'] == 'save') {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $id_cidade = $_POST['id_cidade'];

        if (empty($_POST['id'])) {

            $query = "SELECT max(id) as next FROM pessoa";
            $stmt = sqlsrv_query($conn, $query);
            $next = (int) sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)['next'] + 1;

            $sql = "INSERT INTO livro.dbo.pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
            VALUES ({$next}, '{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', {$id_cidade} );";
            $stmt = sqlsrv_query($conn, $sql);

        } else {

            $sql = "UPDATE livro.dbo.pessoa SET nome = '{$nome}',
                                                endereco = '{$endereco}',
                                                bairro = '{$bairro}',
                                                telefone = '{$telefone}',
                                                email = '{$email}',
                                                id_cidade = {$id_cidade}
                                            WHERE id = {$id}";
            $stmt = sqlsrv_query($conn, $sql);
        }
        echo ($stmt) ? 'Registro Salvo com Sucesso!' : 'Houve um Erro!';

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    }
}
?>

<body>

    <form enctype="multipart/form-data" action="pessoa_form.php?action=save" method="post">
    <div class="form-group">
            <div class="form-row">
                <label for="">Codigo</label>
                <input class="form-control" type="text" name="id" readonly value="<?= $id ?>" style="width: 30%;">
            </div>
            <div class="form-row">
                <label for="">Nome</label>
                <input type="text" name="nome" value="<?= $nome ?>" style="width: 50%;">
            </div>
            <div class="form-row">
                <label for="">Endereco</label>
                <input type="text" name="endereco" value="<?= $endereco ?>" style="width: 50%;">
            </div>
            <div class="form-row">
                <label for="">Bairro</label>
                <input type="text" name="bairro" value="<?= $bairro ?>" style="width: 50%;">
            </div>
            <div class="form-row">
                <label for="">Telefone</label>
                <input type="text" name="telefone" value="<?= $telefone ?>" style="width: 25%;">
            </div>
            <div class="form-row">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" value="<?= $email ?>" style="width: 25%;">
            </div>
            <div class="form-row">
                <label for="">Cidade</label>
                <select class="form-control form-control-sm" name="id_cidade" style="width: 25%;">
                    <?php
                    require_once 'lista_combo_cidades.php';
                    print listaComboCidades( $id_cidade );
                    ?>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-secondary" value="ATUALIZAR">


    </form>
</body>

</html>