<?php
session_start();

require("connection.php");
require("functions.php");

$user_data = check_login($con);


if (!$user_data) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];
    $user_name = sanitize_input($_POST['user_name']);
    $password = sanitize_input($_POST['password']);

    $stmt = $con->prepare("UPDATE users SET user_name = ?, password = ? WHERE user_id = ?");
    $stmt->bind_param("ssi", $user_name, $password, $user_id);

    if ($stmt->execute()) {
       
        header("Location: update_profile.php");
        exit();
    } else {
      
        header("Location: profile.php?update=error");
        exit();
    }
} else {
    
    header("Location: profile.php");
    exit();
}
?>
