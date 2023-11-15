<?php 

//SIGNUP CONTROLER
class SignupContr extends Signup {

  private $email;
  private $password;
  private $pwdRepeat;
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
    if($this->emailConditionsMet() == false) {
      // echo "Email conditions are not valid!";
      header("location: ../signup.php?error=emailcondition");
      exit();
    }
    if($this->isValidSignup() == false) {
      // echo "Invalid Email!";
      header("location: ../signup.php?error=invalidcredencials");
      exit();
    }
    if ($this->pwdMatch() == false) {
      // echo "Password does not match!";
      header("location: ../signup.php?error=pwdnotmatched");
      exit();
    }
    if ($this->passwordConditionsMet() == false) {
       // echo "Password conditions not met!"; 
       header("location: ../signup.php?error=invalidpwd");
       exit();
    }
    if($this->uidExists() == false) {
      // echo "User credentials already exists!";
      header("location: ../signup.php?error=userexists");
      exit();
    }
    $this->setUser($this->email, $this->password, $this->allergies, $this->convives);
  }


//EMPTY SIGNUP FUNCTION
public function emptyInputSignup() {
  return !empty($this->email) && !empty($this->password) && !empty($this->allergies) && !empty($this->convives);
} 

//EMAIL CONDITIONS FUNCTION
private function emailConditionsMet() {
  //REGEX ALGORITHM FOR EMAIL (RESULT IS NO LONGER NEEDED THANKS TO THE REXEG PATTERN-BASED VALIDATION)
  //CHECKS IF THE EMAIL ADDRESS IS WELL FORMED
  $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  return preg_match($emailPattern, $this->email) && filter_var($this->email, FILTER_VALIDATE_EMAIL);
}

//PASSWORD CONDITION VALIDATION FUNCTION
private function passwordConditionsMet() {
  //REGEX ALGORITHM FOR EMAIL (RESULT IS NO LONGER NEEDED THANKS TO THE REXEG PATTERN-BASED VALIDATION)
  //APPLIES PASSWORD VALIDATION WITH THE FOLLOWING RULES:
  
  // 8 CHARACTERS MIN
  //ONE UPPERCASE LETTER MIN
  //ONE LOWERCASED LETTER MIN
  //ONE DIGIT (NUMBER)
  //ALLOWS SPECIAL CHARECTERS OF THE FOLLOWING : (!@#$%^&*)

  $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/';
  return preg_match($passwordPattern, $this->password);
}

//SIGNUP CHECK FUNCTION
private function isValidSignup() {
  return $this->emptyInputSignup() && $this->emailConditionsMet() && $this->pwdMatch() && $this->passwordConditionsMet();
}

//PASSWORD MATCHING FUNCTION
private function pwdMatch() {
  return $this->password === $this->pwdRepeat;
}

  //PASSWORD MATCH FUNCTION
private function uidExists() {
  return $this->checkUser($this->email);
  }
}
//END OF CLASS