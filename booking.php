<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');
  
//EMPTY STRING IN MODAL ERROR HANDLING
//IF THE FOLLOWING POST SUPERGLOBAL VALUES ARE EMPTY THEN ECHOS ERROR MESSAGE & STOPS THE QUERY
if (empty($_POST['platesClient']) || empty($_POST['dateInput']) || empty($_POST['allergiesString'])) {
  echo json_encode(array('message' => 'Remplisser tous les champs!'));
  exit;
} 

$platesNumber = $_POST['platesClient'];
$date = $_POST['dateInput'];

// CHECKS IF THE FIRST POST VALUE IS SET, OTHERWISE USE THE THE SECOND ONE
$hour = isset($_POST['hourInput']) ? $_POST['hourInput'] : $_POST['hourInputNight'];
$hourInputDay = isset($_POST['hourInput']) ? $_POST['hourInput'] : '';
$hourInputNight = isset($_POST['hourInputNight']) ? $_POST['hourInputNight'] : '';

// IF "allergiesString' IS SET THEN FETCH ITS VALUE, OTHERWISE USE AN EMPTY STRING
$publicAllergiesString = isset($_POST['allergiesString']) ? $_POST['allergiesString'] : '';


$sql = "SELECT COUNT(*) as bookingSeats FROM booking WHERE bookingDay = :dateInput";
$query = $pdo->prepare($sql);
$query->bindParam(':dateInput', $date);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

$ReservationLimit = 3;
//IF THE "BOOKINGSEATS" ROW IS NOT EMPTY THEN ASSIGN ITS ROW TO BOOKINGLIMIT
//ELSE ASSIGN 0 TO BOOKINGLIMIT 
$bookingLimit = !empty($row) ? $row['bookingSeats'] : 0; 

if ($bookingLimit < $ReservationLimit) {
  //IF THE USER IS UNDER THE BOOKING LIMIT & HAS WRITEN THEIR ALLERGIES IN THE TEXTAREA
  //SEND ALL REGISTERED DATA FROM MODAL & THE ALLERGIES FROM MODAL
  if ($publicAllergiesString) {
      $sql = "INSERT INTO booking (bookingEmail, bookingDay, bookingTime, bookingSeats, bookingAlergies) VALUES (:email, :dateInput, :hourInput, :platesClient, :allergies)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':allergies', $publicAllergiesString);
      $stmt->bindParam(':email', $_SESSION['userEmail']);
      $stmt->bindParam(':platesClient', $platesNumber);
      $stmt->bindParam(':dateInput', $date);
      $stmt->bindParam(':hourInput', $hour);
      $stmt->execute();
  } else {
    //ELSE SENDS ALLERGIES DATA FROM USER REGISTRATION
      $sql = "INSERT INTO booking (bookingEmail, bookingDay, bookingTime, bookingSeats, bookingAlergies) VALUES (:email, :dateInput, :hourInput, :platesClient, :userAllergies)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':email', $_SESSION['userEmail']);
      $stmt->bindParam(':platesClient', $platesNumber);
      $stmt->bindParam(':dateInput', $date);
      $stmt->bindParam(':hourInput', $hour);
      $stmt->bindParam(':userAllergies', $_SESSION['allergies']);
      $stmt->execute();
  }
  //IF THERE ARE NO ERRORS, SEND SUCCESS MESSAGE
  $response = "Votre réservation a bien été pris en compte! Merci pour votre confiance.";
  echo json_encode(array('message' => $response));
} else{
  echo json_encode(array('message' => 'Nous sommes complets! Essayer a une autre date.'));
}