<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro Usuario</title>
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

<!--FORMULARIO DE REGISTRO DE USUAIO-->
    
    <section>

            <div class="signup-form">
                    <form action="registro.php" method="POST">
                        <h2>Registro</h2>
                        <p class="hint-text">Crea tu cuenta</p>
                        <div class="form-group">
                            
                                <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="Nombre" required="required"></div><br>
                                <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Apellidos" required="required"></div>
                                   	
                        </div>
                        <div class="form-group">
                                <input type="text" class="form-control" name="user" placeholder="Usuario" required="required">
                            </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirma Password" required="required">
                        </div>        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Regístrate</button>
                        </div>
                    </form>
                    <div class="text-center">¿Ya tienes cuenta? <a href="login.php">Log in</a></div>
                </div><br><br><br>
        
    </section>

<!--AQUI EL PHP-->

<?php 
if(isset($_POST['submit']))
  {
    //asignamos variables que vienen del formulario
    $usuario=$_POST['user'];
    $nombre=$_POST['first_name'];
    $apellidos=$_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fecha_alta=date('m/d/Y');

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

    //COMPRUEBO QUE EL USUARIO NO ESTÉ DADO DE ALTA YA:
      $sql_verif="SELECT * FROM usuario WHERE usuario = '$usuario'";
      $q = mysqli_query($conectar,$sql_verif);
         //verificamos si el user exite con un condicional
         if( mysqli_num_rows($q) != 0)  // si ha encontrado algún registro que coincida, significa usuario ya UTILIZADO
         {  
          ?>
          <!--MODAL ERROR USUARIO YA EXISTE-->
          <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                
                    <h4>Este usuario ya existe.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                 </div>
                 <div class="modal-body">
                    <h5>Por favor, introduce otro usuario.</h5>
                    
             </div>
                 <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                 </div>
            </div>
            </div>
          </div>

          <?php
        } 
   else{

    //USUARIO NO EXISTE-> PROCEDO CON EL ALTA-> DECLARO LA SQL CON LOS DATOS DEL USUARIO:
    $sql="INSERT INTO usuario (id,usuario,nombre,apellidos,email,password,fecha_alta,num_valoraciones,novato,experto,profesional,activo,admin)
    VALUES (NULL,'$usuario','$nombre','$apellidos','$email','$password',now(),0,1,0,0,1,0)";
    //LANZO LA SQL
    $resultado=mysqli_query($conectar,$sql);

    //SI SQL OK, MOSTRAMOS EXITO
    if($resultado)
      { //GUARDO EN SESSIONS EL NOMBRE DEL USUARIO
        $_SESSION['nombre_usuario']=$usuario; 
        ?>
<!--MODAL EXITO ALTA USUARIO-->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          
              <h3>Alta de usuario correcta!</h3>
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


<?php $desc=mysqli_close($conectar);

} else{ ?>

<!--MODAL ERROR ALTA USUARIO-->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          
              <h4>Error al dar de alta el usuario</h4>
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

<?php $desc=mysqli_close($conectar);
   } 
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
