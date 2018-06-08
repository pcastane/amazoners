<?php 

    //arrancamos sessions
    @session_start();
    
    //conecto con la BD
    $conectar=@mysqli_connect('localhost','root','') 
      or die("<font color='red'>Fallo de conexión con el servidor:</font><br>".mysqli_connect_error());
    
    //seleccionamos la BBDD 
    $bbdd=mysqli_select_db($conectar,'amazoners')
      or die("La BBDD no pudo ser seleccionada.");

    //establezco el charset para que guarde acentos y ñ
    mysqli_set_charset($conectar, 'utf8');


?>