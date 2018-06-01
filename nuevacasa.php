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
        <label class="control-label" for="textinput">Número de habitaciones:</label>  
        <input id="textinput" name="num_habitaciones" type="text" class="form-control input-md">  
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Precio:</label>  
        <input id="textinput" name="precio" type="text" class="form-control input-md">  
      </div>

      <div class="form-group">
        Categoría:
        <select name="categoria">
            <option value="1">Precio Alto</option>
            <option value="2">Precio Medio</option>
            <option value="3">Low Cost</option>

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

                <label for="adjuntar archivo">Adjuntar foto 1:</label>
                <input type='file' name='foto1' id='foto' placeholder="Sube una foto"><br><br>
       <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">GUARDAR DATOS</button>
        </div>
       

      </div>

  </form>
</div>

<?php 

if(isset($_POST['submit']))
{

    require_once('conectarbd.php');


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
    $num_habitaciones=$_POST['num_habitaciones'];
    $precio=$_POST['precio'];
    $comidas=$_POST['comidas'];
    $piscina=$_POST['piscina'];
    $wifi=$_POST['wifi'];
    $parking=$_POST['parking'];
    $mascotas=$_POST['mascotas'];

    //GUARDO LOS DATOS EN LA BD

    $sql="INSERT INTO producto (id_producto,id_tipo_prod,id_tipo_cat,nombre_producto,direccion,num_habitaciones,precio,comidas,piscina,wifi,parking,mascotas,duracion,edad_min) 
    VALUES (NULL,1,1,'$nombre_producto','$direccion','$num_habitaciones','$precio','$comidas','$piscina','$wifi','$parking','$mascotas',0,0)";

    //LANZO LA SQL
    $resultado=mysqli_query($conectar,$sql);

    //SI SQL OK, MOSTRAMOS EXITO ALTA CASA
    if($resultado==1)
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
