<?php
// abre a conexao com o postgres
$conn = mysqli_connect("127.0.0.1", "root", "123456789", "livro");

mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (1, 'Erico Verissimo')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (4, 'Airton Senna')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (7, 'Mario Quintana')");

// fecha a conexao
mysqli_close($conn);


