<?php

function redirectToIndex() {
    header("Location: ../index.php");
    exit();
}

if (!isset($_SESSION['userEmail'])) {
    redirectToIndex();
}

  if ($_SESSION['role_id'] !== '2') {
    redirectToIndex();
  }
