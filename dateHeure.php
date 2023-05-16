<?php

$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

// Récupération des données du formulaire
$jour = $_POST['jour'];


$sql = "SELECT timeNoonOpening, timeNoonEnd FROM schedule WHERE days= :jour";
$requete = $pdo->prepare($sql);
$requete->bindParam(':jour', $jour);
$requete->execute();



$row = $requete->fetch(PDO::FETCH_ASSOC);

$heureDebut = $row['timeNoonOpening'];
$heureFin = $row['timeNoonEnd'];

  $ouverture = strtotime($heureDebut); // Heure d'ouverture du restaurant
  $fermeture = strtotime($heureFin); // Heure de fermeture du restaurant
  
  $pas = 15 * 60; // Pas de 15 minutes en secondes
  
  for ($heure = $ouverture; $heure < $fermeture; $heure += $pas) {
      $heure_format = date('H:i', $heure);
      $options[] = ['label' => $heure_format, 'value' => $heure_format];                          
  }

  
  $options_json = json_encode([$options]);
  header('Content-Type: application/json');
  echo $options_json;