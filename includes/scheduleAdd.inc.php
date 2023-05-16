<?php
  
  $pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

  if (empty($_POST['days']) || empty($_POST['time']) || empty($_POST['scheduleOpen']) || empty($_POST['scheduleEnd'])) {
    header("Location: ../admin/modify_timetable.php?error=empty_input");
    exit();
  }

  // DAYS
  $weekDays = $_POST['days'];

  //SCHEDULE TIME
  $time = $_POST['time'];
  
  //TIME VALUE
  $scheduleOpen = $_POST['scheduleOpen']; 
  $scheduleEnd = $_POST['scheduleEnd']; 
  
  
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
}

if (!empty($_POST['days']) || !empty($_POST['time']) || !empty($_POST['scheduleOpen']) || !empty($_POST['scheduleEnd'])) {
  header("Location: ../admin/modify_timetable.php?error=none");
    exit();
  } else {
    // Redirect to the error page if file upload fails
    header("Location: ../admin/modify_timetable.php?error=upload_failed");
    exit();
  }