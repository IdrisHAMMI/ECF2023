<?php

//CLASS OBJECT SIGNUP FUNCTION
class Signup extends dbh {
 
  protected function executeStatement($stmt, $params) {
    if ($stmt->execute($params)) {
      return true;
    } else {
      header("location: ../signup.php?error=stmtfailed");
      exit();
    }
  }

  protected function setUser($email, $password, $allergies, $convives) {
    $stmt = $this->connect()->prepare('INSERT INTO users (userEmail, userPass, role_id, allergies, convives) VALUES (?, ?, 1, ?, ?);');
    
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    if ($this->executeStatement($stmt, array($email, $hashedPwd, $allergies, $convives))) {
      $stmt = null;
    }
  }

  protected function checkUser($email) {
    $stmt = $this->connect()->prepare('SELECT userEmail FROM users WHERE userEmail = ?;');
    
    if ($this->executeStatement($stmt, array($email))) {
      $resultCheck = $stmt->rowCount() === 0;
      $stmt = null;
      return $resultCheck;
    }
  }
}


