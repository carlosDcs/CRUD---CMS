<?php 

$connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
exit();
}

$query="DELETE FROM monitores WHERE codmonitor = '".$_GET['cod']."'";

if ($result = $connection->query($query)) {

    header("Location: monitoresadmin.php");

}

?>