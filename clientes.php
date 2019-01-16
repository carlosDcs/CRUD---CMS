
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

  <body>

        <style>      
            .container {
            font-family: 'Staatliches', serif;
            font-size: 18px;
            } 
        </style>

      <div class="container">

        <div class="row header">

          <div class="col-11">
          </div>

          <div class="col-1">
            <img src="imagenes/es.png" width="40%">
            <img src="imagenes/en.png" width="40%">
          </div>
        </div>

        <div class="row header2">
          <div class="col-2" >
              <img src="imagenes/finalogo2.png" width="100%">
          </div>
          <div class="col-8 botones">
                  <nav class="navbar navbar-dark bg-dark">
                      <a class="navbar-brand" href="frontpage-bootstrap.html">INICIO</a>
                      <a class="navbar-brand" href="contactos.php">ÁREA CLIENTE</a>
                      <a class="navbar-brand" href="contactos.php">CONTACTO</a>
                  </nav>
          </div>
          <div class="col-2">
              <img src="imagenes/letralogo2.png" width="100%" style="margin-top: 25px">
          </div>
        </div>


        <div class="row fondo">

          <div class="col-4">
          </div>

          <div class="col-4 opa">

            <?php if (!isset($_POST["Nom"])) : ?>
              <form method="post">
                <fieldset>
                  <center>
                  <legend>RELLENE EL FORMULARIO : </legend>
                  <input class="form1" type="text" name="Nom" placeholder="NOMBRE" required><br>
                  <input class="form1" type="text" name="Ape" placeholder="APELLIDOS" required><br>
                  <input class="form1" type="email" name="cor" placeholder="CORREO" required><br>
                  <input class="form1" type="text" name="Dir" placeholder="DIRECCIÓN" required><br>
                  <input class="form1" type="password" name="pass" placeholder="CONTRASEÑA" required><br>
                  <input class="form1" type="password" name="pass1" placeholder="REPITE LA CONTRASEÑA" required><br>
                  <input class="send" type="submit" name="REGISTRATE" required><br>

                  </center>
                </fieldset>
              </form>

              <!-- DATA IN $_POST['mail']. Coming from a form submit -->
              <?php else: ?>

                <?php

                    $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                    $connection->set_charset("uft8");

                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                    }

                    if($_POST['pass']==$_POST['pass1']) {

                      $query="INSERT INTO usuarios(nombre,apellidos,correo,direccion,claveacceso) 
                      VALUES ('".$_POST['Nom']."','".$_POST['Ape']."','".$_POST['cor']."',
                              '".$_POST['Dir']."','".$_POST['pass']."')";
              
                      if ($result = $connection->query($query)) {
                          
                        echo "<form>";
                          echo "<div class='form'>";
                            echo "<center>";;
                              echo "<p>El usuario ".$_POST['Nom']." ".$_POST['Ape']." <br> 
                                    fue registrado con éxito</p>";
                                    //<img src='imagenes/registro.png' width='20%'>
                            echo "</center>";
                          echo "</div>";
                        echo "</form>";
                      } else {
                          echo "Este usuario ya existe. Intentalo de nuevo";
                      }
                    }
                    else {
                      echo "<form>";
                          echo "<div class='form'>";
                            echo "<center>";;
                              echo "Las contraseñas no coinciden <img src='imagenes/error.png' width='20%'>";
                            echo "</center>";
                          echo "</div>";
                        echo "</form>";
                    }
                                     
                ?>                  
              <?php endif ?>       
              </div>

              <div class="col-4">
              </div>

            </div>

            <div class="row footer">
                <div class="col-3" style="margin-top: 20px">
                    <p class="tittle">REDES SOCIALES</p>
                    <ul>
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Instagram</a></li>
                        <li><a href="">Twitter</a></li>
                    </ul>
                </div>
                <div class="col-3" style="margin-top: 20px">
                    <p class="tittle">FITNESS GYM</p>
                    <p class="address">C/Salvador Dali</p>
                    <p class="address">41015</p>
                    <p class="address">C/Salvador Dali</p>
                </div>
                <div class="col-3" style="margin-top: 20px">
                    <p class="tittle">HORARIO</p>
                    <p class="address">L-V : 7:00 / 21:00</p>
                    <p class="address">S : 8:00 / 20:00</p>
                    <p class="address">D: 7:00 / 15:00</p>
                </div>
                <div class="col-3" style="margin-top: 20px">
                    <p class="tittle">POLÍTICAS</p>
                    <p class="address">Política de cookies</p>
                    <p class="address">Política de privacidad</p>
                    <p class="address">Información legal</p>
                </div>
            </div>
      </div>

    </body>
</html>
