<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['upload']) && isset($_FILES['media'])) {
    $username = $_SESSION['user'];
    $file = $_FILES['media'];
    $targetDir = "uploads/$username/";
    $targetFile = $targetDir . basename($file['name']);
    move_uploaded_file($file["tmp_name"], $targetFile);
}

header("Location: dashboard.php");
?>
