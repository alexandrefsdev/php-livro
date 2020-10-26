<?php

$dados = $_POST;
$conn =  mysqli_connect("127.0.0.1", "root", "123456789", "livro");

$query = "SELECT max(id) as next FROM pessoa";
$result = mysqli_query($conn, $query);
// pegando o resultado do ultimo id e adicionando mais 1 para a insercao
$next = (int) mysqli_fetch_assoc($result)['next'] + 1;

$sql = "INSERT INTO `livro`.`pessoa`   (`id`,
                                        `nome`,
                                        `endereco`,
                                        `bairro`,
                                        `telefone`,
                                        `email`,
                                        `id_cidade`)
                                VALUES ({$next},
                                        '{$dados['nome']}',
                                        '{$dados['endereco']}',
                                        '{$dados['bairro']}',
                                        '{$dados['telefone']}',
                                        '{$dados['email']}',
                                        {$dados['id_cidade']}
                                        );";


$resultSet = mysqli_query($conn, $sql);

if ($resultSet) {
    echo 'Registro inserido com sucesso!';
} else {
    echo mysqli_error($conn);
}

mysqli_close($conn);
