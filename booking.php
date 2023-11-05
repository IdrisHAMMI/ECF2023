<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');
  
  $platesNumber = $_POST['platesClient'];
  $date = $_POST['dateInput'];
  if($_POST['hourInput'] == '') {
    $hour = $_POST['hourInputNight'];
  } else {
    $hour = $_POST['hourInput'];
  }

$sql = "SELECT COUNT(*) as bookingLimit FROM booking WHERE bookingDay=:date AND bookingTime=:heure";
$query = $pdo->prepare($sql);
$query->bindParam(':date', $date);
$query->bindParam(':heure', $hour);
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);


if ($row['bookingLimit'] < 3) {
    $sql = "INSERT INTO booking (bookingEmail, bookingDay, bookingTime, bookingSeats, bookingAlergies) VALUES (:email, :dateInput, :hourInput, :platesClient, :allergies)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $_SESSION['userEmail']);
    $stmt->bindParam(':platesClient', $platesNumber);
    $stmt->bindParam(':dateInput', $date);
    $stmt->bindParam(':hourInput', $hour);
    $stmt->bindParam(':allergies', $_SESSION['allergies']);
    $stmt->execute();
    $response = "Merci d'avoir reservé!";

    echo json_encode(array('message' => $response)); 
} else {
    echo json_encode(array('message' => 'Nous sommes complets!'));
}