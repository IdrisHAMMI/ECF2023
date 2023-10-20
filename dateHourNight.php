<?php

$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

//FETCHING FORM DATA
$days = $_POST['jour'];

$sql = "SELECT timeNightOpening, timeNightEnd FROM schedule WHERE days= :jour";
$query = $pdo->prepare($sql);
$query->bindParam(':jour', $days);
$query->execute();



$row = $query->fetch(PDO::FETCH_ASSOC);

$hourStart = $row['timeNightOpening'];
$hourEnd = $row['timeNightEnd'];


  $opening = strtotime($hourStart); // OPENING HOUR
  $closing = strtotime($hourEnd); // CLOSING HOUR

  $range = 15 * 60;   // HOUR LIST WILL INCREASE BY 15 MINUTES 

  for ($hour = $opening; $hour < $closing; $hour += $range) {
      $hour_format = date('H:i', $hour);
      $options[] = ['label' => $hour_format, 'value' => $hour_format];                          
  }

  
  $options_json = json_encode($options);
  header('Content-Type: application/json');
  echo $options_json;