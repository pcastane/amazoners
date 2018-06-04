<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Editar Perfil</title>
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

//OBTENGO LOS DATOS DEL USUARIO DE LA BD    

    require_once('conectarbd.php');

    //obtengo el nombre del usuario de session
    $usuario=$_SESSION['nombre_usuario'];

    //SELECCIONO LOS DATOS DEL USUARIO:
    $sql="SELECT * FROM usuario WHERE usuario='$usuario'";

    //LANZO LA SQL
    $resultado=mysqli_query($conectar,$sql);
    $valores=mysqli_fetch_array($resultado,MYSQLI_BOTH);
    $id_usuario=$valores["id"];

    //RELLENO EL FORMULARIO CON LOS DATOS QUE ME VIENEN DE LA BD
    echo '


<!--FORMULARIO DE REGISTRO DE USUAIO-->
    
    <section>

            <div class="signup-form">
                    <form action="editarperfil.php" method="POST">
                        <h2>Editar</h2>
                        <p class="hint-text">Guarda de nuevo tus datos</p>
                        <div class="form-group">
                                Nombre:<br>
                                <div class="col-xs-6"><input type="text" class="form-control" name="first_name" value="'.$valores["nombre"].'" required="required"></div><br>
                                Apellidos:<br>
                                <div class="col-xs-6"><input type="text" class="form-control" name="last_name" value="'.$valores["apellidos"].'" required="required"></div>
                                   	
                        </div>
                        <div class="form-group">Usuario Login:<br>
                                <input type="text" class="form-control" name="user" value="'.$valores["usuario"].'" required="required">
                            </div>
                        <div class="form-group">Email:<br>
                            <input type="email" class="form-control" name="email" value="'.$valores["email"].'" required="required">
                        </div>
                        <div class="form-group">Password:<br>
                            <input type="text" class="form-control" name="password" value="'.$valores["password"].'" required="required">
                        </div>
      
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Guardar Datos</button>
                        </div>
                    </form>
                    
                </div><br><br><br>
        
    </section>
';

if(isset($_POST['submit']))
  {  //asignamos variables que vienen del formulario
    $usuario=$_POST['user'];
    $nombre=$_POST['first_name'];
    $apellidos=$_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    //GRABO LOS NUEVOS DATOS EN LA BD
    $sql="UPDATE usuario SET 
          usuario='$usuario',
          nombre='$nombre',
          apellidos='$apellidos',
          email='$email',
          password='$password'
          WHERE id='$id_usuario'";

    //LANZO LA SQL
    $resultado=mysqli_query($conectar,$sql);

    //SI SQL OK, MOSTRAMOS EXITO
    if($resultado)
      { //GUARDO EN SESSIONS EL NOMBRE DEL USUARIO
        $_SESSION['nombre_usuario']=$usuario; 
        ?>
<!--MODAL EXITO GAURDAR DATOS-->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          
              <h3>Cambios guardados!</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           </div>
           <div class="modal-body">
              <h4>Ya puedes seguir opinando!</h4>
              
       </div>
           <div class="modal-footer">
          <a href="index.php" class="btn btn-success">Cerrar</a>

             </div>
        </div>
     </div>
  </div>


<?php 

  } else{ ?>

<!--MODAL ERROR GUARDAR DATOS-->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          
              <h4>Error al guardar los datos.</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
           </div>
           <div class="modal-body">
              <h5>Contacta con el administrador!</h5>
              
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
      </div>
    </div>

<?php 
  }
}

$desc=mysqli_close($conectar);
?>

    <!-- el footer 
    <div class="navbar navbar-fixed-bottom navbar-dark bg-dark"
    style="position:fixed;left:0px;bottom:0px;height:80px;width:100%;">
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
