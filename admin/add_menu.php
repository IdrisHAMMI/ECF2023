<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css"> 
  <title>Quai Antique | Index</title>
</head>
<body>
   <!--NAV BAR START-->
  <nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <img src="../assets/website_logo2.png" style="width: 15%;margin-top: 10px;margin-left: auto;margin-right: auto;">

    <button 
        class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#toggleMobileMenu" 
        aria-controls="toggleMobileMenu" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
    <ul class="navbar-nav ml-auto" style="padding-left: 0px;">
      <li><a style="color: black;" href='../login.php' class='nav-link'>Se Connecter</a></li>
    </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-light ">
<ul class="nav justify-content-center navbar-nav" style="padding-left: 0px;">
      <li class="nav-item" ><a style="color: black;" href='../index.php' class='nav-link'>Retourner a l'Index&nbsp;&nbsp;</a></li>
      <li class="nav-item" ><a style="color: black;" href='gallery_add.php' class='nav-link'>Ajout d'image de gallerie&nbsp;&nbsp;</a></li>
      <li class="nav-item" ><a style="color: black;" href='add_menu.php' class='nav-link'>Ajout de Menu&nbsp;&nbsp;&nbsp;</a></li>
      <li class="nav-item" ><a style="color: black;" href='modify_timetable.php' class='nav-link'>Modifier les Horaires du Rest.&nbsp;&nbsp;&nbsp;</a></li>
      <li class="nav-item" ><a style="color: black;" href='#' class='nav-link'>See Clients Reservations DB&nbsp;&nbsp;&nbsp;</a></li>
    </ul>
</nav>
<div class="container text-center mt-5 border rounded">
    <div class="row">
      <div class="col-sm">
      <div class="panel-heading text-center">
        <h1>Formulaire d'Ajout de Menu</h1>
      </div>
      <div class="panel-body">
        <form action="../includes/menu.inc.php" style="max-width: 300px; margin: auto;" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-group">
            <label for="menu_title" style="margin-top: 20px;">Ajout du titre de Menu</label>
            <input class="form-control" name="menu_title" type="text" placeholder="Titre du Menu...">
            <label for="menu_schedule"style="margin-top: 20px;">Horaire pour servir le Menu</label>
            <input class="form-control" name="menu_schedule" type="text" placeholder="Horraire pour servir Menu...">
</div>
            <label for="menu_bio">Ajout de la description du Menu</label>
            <textarea class="form-control" name="menu_bio" placeholder="Biographie de la Photo...">
          </textarea>
          </div>
            <br>
          <div class="submit-group">
            <button type="submit" name="submit">Ajouter</button>
          </form>
          </div>
      </div>
      </div>
    </div>
<script src="../scripts/displayTrigger.js"></script>
  </body>
  <?php

?>
</html>
