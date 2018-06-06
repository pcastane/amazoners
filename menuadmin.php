<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Menú Administrador</title>
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
<!--BUSCO CASA O EXPERIENCIA A DAR DE BAJA-->
<div class="row">
  <div class="col-md-6">
      <form action="menuadmin.php" method="POST">
            <div class="form-group">
              <label class="control-label" for="textinput"><h4><font color="white">NOMBRE PRODUCTO A BORRAR:</font></h4>(o parte del nombre)Click en buscar sin escribir nada para verlos todos<br>Para editar productos ves a Mis Productos->Modificar</label>  
                <input id="textinput" name="nombre_prod" type="text" class="form-control input-md"><br>
                <div class="col-md-4">
                 
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">BUSCAR</button>
                
                </div>              
            </div>
      </form>
  </div>


<!--BUSCO OPINION A DAR DE BAJA-->

  <div class="col-md-6">
      <form action="menuadmin.php" method="POST">
            <div class="form-group">
              <label class="control-label" for="textinput"><h4><font color="white">ELIMINAR OPINIONES. NOMBRE DEL PRODUCTO:</font></h4>(o parte del nombre)Click en buscar sin escribir nada para verlas todas</label>  
                <input id="textinput" name="nombre_prod_opinion" type="text" class="form-control input-md"><br>
                <div class="col-md-4">
                 
                    <button type="submit" name="submit3" class="btn btn-success btn-lg btn-block">BUSCAR</button>
                
                </div>              
            </div>
      </form>
  </div>
</div>

<?php  

if(isset($_POST['submit']))
{   //BUSCO COINCIDENCIAS EN LA BD, SIEMPRE QUE NO ESTEN DESACTIVADOS YA (BORRADO!=1)
    $nombre_prod=$_POST['nombre_prod'];
    $sql_exp="SELECT * FROM producto WHERE ((nombre_producto LIKE '%{$nombre_prod}%') AND borrado=0 )";

    
    $resultado_buscar=mysqli_query($conectar,$sql_exp);
    
    echo '<h4><font color="white">Selecciona el producto a BORRAR:</font></h4><br>';
    while ($resultado_buscar2=mysqli_fetch_array($resultado_buscar,MYSQLI_BOTH)) {

      echo '
      <form action="borrarproducto.php" method="POST">
      
        <table> <form>
          <tr>
            <td>
              <input type="text" name="producto_a_borrar" value="'.$resultado_buscar2['nombre_producto'].'" style="visibility:hidden"> 
              <h4><font color="white">'.$resultado_buscar2['nombre_producto'].'</font></h4>
            </td>
            <td>
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">BORRAR</button></td> <br>
          </tr>
        </form>
        </table>
 
      ';
    } 
    

    $desc=mysqli_close($conectar); 
}
?>    

<!--BUSCO USUARIO A DAR DE BAJA O A MODIFICAR-->
<div class="row">
  <div class="col-md-6">
      <form action="menuadmin.php" method="POST">
            <div class="form-group">
              <label class="control-label" for="textinput"><h4><font color="white">Nombre del usuario a MODIFICAR:</font></h4>(o parte del nombre)Click en buscar sin escribir nada para verlos todos</label>  
                <input id="textinput" name="nombre_usuario" type="text" class="form-control input-md"><br>
                <div class="col-md-4">
                 
                    <button type="submit2" name="submit2" class="btn btn-success btn-lg btn-block">BUSCAR</button>
                
                </div>              
            </div>
      </form>
  </div>
</div>

<?php  

if(isset($_POST['submit2']))
{   //BUSCO COINCIDENCIAS EN LA BD, SIEMPRE QUE NO ESTEN BORRADAS YA (BORRADO!=1) y NO SEA EL ADMINISTRADOR!!
    $nombre_usuario=$_POST['nombre_usuario'];
    $sql_user="SELECT * FROM usuario WHERE ((nombre LIKE '%{$nombre_usuario}%') AND activo=1 AND admin=0)";

    
    $resultado_buscar_usuario=mysqli_query($conectar,$sql_user);
    
    echo '<h4><font color="white">Selecciona el usuario a BORRAR:</font></h4><br>';

    while ($resultado_buscar5=mysqli_fetch_array($resultado_buscar_usuario,MYSQLI_BOTH)) {

      echo '
      <form action="borrarusuario.php" method="POST">
      
        <table border=1> <form>
          <tr>
            <td>
              <input type="text" name="usuario_a_borrar" value="'.$resultado_buscar5['nombre'].'" style="visibility:hidden"> 
              <h4><font color="white">'.$resultado_buscar5['nombre'].'</font></h4>
            </td>
            <td>
            <button type="submit" class="btn btn-success btn-lg btn-block">
            <a href="editarperfiladmin.php?user='.$resultado_buscar5['nombre'].'">EDITAR PERFIL</a></button> <br>
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">BORRAR</button></td> <br>
          </tr>
        </form>
        </table>
 
      ';
    } 
    

    $desc=mysqli_close($conectar); 
}

//PHP DE BUSCAR UNA CASA PARA VER VALORACIONES PARA BORRAR
if(isset($_POST['submit3']))
{   //BUSCO COINCIDENCIAS EN LA BD, SIEMPRE QUE NO ESTEN DESACTIVADOS YA (BORRADO!=1)
    $nombre_prod_opinion=$_POST['nombre_prod'];
    $sql_opi="SELECT * FROM producto WHERE ((nombre_producto LIKE '%{$nombre_prod}%') AND borrado=0 )";

    
    $resultado_buscar_prod=mysqli_query($conectar,$sql_opi);
    
    echo '<h4><font color="white">Selecciona el producto para ver valoraciones:</font></h4><br>';
    while ($resultado_buscar3=mysqli_fetch_array($resultado_buscar_prod,MYSQLI_BOTH)) {

      echo '
      <form action="borrarvaloraciones.php" method="POST">
      
        <table> <form>
          <tr>
            <td>
              <input type="text" name="producto_opi" value="'.$resultado_buscar3['nombre_producto'].'" style="visibility:hidden"> 
              <h4><font color="white">'.$resultado_buscar3['nombre_producto'].'</font></h4>
            </td>
            <td>
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">VER OPINIONES</button></td> <br>
          </tr>
        </form>
        </table>
 
      ';
    } 
    

    $desc=mysqli_close($conectar); 
}

?>    



  </body>
</html>
