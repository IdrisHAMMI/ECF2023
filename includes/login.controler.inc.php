<?php

//LOGIN CONTROLER FUNCTION
class LoginContr extends Login {

  private $email;
  private $password;

  public function __construct($email, $password) {
    $this->email = $email;
    $this->password = $password;
  }

  public function loginUser() {
    if($this->emptyInput() == false) {
      header("location: ../login.php?error=emptyinput");
      exit();
    }
    $this->getUser($this->email , $this->password);
  }
  
//EMPTY SIGNUP FUNCTION
  private function emptyInput() {
    return empty($this->email) || empty($this->password);
  }
}