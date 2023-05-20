<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

// Récupération des données du formulaire
$date = $_POST['date'];
$heure = $_POST['heure'];

// Vérification de la disponibilité des tables pour la date et l'heure données
$sql = "SELECT COUNT(*) as bookingLimit FROM booking WHERE bookingDay = :date AND bookingTime = :heure";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':heure', $heure);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$nb_tables_dispo = $row['bookingLimit'];

// Envoi de la réponse en JSON
$response = 'Disponibilite:' . 3 - $nb_tables_dispo;
echo json_encode($response);
?>