<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Editar Casa</title>
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
    $nombre_casa=$_POST['casa_seleccionada'];  

    echo $nombre_casa;
    $sql_usuario="SELECT * FROM producto WHERE nombre_producto='$nombre_casa'";
    $res1=mysqli_query($conectar,$sql_usuario);
    $res11=mysqli_fetch_array($res1,MYSQLI_ASSOC);

  //FORMULARIO EDITAR CASA RELLENDO CONLOS VALORES QU VIENEN DE LA BD
echo '
<legend><font color="white">Edita los datos de la Casa:</font></legend>
<div class="container-fluid">
  <!--FORMULARIO ADAPTADO PARA SUBIR ARCHIVOS-->
  <form class="form-horizontal" action="editarcasa.php" method="POST" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-4">
      

      <div class="form-group">
        <label class="control-label" for="textinput">Nombre de la Casa:</label>  
        <input id="textinput" name="nombre_producto" type="text" value="'.$res11["nombre_producto"].'" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Dirección:</label>  
        <input id="textinput" name="direccion" type="text" value="'.$res11["direccion"].'" class="form-control input-md">
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Número de habitaciones:</label>  
        <input id="textinput" name="num_habitaciones" type="text" value="'.$res11["num_habitaciones"].'" class="form-control input-md">  
      </div>

      <div class="form-group">
        <label class="control-label" for="textinput">Precio:</label>  
        <input id="textinput" name="precio" type="text" value="'.$res11["precio"].'" class="form-control input-md">  
      </div>

    <!--PARA RELLENAR LOS SELECTS CON LOS VALORES DE LA BD, HE SUDADO SANGRE-->

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
                <option value="'.(($res11["comidas"]==1)?1:0).'" selected>'.(($res11["comidas"]==1)?'SI':'NO').'</option>
                <option value="'.(($res11["comidas"]==1)?0:1).'">'.(($res11["comidas"]==1)?'NO':'SI').'</option>
                
            </select>
          </div>

          <div class="form-group">
            Tiene piscina:
            <select name="piscina">
                <option value="'.(($res11["piscina"]==1)?1:0).'" selected>'.(($res11["piscina"]==1)?'SI':'NO').'</option>
                <option value="'.(($res11["piscina"]==1)?0:1).'">'.(($res11["piscina"]==1)?'NO':'SI').'</option>
            </select>
          </div>

          <div class="form-group">
            Tiene conexión WiFi:
            <select name="wifi">
                <option value="'.(($res11["wifi"]==1)?1:0).'" selected>'.(($res11["wifi"]==1)?'SI':'NO').'</option>
                <option value="'.(($res11["wifi"]==1)?0:1).'">'.(($res11["wifi"]==1)?'NO':'SI').'</option>
            </select>
          </div>

          <div class="form-group">
            Tiene Parking:
            <select name="parking">
                <option value="'.(($res11["parking"]==1)?1:0).'" selected>'.(($res11["parking"]==1)?'SI':'NO').'</option>
                <option value="'.(($res11["parking"]==1)?0:1).'">'.(($res11["parking"]==1)?'NO':'SI').'</option>
            </select>
          </div>

          <div class="form-group">
            Admite mascotas:
            <select name="mascotas">
                 <option value="'.(($res11["mascotas"]==1)?1:0).'" selected>'.(($res11["mascotas"]==1)?'SI':'NO').'</option>
                <option value="'.(($res11["mascotas"]==1)?0:1).'">'.(($res11["mascotas"]==1)?'NO':'SI').'</option>
           </select>
          </div>

          <div class="form-group">
            <b>NEGOCIO ABIERTO?:</b>
            <select name="activo">
                <option value="'.(($res11["activo"]==1)?1:0).'" selected>'.(($res11["activo"]==1)?'SI':'NO').'</option>
                <option value="'.(($res11["activo"]==1)?0:1).'">'.(($res11["activo"]==1)?'NO':'SI').'</option>
           </select>
          </div>

                <label for="adjuntar archivo">Adjuntar foto 1:</label>
                <input type="file" name="foto1" id="foto" placeholder="Sube una foto"><br><br>
       <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">GUARDAR DATOS</button>
        </div>
       

      </div>

  </form>
</div>

'; //fin del echo

if(isset($_POST['submit']))
{




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
    //$nombre_producto=$_POST['nombre_producto'];
    $direccion=$_POST['direccion'];
    $num_habitaciones=$_POST['num_habitaciones'];
    $precio=$_POST['precio'];
    $comidas=$_POST['comidas'];
    $piscina=$_POST['piscina'];
    $wifi=$_POST['wifi'];
    $parking=$_POST['parking'];
    $mascotas=$_POST['mascotas'];
    $activo=$_POST['activo'];
    $id_producto=$res11['id_producto'];


    //GUARDO LOS DATOS EN LA BD

    $sql="UPDATE producto SET
    nombre_producto='$nombre_casa',
    direccion='$direccion',
    num_habitaciones='$num_habitaciones',
    precio='$precio',
    comidas='$comidas',
    piscina='$piscina',
    wifi='$wifi',
    parking='$parking',
    mascotas='$mascotas',
    activo='$activo'
    WHERE id_producto='$id_producto'";


    /*(id_producto,id_tipo_prod,id_tipo_cat,nombre_producto,direccion,num_habitaciones,precio,comidas,piscina,wifi,parking,mascotas,duracion,edad_min) 
    SET (NULL,1,1,'$nombre_producto','$direccion','$num_habitaciones','$precio','$comidas','$piscina','$wifi','$parking','$mascotas',0,0)*/

    //LANZO LA SQL
    $resultado=mysqli_query($conectar,$sql);

    //SI SQL OK, MOSTRAMOS EXITO EDITAR CASA
    if($resultado==1)
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

    <!--MODAL ERROR ALTA CASA-->
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
              <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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