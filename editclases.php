<?php

            session_start();

            if($_SESSION['tipo'] != 'admin' ) {
                session_destroy();
                header("Location: frontpage-bootstrap.php");
            }

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

        <?php  include ("includes/cabera-admin.php"); ?>

            <?php if (!isset($_POST['actividad'])) : ?>

            <?php

                $query="SELECT m.nombre, m.apellidos, c.actividad, c.codmonitor FROM monitores m
                        JOIN clases c ON m.codmonitor = c.codmonitor
                        WHERE codclase = '".$_GET['cod']."'";
                
               
                if ($result = $connection->query($query)) {

                               
                    while($obj = $result->fetch_object()) { 

                        $actividad = $obj->actividad;
                        $nombre = $obj->nombre;
                        $apellidos = $obj->apellidos;
                        $codmonitor = $obj->codmonitor;

                    echo "<div class='row justify-content-center mt-5 mb-5'>";
                    
                        echo "<div class='col-3'>";
                            echo "<form method='post'>";
                            echo "<button type='submit' class='btn btn-primary mt-3 ml-5'>Actualizar</button>";
                        echo "</div>";

                        echo "<div class='col-7'>";
                            
                                echo "<div class='row'>";
                                    echo "<div class='col-6'>";
                                        echo "<input class='form-control' type='text' name='actividad' value='$obj->actividad' required>";
                                    echo "</div>";
                                    echo "<div class='col-6'>";
                                        echo "<select class='form-control' name='codmon'>";
                                        echo "<option value='$codmonitor' class='form-control' type='text' selected>" .$nombre." ".$apellidos." </option>";
                                        
                                        $query2 = "SELECT * FROM monitores where codmonitor != $codmonitor";

                                        if ($result2 = $connection->query($query2)) { 

                                           while ($obj2 = $result2->fetch_object()) {

                                            $nombre2 = $obj2->nombre;
                                            $apellidos2 = $obj2->apellidos;
                                            $cod = $obj2->codmonitor;

                                            echo "<option value='$cod' class='form-control' type='text'>" .$nombre2." ".$apellidos2." </option>";

                                           }

                                        }
                                        
                                        echo "</select>";
                                        
                                    echo "</div>";
                                echo "</div>"; 
                                  
                            echo "</form>"; 
                        echo "</div>";
                    echo "</div>";

                    }
                }

            ?>

            <?php else: ?>


            <?php 


            $actividad = $_POST['actividad'];
            $codmonitor = $_POST['codmon'];

            $query="UPDATE clases SET actividad='$actividad', codmonitor='$codmonitor'
                    WHERE codclase = '".$_GET['cod']."'; ";
         
            

            if ($result = $connection->query($query)) {
             
                header("Location: clasesadmin.php");
            }

            ?>

            <?php endif ?>



        <?php  include ("includes/footer.php"); ?>

    </div>

  </body>
</html>