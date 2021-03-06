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

        <?php    include ("includes/cabecera-sinlogin.php"); ?>

        <div class="row fondo mb-1">

          <div class="col-4">
          </div>

          <div class="col-4 opa mt-4 mb-4">

          <div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title" style="margin-top: 50px;">Bienvenido a Fitness gym</small></h3>
			 			</div>
			 			<div class="panel-body">

            <?php if (!isset($_POST["nom"])) : ?>
			    		<form method="post" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="nom" class="form-control input-sm" placeholder="First Name" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="ape" class="form-control input-sm" placeholder="Last Name" required>
			    					</div>
			    				</div>
			    			</div>

                <div class="form-group">
			    				<input type="date" name="fecha" class="form-control input-sm" placeholder="Fecha nacimiento" required>
			    			</div>

                <div class="form-group">
			    				<input type="text" name="dir" class="form-control input-sm" placeholder="Direccion" required>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="cor" id="email" class="form-control input-sm" placeholder="Email Address" required>
			    			</div>

                <div class="form-group">
			    				<input type="number" name="numero" class="form-control input-sm" placeholder="Numero de contacto" required>
			    			</div>

                <div class="form-group">
                  <input type="file" class="form-control" name="imagen" placeholder>
                </div>


			    			<div class="row">

			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="pass" class="form-control input-sm" placeholder="Password" required>
			    					</div>
			    				</div>

			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="passconfirmation" class="form-control input-sm" placeholder="Confirm Password" required>
			    					</div>
                  
                  </div>
                </div>

                  <div class="form-group">
                    <center>
                      <input type="submit" value="Register" width="50%" class="btn btn-info">
                    </center>
				    			</div>


			    		</form>
              
              <!-- DATA IN $_POST['mail']. Coming from a form submit -->
              <?php else: ?>

                <?php

                    $file = $_FILES["imagen"]["tmp_name"];
                    $location = "prueba/";
                    $name = $_FILES["imagen"]["name"];

                    if (!move_uploaded_file( $file, $location . $_FILES["imagen"]["name"])) {               
                    };

                    $connection = new mysqli("localhost", "root", "Admin2015", "Proyecto_Impla");
                    $connection->set_charset("uft8");

                    if ($connection->connect_errno) {
                    printf("Connection failed: %s\n", $connection->connect_error);
                    exit();
                    }

                    if($_POST['pass']==$_POST['passconfirmation']) {

                      $query="INSERT INTO usuarios(nombre,apellidos,fecha,correo,direccion,claveacceso,numero,fotofile) 
                      VALUES ('".$_POST['nom']."','".$_POST['ape']."','".$_POST['fecha']."'
                              ,'".$_POST['cor']."','".$_POST['dir']."', md5('".$_POST['pass']."'),'".$_POST['numero']."','prueba/$name') ";
                    
              
                      if ($result = $connection->query($query)) {
                          
                        echo "<form>";
                          echo "<div class='form'>";
                            echo "<center>";
                              echo "<p>El usuario ".$_POST['nom']." ".$_POST['ape']." <br> 
                                    fue registrado con éxito</p>";
                                    echo "<img src='imagenes/adduser.png' width='60%'>" ;
                            echo "</center>";
                          echo "</div>";
                        echo "</form>";
                      } else {
                          echo "Este usuario ya existe. Intentalo de nuevo";
                      }
                    }
                    else {
                      echo "<form>";
                          echo "<div class='form fondo'>";
                            echo "<center>";;
                              echo "Las contraseñas no coinciden <img src='imagenes/error.png' width='20%'>";
                            echo "</center>";
                          echo "</div>";
                        echo "</form>";
                    }
                                     
                ?> 


              <?php endif ?>   


			    	</div>
	    		</div>

        </div>

            </div>

        <?php    include ("includes/footer.php"); ?>

      </div>

    </body>
</html>
