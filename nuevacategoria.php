<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nueva Categoría</title>
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
<!--BUSCAR CASA O EXPERIENCIA A DAR DE BAJA-->
<div class="row">
  <div class="col-md-6">
      <form action="nuevacategoria.php" method="POST">
            <div class="form-group">
              <label class="control-label" for="textinput"><h4><font color="white">NOMBRE DE LA NUEVA CATEGORÍA:</font></h4></label>
                <input id="nombre_categoria" name="nombre_categoria" type="text" class="form-control input-md"><br>

                      <div class="form-group">
                        SERÁ UNA NUEVA CATEGORÍA DE:
                        <select name="producto">
                            <option value="1">CASAS RURALES</option>
                            <option value="2">EXPERIENCIAS</option>

                        </select>
                      </div>

                  <div class="col-md-4">
                 
                    <button type="submit6" name="submit6" class="btn btn-success btn-lg btn-block">GUARDAR</button>
                
                  </div>              
            </div>
      </form>
  </div>

</div>

<?php
if(isset($_POST['submit6']))
{   
    $nombre_categoria=$_POST['nombre_categoria'];
    $tipo_producto=$_POST['producto'];

    //COMPRUEBO QUE LA CATEGORIA NO EXISTA YA PARA ESE TIPO DE PRODUCTO

     $sql_verif_cat="SELECT * FROM categoria WHERE ((nombre_categoria = '$nombre_categoria') AND (id_tipo_prod='$tipo_producto'))";
      $q_cat = mysqli_query($conectar,$sql_verif_cat);
         //verificamos si el nombre exsite ya con un condicional si ha encontrado algua fila
         if( mysqli_num_rows($q_cat) != 0)  // si ha encontrado algún registro que coincida, significa nombre ya UTILIZADO
         {  
          ?>
          <!--MODAL ERROR CATEGORIA YA EXISTE-->
          <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                
                    <h4>Esta categoría ya existe!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                 </div>
                 <div class="modal-body">
                    <h5>Por favor, no dupliques categorías.</h5>
                    
             </div>
                 <div class="modal-footer">
                <a href="nuevacategoria.php"  class="btn btn-danger">Cerrar</a>
                 </div>
            </div>
            </div>
          </div>

          <?php
        } 
   else
   {
    //NO EXISTE LA CATEGORIA, PROCEDO CON EL ALTA DE LA NUEVA CATEGORIA
    //GUARDO LOS DATOS EN LA BD TABLA CATEGORIA

    $sql_categoria="INSERT INTO categoria (id_categoria,id_tipo_prod,nombre_categoria) 
    VALUES (NULL,'$tipo_producto','$nombre_categoria')";

    //LANZO LA SQL
    $resultado_guardar_categoria=mysqli_query($conectar,$sql_categoria);

    //SI SQL OK, MOSTRAMOS EXITO ALTA CATEGORIA
    if($resultado_guardar_categoria==1)
      { ?>

          <!--MODAL EXITO ALTA CATEGORIA-->
              <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                    
                        <h3>Alta de la categoría correcta!</h3>
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

      <!--MODAL ERROR ALTA CATEGORIA-->
          <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                
                    <h4>Error al dar de alta la categoría!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                 </div>
                 <div class="modal-body">
                    <h5>Revisa los campos e inténtalo de nuevo</h5>
                    
             </div>
                 <div class="modal-footer">
                <a href="nuevacategoria.php" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                 </div>
            </div>
            </div>
          </div>

      <?php $desc=mysqli_close($conectar);
       } 
 }  }

?>

</body>

<!--SCRIPT DEL MODAL-->
  

<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

</html>
