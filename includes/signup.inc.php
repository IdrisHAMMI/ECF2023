<?php

if (isset($_POST["submit"])) {
  
  $email = $_POST["email"];
  $role = $_POST["role_user"];
  $password = $_POST["password"];
  $pwdRepeat = $_POST["pwdrepeat"];
  $allergies = $_POST["allergies"];
  $convives = $_POST["convives"];
  

  include 'dbh.inc.php';
  include 'signup.classes.inc.php';
  include 'signup.controler.inc.php';
  
  
 $signup = new SignupContr($email, $password, $pwdRepeat, $alergies, $convives);

 $signup->signupUser();

 header("location: ../signup.php?error=none");
}