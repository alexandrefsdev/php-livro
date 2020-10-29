<?php

function lista_pessoas()
{

    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $query = "SELECT * FROM livro.dbo.pessoa ORDER BY id";
    $stmt = sqlsrv_query($conn, $query);

    $list = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        array_push($list,$row);
    }

    sqlsrv_close($conn);
    return $list;
}

function exclui_pessoa($id)
{
    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $query = "DELETE FROM livro.dbo.pessoa WHERE id='{$id}'";
    $stmt = sqlsrv_query($conn, $query);

    sqlsrv_close($conn);
    return $stmt;
}

function get_pessoa($id)
{
    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $query = "SELECT * FROM livro.dbo.pessoa WHERE id='{$id}'";
    $stmt = sqlsrv_query($conn, $query);

    $pessoa = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    sqlsrv_close($conn);
    return $pessoa;
}

function get_next_pessoa()
{
    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $query = "SELECT max(id) as next FROM livro.dbo.pessoa";
    $stmt = sqlsrv_query($conn, $query);
    $next = (int) sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)['next'] + 1;

    sqlsrv_close($conn);
    return $next;
}

function insert_pessoa($pessoa)
{
    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $sql = "INSERT INTO livro.dbo.pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
            VALUES ('{$pessoa['id']}',
                    '{$pessoa['nome']}',
                    '{$pessoa['endereco']}',
                    '{$pessoa['bairro']}',
                    '{$pessoa['telefone']}',
                    '{$pessoa['email']}',
                    '{$pessoa['id_cidade']}'
                    )";
    $stmt = sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors()));

    sqlsrv_close($conn);
    return $stmt;
}

function update_pessoa($pessoa)
{
    //$serverName = "172.22.8.16"; //serverName\instanceName
    $serverName = "localhost\SQLEXPRESS"; // Casa

    //$PWD = "237homologacao2211"; // Trampo
    $PWD = "123456789"; // Casa

    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => $PWD );
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }

    $sql = "UPDATE livro.dbo.pessoa SET nome = '{$pessoa['nome']}',
                                                endereco = '{$pessoa['endereco']}',
                                                bairro = '{$pessoa['bairro']}',
                                                telefone = '{$pessoa['telefone']}',
                                                email = '{$pessoa['email']}',
                                                id_cidade = '{$pessoa['id_cidade']}'
                                            WHERE id = '{$pessoa['id']}'";
    $stmt = sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors()));

    sqlsrv_close($conn);
    return $stmt;
}