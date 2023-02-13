<?php 

//Signup Controler
class SignupContr extends Signup {

  private $email;
  private $password;
  private $pwdRepeat;
  private $role;
  private $allergies;
  private $convives;


  public function __construct($email, $password, $pwdRepeat, $allergies, $convives) {
    $this->email = $email;
    $this->password = $password;
    $this->pwdRepeat = $pwdRepeat;
    $this->allergies = $allergies;
    $this->convives = $convives;
  }

  public function signupUser() {
    if($this->emptyInputSignup() == false) {
      // echo "Empty Input!";
      header("location: ../signup.php?error=emptyinput");
      exit();
    }
    if($this->invalidEmail() == false) {
      // echo "Invalid Email!";
      header("location: ../signup.php?error=email");
      exit();
    }
    if($this->pwdMatch() == false) {
      // echo "Password doesn't match!";
      header("location: ../signup.php?error=pwdnotmatched");
      exit();
    }
      if($this->uidExists() == false) {
        // echo "Password doesn't match!";
        header("location: ../signup.php?error=userexists");
        exit();
    }
    $this->setUser($this->email, $this->password, $this->allergies, $this->convives);
  }


//EMPTY SIGNUP FUNCTION
public function emptyInputSignup() {
  $result;
  if(empty($this->email) || empty($this->password)) {
    $result = false;
  }
  else {
    $result = true;
  }
  return $result;
} 

//INVALID EMAIL FUNCTION
private function invalidEmail() {
  $result; 
  if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    $result = false;
  }
  else {
    $result = true;
  }
  return $result;
}


//PASSWORD MATCH FUNCTION
private function pwdMatch() {
  $result;
  if($this->password !== $this->pwdRepeat) {
    $result = false;
  }
  else {
    $result = true;
  }
  return $result;
  }

  //PASSWORD MATCH FUNCTION
private function uidExists() {
  $result;
  if($this->checkUser($this->email)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
  }
} //END OF CLASS