<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Borrar Valoraciones</title>
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

//OBTENEMOS LOS DATOS DE LAS CASAS RURALES

    $nombre_prod_valoraciones=$_POST['producto_opi'];   

    echo '<h2><font color="white">Valoraciones : '.$nombre_prod_valoraciones.'</font></h2>';

    //OBTENGO EL id_producto
    $sql_producto1="SELECT * FROM producto WHERE nombre_producto='$nombre_prod_valoraciones'";    
    $res5=mysqli_query($conectar,$sql_producto1);
    $res52=mysqli_fetch_array($res5,MYSQLI_BOTH);
    $id_casa_valoraciones=$res52['id_producto'];
    mysqli_free_result($res5);



$sql_mostrar_casas="SELECT * FROM valora WHERE id_producto_valora = '$id_casa_valoraciones'";
$resultado_valoraciones_casa=mysqli_query($conectar,$sql_mostrar_casas);
    
    echo '<h4><font color="white"></font></h4><br>';
    while ($resultado_valoraciones=mysqli_fetch_array($resultado_valoraciones_casa,MYSQLI_BOTH)) 
    {

      echo '
      <div class="container"><font color="white">
        <div class="row bg-dark">
          <div class="col-md-9">
              <div> Usuario: ';

              //OBTENGO AQÍ EL NOMBRE DEL USUARIO QUE VALORA
                  $id_usuario_valora=$resultado_valoraciones['id_usuario_valora'];
                  $sql_obtener_nombre="SELECT * FROM usuario WHERE id='$id_usuario_valora'";
                  $res7=mysqli_query($conectar,$sql_obtener_nombre);
                  $res71=mysqli_fetch_array($res7,MYSQLI_ASSOC);
                  echo $res71['nombre'];

              echo '

              </div><br>
              <div> Número de estrellas: '.$resultado_valoraciones['estrellas'].'';
              //PINTAMOS LAS ESTRELLAS DE COLORES DEL RATING CON UN BUCLE FOR

              for($i=1;$i<6;$i++)
                {
                  if($i<=$resultado_valoraciones['estrellas']){echo'<img src="img/star.png" width=30>';}
                  else{echo'<img src="img/starb.png" width=30>';}

                }

              echo '</div><br>

              <div> Valoración: '.$resultado_valoraciones['valoracion'].'</div></font>
          </div>
          
            <form action="" method="POST">
                  <input type="text" name="id_usuario_valora" value="'.$id_usuario_valora.'" style="visibility:hidden"> 
                  <input type="text" name="id_producto_valora" value="'.$resultado_valoraciones['id_producto_valora'].'" style="visibility:hidden">   
                  <input type="submit" name="submit2" value="BORRAR ESTA OPINION" class="btn btn-danger btn-lg "><br>
            </form>
        </div>
      </div><br><br>
      ';
    } 
    

 

if(isset($_POST['submit2']))
{  

$usuario_borr=$_POST['id_usuario_valora'];
$prod_borr=$_POST['id_producto_valora'];

//echo $usuario_borr;
//echo $prod_borr;

$sql_borrar_valoracion= "DELETE FROM valora WHERE ((id_usuario_valora='$usuario_borr') AND (id_producto_valora='$prod_borr'))";

$res_borr_val=mysqli_query($conectar,$sql_borrar_valoracion);

  if ($res_borr_val) 
  {
    ?>
  <!--MODAL EXITO BORRADO OPINIONES-->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          
              <h3>Opinion Borrada!</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           </div>
           <div class="modal-body">
              <h4></h4>
              
       </div>
           <div class="modal-footer">
          <a href="index.php" class="btn btn-success">Cerrar</a>

             </div>
        </div>
     </div>
  </div>


<?php 

  } else{ ?>

<!--MODAL ERROR GUARDAR DATOS-->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          
              <h4>Error al borrar la vloración.</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
           </div>
           <div class="modal-body">
              <h5>Contacta con el administrador!</h5>
              
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
      </div>
    </div>

  <?php 
  }

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


<!--SCRIPT DEL MODAL-->
  

<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
</html>
