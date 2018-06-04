<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Casas rurales</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="extra.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="extraextra.js"></script>




  </head>
  <body>

<?php

require_once('header.php');
require_once('conectarbd.php');

//OBTENEMOS LOS DATOS DE LAS CASAS RURALES, ORDENANDOLAS POR RANKING DE PUNTUACIONES

$sql_mostrar_casas="SELECT * FROM producto WHERE id_tipo_prod = 1 ORDER BY ranking DESC";
$resultado_mostrar_casas=mysqli_query($conectar,$sql_mostrar_casas);
    
    echo '<h4><font color="white">Casas rurales: </font></h4>(Ordenadas por ranking de valoraciones)<br>';
    while ($resultado_mostrar=mysqli_fetch_array($resultado_mostrar_casas,MYSQLI_BOTH)) {

      echo '
      <div class="container">
      <div class="row">
        <div class="col-md-9">
          <form action="" method="POST">
          
            <table border=1 class="table table-dark"> 
              <thead>
                  <tr>

                    <th scope="col">Nombre</th>
                    <th scope="col">Datos</th>
                    <th scope="col">Comodidades</th>
                  </tr>
                </thead>
             <form>
              <tr>
      
                <td>
                  <input type="text" name="casa_seleccionada" value="'.$resultado_mostrar['nombre_producto'].'" style="visibility:hidden"> 
                  <h4><font color="white">'.$resultado_mostrar['nombre_producto'].'</font></h4>

                </td>
                <td><font color="white">
                  <p>Dirección: '.$resultado_mostrar['direccion'].'</p>
                  <p>Número de habitaciones: '.$resultado_mostrar['num_habitaciones'].'</p>
                  <p>Precio por noche: '.$resultado_mostrar['precio'].'€</p></font>

                </td>

                <td><font color="white">
                <p>Hacen Comidas: '.(($resultado_mostrar["comidas"]==1)?"SI":"NO").'</p>
                <p>Tiene Piscina: '.(($resultado_mostrar["piscina"]==1)?"SI":"NO").'</p>
                <p>Dispone de Wifi: '.(($resultado_mostrar["wifi"]==1)?"SI":"NO").'</p>
                <p>Tiene Parking: '.(($resultado_mostrar["parking"]==1)?"SI":"NO").'</p>
                <p>Admite Mascotas: '.(($resultado_mostrar["mascotas"]==1)?"SI":"NO").'</p></font>
                </td>
               
              </tr>
              <tr>

                <td>
                </td>
                <td><!--PASAMOS LA VARIABE POR GET-->
                   <button type="submit" class="btn btn-success btn-lg btn-block">
                   <a href="ver_valoraciones.php?casa='.$resultado_mostrar['nombre_producto'].'">VER VALORACIONES</button> <br>
                </td>
                <td><!--PASAMOS LA VARIABE POR GET-->
                   <button type="submit" class="btn btn-success btn-lg btn-block">
                   <a href="valorar.php?casa='.$resultado_mostrar['nombre_producto'].'">VALORAR ESTA CASA</a></button> <br>
                </td>
              </tr>
             </form>
            </table>
            <br><hr><br>
        </div>
      </div>
      </div>
      ';
    } 
    

    $desc=mysqli_close($conectar); 


?>

    <!-- el footer
    <div class="navbar navbar-fixed-bottom navbar-dark bg-dark"
    style="position:fixed;left:0px;bottom:0px;height:80px;width:100%;">
      <div class="container">
        <p class="navbar-text pull-left">© 2018 - P9 Amazoners
        </p> -->
        
        
      </div>

  </body>
</html>
