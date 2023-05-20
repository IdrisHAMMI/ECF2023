<?php

//LOGIN CONTROLER
class Login extends dbh {

  protected function getUser($user, $password) {
    $stmt = $this->connect()->prepare('SELECT userPass FROM users WHERE userEmail = ? OR userEmail = ?');
     
    if(!$stmt->execute(array($user, $password))) {
      $stmt = null;
      header("location: ../login.php?error=stmtfailed");
      exit();
    }
    
    if($stmt->rowCount() == 0) {
      $stmt = null;
      header("location: ../login.php?error=usernotfound");
      exit();
    }

    $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPwd = password_verify($password, $pwdHashed[0]["userPass"]);
    
    
    if($checkPwd == false) {
      
      $stmt = null;
      header("location: ../login.php?error=wrongpassword");
      exit();

    } elseif ($checkPwd == true) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE userEmail = ? OR userEmail = ? AND userPass = ?');
        
        if(!$stmt->execute(array($user, $pwdHashed[0]["userPass"], $password))) {
          $stmt = null;
          header("location: ../login.php?error=stmtfailed");
          exit();
          }

          if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
          }

          $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

          session_start();
         $_SESSION["user_id"] = $user[0]["user_id"];
         $_SESSION["userEmail"] = $user[0]["userEmail"];
         $_SESSION["usersPass"] = $user[0]["userPass"];
         $_SESSION["role_id"] = $user[0]["role_id"];
         $_SESSION["allergies"] = $user[0]["allergies"];
    }
    $stmt = null;
    }
  }
  