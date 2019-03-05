<?php

session_start();
if($_SESSION['tipo'] != 'admin' ) {
  session_destroy();
  header("Location: datoscliente.php");
}


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
                  font-size: 18px;
                } 
              </style>

   <div class="container">
  
        <?php    include ("includes/cabera-admin.php"); ?>

        <div class="row headercontacto">
            <div class="col-3">
            </div>
            <div class="col-3">
                <p> ¿Dónde estamos?</p>
                <p class="address">C/Salvador Dalí, Nº15</p>
                <p class="address">41015 , Sevilla</p>
            </div>
            <div class="col-2">
                <p> Nuestro horario</p>
                <p class="address">L-V : 7:00 / 21:00</p>
                <p class="address">S : 8:00 / 20:00</p>
                <p class="address">D: 7:00 / 15:00</p>
            </div>
            <div class="col-4">
            </div>
        </div>

        <div class="row coments">

            <?php

            $query="SELECT u.codusuario as codusuario, u.nombre as nombre, u.apellidos as apellidos, u.correo as correo, u.fotofile as fotofile, m.codmensaje as codmensaje, m.asunto as asunto, m.contenido as contenido, m.fecha as fecha
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
                    $codmensaje = $obj->codmensaje;
                    $codusuario = $obj->codusuario;

      
                    echo "<div class='col-12 media mt-5'>";

                       

                        echo "<div class='col-3'>";
                            echo "<img class='img-fluid d-flex rounded-circle avatar ml-4 mb-2 mr-3' src='$fotofile' alt='Avatar'>";
                            echo "<a href='deleteusuario.php?codusuario=$codusuario' class='mt-3 mb-3 btn btn-danger'>Eliminar Usuario</a>";
                        echo "</div>";

                        echo "<div class='col-7'>";
                            echo "<h5 class='font-weight '>".$nombre." ".$apellidos."</h5>";
                            echo "<br>";
                            echo "Asunto: $asunto";
                            echo "<br>";
                            echo "Mensaje: $contenido";
                        echo "</div>";

                        
                        echo "<div class='col-2'>";     
                            echo "<a href='deletecomentario.php?codmensaje=$codmensaje' class='btn btn-primary' style='float: right'>Eliminar Comentario</a>";
                        echo "</div>";

                    echo "</div>";
                    
                       

                }  
            }  

            ?> 


        </div>
        
        <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>