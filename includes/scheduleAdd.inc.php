<?php
  
  $pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');

  //CHECKS IF THE FORM IS EMPTY, IF YES THEN START ERROR HANDLING


  //SCHEDULE STATUS
  $scheduleStatus = $_POST['scheduleStatus'];

  // DAYS
  $weekDays = $_POST['days'];

  //SCHEDULE TIME
  $time = $_POST['time'];
  
  //TIME VALUE
  $scheduleOpen = $_POST['scheduleOpen']; 
  $scheduleEnd = $_POST['scheduleEnd']; 
  
  //IF THE SELECTION ELEMNT IS ON NOON THEN UPDATE THE SCHEDULE WITH THE FORM DATA TO THE DB
    if($time == 'noon') {
      $sql = "UPDATE schedule SET timeNoonOpening = :scheduleOpen, timeNoonEnd = :scheduleEnd WHERE days = :weekDays";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':scheduleOpen' => $scheduleOpen,
        ':scheduleEnd' => $scheduleEnd,
        ':weekDays' => $weekDays
    ]);
    //ELSE IF THE SELECTION ELEMNT IS ON NIGHT THEN UPDATE THE SCHEDULE WITH THE FORM DATA TO THE DB
  } elseif ($time == 'night') {
    $sql = "UPDATE schedule SET timeNightOpening = :scheduleEnd, timeNightEnd = :scheduleEnd WHERE days = :weekDays";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':scheduleOpen' => $scheduleOpen,
      ':scheduleEnd' => $scheduleEnd,
      ':weekDays' => $weekDays
    ]); 
}

    if ($scheduleStatus == 'scheduleClosed' && $time == 'noon'){
      $sql = "UPDATE schedule SET timeNoonOpening = 'Fermée', timeNoonEnd = 'Fermée' WHERE days = :weekDays";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':weekDays' => $weekDays
    ]); 
  }  elseif ($scheduleStatus == 'scheduleClosed' && $time == 'night'){
    $sql = "UPDATE schedule SET timeNightOpening = 'Fermée',  timeNightEnd = 'Fermée' WHERE days = :weekDays";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':weekDays' => $weekDays
  ]); 
}

//ERROR HANDLING
if (!empty($_POST['days']) || !empty($_POST['time']) || !empty($_POST['scheduleOpen']) || !empty($_POST['scheduleEnd'])) {
  header("Location: ../admin/modify_timetable.php?error=none");
    exit();
  } else {
    header("Location: ../admin/modify_timetable.php?error=upload_failed");
    exit();
  }