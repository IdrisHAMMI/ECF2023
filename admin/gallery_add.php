<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css"> 
  <title>Quai Antique | Index</title>
</head>
<body>
   <!--NAV BAR START-->
  <nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <img src="../assets/logo.png" style="width: 15%;margin-top: 10px;">

    <!--<button 
        class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#toggleMobileMenu" 
        aria-controls="toggleMobileMenu" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>-->
    <ul class="navbar-nav ml-auto" style="padding-left: 0px;">
      <li><a href='../login.php' class='nav-link'>Se Connecter</a></li>
    </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-light ">
<ul class="nav justify-content-center navbar-nav" style="padding-left: 0px;">
      <li class="nav-item"><a href='../index.php' class='nav-link'>Return to Index&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='gallery_add.php' class='nav-link'>Add Gallery Pic&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='#' class='nav-link'>Add Menu&nbsp;&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='#' class='nav-link'>See Clients Reservations DB&nbsp;&nbsp;&nbsp;</a></li>
    </ul>
</nav>
<div class="container text-center mt-5 border rounded">
    <div class="row">
      <div class="col-sm">
      <div class="panel-heading text-center">
        <h1>Formulaire d'Ajout de photo de Gallerie</h1>
      </div>
      <div class="panel-body">
        <form action="../includes/upload.inc.php" style="max-width: 300px; margin: auto;" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-group">
              <img src="../assets/placeholder_avatar.jpg" onclick="triggerClick()" id="foodImg" />
            <label for="foodImg">Ajouter votre image:</label>
            <input type="file" name="foodImg" onchange="displayImage(this)" id="foodImg" class="form-control">
</div>
            <label for="gallery_bio">Ajout de la description de <br> la Photo</label>
            <textarea class="form-control" name="gallery_bio" placeholder="Biographie de la Photo...">
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
