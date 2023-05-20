<?php

//CLASS OBJECT SIGNUP FUNCTION
class Signup extends dbh {
 
  protected function setUser($email, $password, $allergies, $convives) {
    $stmt = $this->connect()->prepare('INSERT INTO users (userEmail, userPass, role_id, allergies, convives) VALUE (?, ?, 1, ?, ?);');
    
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

  if(!$stmt->execute(array($email, $hashedPwd, $allergies, $convives))) {
    $stmt = null;
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }

    $stmt = null;
  }

  protected function checkUser($email) {
    $stmt = $this->connect()->prepare('SELECT userEmail FROM users WHERE userEmail = ?;');
  
  if(!$stmt->execute(array($email))) {
    $stmt = null;
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }

  $resultCheck;
  if($stmt->rowCount() > 0) {
    $resultCheck = false;
  } else {
    $resultCheck = true;
    }
  return $resultCheck;
  }
}



