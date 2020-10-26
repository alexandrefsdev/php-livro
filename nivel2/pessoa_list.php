<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Listagem de Pessoas</title>
</head>

<body>
    <div>
        <?php

        $serverName = "172.22.8.16"; //serverName\instanceName
        $connectionInfo = array("Database" => "livro", "UID" => "sa", "PWD" => "237homologacao2211");
        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if ($conn === false) {
            die("<pre>" . print_r(sqlsrv_errors() . "</pre>", true));
        }

        if (!empty($_GET['action']) AND $_GET['action'] == 'delete') {
            $id = (int) $_GET['id'];
            $stmt = sqlsrv_query($conn, "DELETE FROM livro.dbo.pessoa WHERE id='{$id}' ");
        }

        $stmt = sqlsrv_query($conn, "SELECT * FROM livro.dbo.pessoa ORDER BY id");

        echo "<table class='table'>";
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo "<th scope='col'> </th>";
        echo "<th scope='col'> </th>";
        echo "<th scope='col'> Id </th>";
        echo "<th scope='col'> Nome </th>";
        echo "<th scope='col'> Endereco </th>";
        echo "<th scope='col'> Bairro </th>";
        echo "<th scope='col'> Telefone </th>";
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $id = $row['id'];
            $nome = $row['nome'];
            $endereco = $row['endereco'];
            $bairro = $row['bairro'];
            $telefone = $row['telefone'];
            $email = $row['email'];


            echo '<tr>';
            echo "<td align='center'>
            <a href = 'pessoa_form.php?action=edit&id={$id}'>
            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z' />
            </svg>
            </a></td>";
            echo "<td align='center'>
            <a href = 'pessoa_delete.php?action=delete&id={$id}'>
            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-x-octagon' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path fill-rule='evenodd' d='M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z'/>
            <path fill-rule='evenodd' d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
          </svg>
            </a></td>";

            echo "<td> {$id} </td>";
            echo "<td> {$nome} </td>";
            echo "<td> {$endereco} </td>";
            echo "<td> {$bairro} </td>";
            echo "<td> {$telefone} </td>";
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        ?>
    </div>
    <div>
        <button style="display: block; margin-left: 20px;  margin-right: auto;" type="button" class="btn btn-primary btn-lg" onclick="window.location='pessoa_form.php'">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-reply-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.079 11.9l4.568-3.281a.719.719 0 0 0 0-1.238L9.079 4.1A.716.716 0 0 0 8 4.719V6c-1.5 0-6 0-7 8 2.5-4.5 7-4 7-4v1.281c0 .56.606.898 1.079.62z" />
            </svg>
            INSERIR
        </button>
    </div>
</body>

</html>