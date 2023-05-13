<?php
  
  $pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

  // DAYS
  $weekDays = $_POST['days'];

  //SCHEDULE TIME
  $time = $_POST['time'];
  
  //TIME VALUE
  $scheduleOpen = $_POST['scheduleOpen']; 
  $scheduleEnd = $_POST['scheduleEnd']; 
  
  //if(isset($_POST['submit'])) {
    if($time == 'noon') {
      $sql = "UPDATE schedule SET timeNoonOpening = :scheduleOpen, timeNoonEnd = :scheduleEnd WHERE days = :weekDays";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':scheduleOpen' => $scheduleOpen,
        ':scheduleEnd' => $scheduleEnd,
        ':weekDays' => $weekDays
    ]);
  } elseif ($time == 'night') {
    $sql = "UPDATE schedule SET timeNightOpening = :scheduleEnd, timeNightEnd = :scheduleEnd WHERE days = :weekDays";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':scheduleOpen' => $scheduleOpen,
      ':scheduleEnd' => $scheduleEnd,
      ':weekDays' => $weekDays
  ]);
  header('Location: ../admin/modify_timetable.php');
}

