<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DescripcionProducto</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="extra.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="valora.js"></script>



  </head>
  <body>

<?php
    require_once('header.php');
    require_once('conectarbd.php');

?>


        <section class="bg-dark">
          <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-5">
                   <div class="thumbnail img-thumb1-bg">
                       <div class="overlay"></div>
                       <div class="caption">
                           <div class="tag"><a href="#">Casa rural</a></div>
                           <div class="title"><a href="#">Nombre de la casa rural</a></div>
                           <div class="clearfix">
                               <span class="meta-data">Por <a href="">Usuario1</a> 23/04/18</span>
                               <span class="meta-data pull-right"><a href=""><i class="fa fa-heart-o"></i> 1</a></span>
                           </div>
                           <div class="content">
                               <p>Descripción de la casa, muy chula, y tal y cual</p>
                           </div>
                       </div>
                   </div>
                   <br>
                </div>
                <div class="descripcio"><p>Casa rural situada en Galapagar, cerca de la mansión de Pablo Iglesias. Dispone de 200m2 construidos y parcela de 700m2 con todos los servicios.</p></div>
        </div>

       
        <div class="product-review-stars">
            <input type="radio" id="star5" name="rating" value="5" class="visuallyhidden" /><label for="star5" >★</label>
            <input type="radio" id="star4" name="rating" value="4" class="visuallyhidden" /><label for="star4" >★</label>
            <input type="radio" id="star3" name="rating" value="3" class="visuallyhidden" /><label for="star3" >★</label>
            <input type="radio" id="star2" name="rating" value="2" class="visuallyhidden" /><label for="star2" >★</label>
            <input type="radio" id="star1" name="rating" value="1" class="visuallyhidden" /><label for="star1" >★</label>
        </div> 
          
          
          <div class="container">
              <form method="POST" id="comment_form">
               <div class="form-group">
                <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Comentanos que te parece" rows="5"></textarea>
               </div>
               <div class="form-group">
                <input type="hidden" name="comment_id" id="comment_id" value="0" />
                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Enviar" />
               </div>
              </form>
              <span id="comment_message"></span>
              <br />
              <div id="display_comment"></div>
          </div>
         </div>  
</section>

    <!-- el footer 
    <div class="navbar navbar-fixed-bottom navbar-dark bg-dark"
    style="position:fixed;left:0px;bottom:0px;height:80px;width:100%;">
      <div class="container">
        <p class="navbar-text pull-left">© 2018 - P9 Amazoners
        </p>-->
        
        


  </body>
</html>
