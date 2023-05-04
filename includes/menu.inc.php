<?php

session_start();


$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '',);


if (isset($_POST['submit'])) {
  
  $menuTitle = $_POST['menu_title'];

  $menuSchedule = $_POST['menu_schedule'];
  
  $menuTitle = $_POST['menu_bio'];

    $sql = "INSERT INTO menu (menuTitle, menuSchedule, menuDescriptionPrice) VALUES (:menu_title, :menu_schdedule, :menu_bio)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':menu_title' => $menuTitle,
        ':menu_schdedule' => $menuSchedule,
        ':menu_bio' => $menuTitle
   ]);
}