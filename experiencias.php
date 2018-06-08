<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Experiencias</title>
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

//OBTENEMOS LOS DATOS DE LAS CASAS RURALES, ORDENANDOLAS POR RANKING DE PUNTUACIONES, SIEMPRE QUE NO ESTEN BORRADAS

$sql_mostrar_experiencias="SELECT * FROM producto WHERE ((id_tipo_prod = 2) AND (borrado=0)) ORDER BY ranking DESC";
$resultado_mostrar_experiencias=mysqli_query($conectar,$sql_mostrar_experiencias);
    
    echo '<h4><font color="white">Experiencias: </font></h4>(Ordenadas por ranking de valoraciones)<br>';
    while ($resultado_mostrar=mysqli_fetch_array($resultado_mostrar_experiencias,MYSQLI_BOTH)) 
    {

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
                  <h4><font color="white">'.$resultado_mostrar['nombre_producto'].'</font></h4>';
                    
                        //OBTENGO EL id_producto
                        $id_exp_valoraciones=$resultado_mostrar['id_producto'];

                        //VALORACIÓN MEDIA DEL PRODUCTO - CON AVG SACO EL PROMEDIO DE TODAS LAS ESTRELLAS DE LAS VALORACIONES DEL MISMO PRODUCTO:
                        $usuario_valora=$_SESSION['nombre_usuario'];
                        $sql_val="SELECT AVG(estrellas) AS valoracion_media FROM valora 
                                  WHERE id_producto_valora='$id_exp_valoraciones'";    
                        $res15=mysqli_query($conectar,$sql_val);
                    while($res150=mysqli_fetch_array($res15,MYSQLI_BOTH))
                      {
                           echo '<h5>Valoración media de la experiencia:</h5>';
                                        //PINTAMOS LAS ESTRELLAS DE COLORES DE LA MEDIA CON UN BUCLE FOR

                                for($i=1;$i<6;$i++)
                                  {
                                    if($i<=$res150['valoracion_media']){echo'<img src="img/star.png" width=30>';}
                                    else{echo'<img src="img/starb.png" width=30>';}

                                  }
                          
                      }

               echo '

                </td>
                <td><font color="white">
                  <p>Dirección: '.$resultado_mostrar['direccion'].'</p>
             
                  <p>Precio: '.$resultado_mostrar['precio'].'€</p></font> 
                  <p>En activo: '.(($resultado_mostrar["activo"]==1)?"SI":"NO").'</p></font>

                </td>

                <td><font color="white">
                <p>Duración: '.$resultado_mostrar['duracion'].'</p></font>
                <p>Edad mínima: '.$resultado_mostrar['edad_min'].' años</p></font>

                </td>
               
              </tr>
              <tr>

                <td>';

                //  OBTENEMOS LA RUTA DE LA FOTO, SI LA TIENE
                $sql_foto="SELECT * FROM imagenes WHERE id_producto_img='$id_exp_valoraciones'";
                $res_foto=mysqli_query($conectar,$sql_foto);
                while ($res_foto2=mysqli_fetch_array($res_foto,MYSQLI_BOTH)) 
                {
                  echo'<img src="'.$res_foto2["url_imagen"].'" width="250">';
                }
                
                echo '

                </td>
                <td><!--PASAMOS LA VARIABE POR GET-->
                   <button type="submit" class="btn btn-success btn-lg btn-block">
                   <a href="ver_valoraciones.php?casa='.$resultado_mostrar['nombre_producto'].'">VER VALORACIONES</button> <br>
                </td>
                <td><!--SI HAY USUARIO LOGUEADO, MOSTRAMOS VALORAR CASA, SINO NADA-->';

                if(isset($_SESSION['nombre_usuario']))
                  {

                echo '
                   <button type="submit" class="btn btn-success btn-lg btn-block">
                   <a href="valorar.php?casa='.$resultado_mostrar['nombre_producto'].'">VALORAR ESTA experiencia</a></button> <br>';
                  }
                  echo '
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
