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
    <img src="../assets/website_logo2.png" style="width: 250px;margin-top: 20px;">

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
    </ul>
</nav>
<section>
  <div class="container justify-content-center mt-5 border rounded">
    <div>
      <div class="col-sm">
      <div class="panel-heading">
        <h1 style="text-align: center;">Page d'Ajout/Modification d'Horaire</h1>
      </div>
        <br>
        <!--USER TABLE AUTH START-->
        <form action="../includes/scheduleAdd.inc.php" method="post">
        <h2 class="text-center">Horaire de la Semaine</h2>
          <select class="form-select" name="days" id="days">
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
            <option value="Samedi">Samedi</option>
            <option value="Dimanche">Dimanche</option>
          </select>
          <br>
          <select class="form-select" name="time" id="time">
            <option value="noon">Midi</option>
            <option value="night">Soir</option>
          </select>
          <br>
          <div class="form-group">
            <label for="schedule">Mettez l'horaire desirer...</label>
            <input type="text" name="scheduleOpen" placeholder="Debut D'horaire..." />
            <input type="text" name="scheduleEnd" placeholder="Fin D'horaire..." />
          </div>
          <div class="submit-group">
            <button type="submit" name="submit">Ajouter</button>
            <!--ERROR HANDLING-->
            <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "empty_input") {
            echo "<p>Selectionner et remplissez tous les champs !</p>";
          }
          if ($_GET["error"] == "none") {
            echo "<p>Horaire mise en ligne et mise a jour !</p>";
          }
          if ($_GET["error"] == "upload_failed") {
            echo "<p>Il y a eu un probleme avec la mise en ligne<br>des horaires.</p>";
          }
        }  
        ?>
          </form>
  </body>
</html>
