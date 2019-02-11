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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

        <div class="row justify-content-center" style="margin-bottom: 30px;">

            <div class="col-8" style="margin-top: 45px;" >
                    
                <div class="panel panel-info" style="font-size: 20px;">

                    <div class="panel-heading" style="background-color: #343A40;">
                        <h3 class="panel-title" style="color: white;">Tu Información personal:</h3>
                    </div>

                    <div class="panel-body">

                        <?php

                            session_start();

                            $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                            $connection->set_charset("uft8");

                            if ($connection->connect_errno) {
                                printf("Connection failed: %s\n", $connection->connect_error);
                            exit();
                            }

                            $query="SELECT nombre, apellidos,fecha, direccion, correo, numero FROM usuarios WHERE codusuario='".$_SESSION['cod']."'";
                                
                            if ($result = $connection->query($query)) {

                                if($result->num_rows==0) {
                                    echo "ERROR";
                                }
                                else {
                                    while($obj = $result->fetch_object()) {

                                        $nombre=$obj->nombre;
                                        $apellidos=$obj->apellidos;
                                        $fecha=$obj->fecha;
                                        $direccion=$obj->direccion;
                                        $correo=$obj->correo;
                                        $numero=$obj->numero;
                                    }  
                                }   
                            }                       
                        ?>     
            
                            <div class=" col-md-9 col-lg-9 "> 
                                <form method="post">
                                <table class="table table-user-information">
                                    <tbody>
                                        <?php if (!isset($_POST["nombre"])) : ?>
                                        
                                            <h3 style="margin-bottom: 50px;">Datos Personales</h3>
                                            <tr>
                                                <td>Nombre:</td>
                                                <td>
                                                    <input type="text" name="nombre" value="<?php echo $nombre; ?>" > 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apellidos:</td>
                                                <td>
                                                    <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" > 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Fecha de Nacimiento</td>
                                                <td>
                                                    <input type="text" name="fecha" value="<?php echo $fecha; ?>" > 
                                                </td>
                                            </tr>

                                            <tr></tr>
                                            <tr>
                                                <td>Direccion</td>
                                                <td>
                                                    <input type="text" name="direccion" value="<?php echo $direccion; ?>" > 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>
                                                    <input type="text" name="correo" value="<?php echo $correo; ?>" > 
                                                </td> 
                                            </tr> 
                                            <tr>
                                                <td>Numero</td>
                                                <td>
                                                    <input type="text" name="numero" value="<?php echo $numero; ?>" > 
                                                </td>        
                                            </tr>
                                            <tr>
                                            <td></td>

                                                <td>
                                                    <input type="submit" value="Editar" class="btn btn-primary">   
                                                </td>
                                            </tr>

                                            
                                </form>

                                            <?php else: ?>
                                            <?php 
                    
                                            $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                                            $connection->set_charset("uft8");

                                            if ($connection->connect_errno) {
                                                printf("Connection failed: %s\n", $connection->connect_error);
                                            exit();
                                            }

                                            $query="UPDATE usuarios SET nombre='".$_POST['nombre']."',apellidos='".$_POST['apellidos']."',
                                                                        fecha='".$_POST['fecha']."',direccion='".$_POST['direccion']."',
                                                                        correo='".$_POST['correo']."',numero='".$_POST['numero']."'
                                                                        WHERE codusuario = '".$_SESSION['cod']."';";
                                            

                                            if ($result = $connection->query($query)) {
                                                echo "<center>";
                                                print "<img src=\"imagenes/userupdate.png\">" ;
                                                echo "<br>";
                                                echo "Tus datos se han actualizado";
                                                echo "</center>";
                                                
                                            }
                                       
                                            ?>

                                            <?php endif ?>  

                                            
                                            
                    </tbody>
                    </table> 

                            </div>
                    </div>
                </div>
            </div>
        </div>

        <?php    include ("includes/footer.php"); ?>

   </div>

</body>
</html>