<?php

if (!empty($_REQUEST['action'])) {
    $serverName = "172.22.8.16"; //serverName\instanceName
    $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
    }
    // CONEXÃO ATÉ AQUI


    if ($_REQUEST['action'] == 'edit') {

        $id = (int) $_GET['id'];
        $query = "SELECT * FROM pessoa WHERE id='{$id}'";
        $stmt = sqlsrv_query($conn, $query);
        $pessoa = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    } else if ($_REQUEST['action'] == 'save') {

        $pessoa = $_POST;

        if (empty($_POST['id'])) {

            $query = "SELECT max(id) as next FROM pessoa";
            $stmt = sqlsrv_query($conn, $query);
            $next = (int) sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)['next'] + 1;

            $sql = "INSERT INTO livro.dbo.pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
            VALUES ( '{$next}', '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";

            $stmt = sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors()));;

        } else {
            $sql = "UPDATE livro.dbo.pessoa SET nome = '{$pessoa['nome']}',
                                                endereco = '{$pessoa['endereco']}',
                                                bairro = '{$pessoa['bairro']}',
                                                telefone = '{$pessoa['telefone']}',
                                                email = '{$pessoa['email']}',
                                                id_cidade = '{$pessoa['id_cidade']}'
                                            WHERE id = '{$pessoa['id']}'";
            $stmt = sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors()));

        }
        echo ($stmt) ? 'Registro Salvo com Sucesso!' : 'Houve um Erro!';

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    }
} else {
    $pessoa = [];
    $pessoa['id'] = '';
    $pessoa['nome'] = '';
    $pessoa['endereco'] = '';
    $pessoa['bairro'] = '';
    $pessoa['telefone'] = '';
    $pessoa['email'] = '';
    $pessoa['id_cidade'] = '';
}

require_once 'lista_combo_cidades.php';
$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $pessoa['id'], $form);
$form = str_replace('{nome}', $pessoa['nome'], $form);
$form = str_replace('{endereco}', $pessoa['endereco'], $form);
$form = str_replace('{bairro}', $pessoa['bairro'], $form);
$form = str_replace('{telefone}', $pessoa['telefone'], $form);
$form = str_replace('{email}', $pessoa['email'], $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}',
listaComboCidades($pessoa['id_cidade']), $form);
echo $form;
