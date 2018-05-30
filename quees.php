<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Qué es Amazoners</title>
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



        <img src="img/e.jpg" class="img-fluid" alt="Responsive image">
        <br>
        <br>
        
        <!-- Los card flip -->
        <section id="amazoners" class="pb-5 ">
                <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="image-flip" >
                                    <div class="mainflip flip-0">
                                        <div class="frontside">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <p><img class=" img-fluid" src="img/i.png" alt="card image"></p>
                                                    <h4 class="card-title">Valora</h4>
                                                    <p class="card-text">Tu opinión cuenta</p>
                                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="backside">
                                            <div class="card">
                                                <div class="card-body text-center mt-4">
                                                    <h4 class="card-title">Valora</h4>
                                                    <p class="card-text">Podrás puntuar con un sistema de estrellas la experiencia o casa rural</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" >
                                        <div class="mainflip flip-0">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <p><img class=" img-fluid" src="img/h.jpg" alt="card image"></p>
                                                        <h4 class="card-title">Comenta</h4>
                                                        <p class="card-text">Deja tu impresión</p>
                                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title">Comenta</h4>
                                                        <p class="card-text">¿Te gustó algún detalle, quieres contar cómo fue? Puedes hacerlo</p>
        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="image-flip" >
                                            <div class="mainflip flip-0">
                                                <div class="frontside">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <p><img class=" img-fluid" src="img/g.png" alt="card image"></p>
                                                            <h4 class="card-title">Crea</h4>
                                                            <p class="card-text">Si no está, tú lo creas</p>
                                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="backside">
                                                    <div class="card">
                                                        <div class="card-body text-center mt-4">
                                                            <h4 class="card-title">Crea</h4>
                                                            <p class="card-text">Podrás registrar las casas rurales o experiencias outdoor que no estén, ¡sé tú el primero!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        </section>


        <!-- el footer -->
        <div class="navbar navbar-fixed-bottom navbar-dark bg-dark"
    style="position:fixed;left:0px;bottom:0px;height:80px;width:100%;">
      <div class="container">
        <p class="navbar-text pull-left">© 2018 - P9 Amazoners
        </p>
        
        
      </div>

    </body>
</html>
