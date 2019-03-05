<?php 

session_start();

$connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
exit();
}

$query="INSERT INTO inscribir(codusuario,codclase) VALUES('".$_SESSION['cod']."','".$_GET['cod']."')";

if ($result = $connection->query($query)) { 

    header("Location: clasescliente.php");
}



?>