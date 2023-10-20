<?php

//LOGIN CONTROLER
class Login extends dbh {
  protected function getUser($user, $password) {
      $stmt = $this->connect()->prepare('SELECT * FROM users WHERE userEmail = ?');
      if (!$stmt->execute(array($user))) {
          $stmt = null;
          header("location: ../login.php?error=stmtfailed");
          exit();
      }
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$user) {
          // USER NOT FOUND
          header("location: ../login.php?error=usernotfound");
          exit();
      }

      if (!password_verify($password, $user['userPass'])) {
          //INVALID PASSWORD
          header("location: ../login.php?error=wrongpassword");
          exit();
      } 

      //START SESSIONS
      session_start();
      $_SESSION["user_id"] = $user["user_id"];
      $_SESSION["userEmail"] = $user["userEmail"];
      $_SESSION["role_id"] = $user["role_id"];
      $_SESSION["allergies"] = $user["allergies"];
   }
}