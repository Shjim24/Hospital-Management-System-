<?php
session_start();
// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['fname'])) {
    header("Location: action.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="profile-container">
        <h1>Profile</h1>
        <div class="profile-info">
            <p><strong>Name:</strong> Binty</p>
            <p><strong>Address:</strong> 35/9, Shyamoli</p>
            <p><strong>Gender:</strong> Female</p>
        </div>
    </div>
</body>
</html>
