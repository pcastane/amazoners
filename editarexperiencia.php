<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Editar Experiencia</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="extra.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>
    
<!--CARGO EL HEADER-->
<?php
    require_once('header.php');
    require_once('conectarbd.php');

  //OBTENEMOS LOS DATOS DE LA CASA:
    $nombre_experiencia=$_POST['experiencia_seleccionada'];  

    echo $nombre_experiencia;
    $sql_experiencia="SELECT * FROM producto WHERE nombre_producto='$nombre_experiencia'";
    $res10=mysqli_query($conectar,$sql_experiencia);
    $res110=mysqli_fetch_array($res10,MYSQLI_ASSOC);

  //FORMULARIO EDITAR CASA RELLENDO CONLOS VALORES QU VIENEN DE LA BD
echo '
<legend><font color="white">Edita los datos de la Experiencia:</font></legend>
<div class="container-fluid">
  <!--FORMULARIO ADAPTADO PARA SUBIR ARCHIVOS-->
  <form class="form-horizontal" action="editarexperiencia.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-4">
      
      <input type="text" name="id_producto" value="'.$res110['id_producto'].'" style="visibility:hidden"> 
      <input type="text" name="id_tipo_cat" value="'.$res110['id_tipo_cat'].'" style="visibility:hidden"> 

      <div class="form-group">
        <label class="control-label" for="textinput">Nombre de la Experiencia:</label>  
        <input id="textinput" name="nombre_producto" type="text" value="'.$res110["nombre_producto"].'" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Dirección:</label>  
        <input id="textinput" name="direccion" type="text" value="'.$res110["direccion"].'" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Teléfono:</label>  
        <input id="textinput" name="telefono" type="text" value="'.$res110["telefono"].'" class="form-control input-md">  
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Precio:</label>  
        <input id="textinput" name="precio" type="text" value="'.$res110["precio"].'" class="form-control input-md">  
      </div>

      <div class="form-group">
        Tiene Parking:
        <select name="parking">
            <option value="'.(($res110["parking"]==1)?1:0).'" selected>'.(($res110["parking"]==1)?'SI':'NO').'</option>
            <option value="'.(($res110["parking"]==1)?0:1).'">'.(($res110["parking"]==1)?'NO':'SI').'</option>
        </select>
      </div>

    </div>

  <div class="col-md-4">


      <div class="form-group">
        <label class="control-label" for="textinput">Duración de la experiencia:</label>  
        <input id="textinput" name="duracion" type="text" value="'.$res110["duracion"].'" class="form-control input-md">  
      </div>

    
      <div class="form-group">
        <label class="control-label" for="textinput">Edad mínima:</label>  
        <input id="textinput" name="edad_min" type="text" value="'.$res110["edad_min"].'" class="form-control input-md">  
      </div>
  
      <div class="form-group">
        <b>NEGOCIO ABIERTO?:</b>
        <select name="activo">
            <option value="'.(($res110["activo"]==1)?1:0).'" selected>'.(($res110["activo"]==1)?'SI':'NO').'</option>
            <option value="'.(($res110["activo"]==1)?0:1).'">'.(($res110["activo"]==1)?'NO':'SI').'</option>
       </select>
      </div>

     <!-- <div class="form-group">
        Categoría:
        <select name="categoria">
            <option value="1">Deportiva</option>
            <option value="2">Individual</option>
            <option value="3">Familiar</option>
            <option value="4">En grupo</option>

        </select>
      </div>-->


                <label for="adjuntar archivo">Añadir foto:</label>
                <input type="file" name="imagen" id="imagen" placeholder="Sube una foto"><br><br>

      <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">GUARDAR DATOS</button>


    </div>
   </div>

  </form>
</div>

'; //fin del echo

if(isset($_POST['submit']))
{

     $id_producto=$_POST['id_producto'];
    //GUARDO LA FOTO EN CARPETA /img/

    $nombre_foto = $_FILES['imagen']['name'];
    $nombrer_foto = strtolower($nombre_foto);
    $cd=$_FILES['imagen']['tmp_name'];
    $ruta = "img/" . $_FILES['imagen']['name'];
    $destino = "img/".$nombrer_foto;
    $resultado_foto = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    $id=intval($id_producto);

    
    //GUARDO EN LA TABLA IMAGENES EL NOMBRE Y LA RUTA DE LA FOTO
    if ($resultado_foto)
    {
            @mysqli_query($conectar,"INSERT INTO imagenes (id_imagen,url_imagen,id_producto_img) VALUES (NULL,'$destino','$id')");       
    }

    //asignamos variables que vienen del formulario
    //$nombre_producto=$_POST['nombre_producto'];

    $id_producto=$_POST['id_producto'];
    $id_tipo_cat=$_POST['id_tipo_cat'];
    $nombre_producto=$_POST['nombre_producto'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $precio=$_POST['precio'];
    $parking=$_POST['parking'];
    $duracion=$_POST['duracion'];
    $edad_min=$_POST['edad_min'];
    $activo=$_POST['activo'];
    echo $activo;



    //GUARDO LOS DATOS EN LA BD

    $sql_editar_exp="UPDATE producto SET
    id_producto='$id_producto',
    id_tipo_prod=2,
    id_tipo_cat='$id_tipo_cat',
    nombre_producto='$nombre_producto',
    direccion='$direccion',
    telefono='$telefono',
    num_habitaciones=0,
    precio='$precio',
    comidas=0,
    piscina=0,
    wifi=0,
    parking='$parking',
    mascotas=0,
    duracion='$duracion',
    edad_min='$edad_min',
    activo='$activo'
    WHERE id_producto='$id_producto'";



    /*(id_producto,id_tipo_prod,id_tipo_cat,nombre_producto,direccion,num_habitaciones,precio,comidas,piscina,wifi,parking,mascotas,duracion,edad_min) 
    SET (NULL,1,1,'$nombre_producto','$direccion','$num_habitaciones','$precio','$comidas','$piscina','$wifi','$parking','$mascotas',0,0)*/

    //LANZO LA SQL
    $resultado12=mysqli_query($conectar,$sql_editar_exp);

    //SI SQL OK, MOSTRAMOS EXITO EDITAR CASA
    if($resultado12==1)
      { ?>

    <!--MODAL EXITO EDITAR CASA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h3>Datos actualizados!</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <h4>Ya puedes empezar a opinar!</h4>
                  
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

    <!--MODAL ERROR EDITAR EXPERIENCIA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h4>Error al modificar datos!</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
               </div>
               <div class="modal-body">
                  <h5>Revisa los campos e inténtalo de nuevo</h5>
                  
           </div>
               <div class="modal-footer">
              <a href="buscarexperienciaedit.php" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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
    style="position:fixed;left:0px;bottom:0px;height:60px;width:100%;">
      <div class="container">
        <p class="navbar-text pull-left">© 2018 - P9 Amazoners
        </p>

      </div>
    </div>-->

  </body>

<!--SCRIPT DEL MODAL-->
  

<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

</html>
