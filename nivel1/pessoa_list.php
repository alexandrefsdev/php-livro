<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <title>Listagem de Pessoas</title>
</head>
<body>
    <?php
    $conn =  mysqli_connect("127.0.0.1", "root", "123456789", "livro");
    $resultSet = mysqli_query($conn, "SELECT * FROM `livro`.`pessoa` ORDER BY `id`");

    echo '<table border=1>';
    echo '<thead>';
    echo '<tr>';
    echo "<th></th>";
    echo "<th></th>";
    echo "<th> Id </th>";
    echo "<th> Nome </th>";
    echo "<th> Endereco </th>";
    echo "<th> Bairro </th>";
    echo "<th> Telefone </th>";
    echo '</tr>';
    echo '</thead>';
    ?>
</body>
</html>

