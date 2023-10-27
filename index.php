<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');
    //$pdo = new PDO('mysql:host=localhost;dbname=id20788719_restaurant', 'id20788719_root', 'Travis00756&');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Quai Antique | Index</title>
  </head>
  <body style="background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('assets/background_restaurant.jpg'); ;">
   <!--NAV BAR START-->
   <nav class="navbar navbar-expand-lg navbar-light" style="color: rgb(255, 255, 255);">
  <a class="navbar-brand img_brand" href="index.php">
    <img src="assets/website_logo2.png" class="img-fluid web_logo">
  </a>

  <ul class="navbar-nav ms-auto main_nav" style="padding-left: 0px; margin-left: auto;">
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" style="color: rgba(255, 255, 255, 0.9); text-align:center;" href="#" id="yourAccountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Votre Compte
  </a>

  <div class="dropdown-menu" aria-labelledby="yourAccountDropdown">
    <?php if(isset($_SESSION['userEmail'])): ?>
      <a class="dropdown-item"><?= $_SESSION['userEmail']; ?></a>
      <div class="dropdown-divider"></div>
      <button type="button" class="btn btn-primary modal_button" style="margin-bottom: 0px;" data-bs-toggle="modal" data-bs-target="#booking-modal">Réserver maintenant</button>
      <div class="dropdown-divider"></div>
      <a href='includes/logout.inc.php' class='dropdown-item'>Se Déconnecter</a>
    <?php else: ?>
      <a href="login.php" class="dropdown-item">Connectez-vous</a>
    <?php endif; ?>
  </div>
</li>

  </ul>
      </nav>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(45, 26, 26, 0.7);">
        <ul class="nav justify-content-center navbar-nav flex-row" style="padding-left: 0px;">
              <li class="nav-item"><a href='index.php' class='nav-link'>Index</a></li>
              <li class="nav-item"><a href='menu.php'  class='nav-link'>Menu</a></li>
              <?php 
              if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == '2') {
                echo "<li class='nav-item'><a href='../ECF2023/admin/gallery_add.php' class='nav-link'>Modifier le Site</a></li>";
              } 
              ?>
              </ul>
        </nav>
        <!--NAV BAR END-->
        <div class="container">
          <img src="assets/index_welcome.png" class="mx-auto d-block img-fluid" alt="index-welcome">
          <h3 id="welcome_footer"><i>Découvrez de nouvelles saveur au Quai Antique</i></h3>
        </div>
        <br>
        <section class="menu-section">
        <div class="container">
        <div class="title-section white-style">
          <h1 style="margin-bottom: 3.5rem;">Nos Repas</h1>
        </div>
        <div class="row" style="text-align: center;">
          <?php 
          $sql = "SELECT `galleryImg`, `galleryBio` FROM `gallery`;";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="col-md-4">
            <img src="<?php echo "assets/added_content/".$row['galleryImg']; ?>" class="img-fluid" width="200px">
            <div class="menu-post-content">
              <h4 style="color: white;"><?php echo $row['galleryBio']; ?></h4>
            </div>
          </div>
          <?php 
          }
             ?>
         </div>
        </div>
            <!--MODAL-->
             <div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="booking-form">Reservation</h5>
                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                    <form id="my-form">
                    <p class="modal-paragraph" style="text-align: center;" >Veuillez choisir le jour, l'heure et le nombre<br>de convives avec vous.</p>
                    <p class="modal-paragraph" style="text-align: center;">Pour des raisons de securité,<br>le nombre de convives accepté est limité a 3.</p>
                      <div class="row">
                        <div class="col-5">
                     <div class="form-floating">
                     <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="dateInput" id="dateInput"/>
                      <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </span>
                      </div>
                      </div>
                      <div class="col-6">
                      <div class="form-floating">
                      <select class="form-select" name="platesClient" id="platesClient">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                      <label for="plates">Couverts</label>
                      <br>
                      <input type="radio" name="periode" value="jour"> Jour
                      <br>
                      <input type="radio" name="periode" value="soir"> Soir
                        </div>
                       </div>
                       <p>Horaire du Jour:</p>
                       <select id="hourInput" class="form-select" name="hourInput">
                      </select>
                      <br>
                      <p>Horaire du Soir:</p>
                       <select id="hourInputNight" class="form-select" name="hourInputNight">
                      </select>
                      </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                     <button type="submit" name="submit" class="btn btn-primary">Reserver</button>
                   </div>
                   <div id="disponibilite-message"></div>
                   </form>
                    </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>
    <script src="scripts/modalReserve.js"> </script>
    
    <!--MODAL END-->
    </section>
    <footer>
  <div class="content-footer">
    <h3>Horaires du restaurant</h3>
    <!--SCHEDULE QUERY-->
    <?php 
      $sql ="SELECT * FROM `schedule`;";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="row">
      <div class="col-sm-6 fw-200 days_schedule"><?php echo $row['days']?></div>
      <div class="col-sm-6 fw-200 hour_schedule"><?php echo $row['timeNoonOpening']?> - <?php echo $row['timeNoonEnd']?><br><?php echo $row['timeNightOpening']?> - <?php echo $row['timeNightEnd']?></div>
    </div>
    <?php }?>
  </div>
  <br>
  <p id="footer-copyright"><i>©Copyright Quai Antique 2023  All rights reserved.</i></p>
</footer>
  </body>
</html>