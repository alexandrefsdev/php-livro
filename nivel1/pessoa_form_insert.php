<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <link rel="stylesheet" type="text/css" href="css/form.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <form enctype="multipart/form-data" action="pessoa_save_insert.php" method="post">
        <div class="form-group">
            <div class="form-row">
                <label for="">Codigo</label>
                <input class="form-control" type="text" name="id" readonly style="width: 30%;">
            </div>
            <div class="form-row">
                <label for="">Nome</label>
                <input type="text" name="nome" style="width: 50%;">
            </div>
            <div class="form-row">
                <label for="">Endereco</label>
                <input type="text" name="endereco" style="width: 50%;">
            </div>
            <div class="form-row">
                <label for="">Bairro</label>
                <input type="text" name="bairro" style="width: 50%;">
            </div>
            <div class="form-row">
                <label for="">Telefone</label>
                <input type="text" name="telefone" style="width: 25%;">
            </div>
            <div class="form-row">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" style="width: 25%;">
            </div>
            <div class="form-row">
                <label for="">Cidade</label>
                <select class="form-control form-control-sm" name="id_cidade" style="width: 25%;">
                    <?php
                    require_once 'lista_combo_cidades.php';
                    print listaComboCidades();
                    ?>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-secondary">

    </form>
</body>

</html>