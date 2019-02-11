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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

  <body class="body">
    
        <style>      
                .header {
                  font-family: 'Staatliches', serif;
                  font-size: 18px;
                } 
                .acts {
                    position: relative;
                    width: 100%;
                }

                .image {
                    display: block;
                    width: 100%;
                    height: auto;
                }

                .overlay {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    height: 100%;
                    width: 100%;
                    opacity: 0;
                    transition: .5s ease;
                    background-color: #008CBA;
                }

                .acts:hover .overlay {
                    opacity: 1;
                }

                .text {
                    color: white;
                    font-size: 20px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    -webkit-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
                    text-align: center;
                }
              </style>

</head>
<body>

   <div class="container">
       
   <?php    include ("includes/cabecera-sinlogin.php"); ?>

    <div class="row headercontacto">
      <div class="col-4"></div>
      <div class="col-4">
        <p> Si quieres formar parte de nuestras actividades</p>
      </div>
      <div class="col-4"></div>
    </div>


    <div class="row clases">
        <div class="col-6" style="margin-top: 10px">
            <div class="acts">
                <img src="imagenes/crossfit.jpg" alt="Avatar" class="image" width="100%" style="height:400px">
                <div class="overlay">
                    <div class="text">CROSSFIT</div>
                </div>
            </div>
        </div>
        <div class="col-6" style="margin-top: 10px">
            <div class="acts">
                <img src="imagenes/boxeo.jpg" alt="Avatar" class="image" width="100%" style="height:400px">
                <div class="overlay">
                    <div class="text">BOXEO</div>
                </div>
            </div>
        </div>
        <div class="col-6" style="margin-top: 10px">
            <div class="acts">
                <img src="imagenes/queenax.jpeg" alt="Avatar" class="image" width="100%" style="height:400px">
                <div class="overlay">
                    <div class="text">QUEENAX</div>
                </div>
            </div>
        </div>
        <div class="col-6" style="margin-top: 10px">
            <div class="acts">
                <img src="imagenes/spinning.jpg" alt="Avatar" class="image" width="100%" style="height:400px">
                <div class="overlay">
                    <div class="text">SPINNING</div>
                </div>
            </div>
        </div>
        <div class="col-6" style="margin-top: 10px">
            <div class="acts">
                <img src="imagenes/zumba.jpeg" alt="Avatar" class="image" width="100%" style="height:400px">
                <div class="overlay">
                    <div class="text">ZUMBA</div>
                </div>
            </div>
        </div>
        <div class="col-6" style="margin-top: 10px">
            <div class="acts">
                <img src="imagenes/abds.jpg" alt="Avatar" class="image" width="100%" style="height:400px">
                <div class="overlay">
                    <div class="text">ABDS</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row headercontacto">
      <div class="col-4"></div>
      <div class="col-4">
        <p> ¿A que estas esperando? </p>
      </div>
      <div class="col-4">
        <a href="clientes.php" class="btn btn-outline-secondary" role="button">HAZTE SOCIO ></a>
      </div>
    </div>

        <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>