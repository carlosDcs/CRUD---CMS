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

        <?php  include ("includes/cabecera-sinlogin.php"); ?>

        <div class="row headercontacto">
            <div class="col-5" style="text-align: center">
              <p style="margin-top: 100px ; font-size: 20px" >Todo un equipo de profesionales <br> trabajando a tu disposición!</p>
            </div>
            <div class="col-6 mr-2">
              <img class="img-fluid" src="imagenes/monitor.jpg" width="100%" height="300px">
            </div>
        </div>


            <?php

            $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
            $connection->set_charset("uft8");

            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
            exit();
            }

            $query="SELECT * FROM monitores";

            if ($result = $connection->query($query)) {

              if($result->num_rows==0) {
                  echo "ERROR";
              }
              else {
                  while($obj = $result->fetch_object()) {

                    $cod = $obj->codmonitor;
                    $fotofile = $obj->fotofile;

                    echo "<div class='row justify-content-center mt-5 mb-5'>";
                    
                    echo "<div class='col-3'>";
                      echo "<img class='rounded-circle img-fluid mt-2' src='$fotofile'>";
                    echo "</div>";
                    echo "<div class='col-7'>";
                    echo "<h4>".$obj->nombre." ".$obj->apellidos."</h4>";
                    echo "<blockquote class='blockquote'>";
                    echo "<p>".$obj->puesto."</p>"; 
                    echo "</blockquote>";
                    echo "<p>".$obj->informacion."</p>"; 
                    echo "</div>";

                    echo "</div>";

                  }  
              }   
          }                       
      ?>     


        <?php  include ("includes/footer.php"); ?>

    </div>


  </body>
</html>