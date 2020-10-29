<?php

define('DB_HOST', "localhost\SQLEXPRESS");
define('DB_USER', "sa");
define('DB_PASSWORD', "123456789");
define('DB_NAME', "livro");
define('DB_DRIVER', "sqlsrv");

class Pessoa
{
    public static function save(array $pessoa): int
    {
        $pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        $conn = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (empty($pessoa['id'])) {
            $stmt = $conn->query("SELECT max(id) as next FROM livro.dbo.pessoa");
            $row = $stmt->fetch();
            $pessoa['id'] = (int)$row['next'] + 1;

            $sql = "INSERT INTO livro.dbo.pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                        VALUES ('{$pessoa['id']}',
                                '{$pessoa['nome']}',
                                '{$pessoa['endereco']}',
                                '{$pessoa['bairro']}',
                                '{$pessoa['telefone']}',
                                '{$pessoa['email']}',
                                '{$pessoa['id_cidade']}'
                                )";
        } else {
            $sql = "UPDATE livro.dbo.pessoa 
                    SET nome = '{$pessoa['nome']}',
                        endereco = '{$pessoa['endereco']}',
                        bairro = '{$pessoa['bairro']}',
                        telefone = '{$pessoa['telefone']}',
                        email = '{$pessoa['email']}',
                        id_cidade = '{$pessoa['id_cidade']}'
                    WHERE id = '{$pessoa['id']}'";
        }
        return $conn->query($sql);
    }

    public static function findOne(int $id)
    {
        $pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        $conn = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM livro.dbo.pessoa WHERE id='{$id}'");
        return $stmt->fetch();
    }

    public static function delete(int $id): int
    {
        $pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        $conn = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("DELETE FROM livro.dbo.pessoa WHERE id='{$id}'");
        return $stmt->fetch();
    }

    public static function findAll(): array
    {
        $pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        $conn = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM livro.dbo.pessoa ORDER BY id");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}