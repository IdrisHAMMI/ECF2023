<?php

session_start();


$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '',);


if (isset($_POST['submit'])) {

  if (empty($_POST['menu_title']) || empty($_POST['menu_schedule']) || empty($_POST['menu_bio'])) {
    header("Location: ../admin/add_menu.php?error=empty_input");
    exit();
  }
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

   header("Location: ../admin/add_menu.php?error=none");
   exit();
 } else {
   // Redirect to the error page if file upload fails
   header("Location: ../admin/menu_add.php?error=upload_failed");
   exit();
}