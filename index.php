<?php
  $pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Quai Antique | Index</title>
</head>
<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('assets/background_restaurant.jpg'); ;">

   <!--NAV BAR START-->
  <nav class="navbar navbar-expand-lg navbar-light" style="color: rgb(255, 255, 255);">
    <img src="assets/website_logo2.png" style="width: 15%;margin-top: 10px;">

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
    <ul class="navbar-nav ms-auto" style="padding-left: 0px;">
    <?php
           if(isset($_SESSION["userEmail"]) ) {
            echo "<p>Bienvenue &nbsp;</p>" . $_SESSION['userEmail'];
          } elseif (!isset($_SESSION["userEmail"]) ) {
            echo "<li><a href='login.php' class='nav-link'>Se Connecter</a></li>";
          }
         ?>
   <button type="button" class="btn btn-primary" style="margin-bottom: 0px;" data-bs-toggle="modal" data-bs-target="#booking-modal">
               Réserver maintenant
             </button>  
            </ul>

</nav>
<nav class="navbar navbar-expand-lg navbar-light ">
<ul class="nav justify-content-center navbar-nav" style="padding-left: 0px;">
      <li class="nav-item"><a href='index.php' class='nav-link'>Index&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='menu.php' class='nav-link'>Menu&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href="../src/admin/gallery_add.php" class='nav-link'>ADMIN</a></li>
    </ul>
</nav>
<div class="container">
  <img src="assets/index_welcome.png" class="mx-auto d-block index-welcome" alt="index-welcome">
  <h3 id="welcome_footer"><i>Découvrez de nouvelles saveur au Quai Antique</i></h3>
</div>
<br>
<div class="container mx-auto d-block" style="margin-bottom: 50px;">
				<h1 id="schedule_header">Nos Horaires</h1>
				<div class="opening_wrapper" >
        <?php 
            $sql ="SELECT * FROM `schedule`;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
					<!-- Monday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200"><?php echo $row['days']?></div>
						<div class="col-sm-6 text-white fw-200"><?php echo $row['timeNoonOpening']?> - <?php echo $row['timeNoonEnd']?> Heure<br><?php echo $row['timeNightOpening']?> - <?php echo $row['timeNightEnd']?> Heure
          </div>
					</div>
					<hr>
         <?php }?>
    </div>
			</div>
  <section class="menu-section">
    <div class="container">
      <div class="title-section white-style">
        <h1 style="margin-bottom: 3.5rem;">Nos Repas</h1>
          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <ul>
            <?php 
            $sql ="SELECT `galleryImg`, `galleryBio` FROM `gallery`;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <img src="<?php echo "assets/added_content/".$row['galleryImg'];?>" class="card-img-top"width="200px"> 
              <div class="menu-post-content">
              <h4 style="color: white;"><?php echo $row['galleryBio']?> </h4>
              </div>
            <?php 
            }
            ?>
            </ul>
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
                        <option value="1">1 Couvert</option>
                        <option value="2">2 Couverts</option>
                        <option value="3">3 Couverts</option>
                      </select>
                      
                      <label for="plates">Couverts</label>
                      <br>
                        </div>
                       </div>
                       <p>Horaire du Jour:</p>
                       <select id="my-select" name="hourInput">
                      <?php 
                      //$ouverture = strtotime('12:00'); // Heure d'ouverture du restaurant
                      //$fermeture = strtotime('15:00'); // Heure de fermeture du restaurant
                      
                      //$pas = 15 * 60; // Pas de 15 minutes en secondes
                      
                     // for ($heure = $ouverture; $heure < $fermeture; $heure += $pas) {
                       //   $heure_format = date('H:i', $heure);
                         // echo "<option value='$heure_format'>$heure_format</option>";
                      
                      ?>
                      </select>
                        <!--<select id="hourInput" name="hourInput">
                        <option value="12:00">12:00</option>
                        <option value="12:15">12:15</option>
                        <option value="12:30">12:30</option>
                        <option value="12:45">12:45</option>
                        <option value="13:00">13:00</option>
                        <option value="13:15">13:15</option>
                        <option value="13:30">13:30</option>
                        <option value="13:45">13:45</option>
                        <option value="14:00">14:00</option>
                      </select>-->
                      
                      </div>
                     
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                     <button type="submit" name="submit" class="btn btn-primary">Reserver</button>
                   </div>
                   </form>
                   <div id="disponibilite-message">
  
                    <p>Disponibilite: </p>
                    </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });

        $(document).ready(function() {
            $('#booking-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#reservation-message').html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
    // Fonction pour mettre à jour la disponibilité des tables
    function updateDispo() {
        
        var date = $('#dateInput').val();
        var heure = $('#hourInput').val();
        var alergies = $('#platesClient').val();
        
        $.ajax({
            type: 'POST',
            url: 'reservation.php',
            data: { bookingDate: date, bookingTime: heure, platesClient: alergies },
            dataType: 'json',
            success: function(response) {
              alert(date);
              $('#dispo-message').html('Success');
            }
        });
    }

    // Appel de la fonction pour la première fois
    $('#reservation-form').submit(function(event) {
    updateDispo();
    });
    // Mise à jour de la disponibilité des tables en temps réel
    $('#date, #heure').on('change', function() {
        updateDispo();
    });
});
    </script>
    <script>
        $(document).ready(function() {
            $('#my-form').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'reservation.php',
                    data: formData,
                    success: function(response) {
                        // Faites quelque chose avec la réponse du serveur
                        $('#dispo-message').html(response);
                    }
                });
            });
        });

        $(document).ready(function() {
  $('#dateInput, #hourInput').change(function() {
    var date = $('#dateInput').val();
    var heure = $('#hourInput').val();

    // Vérification des champs non vides
    if (date !== '' && heure !== '') {
      var formData = {
        date: date,
        heure: heure
      };

      $.ajax({
        type: 'POST',
        url: 'verif.php',
        data: formData,
        success: function(response) {
          $('#disponibilite-message').text(response);
        }
      });
    }
  });
});


$(document).ready(function() {
  function detectJour(jour) {
        
        var jour = jour;

        $.ajax({
            type: 'POST',
            url: 'dateHeure.php',
            data: { jour: jour },
            dataType: 'json',
            success: function(response) {
          var options = JSON.parse(response);
          var select = $('#my-select');

          // Effacer les options existantes
          select.empty();

          // Ajouter les nouvelles options
          options.forEach(function(option) {
            select.append('<option value="' + option.value + '">' + option.label + '</option>');
          });
        }
        });
    }

  $('#dateInput').change(function() {
    var date = $('#dateInput').val();

    $.ajax({
      type: 'POST',
      url: 'jour_semaine.php',
      data: { date: date },
      success: function(response) {
        detectJour(response);
      }
    });
  });
});
    </script>
    
    </section>
  </body>
</html>