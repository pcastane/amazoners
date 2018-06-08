<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Borrar categoría</title>
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

if(isset($_POST['submit8']))
{

    //OBTENGO LA ID DE LA CATEGORIA
    $id_a_borrar=$_POST['id_categoria_a_borrar'];
    $id_prod_borrado=$_POST['id_prod_a_borrar'];
    $categoria_borrado=$_POST['categoria_a_borrar'];  
    echo $id_a_borrar.'is a borrar';

    $sql_borrado="DELETE FROM categoria WHERE ((id_categoria='$id_a_borrar') AND (id_categoria!=1) AND (id_categoria!=2))";

    //LANZO LA SQL
    $resultado_borrar=mysqli_query($conectar,$sql_borrado);


    //ACTUALIZO LOS PRODUCTOS QUE PERTENECÍAN A ESA CATEGORÍA Y LOS DEJO "SIN CATEGORIA"

    $sql_actualiza_prod="UPDATE producto SET id_tipo_cat=1 WHERE (id_tipo_cat='$id_a_borrar')";
    $resultado_actualliza_prod=mysqli_query($conectar,$sql_actualiza_prod);

    if($sql_borrado)
      { ?>

    <!--MODAL EXITO BAJA CATEGORIA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h3>Borrado de la categoría OK!</h3>
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

    //desconecto de la BD
    $desc=mysqli_close($conectar);


    } else{ ?>

    <!--MODAL ERROR BAJA CATEGORÍA-->
        <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
              
                  <h4>Error al borrar categoria/h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
               </div>
               <div class="modal-body">
                  <h5>Revisa los campos e inténtalo de nuevo, NO SE PUEDE BORRAR LA CATEGORÍA "SIN CATEGORÍA"</h5>
                  
           </div>
               <div class="modal-footer">
              <a href="index.php" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
               </div>
          </div>
          </div>
        </div>

    <?php $desc=mysqli_close($conectar);
       } 


}
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
