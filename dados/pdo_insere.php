<?php

try {
    // instacia objeto PDO, conectando no MYSQL
    $conn = new PDO('mysql:host=127.0.0.1; port=3306; dbname=livro', 'root', '123456789');
    // executa uma serie de instrucoes SQL
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Erico Verissimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Airton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mario Quintana')");

} catch (PDOException $e) {
    echo "Erro!: " . $e->getMessage() . "<br>";
}