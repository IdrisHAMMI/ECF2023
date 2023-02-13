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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <link rel="stylesheet" href="style.css"> 
  <title>Quai Antique | Connection</title>
</head>
<body>
  <section class="signup-form">
  <div class="text-center">
    <img src="assets/logo.png" style="width: 15%;margin-top: 20px;">
  </div>
  <div class="container d-flex text-center justify-content-center border mt-5 rounded" >
    <div class="row">
      <div class="col-sm">
      <div class="panel-heading text-center">
        <h1>Se Connecter</h1>
        </div>
      <div class="panel-body">
        <form action="includes/login.inc.php" style="width: 450px; margin: auto;" method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control"  name="email" placeholder="Email" />
          </div>
          <div class="form-group">
            <label for="password">Mot de Passe</label>
            <input type="password" class="form-control"  name="password" placeholder="Mot de Passe" />
          </div>
          <div class="submit-group">
            <button type="submit" name="submit">Connection</button>
            <br>
            <p>Pas de compte? <br><a href="signup.php">Inscrivez vous Maintenant !</a></p>
          </form>
          
          <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all the fields!</p>";
      }
      if (isset($_GET["error"])) {
        if($_GET["error"] == "invalidemail") {
          echo "<p>This Email already exists.</p>";
        }
      }
      if ($_GET["error"] == "stmtfailed") {
        echo "<p>Statement failed. Debug the code and try again!</p>";
      }
      if($_GET["error"] == "wronglogin") {
        echo "<p>This Email doesn't exist. Try again.</p>";
      }
      if($_GET['error'] == "userpending") {
        echo "<p>Cette utilisateur doit étre autoriser a se connecter.<br> Veuillez patienter pendant que nos consultants confirme votre compte.</p>";
      }
    }
  
  ?>
          </div>
      </div>
      </div>
    </div>
  </section
  >
</body>
</html>