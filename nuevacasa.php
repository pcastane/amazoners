<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nueva Casa</title>
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

?>
<!--FORMULARIO ALTA CASA -->

<legend><font color="white">Datos de la Nueva Casa:</font></legend>
<div class="container-fluid">
  <!--FORMULARIO ADAPTADO PARA SUBIR ARCHIVOS-->
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-4">
      

      <div class="form-group">
        <label class="control-label" for="textinput">Nombre de la Casa:</label>  
        <input id="textinput" name="nombre_producto" type="text"class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Dirección:</label>  
        <input id="textinput" name="direccion" type="text" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Teléfono:</label>  
        <input id="textinput" name="telefono" type="text" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Número de habitaciones:</label>  
        <input id="textinput" name="num_habitaciones" type="text" class="form-control input-md">  
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Precio:</label>  
        <input id="textinput" name="precio" type="text" class="form-control input-md">  
      </div>

      <div class="form-group">
        Categoría:

        <?php //OBTENGO LAS CATEGORÍAS VIGENTES PARA CASAS Y DARLAS A ELEGIR
          $sql_categorias="SELECT * FROM categoria WHERE id_tipo_prod=1";
          $res_cat=mysqli_query($conectar,$sql_categorias);
          
          print_r($res_categoria);

        echo '
        <select name="categoria">'; //IMPRIMO EL RESULTADO DE LA SQL EN UN SELECT
        while ($res_categoria=mysqli_fetch_array($res_cat,MYSQLI_ASSOC)) 
        {
          echo '<option value="'.$res_categoria['id_categoria'].'">'.$res_categoria['nombre_categoria'].'</option>';
        }
            
            
          ?>
        </select>
      </div>
    </div>

        <div class="col-md-4">
          
          <div class="form-group">
            Sirven Comidas:
            <select name="comidas">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
          </div>

          <div class="form-group">
            Tiene piscina:
            <select name="piscina">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
          </div>

          <div class="form-group">
            Tiene conexión WiFi:
            <select name="wifi">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
          </div>

          <div class="form-group">
            Tiene Parking:
            <select name="parking">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
          </div>

          <div class="form-group">
            Admite mascotas:
            <select name="mascotas">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
          </div>

                <label for="adjuntar archivo">Adjuntar foto:</label>
                <input type="file" name="imagen" id="imagen" placeholder="Sube una foto"><br><br>

       <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">GUARDAR DATOS</button>
        </div>
       

      </div>

  </form>
</div>

<?php 

