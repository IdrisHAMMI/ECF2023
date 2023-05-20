<?php

//ON SUBMIT SEND DATA QUERY FROM DB, SIGNUP CONTROLER & SIGNUP CLASSES THEN REDIRECT USER TO THE SAME PAGE
//WITH A SUCCESS ERROR
if (isset($_POST["submit"])) {
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  $pwdRepeat = $_POST["pwdrepeat"];
  $allergies = $_POST["allergies"];
  $convives = $_POST["convives"];
  

  include 'dbh.inc.php';
  include 'signup.classes.inc.php';
  include 'signup.controler.inc.php';
  
  
 $signup = new SignupContr($email, $password, $pwdRepeat, $allergies, $convives);

 $signup->signupUser();

 header("location: ../signup.php?error=none");
}