<?php 

    $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
    $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
        exit();
        }

        $query="SELECT count(*) as total FROM mensajes"; 

        if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {

                $nummen = $obj->total;

            }
        }


?>)