<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Valoraciones</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="extra.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <body>


<?php
    require_once('header.php');
    require_once('conectarbd.php');
    //OBTENGO EL NOMBRE POR GET, SI VIENE DEL LISTADO O VIENE DEL BUSCADOR EN VALORAR
    $nombre_seleccionado=$_GET['casa'];      

?>

        <section class="bg-dark">
          <form method="POST" id="comment_form" action="">
          <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-5">
                   <div class="thumbnail img-thumb1-bg">
                       <div class="overlay"></div>
                       <div class="caption">
                           <div class="tag"><a href="#">Nombre:</a></div>
                           <div class="title"><a href="#"><?php echo $nombre_seleccionado ?></a></div>
                           <div class="clearfix">
                               <!--<span class="meta-data">Por <a href="">Usuario1</a> 23/04/18</span>-->
                               <span class="meta-data pull-right"><a href=""><i class="fa fa-heart-o"></i> </a></span>
                           </div>
                           <div class="content">
                               <p>Descripción producto</p>
                           </div>
                       </div>
                   </div>
                   <br>
                </div>
                <!--<div class="descripcio"><p>Casa rural situada en Galapagar, cerca de la mansión de Pablo Iglesias. Dispone de 200m2 construidos y parcela de 700m2 con todos los servicios.</p></div>-->
        </div>

       
        <div class="product-review-stars">
            <input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="star5" >★</label>
            <input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="star4" >★</label>
            <input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="star3" >★</label>
            <input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label for="star2" >★</label>
            <input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label for="star1" >★</label>
        </div> 
          
          
          <div class="container">
              
               <div class="form-group">
                <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Aquí tu opinión" rows="5"></textarea>
               </div>
               <div class="form-group">
                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                <input type="text" name="producto_seleccionado" value="<?php echo $nombre_seleccionado ?>" style="visibility:hidden"> 
                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Valorar" />
               </div>
              
              <span id="comment_message"></span>
              <br />
              <div id="display_comment"></div>
          </div>
         </div>  
         </form>
</section>

<?php 

if(isset($_POST['submit']))
{

    // GUARDO DATOS EN LA TABLA **VALORA**

    //PRIMERO OBTENGO EL id_usuario
    $usuario_valora=$_SESSION['nombre_usuario'];
    $sql_usuario1="SELECT * FROM usuario WHERE usuario='$usuario_valora'";
    $res3=mysqli_query($conectar,$sql_usuario1);
    $res31=mysqli_fetch_array($res3,MYSQLI_ASSOC);
    $id_usuario1=$res31['id'];
    $num_valoraciones_usuario=$res31['num_valoraciones']; 
    //aprovecho para mirar que tipo de usuario es, PARA AUMENTAR EL RANKING DEL PRODUCT LUEGO
    if($res31['novato']==1){$nivel_usuario=1;}elseif ($res31['experto']==1) {$nivel_usuario=2;}else{$nivel_usuario=3;}   
    mysqli_free_result($res3);

    $nombre_seleccionado=$_POST['producto_seleccionado'];

    //LUEGO OBTENGO EL id_producto
    $sql_producto1="SELECT * FROM producto WHERE nombre_producto='$nombre_seleccionado'";    
    $res4=mysqli_query($conectar,$sql_producto1);
    $res42=mysqli_fetch_array($res4,MYSQLI_BOTH);
    $id_producto1=$res42['id_producto'];
    $ranking_producto=$res42['ranking'];
    mysqli_free_result($res4);

    //asigno las variables que vienen del formulario
    $estrellas=$_POST['rating'];
    $valora=$_POST['comment_content'];

    //Y LOS DATOS OBTENIDOS, LOS GUARDO JUNTAMENTE CON LAS ESTRELLAS Y LAS OPINIONES EN LA TABLA ***VALORA***
    $sql_valorar="INSERT INTO valora VALUES ('$id_usuario1','$id_producto1','$estrellas','$valora')";
    //$sql_gestiona="INSERT INTO gestiona VALUES (24,9)";
    $resultado_valorar=mysqli_query($conectar,$sql_valorar);

  if($resultado_valorar==1)
  { 

    //AUMENTO EN 1 EL NÚMERO DE VALORACIONES QUE HA HECHO EL USUARIO
    $num_valoraciones_usuario++;
    $sql_usuario2="UPDATE usuario SET num_valoraciones='$num_valoraciones_usuario' WHERE usuario='$usuario_valora'";
    $res3=mysqli_query($conectar,$sql_usuario2);

    //APROVECHO PARA ACTUALIZAR EL TIPO DEL USUARIO SI PROCEDE
    if($num_valoraciones_usuario==26) //26 VALORACIONES PORQUE JUSTO PASARÁ DE NIVEL NOVATO A EXPERTO
        {
          $sql_usuario2="UPDATE usuario SET novato=0, experto=1 WHERE usuario='$usuario_valora'";
          $res3=mysqli_query($conectar,$sql_usuario2);
        }elseif ($num_valoraciones_usuario==51) //51 VALORACIONES PORQUE JUSTO PASARÁ DE NIVEL EXPERTO A PRO
            {
                $sql_usuario2="UPDATE usuario SET experto=0, profesional=1 WHERE usuario='$usuario_valora'";
                $res3=mysqli_query($conectar,$sql_usuario2);
            }

    //AUMENTO EL RANKING DE LA CASA, SEGÚN EL GRADO DEL USUARIO Y LAS ESTRELLAS DE LA VALORACIÓN
    //MULTIPLICO (CONVIRTIENDOLAS ANTES EN ENTEROS) EL NIVEL DEL USUARIO 1 NOVATO, 2 EXPERTO Y 3 PRO POR EL Nº DE ESTRELLAS:
    echo 'nivel usuario:'.$nivel_usuario;
    $ranking_final=intval($nivel_usuario)*intval($estrellas);
    echo 'ranking final:'.$ranking_final;
    $sql_aumentar_ranking_producto="UPDATE producto SET ranking='$ranking_final' WHERE nombre_producto='$nombre_seleccionado'";
    $res_ranking=mysqli_query($conectar,$sql_aumentar_ranking_producto);

    ?>

    <!--MODAL EXITO VALORAR-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h3>Valoración Guardada!</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <h4>Gracias <?php echo $usuario_valora; ?> por dar tu opinión.</h4>
                  
           </div>
               <div class="modal-footer">
              <a href="index.php" class="btn btn-success">Cerrar</a>

               </div>
          </div>
       </div>
    </div>


    <?php 


    //desconecto de la BD
    $desc=mysqli_close($conectar);

    } else{ ?>

    <!--MODAL ERROR VALORAR-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h4>Error al guardar datos!</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
               </div>
               <div class="modal-body">
                  <h5></h5>
                  
           </div>
               <div class="modal-footer">
              <a href="buscarvalorar.php" class="btn btn-danger">Cerrar</a>
               </div>
          </div>
          </div>
        </div>

    <?php 

    $desc=mysqli_close($conectar);
  } 
}

?>



    <!-- el footer 
    <div class="navbar navbar-fixed-bottom navbar-dark bg-dark"
    style="position:fixed;left:0px;bottom:0px;height:80px;width:100%;">
      <div class="container">
        <p class="navbar-text pull-left">© 2018 - P9 Amazoners
        </p>-->
        
        

  </body>

<!--SCRIPT DEL MODAL-->
  

<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

</html>
