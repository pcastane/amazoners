<header>
  <?php
@session_start(); 
//SI DETECTO SESSION INICIADA, O SE AUSUARIO LOGUEADO, MUESTRA NOMBRE USUARIO Y BOTON DE LOGOUT
  if(isset($_SESSION['nombre_usuario']))
  { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"> </a> <img src="./img/favicon.png" class="img-fluid" alt="Responsive image">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quees.php">Qué es Amazoners</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="casasrurales.php">Casas rurales</a>
              <a class="dropdown-item" href="experiencias.php">Experiencias al aire libre</a>
            </div>
          </li>
        </ul>
        <!--SI ES UN ADMINISTRADOR, MOSTRARÁ ADEMÁS EL BOTÓN NAV DE "MENU ADMIN"-->
        <?php echo '<font color="white">'.$_SESSION['nombre_usuario'].'</font>&nbsp&nbsp';
        if($_SESSION['nombre_usuario']=='admin'){ ?> <a href="menuadmin.php" class="btn-success btn">Menú ADMIN</a>&nbsp <?php }
        ?>
        <a href="#" class="btn-success btn">Opinar</a>&nbsp
        <a href="nuevo.php" class="btn-success btn">Nuevo producto</a>&nbsp
        <a href="editarperfil.php" class="btn-success btn">Editar perfil</a>&nbsp
        <a href="logout.php" class="btn-danger btn">Logout</a>
      </div>
    </nav>

    <!--SI NO DETECTA SESION INICIADA, O SEA NADIE LOGUEADO, MUESTRA SOLO BOTON DE LOGIN-->

    <?php } else {?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"> </a> <img src="./img/favicon.png" class="img-fluid" alt="Responsive image">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="quees.php">Qué es Amazoners</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="casasrurales.php">Casas rurales</a>
              <a class="dropdown-item" href="experiencias.php">Experiencias al aire libre</a>
            </div>
          </li>
        </ul>
        <a href="registro.php" class="navbar-btn btn-success btn pull-right">Alta Usuario</a>&nbsp
        <a href="login.php" class="navbar-btn btn-success btn pull-right">Login</a>
      </div>
    </nav>

  <?php } ?>

</header>
