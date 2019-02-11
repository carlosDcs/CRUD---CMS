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
       
      <?php    include ("includes/cabera-admin.php"); ?>

    <div class="row headerhorario">
      <div class="col-2"></div>
      <div class="col-6">
        <h6>HORARIO DE NUESTRAS ACTIVIDADES</h6>
      </div>
      <div class="col-4"></div>
    </div>


    <div class="row contenido">
      <div class="col-1">
      </div>
      <div class="col-7">
        <table>
          <tr class="dias">
            <th></th>
            <th>LUNES</th>
            <th>MARTES</th>
            <th>MIERCOLES</th>
            <th>JUEVES</th>
            <th>VIERNES</th>
            <th>SABADO</th>
          </tr>
          <tr class="clases">
            <th>9:00</th>
            <td col='2'>PILATES</td>
            <td></td>
            <td></td>
            <td>BODYTONIC</td>
            <td>TAICHI</td>
            <td></td>
          </tr>
          <tr class="clases">
            <th>10:00</th>
            <td>RUNNING</td>
            <td></td>
            <td>T-REX</td>
            <td>BODYTONIC</td>
            <td>T-REX</td>
            <td></td>
          </tr>
          <tr class="clases">
            <th>11:00</th>
            <td>PILATES</td>
            <td>T-REX</td>
            <td></td>
            <td>BODYTONIC</td>
            <td>TAICHI</td>
            <td>RUNNING</td>
          </tr>
          <tr class="clases">
            <th>12:00</th>
            <td>RUNNING</td>
            <td></td>
            <td>T-REX</td>
            <td>BODYTONIC</td>
            <td>T-REX</td>
            <td></td>
          </tr>
          <tr class="clases">
            <th>13:00</th>
            <td>PILATES</td>
            <td>T-REX</td>
            <td></td>
            <td>BODYTONIC</td>
            <td>TAICHI</td>
            <td>RUNNING</td>
          </tr>
          <tr class="clases">
            <th>16:00</th>
            <td>PILATES</td>
            <td>T-REX</td>
            <td></td>
            <td>BODYTONIC</td>
            <td>TAICHI</td>
            <td></td>
          </tr>
          <tr class="clases">
            <th>17:00</th>
            <td>PILATES</td>
            <td>T-REX</td>
            <td></td>
            <td>BODYTONIC</td>
            <td>TAICHI</td>
            <td>RUNNING</td>
          </tr>
          <tr class="clases">
            <th>18:00</th>
            <td>PILATES</td>
            <td>T-REX</td>
            <td></td>
            <td>BODYTONIC</td>
            <td>TAICHI</td>
            <td>RUNNING</td>
          </tr>
          <tr class="clases">
            <th>19:00</th>
            <td>RUNNING</td>
            <td></td>
            <td>T-REX</td>
            <td>BODYTONIC</td>
            <td>T-REX</td>
            <td></td>
          </tr>
          <tr class="clases">
            <th>20:00</th>
            <td>RUNNING</td>
            <td></td>
            <td>T-REX</td>
            <td>BODYTONIC</td>
            <td>T-REX</td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>

        <?php    include ("includes/footer.php"); ?>

   </div>

  </body>
</html>