if(isset($_POST['submit']))
{

    //GUARDO LA FOTO EN CARPETA /img/

    $nombre_foto = $_FILES['imagen']['name'];
    $nombrer_foto = strtolower($nombre_foto);
    $cd=$_FILES['imagen']['tmp_name'];
    $ruta = "img/" . $_FILES['imagen']['name'];
    $destino = "img/".$nombrer_foto;
    $resultado_foto = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    //OBTENGO EL VALOR DEL ID DEL PRODUCTO ÚLTIMO GRABADO Y LE SUMO 1, YA QUE ES EL QUE LE VA A ASIGNAR A ESTE PRODUCTO
    $rs = mysqli_query($conectar,"SELECT MAX(id_producto) AS id FROM producto");
    if ($row = mysqli_fetch_row($rs)) {
    $id = intval(trim($row[0]));
    $id++;
    //echo $id.' id foto '.$destino.' destino '.$resultado_foto;
    }
    //GUARDO EN LA TABLA IMAGENES EL NOMBRE Y LA RUTA DE LA FOTO
    if ($resultado_foto)
    {
            @mysqli_query($conectar,"INSERT INTO imagenes (id_imagen,url_imagen,id_producto_img) VALUES (NULL,'$destino','$id')");       
    }

    //asignamos variables que vienen del formulario
    $nombre_producto=$_POST['nombre_producto'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $num_habitaciones=$_POST['num_habitaciones'];
    $precio=$_POST['precio'];
    $categoria=$_POST['categoria'];
    $comidas=$_POST['comidas'];
    $piscina=$_POST['piscina'];
    $wifi=$_POST['wifi'];
    $parking=$_POST['parking'];
    $mascotas=$_POST['mascotas'];

    /*ASIGNO EL NOMBRE DE LA CATEGORÍA SEGÚN EL VALUE OBTENIDO DEL FORMULARIO
    if($categoria==1){$nombre_categoria='Precio Alto';}
    elseif($categoria==2){$nombre_categoria='Precio Medio';}
    else{$nombre_categoria='Low Cost';}*/
         
     // ****PRIMERO DE TODO MIRO SI YA HAY ALGUNA CASA CON ESTE NOMBRE, SI LA HAY ERROR->YA ESTA DADA DE ALTA****

      $sql_verif="SELECT * FROM producto WHERE nombre_producto = '$nombre_producto'";
      $q = mysqli_query($conectar,$sql_verif);
         //verificamos si el nombre exsite ya con un condicional si ha encontrado algua fila
         if( mysqli_num_rows($q) != 0)  // si ha encontrado algún registro que coincida, significa nombre ya UTILIZADO
         {  
          ?>
          <!--MODAL ERROR CASA YA EXISTE-->
          <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                
                    <h4>Esta casa ya existe.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                 </div>
                 <div class="modal-body">
                    <h5>Por favor, búscala para valorar.</h5>
                    
             </div>
                 <div class="modal-footer">
                <a href="buscarvalorar.php"  class="btn btn-danger">Cerrar</a>
                 </div>
            </div>
            </div>
          </div>

          <?php
        } 
   else
   {

    //CASA NO EXISTE-> PROCEDO CON EL ALTA-> 

    //GUARDO LA CASA EN TABLA **PRODUCTO**
    $sql="INSERT INTO producto (id_producto,id_tipo_prod,id_tipo_cat,nombre_producto,direccion,telefono,num_habitaciones,precio,comidas,piscina,wifi,parking,mascotas,duracion,edad_min,activo,ranking,borrado) 
    VALUES (NULL,1,'$categoria','$nombre_producto','$direccion','$telefono','$num_habitaciones','$precio','$comidas','$piscina','$wifi','$parking','$mascotas',0,0,1,0,0)";

    //LANZO LA SQL
    $resultado_guardar_casa=mysqli_query($conectar,$sql);

    //SI SQL OK, MOSTRAMOS EXITO ALTA CASA
    if($resultado_guardar_casa==1)
      { ?>

    <!--MODAL EXITO ALTA CASA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h3>Alta de la casa correcta!</h3>
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

    // GUARDO DATOS EN LA TABLA **GESTIONA**
    //PRIMERO OBTENGO EL id_usuario
    $nombre_usuario=$_SESSION['nombre_usuario'];
    $sql_usuario="SELECT * FROM usuario WHERE usuario='$nombre_usuario'";
    $res1=mysqli_query($conectar,$sql_usuario);
    $res11=mysqli_fetch_array($res1,MYSQLI_ASSOC);
    $id_usuario=$res11['id'];

    //LUEGO OBTENGO EL id_producto
    $sql_producto="SELECT * FROM producto WHERE nombre_producto='$nombre_producto'";    
    $res2=mysqli_query($conectar,$sql_producto);
    $res22=mysqli_fetch_array($res2,MYSQLI_ASSOC);
    $id_producto=$res22['id_producto'];

    //Y LOS DATOS OBTENIDOS, LOS GUARDO EN LA TABLA 'GESTIONA'
    $sql_gestiona="INSERT INTO gestiona VALUES ('$id_usuario','$id_producto')";
    //$sql_gestiona="INSERT INTO gestiona VALUES (24,9)";
    $gestiona_ok=mysqli_query($conectar,$sql_gestiona);

    //desconecto de la BD
    $desc=mysqli_close($conectar);

    } else{ ?>

    <!--MODAL ERROR ALTA CASA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h4>Error al dar de alta la casa</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
               </div>
               <div class="modal-body">
                  <h5>Revisa los campos e inténtalo de nuevo</h5>
                  
           </div>
               <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
               </div>
          </div>
          </div>
        </div>

    <?php $desc=mysqli_close($conectar);
       } 
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
