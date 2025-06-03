<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <a href="logout.php">Logout</a>

</head>
<body class="dashboard">
    <div class="container">
        <h2>Selamat datang, <?= $username ?>!</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="media" required>
            <button type="submit" name="upload">Upload</button>
        </form>

        <h3>Media Anda:</h3>
        <div class="gallery">
            <?php
            $files = glob("uploads/$username/*");
            foreach ($files as $file) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo "<img src='$file' class='thumb'>";
                } elseif (in_array($ext, ['mp4', 'webm'])) {
                    echo "<video src='$file' class='thumb' controls></video>";
                }
            }
            ?>
        </div>
        <a href="logout.php">Logout</a>
    </div>
    <script src="script.js"></script>

</body>
</html>
