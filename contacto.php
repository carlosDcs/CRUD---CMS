<?php

session_start();

$connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
exit();
}

$query="SELECT u.nombre as nombre, u.apellidos as apellidos, u.correo as correo, m.asunto as asunto, m.contenido as contenido
        FROM mensajes m JOIN usuarios u 
        ON m.codusuario = u.codusuario";
    

        if ($result = $connection->query($query)) {

            while($obj = $result->fetch_object()) {

                    $nombre = $obj->nombre;
                    $apellidos = $obj->apellidos;
                    $correo = $obj->correo;
                    $asunto = $obj->asunto;
                    $contenido = $obj->contenido;

            }  
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

    <div class="row headercontacto">
      <div class="col-4"></div>
      <div class="col-3">
        <p> ¿Dónde estamos?</p>
        <p class="address">C/Salvador Dalí, Nº15</p>
        <p class="address">41015 , Sevilla</p>
        <p class="address">954957411</p>
      </div>
      <div class="col-3">
          <p> Nuestro horario</p>
          <p class="address">L-V : 7:00 / 21:00</p>
          <p class="address">S : 8:00 / 20:00</p>
          <p class="address">D: 7:00 / 15:00</p>
      </div>
      <div class="col-2"></div>
    </div>

        

    <div class="col-9 media ml-5 mb-5 mt-5">

        <img class="d-flex rounded-circle avatar mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Avatar">
        
        <div class="media-body">
            <h5 class="mt-0 font-weight-bold "><?php echo $nombre." "; echo $apellidos; ?></h5>
            
            <?php echo $asunto; ?>
            <?php echo $contenido; ?>

            <div class="media mt-3">
              <img class="d-flex rounded-circle avatar mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="Generic placeholder image">
            
              <div class="media-body">

                <h5 class="mt-0 font-weight-bold">Respuestas: </h5>
                <div class="form-group basic-textarea rounded-corners">
                    <textarea class="form-control" rows="3" col="10" placeholder="Write your comment..."></textarea>
                </div>
            </div>

        </div>

        <div class="row">
        <div class="col-2"></div>

        <button type="button" class="btn btn-outline-info" onclick="myFunction()">Comentar</button>

        <script>
        function myFunction() {
          alert("Debe iniciar sesion!");
        }
        </script>
        
        </div>
    </div>



    </div>
    
    <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>