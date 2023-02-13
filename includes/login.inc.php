<?php

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];


  include 'dbh.inc.php';
  include 'login.classes.inc.php';
  include 'login.controler.inc.php';
  $login = new LoginContr($email, $password);

  $login->loginUser();

  header("location: ../con_success.php");
}