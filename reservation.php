<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');
  
  $nombre_couverts = $_POST['platesClient'];
  $date = $_POST['dateInput'];
  if($_POST['hourInput'] == '') {
    $heure = $_POST['hourInputNight'];
  } else {
    $heure = $_POST['hourInput'];
  }

$sql = "SELECT COUNT(*) as bookingLimit FROM booking WHERE bookingDay=:date AND bookingTime=:heure";
$requete = $pdo->prepare($sql);
$requete->bindParam(':date', $date);
$requete->bindParam(':heure', $heure);
$requete->execute();

$row = $requete->fetch(PDO::FETCH_ASSOC);

// Vérification de la disponibilité des tables
if ($row['bookingLimit'] < 3) {

    $sql = "INSERT INTO booking (bookingEmail, bookingDay, bookingTime, bookingSeats, bookingAlergies) VALUES (:email, :dateInput, :hourInput, :platesClient, :allergies)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $_SESSION['userEmail']);
    $stmt->bindParam(':platesClient', $nombre_couverts);
    $stmt->bindParam(':dateInput', $date);
    $stmt->bindParam(':hourInput', $heure);
    $stmt->bindParam(':allergies', $_SESSION['allergies']);
    $stmt->execute();
    $response = "Nombre de couverts : " . $nombre_couverts . "\n";
    $response .= "Date : " . $date;
    
    $response = array('bookingLimit' => $nombre_couverts);
    echo json_encode($response);
  } else {
    return "COMPLET"; // Si toutes les tables sont réservées, renvoie la réponse "COMPLET"
  }