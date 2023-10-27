<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

// FETCH FORM DATA
$date = $_POST['date'];
$hour = $_POST['heure'];

// CHECK TABLE AVAILABILITY w/ DATE AND TIME
$sql = "SELECT COUNT(*) as bookingLimit FROM booking WHERE bookingDay = :date AND bookingTime = :heure";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':heure', $hour);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$availableTables = $row['bookingLimit'];

// SEND DATA TO JSON FORMAT
$response = 'Disponibilite:' . 3 - $availableTables;
echo json_encode($response);
