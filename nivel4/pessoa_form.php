<?php

require_once 'db/pessoa_db.php';

if (!empty($_REQUEST['action'])) {
    // Edição
    if ($_REQUEST['action'] == 'edit') {

        $id = (int)$_GET['id'];
        $pessoa = get_pessoa($id);
        // Inserção
    } elseif ($_REQUEST['action'] == 'save') {

        $pessoa = $_POST;
        if (empty($_POST['id'])) {
            $pessoa['id'] = get_next_pessoa();
            $result = insert_pessoa($pessoa);
        } else {
            $stmt = update_pessoa($pessoa);
        }

        echo ($pessoa) ? 'Registro salvo com Sucesso!' : 'Problemas ao salvar';
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
$form = str_replace('{cidades}', listaComboCidades($pessoa['id_cidade']), $form);

echo $form;


