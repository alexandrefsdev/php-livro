<?php
try {
    // instacia objeto PDO, conectando no MYSQL
    $conn = new PDO('mysql:host=127.0.0.1; port=3306; dbname=livro', 'root', '123456789');
    // executa uma instrucao SQL de consulta
    $resultSet = $conn->query("SELECT codigo, nome FROM famosos");
    if($resultSet) {
        // percorre os resultados via iteracao
        foreach ($resultSet as $row) {
            // exibe resultados
            echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
        }
    }
// fecha a conexao
$conn = null;

} catch (PDOException $e) {
    echo "erro!: " . $e->getMessage(). "<br>";
}
