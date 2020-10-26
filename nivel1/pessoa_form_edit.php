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

if (!empty($_GET['id'])) {

    $serverName = "172.22.8.16";
    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");

    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $id = (int) $_GET['id'];
    $stmt = sqlsrv_query($conn, "SELECT * FROM livro.dbo.pessoa WHERE id='{$id}'");

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $id = $row['id'];
    $nome = $row['nome'];
    $endereco = $row['endereco'];
    $bairro = $row['bairro'];
    $telefone = $row['telefone'];
    $email = $row['email'];
    $id_cidade = $row['id_cidade'];
}

?>

<body>
    <form enctype="multipart/form-data" action="pessoa_save_update.php" method="post">
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