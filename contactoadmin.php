<?php

session_start();

$connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
$connection->set_charset("uft8");


/*


<?php if (!isset($_POST["sel"])) : ?>

    <?php
                             
        $query="select * from Mensajes where CodMen=".$_GET['cod'];

            if ($result = $connection->query($query)) {

                while($obj = $result->fetch_object()) {
                    
                    $cm=$obj->CodMen;
                    
                }
            }
        ?>

            <form method="post">

            <fieldset>
                <center>
                <legend>ELIMINAR MENSAJE  : </legend>
            
                ¿ESTÁ SEGURO DE QUE QUIERE ELIMINAR EL MENSAJE? : 
                
                <select name="sel">
                    <option>si</option>
                    <option>no</option>
                </select>
                <br><br>
                <p><input type="submit" value="Enviar"></p></center>
            </fieldset>
            
            </form>

            <!-- DATA IN $_POST['mail']. Coming from a form submit -->
            <?php else:  ?>

            <?php 
            
            $connection = new mysqli("localhost", "tf", "123456", "proyecto");
            $connection->set_charset("uft8");
            //TESTING IF THE CONNECTION WAS RIGHTNombre
            if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
            }
            if ($_POST['sel']=='si') {
            $query="Delete from Mensajes where CodMen='".$_GET['cod']."';";
            if ($result = $connection->query($query)) {
            echo "MENSAJE ELIMINADO";
            echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
            </button>";    
            echo $query;
            }
            } else {
                echo "<button type='button' class='btn btn-PRIMARY lista btn-lg'>
                <a href='mensajes.php'>VOLVER A MIS MENSAJES</a>
            </button>";  
            }
            ?>

            <?php endif ?>






*/

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

        

            <div class="col-1"></div>

            <form>
        
            <div class="col-8 media ml-5 mb-5 mt-5">

                <img class="rounded-circle avatar mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Avatar">
                
                <div class="media-body">
                    <h5 class="mt-0 font-weight-bold "><?php echo $nombre." "; echo $apellidos; ?></h5>
                    
                    <?php echo $asunto; ?>
                    <?php echo $contenido; ?>

                    <div class="media mt-3">
                    <img class="rounded-circle avatar mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="Generic placeholder image">
                    
                    <div class="media-body">

                        <h5 class="mt-0 font-weight-bold">Administrador: </h5>
                        <div class="form-group basic-textarea rounded-corners">
                            <textarea width="100%" class="form-control" rows="3" col="20" placeholder="Write your comment..."></textarea>
                        </div>
                    </div>

                    </div>
                </div>
            </div>

            <div class="col-2 media ml-5 mb-5 mt-5">
                <div class='col-6'>
                
                </div>
                <div class='col-6'>
                <a href='deletemonitores.php?cod=$cod' class='btn' width="300%"><img src="imagenes/delcoment.png" width="200%"></a>
                </div>
            </div>
        </form>
        </div>
        
        <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>