
<?php

$serverName = "172.22.8.16"; //serverName\instanceName
$connectionInfo = array( "Database"=>"livro", "UID"=>"sa", "PWD"=>"237homologacao2211");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}