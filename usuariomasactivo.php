<?php 

    $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
    $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
        exit();
        }

        $query="SELECT u.nombre, u.apellidos FROM usuarios u JOIN mensajes m 
                ON u.codusuario = m.codusuario ORDER BY count(*) DESC;"; 

        if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {

                $nombre = $obj->nombre;
                $apellidos = $obj->apellidos;

            }
        }

        $query="SELECT u.nombre, u.apellidos FROM inscribir i JOIN usuarios u 
        ON u.codusuario = i.codusuario ORDER BY count(*) DESC;"; 

        if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {

                $nombreuser = $obj->nombre;
                $apellidosuser = $obj->apellidos;

            }
        }

        $query="SELECT m.nombre, m.apellidos FROM monitores m JOIN clases c 
        ON m.codmonitor = c.codmonitor ORDER BY count(*) DESC;"; 

        if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {

                $nombremonitor = $obj->nombre;
                $apellidosmonitor = $obj->apellidos;


            }
        }

?>)