<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>login</title>
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

<!--FORMULARIO DE LOGIN-->    
    <section>

            <div class="signup-form">
                    <form action="" method="POST">   
                        <h2>Login</h2>
                        <p class="hint-text">Entra con tu cuenta</p>
                        <div class="form-group">
                                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success btn-block">Accede</button>
                            </div>        
                        </form>
                        <p class="text-center"><a href="registro.php">Crear cuenta Usuario</a></p>
                    </div>
        
    </section>
    
<?php
//asignamos variables que vienen del formulario
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
if(isset($_POST['submit']))
 {   
    require_once('conectarbd.php');
    
    //MIRO QUE ENCUENTRE UNA COINCIDENCIA DE USUARIO Y PASSWORD Y QUE ESTÉ ACTIVO
    $sql="SELECT * FROM usuario WHERE usuario='$usuario' AND password='$password' AND activo=1";
        $resultado=mysqli_query($conectar,$sql);

        //verifico si es un administrador primero
        $res=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
        if($res['admin']==1)
        {?>
          <!--MODAL LOGIN ADMINISTRADOR-->
            <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                  
                      <h3>Bienvenido Administrador!</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   </div>
                   <div class="modal-body">
                      <h4>Ya puedes empezar a trabajar ;)</h4>
                      
               </div>
                   <div class="modal-footer">
                    <!--Aquí quiero que al darle al cerrar me redireccione-->
                  <a href="index.php" class="btn btn-success">Cerrar</a>
                    </div>
        <?php
        }

        $rows=mysqli_num_rows($resultado);
        //si el resultado de la query devuelve una fila, entonces es que ha encontrado login y password en un regsitro
        //verifico que el usuario esté activo=1

        if($rows==1 && $res['activo']==1)
        { $_SESSION['nombre_usuario']=$usuario;
          ?>
          
          <!--MODAL EXITO LOGIN-->
            <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                  
                      <h3>Bienvenido de nuevo <?php echo $usuario;?></h3>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   </div>
                   <div class="modal-body">
                      <h4>Ya puedes empezar a opinar!</h4>
                      
               </div>
                   <div class="modal-footer">
                    <!--Aquí quiero que al darle al cerrar me redireccione-->
                  <a href="index.php" class="btn btn-success">Cerrar</a>
                   </div>
                 
                 </div>
              </div>
      <?php  }

      else{?>
          <!--MODAL FALLO LOGIN-->
            <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                  
                      <h3>Usuario o password incorrectos</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   </div>
                   <div class="modal-body">
                      <h4>Inténtalo de nuevo o date de alta!</h4>
                      
               </div>
                   <div class="modal-footer">
                  <a href="index.php" data-dismiss="modal" class="btn btn-danger">Cerrar</a>

                         </div>
                    </div>
                 </div>
              </div>
      <?php
    }
  }
  $desc=mysqli_close($conectar);
?>

    <!-- el footer -->
    <div class="navbar navbar-fixed-bottom navbar-dark bg-dark"
    style="position:fixed;left:0px;bottom:0px;height:80px;width:100%;">
      <div class="container">
        <p class="navbar-text pull-left">© 2018 - P9 Amazoners
        </p>
        
        
      </div>

  </body>

<!--SCRIPT DEL MODAL-->
  

<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

</html>
