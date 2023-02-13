<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=backend_db', 'root', '');

$id = $_SESSION['usersID'];

if (isset($_POST['submit'])) {
  $file = $_FILES['file'];

  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 10000000) {
        $fileDestination = 'CV/';
        if (!is_dir($fileDestination)) {
          mkdir($fileDestination, 0777, true);
        }
        $fileDestination = $fileDestination.$fileName;
        move_uploaded_file($fileTmpName, $fileDestination);
        
        $sql = "UPDATE users SET cvArray = :fileDestination WHERE usersID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
          ':fileDestination' => $fileDestination,
          ':id' => $id
        ]);
        header("Location: ../user_profile.php?error=uploadsuccessful");
      } else {
        echo "The file you are trying to upload is too big.";
      }
    } else {
      echo "There was an error uploading your file.";
    }
  } else {
    echo "You cannot upload files of this type.";
  }
}