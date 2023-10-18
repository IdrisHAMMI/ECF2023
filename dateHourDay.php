<?php

$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

// Récupération des données du formulaire
$days = $_POST['jour'];

$sql = "SELECT timeNoonOpening, timeNoonEnd FROM schedule WHERE days= :jour";
$query = $pdo->prepare($sql);
$query->bindParam(':jour', $days);
$query->execute();



$row = $query->fetch(PDO::FETCH_ASSOC);

$hourStart = $row['timeNoonOpening'];
$hourEnd = $row['timeNoonEnd'];



  $opening = strtotime($hourStart); // OPENING HOUR
  $closing = strtotime($hourEnd); // CLOSING HOUR
  
  $range  = 15 * 60; // Pas de 15 minutes en secondes
  
  for ($hour = $opening; $hour < $closing; $hour += $range ) {
      $hour_format = date('H:i', $hour);
      $options[] = ['label' => $hour_format, 'value' => $hour_format];                          
  }

  
  $options_json = json_encode($options);
  header('Content-Type: application/json');
  echo $options_json;