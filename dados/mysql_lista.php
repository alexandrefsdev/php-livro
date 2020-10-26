<?php
// abre a conexao com o postgres
$conn = mysqli_connect("127.0.0.1", "root", "123456789", "livro");
// define a consulta que sera realizada
$prepareStatement = 'SELECT codigo, nome FROM famosos';
// envia a consulta ao banco de dados;
$resultSet = mysqli_query($conn, $prepareStatement);
if ($resultSet) {
    // percorre resultados de pesquisa
    while ($row = mysqli_fetch_assoc($resultSet)) {
        echo  $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
}
mysqli_close($conn); // fecha a conexao
