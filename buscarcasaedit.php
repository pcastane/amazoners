<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Buscar Casa</title>
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
<div class="row">
  <div class="col-md-6">
      <form action="buscarcasaedit.php" method="POST">
            <div class="form-group">
              <label class="control-label" for="textinput"><h4><font color="white">Nombre de la Casa a editar (o parte del nombre):</font></h4></label>  
                <input id="textinput" name="nombre_prod" type="text" class="form-control input-md"><br>
                <div class="col-md-4">
                 
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">BUSCAR CASA</button>
                
                </div>              
            </div>
      </form>
  </div>
</div>

<?php  

if(isset($_POST['submit']))
{
    $nombre_prod=$_POST['nombre_prod'];
    $sql_casa="SELECT * FROM producto WHERE ((nombre_producto LIKE '%{$nombre_prod}%') AND (id_tipo_prod = 1))";
    //CONTAINS(nombre_producto,'$nombre_producto')";
    //
    $resultado_buscar=mysqli_query($conectar,$sql_casa);
    
    echo '<h4><font color="white">Selecciona la casa a editar:</font></h4><br>';
    while ($resultado_buscar2=mysqli_fetch_array($resultado_buscar,MYSQLI_BOTH)) {

      echo '
      <form action="editarcasa.php" method="POST">
      
        <table> <form>
          <tr>
            <td>
              <input type="text" name="casa_seleccionada" value="'.$resultado_buscar2['nombre_producto'].'" style="visibility:hidden"> 
              <h4><font color="white">'.$resultado_buscar2['nombre_producto'].'</font></h4>
            </td>
            <td>
            <button type="submit" class="btn btn-success btn-lg btn-block">EDITAR ESTA CASA</button></td> <br>
          </tr>
        </form>
        </table>
 
      ';
    } 
    

    $desc=mysqli_close($conectar); 
}
?>    



     <!--el footer 
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
