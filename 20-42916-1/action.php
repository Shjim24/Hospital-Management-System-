<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST["fname"]) && isset($_POST["password"])) {
        $username = $_POST["fname"];
        $password = $_POST["password"];
        
        // Perform your validation here (e.g., check against a database)
        // For simplicity, I'll just compare against hard-coded values
        $valid_usernames = ["binty", "moumet","a"]; // Example valid usernames
        $valid_passwords = ["123456", "654321","a"]; // Example valid passwords

        // Check if the username exists and password matches
        $index = array_search($username, $valid_usernames);
        if ($index !== false && $valid_passwords[$index] == $password) {
            // Authentication successful, redirect to dashboard or homepage
            $_SESSION["fname"] = $username;
            header("Location: home.php");
            exit;
        } else {
            // Authentication failed
            $error = "Invalid username or password";
        }
    } else {
        // Username or password not set
        $error = "Please enter username and password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <form action="" method="POST">
            <h2>Login</h2>
            <?php if (isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <input type="text" name="fname" placeholder="Username"   >
            <input type="password" name="password" placeholder="Password"   >
            <button type="submit">Login</button>
            <a href="forgot_password.php">Forgot Password?</a>
            <a href="register.html">Register</a>
        </form>
    </div>
</body>
</html>
