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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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

      <div class="row fondoadmin">

      <?php    include ("numusers.php"); ?>
      <?php    include ("numclases.php"); ?>
      <?php    include ("nummonitores.php"); ?>
      <?php    include ("nummensajes.php"); ?>
      <?php    include ("usuariomasactivo.php"); ?>

      <div class="col-3">

        <div class="card my-5">
          <div class="card-header">Número de Usuarios:</div>    
          <div class="card-body">
              <h1><?php   echo $numusers;  ?></h1>
              <i class="fas fa-users fa-5x float-right"></i>
          </div>    
        </div>   

        <div class="card">
          <div class="card-header">Número de Mensajes:</div>    
          <div class="card-body">
              <h1><?php   echo $nummen;  ?></h1>
              <i class="fas fa-envelope fa-5x  float-right"></i>
          </div>    
        </div>      
      
      </div>

      <div class="col-3">
      
        <div class="card my-5">
            <div class="card-header">Número de Monitores:</div>    
            <div class="card-body">
                <h1><?php   echo $nummon;  ?></h1>
                <i class="fas fa-user-shield fa-5x float-right"></i>
            </div>    
          </div>   

          <div class="card">
            <div class="card-header">Número de Clases:</div>    
            <div class="card-body">
                <h1><?php   echo $numclas;  ?></h1>
                <i class="fas fa-calendar-alt fa-5x float-right"></i>
            </div>    
        </div>      
        
      </div>

      <div class="col-5 my-5">
              
        <div class="card my-5">
            <div class="card-header">Clientes con mayor actividad:</div>    
            <div class="card-body">

              <div class="row my-3">
                <div class="col-10">
                  <h4><?php  echo "Usuario con mas mensajes :"; ?>  </h4> 
                  <h6><?php  echo $nombre." ".$apellidos; ?>  </h6>
                  <br>
                </div>
                <div class="col-2">
                  <i class="fas fa-user-graduate fa-5x float-right"></i>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-10">
                  <h4><?php  echo "Usuario más en forma :"; ?>  </h4> 
                  <h6><?php  echo $nombreuser." ".$apellidosuser; ?>  </h6>
                  <br>
                </div>
                <div class="col-2">
                  <i class="fas fa-user-clock fa-4x float-right"></i>
                </div>
              </div>

              <div class="row my-3">
                <div class="col-10">
                  <h4><?php  echo "Nuestro profesional más dedicado :"; ?>  </h4> 
                  <h6><?php  echo $nombremonitor." ".$apellidosmonitor; ?>  </h6>
                  <br>
                </div>
                <div class="col-2">
                  <i class="fas fa-user-tie fa-5x float-right"></i>
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