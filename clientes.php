
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->


      <?php if (!isset($_POST["cod"])) : ?>
        <form method="post">

          <fieldset>
            <legend>INSERTAR USUARIO : </legend>
            CodCliente : <input type="text" name="cod" required><br>
            Nombre : <input type="text" name="Nom" required><br>
            Apellidos : <input type="text" name="Ape" required><br>
            Direccion : <input type="text" name="Dir" required><br>
            Correo : <input type="text" name="cor" required><br>
            Contraseña : <input type="text" name="pass" required><br>
            <p><input type="submit" value="Añadir"></p>
          </fieldset>

        </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>

        <?php


            $connection = new mysqli("localhost", "carlos", "2asirtriana", "Proyecto_Impla");
            $connection->set_charset("uft8");



            if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
            
            } 


            $query="INSERT INTO clientes VALUES ('".$_POST['Cod']."','".$_POST['DNI']."','".$_POST['Ape']."'
            ,'".$_POST['Nom']."','".$_POST['Dir']."','".$_POST['Tel']."');";
            
            echo $query;
            if ($result = $connection->query($query)) {

                echo "Se han insertado los datos";
            } else {
                echo "Ha habido algun error";
            }
            
           
            ?>

            <?php 

            $result->close();
            unset($obj);
            unset($connection);
          

            ?>
                <?php endif ?>

            </body>
            </html>
