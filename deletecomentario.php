<?php 

$connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
exit();
}

$query="DELETE FROM mensajes WHERE codmensaje = '".$_GET['codmensaje']."'";

if ($result = $connection->query($query)) {

    header("Location: contactoadmin.php");

}

?>