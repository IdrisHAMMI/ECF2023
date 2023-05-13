<?php

session_start();


$pdo = new PDO('mysql:host=localhost;dbname=ecf_restaurant', 'root', '',);


if (isset($_POST['submit'])) {
  
  $profileImgName = time() . '-' . $_FILES['foodImg']['name'];
  $food_bio = $_POST['gallery_bio'];

  $img_target = '../assets/added_content/' . $profileImgName;

  if (move_uploaded_file($_FILES['foodImg']['tmp_name'], $img_target)) {
    $sql = "INSERT INTO gallery (galleryImg, galleryBio) VALUES (:profileImgName, :food_bio)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':profileImgName' => $profileImgName,
        ':food_bio' => $food_bio
      ]);

  }
}