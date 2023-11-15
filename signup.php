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
  <link rel="stylesheet" href="style.css"> 
  <title>Quai Antique | Enregistrement</title>
</head>
<body>
  <section>
  <div class="text-center">
  <a href="index.php">
    <img src="assets/website_logo2.png" style="width: 250px;margin-top: 20px;">
  </a>
  </div>
  <div class="container text-center mt-5 border rounded">
    <div class="row">
      <div class="col-sm">
      <div class="panel-heading text-center">
        <h1>Formulaire d'inscription</h1>
      </div>
      <div class="panel-body">
        <form action="includes/signup.inc.php" style="max-width: 300px; margin: auto;" method="post">
          <div class="form-group">
            <label for="email" style="margin-top: 15px;">Email</label>
            <input type="text" class="form-control" name="email" placeholder="E-Mail" />
          </div>
          <div class="form-group">
            <label for="password" style="margin-top: 15px;">Mot de Passe</label>
            <input type="password" class="form-control" name="password" placeholder="Mot de Passe"/>
          </div>
          <ul>
          <li style="text-align:left;">Au moins 8 charactères</li>
          <li style="text-align:left;">Au moins une lettre Majuscule</li>
          <li style="text-align:left;">Au moins une lettre minuscule</li>
          <li style="text-align:left;">Au moins un chiffre</li>
          <li style="text-align:left;">Au moins un des charactères suivants: (!@#$%^&*)</li>
          </ul>
          <div class="form-group">
            <label for="password">Retapper votre Mot de Passe</label>
            <input type="password" class="form-control" name="pwdrepeat" placeholder="Retapper votre Mot de Passe"/>
          </div>
          <div class="form-group">
            <label for="allergies" style="margin-top: 15px;">Avez vous des allergies?</label>
            <textarea type="text" class="form-control" name="allergies" placeholder=""></textarea>
          </div>
          <div class="form-group">
            <label for="convives" style="margin-top: 15px;">Avez vous des convives?</label>
            <select class="form-select" name="convives" >
              <option value="1">Une Personne</option>
              <option value="2">Deux Personnes</option>
            </select>
          </div>
            </div>
            <br>
          <div class="submit-group">
            <button type="submit" name="submit">S'enregistrer</button>
            <?php
            //ERROR HANDLING
            if (isset($_GET["error"])) {
                switch ($_GET["error"]) {
                  case "emptyinput":
                      echo "<p>Remplissez tous les champs !</p>";
                      break;
                  case "emailnotmatched":
                      echo "<p>Choisissez une adresse email valide.</p>";
                      break;
                  case "invalidcredencials":
                      echo "<p>L'email ou le mot de passe n'est pas valide. Reesayer.</p>";
                      break;
                  case "pwdnotmatched":
                      echo "<p>Les mots de passe doivent être identiques.</p>";
                      break;
                  case "invalidpwd":
                        echo "<p>Les conditions de mot de passe ne sont pas remplies.</p>";
                        break;    
                  case "userexists":
                      echo "<p>Cette adresse email existe déjà. Veuillez vous enregistrer avec une autre adresse email.</p>";
                      break;
                  case "none":
                      echo "<p>Merci de vous être inscrit !<br> Vous pouvez maintenant réserver une table dans notre restaurant.<br><a href=\"index.php\">Retourner à l'accueil.</a></p>";
                      break;
                  default:
                      echo "<p>Une erreur s'est produite.</p>";
   }
}
?>
          </form>
          </div>
      </div>
      </div>
    </div>
    
    

</section>

    
</body>
</html>