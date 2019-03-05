<?php

                session_start();

                $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                $connection->set_charset("uft8");

                if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                exit();
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
       
   <?php    include ("includes/cabecera-cliente.php"); ?>

    <div class="row headerhorario mt-5 mb-5">
      <div class="col-2"></div>
      <div class="col-6">
        <h6>INSCRIBETE A NUESTRAS ACTIVIDADES</h6>
      </div>
      <div class="col-4"></div>
    </div>


    <div class="row contenido">
     
      <div class="col-7">

        <table class="table table-stripped">
          <tr class="thead-dark">
            <th>HORA</th>
            <th>LUNES</th>
            <th>MARTES</th>
            <th>MIERCOLES</th>
            <th>JUEVES</th>
            <th>VIERNES</th>
          </tr>

      <?php 

        $query="SELECT * FROM clases where horainicio = '09:00:00' order by dia"; 

          if ($result = $connection->query($query)) {

            echo "<tr class='clases'>";
            echo "<td>09:00</td>";

            while($obj = $result->fetch_object()) {

              
              $actividad=$obj->actividad;            
              
              echo  "<td><a href='inscribirclase.php?cod=$obj->codclase'>$actividad</a></td>";
                                            
            }
            echo "</tr>"; 
        }                          
      ?>
          <?php 

          $query="SELECT * FROM clases where horainicio = '10:00:00' order by dia"; 

            if ($result = $connection->query($query)) {

              echo "<tr class='clases'>";
              echo "<td>10:00</td>";

              while($obj = $result->fetch_object()) {

                
                $actividad=$obj->actividad;            
                
                echo  "<td><a href='inscribirclase.php?cod=$obj->codclase'>$actividad</a></td>";
                                              
              }
              echo "</tr>"; 
          }                          
          ?>
                <?php 

          $query="SELECT * FROM clases where horainicio = '11:00:00' order by dia"; 

            if ($result = $connection->query($query)) {

              echo "<tr class='clases'>";
              echo "<td>11:00</td>";

              while($obj = $result->fetch_object()) {

                
                $actividad=$obj->actividad;            
                
                echo  "<td><a href='inscribirclase.php?cod=$obj->codclase'>$actividad</a></td>";
                                              
              }
              echo "</tr>"; 
          }                          
          ?>
                <?php 

          $query="SELECT * FROM clases where horainicio = '12:00:00' order by dia"; 

            if ($result = $connection->query($query)) {

              echo "<tr class='clases'>";
              echo "<td>12:00</td>";

              while($obj = $result->fetch_object()) {

                
                $actividad=$obj->actividad;            
                
                echo  "<td><a href='inscribirclase.php?cod=$obj->codclase'>$actividad</a></td>";
                                              
              }
              echo "</tr>"; 
          }                          
          ?>
                <?php 

          $query="SELECT * FROM clases where horainicio = '13:00:00' order by dia"; 

            if ($result = $connection->query($query)) {

              echo "<tr class='clases'>";
              echo "<td>13:00</td>";

              while($obj = $result->fetch_object()) {

                
                $actividad=$obj->actividad;            
                
                echo  "<td><a href='inscribirclase.php?cod=$obj->codclase'>$actividad</a></td>";
                                              
              }
              echo "</tr>"; 
          }                          
          ?>

       </table>
      </div>   

      
      
      <div class="col-5 ">
        <div class="wrapper fadeInDown">
          <div id="formContent">

          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Tus clases:</div>
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">

              <?php  

              $query = "SELECT i.codinscripcion as codins ,c.actividad as act, c.horainicio as inic, c.dia as dia from clases c 
                        JOIN inscribir i on c.codclase = i.codclase
                        WHERE i.codusuario = '".$_SESSION['cod']."' ";

              if ($result = $connection->query($query)) { 

                while($obj = $result->fetch_object()) { 

                  echo "<ul>";
                  echo "<li>";
                  echo $obj->act." - ".$obj->dia." - ".$obj->inic." <a href='deleteclases.php?cod=$obj->codins'><img src='imagenes/rubbish.png' width=10%'></a>";
                  
                  echo "</li>";
                  echo "</ul>";
                }

              }
                            
            
              ?>
              </p>
             
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