<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <link rel="stylesheet" type="text/css" href="css/form.css" media="screen" />
</head>

<body>
    <form enctype="multipart/form-data" action="pessoa_save_insert.php" method="post">

    <label for="">Codigo</label>
    <input class="readonly" type="text" name="id" readonly="1" style="width: 30%;">

    <label for="">Nome</label>
    <input type="text" name="nome" style="width: 50%;">

    <label for="">Endereco</label>
    <input type="text" name="endereco" style="width: 50%;">

    <label for="">Bairro</label>
    <input type="text" name="bairro" style="width: 50%;">

    <label for="">Telefone</label>
    <input type="text" name="telefone" style="width: 25%;">

    <label for="">Email</label>
    <input type="email" name="email" style="width: 25%;">

    <label for="">Cidade</label>
    <select  name="id_cidade" style="width: 25%;">

    <?php
    require_once 'lista_combo_cidades.php';
    print listaComboCidades();
    ?>
    </select>
    <input type="submit">

    </form>
</body>

</html>