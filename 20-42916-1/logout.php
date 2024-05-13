<?php
session_start();

// Function to destroy the session and log out the user
function logout() {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Check if the user is logged in before attempting to log out
if (isset($_SESSION['username'])) {
    logout();
} else {
    // If the user is not logged in, redirect them to the login page
    header('Location: login.php');
    exit();
}
?>
