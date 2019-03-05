<?php

session_start();

$connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
exit();
}
                     
?>     

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="layout1.css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

  <body class="body">
    
        <style>      
                .header {
                  font-family: 'Staatliches', serif;
                  font-size: 15px;
                } 
              </style>

  <div class="container">
       
   <?php    include ("includes/cabecera-sinlogin.php"); ?>



        <div class='jumbotron col-12 bg-light mt-5'>

          <div class='row'>

            <div class='col-2'>
              <img class='img-fluid rounded-circle ml-3' src='imagenes/finalogo2.png' alt='Avatar'>
            </div>

            <div class='col-9 ml-3'>
              <h4 class='font-weight-bold '>Century Fitness</h4> 
              <br>
              <p> Mensaje de Bienvenida del Equipo de Century Fitness, deja aqui tus comentarios y observaciones! Muchas gracias </p>
            </div>

          </div>
        </div>


        <?php 
        
        $query="SELECT u.nombre as nombre, u.apellidos as apellidos, u.correo as correo, u.fotofile as fotofile, m.asunto as asunto, m.contenido as contenido, m.fecha as fecha
        FROM mensajes m JOIN usuarios u 
        ON m.codusuario = u.codusuario
        ORDER BY m.fecha DESC";
    

        if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {

                    $nombre = $obj->nombre;
                    $apellidos = $obj->apellidos;
                    $correo = $obj->correo;
                    $asunto = $obj->asunto;
                    $contenido = $obj->contenido;
                    $fecha = $obj->fecha; 
                    $fotofile = $obj->fotofile;

                    echo "<div class='col-10  mt-5'>";
                      echo "<div class='row'>";
                      echo "<div class='col-2'>";
                      echo "<img class='img-fluid rounded-circle ml-3' src='$fotofile' alt='Avatar'>";
                      echo "</div>";

                      echo "<div class='col-9 ml-3'>";

                        echo "<h5 class='font-weight-bold '>".$nombre." ".$apellidos."</h5>";
                        echo $asunto;
                        echo "<br>";
                        echo $contenido;
                      echo "</div>";
                      echo "</div>";
                    echo "</div>";
                    

            }  
        }  
        
        ?>


        <div class="row">
          <div class="col-2"></div>
          <div class="col-5 mb-5 mt-5 ml-5">
          <button type="button" class="btn btn-outline-info" onclick="myFunction()">Comentar</button>
          </div>

          <script>
            function myFunction() {
              alert("Debe iniciar sesion!");
            }
          </script>
          
          
        </div>

    
    <?php    include ("includes/footer.php"); ?>

  </div>

  </body>
</html>