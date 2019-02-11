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
       
    <?php    include ("includes/cabecera-sinlogin.php"); ?>

    <div class="row justify-content-center login">
      <div class="col-4">
        <?php if (!isset($_POST["cor"])) : ?>
            <center>
            <div class="card border-dark ">
                <div class="card-body text-dark">
                    <img src="imagenes/logo-login.png" width="90px">
                <form method="post" id="form1">
                    <input type="email" name="cor" placeholder="CORREO" required><br>
                    <input type="password" name="pass" placeholder="CONTRASEÑA" required><br>
                </div>
                <div class="card-footer">
                    <input class="btn btn-info" type="submit" placeholder="ACCEDER" required><br>
                </div>
              </form>
              </center>
            </div>

              <!-- DATA IN $_POST['mail']. Coming from a form submit -->
        <?php else: ?>

            <?php

            session_start();

                    
                $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                $connection->set_charset("uft8");

                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                exit();
                }

                $query="SELECT codusuario, correo, claveacceso, tipo FROM usuarios WHERE correo like '%".$_POST["cor"]."'";

                if ($result = $connection->query($query)) {

                    if($result->num_rows==0) {
                        echo "ERROR";
                    }
                    else {
                        while($obj = $result->fetch_object()) {

                            $passwd=$obj->claveacceso;
                            $tipo=$obj->tipo;
                            
                            $_SESSION['cod']=$obj->codusuario;
                            $_SESSION['tipo']=$tipo;
                        }
                        if($passwd == $_POST['pass']) {
                            header("Location: datoscliente.php");

                            if($tipo=='admin') {
                                header("Location: areaadmin.php"); 
                            }
                        }
                    }
                }
                            
            ?>                  
        <?php endif ?>  
      </div>

    <?php    include ("includes/footer.php"); ?>

  </div>

  </body>
</html>