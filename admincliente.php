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
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">
  </head>


  <body>
    
    <style>      
        .header {
            font-family: 'Staatliches', serif;
            font-size: 50px;
        } 
    </style>

    <div class="container">
       
      <?php    include ("includes/cabera-admin.php"); ?>

        <div class="row">
          <div class="col-12">

            <table class="table mt-3">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Cod. Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Numero</th>
                <th scope="col">Fecha</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>

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

            $query="SELECT * FROM usuarios";

            if ($result = $connection->query($query)) {

              if($result->num_rows==0) {
                  echo "ERROR";
              }
              else {
                  while($obj = $result->fetch_object()) {

                    echo "<tr>";
                    echo "<td scope='row'>".$obj->codusuario."</td>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td>".$obj->apellidos."</td>";
                    echo "<td>".$obj->correo."</td>";
                    echo "<td>".$obj->direccion."</td>";
                    echo "<td>".$obj->numero."</td>";
                    echo "<td>".$obj->fecha."</td>";
                    echo "<td><a href='datosclienteadmin.php?cod=$obj->codusuario'><img src='imagenes/edit.png' width='20%' ></a></td>";
                    echo "</tr>";

                  }
                }
              }

            ?>

            </tbody> 
            </table>
          </div>
      </div>

      <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>