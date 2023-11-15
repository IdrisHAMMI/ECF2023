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
        </ul>
    </div>
</nav>
<!--NAV BAR END-->
<section>
  <div class="container justify-content-center mt-5 border rounded">
    <div>
      <div class="col-sm" style="margin-bottom: 20px;">
      <div class="panel-heading">
        <h1 style="text-align: center;">Page d'Ajout/Modification d'Horaire</h1>
      </div>
        <br>
        <!--USER TABLE AUTH START-->
        <form action="../includes/scheduleAdd.inc.php" method="post">
        <h2 class="text-center">Horaire de la Semaine</h2>
        <p>Choissiser la disponibilité du restaurant:</p>
        <select class="form-select" name="scheduleStatus" id="booking_availability">
          <option value="scheduleOpen">Ouvert</option>
          <option value="scheduleClosed">Fermée</option>
        </select>
        <br>
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
          <?php if ($scheduleClosed): ?>
            <option value="allDay">La Journée</option>
          <?php endif; ?>
          </select>
          <br>
          <div class="form-group">
            <label for="schedule">Mettez l'horaire desirer...</label>
            <input type="text" oninput="scheduleField(event)" id="scheduleOpen"name="scheduleOpen" placeholder="Debut D'horaire..." />
            <input type="text" oninput="scheduleField(event)" id="scheduleEnd" name="scheduleEnd" placeholder="Fin D'horaire..." />
          </div>
          <div class="submit-group text-center">
            <button type="submit" name="submit" style="margin-top: 10px;">Ajouter</button>
            <br>
            <a href="../index.php">Retourner a L'index</a>
            <!--TIMETABLE FUNCTIONS-->
            <script src="../scripts/appScript.js"></script>
            <!--ERROR HANDLING-->
            <?php
        if (isset($_GET["error"])) {
          switch ($_GET["error"]) {
          case "empty_input":
            echo "<p>Selectionner et remplissez tous les champs !</p>";
          break;
          case "none":
            echo "<p>Horaire mise a jour !</p>";
          break;
          case "upload_failed":
            echo "<p>Il y a eu un probleme avec la mise en ligne<br>des horaires.</p>";
          break;
          default: 
          echo "<p>Les données que vous avez introduites ne sont pas valide.</p>";          
          break;
          }
        }
        ?>
          </form>
  </body>
</html>
