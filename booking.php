<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '');
  
$platesNumber = $_POST['platesClient'];
$date = $_POST['dateInput'];

// Determine the time field based on the selected period
if ($_POST['hourInput'] == '') {
    $hourField = 'timeNightOpening';
} else {
    $hourField = 'timeNoonOpening';
}

// Check if a schedule for the chosen date exists
$sqlCheck = "SELECT schedule_Id FROM schedule WHERE days = :date";
$queryCheck = $pdo->prepare($sqlCheck);
$queryCheck->bindParam(':date', $date);
$queryCheck->execute();
$existingScheduleId = $queryCheck->fetchColumn();

if ($existingScheduleId) {
    // If a schedule exists, update it
    $sql = "UPDATE schedule SET $hourField = :hour WHERE schedule_Id = :scheduleId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':hour', $hour);
    $stmt->bindParam(':scheduleId', $existingScheduleId);
    $stmt->execute();
    $response = "Schedule for date $date has been updated.";
} else {
    // If no schedule exists, insert a new one
    $response = "No schedule found for date $date.";
}

// Return the response to the client
echo json_encode(['message' => $response]);