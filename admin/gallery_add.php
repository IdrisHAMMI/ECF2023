<?php
 session_start();
 include 'idAdminVerify.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css"> 
  <title>Quai Antique | Index</title>
</head>
<body>
   <!--NAV BAR START-->
   <nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <img src="../assets/website_logo2.png" style="width: 250px; margin-top: 20px;">
    <button class="navbar-toggler" style="margin-top: 30px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="margin-left:auto;">
            <li class="nav-item dropdown_element">
                <a style="color: black;" href="../index.php" class="nav-link">Retourner à l'Index</a>
            </li>
            <li class="nav-item dropdown_element">
                <a style="color: black;" href="gallery_add.php" class="nav-link">Ajout d'image de galerie</a>
            </li>
            <li class="nav-item dropdown_element">
                <a style="color: black;" href="add_menu.php" class="nav-link">Ajout de Menu</a>
            </li>
            <li class="nav-item dropdown_element">
                <a style="color: black;" href="modify_timetable.php" class="nav-link">Modif. Horaires d'ouverture</a>
            </li>
        </ul>
    </div>
</nav>
<!--NAV BAR END-->
<div class="container text-center mt-5 border rounded">
    <div class="row">
      <div class="col-sm">
      <div class="panel-heading text-center">
        <h1 style="margin-top: 10px;">Formulaire d'Ajout de photo de Gallerie</h1>
      </div>
      <div class="panel-body">
        <form action="../includes/upload.inc.php" style="max-width: 300px; margin: auto;" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-group">
              <img src="../assets/placeholder_avatar.jpg" onclick="triggerClick()" id="foodImg" />
            <label for="foodImg">Ajouter votre image:</label>
            <input type="file" name="foodImg" onchange="displayImage(this)" id="foodImg" class="form-control">
          </div>
            <br>
            <label for="gallery_bio">Ajout de la description de <br> la Photo</label>
            <input type="text" class="form-control" name="gallery_bio" placeholder="Biographie de la Photo...">
          </textarea>
          </div>
            <br>
          <div class="submit-group">
            <button type="submit" name="submit" style="margin-bottom: 20px;">Ajouter</button>
          </form>
          </div>
      </div>
      </div>
    </div>
    <a href="../index.php">Retourner a L'index</a>
<script src="../scripts/appScript.js"></script>
  </body>
  <!--ERROR HANDLING-->
  <?php
if (isset($_GET["error"]))
{
 if ($_GET["error"] == "none") {
   echo "<p>Image mise dans la gallerie !</p>";
 }
 if ($_GET["error"] == "empty_input") {
   echo "<p>Ajouter votre image ou completer le titre !</p>";
 }
 if ($_GET["error"] == "upload_failed") {
  echo "<p>Il y a eu un probleme avec la mise en ligne<br>de l'image ou du texte.</p>";
  }
}
?>
</html>
