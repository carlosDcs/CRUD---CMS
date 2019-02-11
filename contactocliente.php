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
  
        <?php    include ("includes/cabecera-cliente.php"); ?>

        <div class="row headercontacto">
            <div class="col-3"></div>
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
            <div class="col-4"></div>
        </div>

        <div class="row contacto">
            <div class="col-3"></div>
            <div class="col-8 coments">

                <?php

                session_start();

                $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                $connection->set_charset("uft8");

                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                exit();
                }

                $query="SELECT u.nombre, u.apellidos, u.correo, m.asunto, m.contenido 
                        FROM usuarios u JOIN mensajes m 
                        ON u.codusuario = m.codusuario
                        WHERE u.codusuario='".$_SESSION['cod']."'";
                    
                if ($result = $connection->query($query)) {

                    if($result->num_rows==0) {
                        echo "ERROR";
                    }
                    else {
                        while($obj = $result->fetch_object()) {

                            $nombre=$obj->nombre;
                            $apellidos=$obj->apellidos;
                            $correo=$obj->correo;
                            $claveacceso=$obj->claveacceso;
                        }  
                    }   
                }                       
                ?>

                        <form class="form-horizontal" method="post">
                            <fieldset>
                                    <legend class="headercont">Contactanos</legend>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input name="name" type="text" value="<?php echo $nombre ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-md-8">
                                            <input name="name" type="text" value="<?php echo $apellidos ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o"></i></span>
                                        <div class="col-md-8">
                                            <input name="email" type="text" value="<?php echo $correo ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <input name="asunto" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o"></i></span>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                        </div>
                                    </div>
                            </fieldset>
                        </form>
            </div>  
        </div>
    
        <?php    include ("includes/footer.php"); ?>

    </div>

  </body>
</html>