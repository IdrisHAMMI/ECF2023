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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    
    <?php
           if(isset($_SESSION["userEmail"]) ) {
            echo "<p>Bienvenue &nbsp;</p>" . $_SESSION['userEmail'];
          } elseif (!isset($_SESSION["userEmail"]) ) {
            echo "<li><a href='login.php' class='nav-link'>Se Connecter</a></li>";
          }
         ?>
      
    </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-light ">
<ul class="nav justify-content-center navbar-nav" style="padding-left: 0px;">
      <li class="nav-item"><a href='index.php' class='nav-link'>Index&nbsp;&nbsp;</a></li>
      <li class="nav-item"><a href='#' class='nav-link'>Menu&nbsp;&nbsp;</a></li>
    </ul>
</nav>

<br>
<div class="container mx-auto d-block" style="margin-bottom: 50px;">
				<h1 id="schedule_header">Nos Menus</h1>
				<section class="menu-section">
        <div class="container" >
            <?php
            $sql ="SELECT `menuTitle`,`menuSchedule`,`menuDescriptionPrice` FROM `menu`;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="menus" style="text-align: center;text-align: center; ">
              <h3 class="menuTitle"><?php echo $row['menuTitle']?></h3>
              <h3 class="menuSchedule"><i><?php echo $row['menuSchedule']?></i></h3>
              <h3 class="menuDescriptionPrice" style="; margin-bottom: 100px;"><?php echo $row['menuDescriptionPrice']?></h3>
            </div>
            <?php 
            } 
            
             ?>
                 
    </div>
</section>
  </body>
</html>