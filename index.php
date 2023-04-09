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
  <link rel="stylesheet" type="text/css" href="style.css"> 
  <title>Quai Antique | Index</title>
</head>
<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('assets/background_restaurant.jpg'); ;">

   <!--NAV BAR START-->
  <nav class="navbar navbar-expand-lg navbar-light" style="color: rgb(255, 255, 255);">
    <img src="assets/website_logo2.png" style="width: 15%;margin-top: 10px;">

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
      <li><a href='login.php' class='nav-link'>Se Connecter</a></li>
    </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-light ">
<ul class="nav justify-content-center navbar-nav" style="padding-left: 0px;">
      <li class="nav-item"><a href='index.php' class='nav-link'>Index&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='#' class='nav-link'>Menu&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='schedule.php' class='nav-link'>Horaires d'ouverture&nbsp;&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='#' class='nav-link'>Notre Carte&nbsp;&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='#' class='nav-link'>Réserver une Table&nbsp;&nbsp;&nbsp;</a></li>
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

					<!-- Monday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Lundi</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr
          </div>

					</div>
					<hr>

					<!-- Tuesday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Mardi</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr</div>					
            </div>
					<hr>

					<!-- Wednesday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Mercredi</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr</div>					
            </div>
					<hr>

					<!-- Thursday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Jeudi</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr</div>
          	</div>
					<hr>

					<!-- Friday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Vendredi</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr</div>				
          	</div>
					<hr>

					<!-- Saturday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Samedi</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr</div>					
          </div>
					<hr>

					<!-- Sunday -->
					<div class="row">
						<div class="col-sm-6 text-white fw-200">Dimanche</div>
						<div class="col-sm-6 text-white fw-200">11:30 - 15:30 Uhr<br>18:00 - 23:30 Uhr</div>					
          </div>
    </div>
			</div>
  <section class="menu-section">
    <div class="container">
      <div class="title-section white-style">
        <h1>Nos Repas</h1>
      </div>
    </div>
    </section>
  </body>
</html>