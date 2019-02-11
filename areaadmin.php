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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">
  </head>


  <body class="body">
    
        <style>      
                .header {
                  font-family: 'Staatliches', serif;
                  font-size: 30px;
                } 
              </style>

   <div class="container">
       
            <?php    include ("includes/cabera-admin.php"); ?>

<!------ Include the above in your HEAD tag ---------->

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                
            <div class="panel panel-info" style="font-size: 20px;">
            <div class="panel-heading">
              <h3 class="panel-title" style="font-size: 30px;">Tu Información personal:</h3>
            </div>
            <div class="panel-body" >
              <div class="row">

                      <?php

                        session_start();

                        $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                        $connection->set_charset("uft8");

                        if ($connection->connect_errno) {
                            printf("Connection failed: %s\n", $connection->connect_error);
                        exit();
                        }

                        $query="SELECT nombre, apellidos, direccion, correo FROM usuarios WHERE codusuario='".$_SESSION['cod']."'";
                            
                        if ($result = $connection->query($query)) {

                            if($result->num_rows==0) {
                                echo "ERROR";
                            }
                            else {
                                while($obj = $result->fetch_object()) {

                                    $nombre=$obj->nombre;
                                    $apellidos=$obj->apellidos;
                                    $direccion=$obj->direccion;
                                    $correo=$obj->correo;
                                }  
                            }   
                        }                       
                ?>     
            
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    <p class="font-weight-bold"> Datos Personales</p>
                     
                      <tr>
                        <td>Nombre:</td>
                        <td>
                            <?php echo $nombre; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Apellidos:</td>
                        <td>
                            <?php echo $apellidos; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Fecha de Nacimiento</td>
                        
                      </tr>

                    <tr></tr>
                      <tr>
                        <td>Direccion</td>
                        <td>
                            <?php echo $direccion; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>
                            <?php echo $correo; ?>
                        </td> 
                      </tr> 
                      <tr>
                        <td>Numero</td>
                        <td></td>      
                      </tr>
                     
                    </tbody>
                  </table>

                  <a href="datosclienteadmin.php" class="btn btn-primary">Editar</a>
                </div>
              </div>
            </div>
   
                      
          </div>
        </div>
      </div>
    
      <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>