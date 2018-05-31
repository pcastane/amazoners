<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nueva Experiencia</title>
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

?>
<!--FORMULARIO ALTA CASA -->

<legend><font color="white">Datos de la Nueva Experiencia:</font></legend>
<div class="container-fluid">
  <!--FORMULARIO ADAPTADO PARA SUBIR ARCHIVOS-->
  <form class="form-horizontal" action="nuevaexperiencia.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-4">
      

      <div class="form-group">
        <label class="control-label" for="textinput">Nombre de la Experiencia:</label>  
        <input id="textinput" name="nombre_producto" type="text"class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Dirección:</label>  
        <input id="textinput" name="direccion" type="text" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Precio:</label>  
        <input id="textinput" name="precio" type="text" class="form-control input-md">  
      </div>

          <div class="form-group">
            Tiene Parking:
            <select name="parking">
                <option value="si">SI</option>
                <option value="no">NO</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">

          <div class="form-group">
            <label class="control-label" for="textinput">Duración:</label>  
            <input id="textinput" name="duracion" type="text" class="form-control input-md">
          </div>

          <div class="form-group">
            <label class="control-label" for="textinput">Edad mínima:</label>  
            <input id="textinput" name="edad_min" type="text" class="form-control input-md">
          </div>

          <label for="adjuntar archivo">Adjuntar foto 1:</label>
          <input type='file' name='foto2' id='foto' placeholder="Sube una foto">
      
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">GUARDAR DATOS</button>
        <!--<button class="btn btn-success btn-lg btn-block" type="submit" value="GUARDAR DATOS" name="submit">-->
      </div>

  </form>
</div>

<?php 

if(isset($_POST['submit']))
{

    //arrancamos sessions
    session_start();
    
    //conecto con la BD
    $conectar=@mysqli_connect('localhost','root','') 
      or die("<font color='red'>Fallo de conexión con el servidor:</font><br>".mysqli_connect_error());
    
    //seleccionamos la BBDD 
    $bbdd=mysqli_select_db($conectar,'amazoners')
      or die("La BBDD no pudo ser seleccionada.");

    //establezco el charset para que guarde acentos y ñ
    mysqli_set_charset($conectar, 'utf8');


    //GUARDO LA FOTO EN CARPETA IMG
/*
  if(isset($_POST['foto1']))
    {    //Tamaño y Formatos permitidos

        if ((($_FILES["foto1"]["type"] == "image/gif")
        || ($_FILES["foto1"]["type"] == "image/jpeg")
        || ($_FILES["foto1"]["type"] == "image/jpg")
        || ($_FILES["foto1"]["type"] == "image/JPG")
        || ($_FILES["foto1"]["type"] == "image/png"))
        && ($_FILES["foto1"]["size"] < 1000000)) 
        { 
            echo "Return Code: " . $_FILES["foto1"]["error"] . " ";
            echo "Archivo invalido, Solamente archivos GIF, JPG y PNG son permitidos";
        }
            else
            {

               //Verifica si el archivo existe

              if (file_exists("img/" . $_FILES["foto1"]["name"]))
                {
                echo $_FILES["foto1"]["name"] . " already exists. ";
                }
                  else
                    {   

                      move_uploaded_file($_FILES["foto1"]["tmp_name"], "img/" . $_FILES["foto1"]["name"]);

                      echo "Almacenado en: " . "img/" . $_FILES["foto1"]["name"];

                      $nombreArchivo = $_FILES["foto1"]["name"];

                    }
            }                
    }
  */

    //asignamos variables que vienen del formulario
    $nombre_producto=$_POST['nombre_producto'];
    $direccion=$_POST['direccion'];
    $precio=$_POST['precio'];
    $parking=$_POST['parking'];
    $duracion=$_POST['duracion'];
    $edad_min=$_POST['edad_min'];
    echo $nombre_producto;

    //GUARDO LOS DATOS EN LA BD
    /*$sql="INSERT INTO producto VALUES (NULL,2,1,'casa 1','pez3','6','76','si','si','si','no','no',NULL,NULL)";*/

    $sql="INSERT INTO producto (id_producto,id_tipo_prod,id_tipo_cat,nombre_producto,direccion,num_habitaciones,precio,comidas,piscina,wifi,parking,mascotas,duracion,edad_min) 
    VALUES (NULL,2,1,'$nombre_producto','$direccion',NULL,'$precio',NULL,NULL,NULL,'$parking',NULL,'$duracion','$edad_min')";

    //LANZO LA SQL
    $resultado=mysqli_query($conectar,$sql);

    //SI SQL OK, MOSTRAMOS EXITO
    if($resultado)
      { ?>

    <!--MODAL EXITO ALTA CASA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h3>Alta de la experiencia correcta!</h3>
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


    <? php $desc=mysqli_close($conectar);

    } else{ ?>

    <!--MODAL ERROR ALTA CASA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h4>Error al dar de alta la experiencia</h4>
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
