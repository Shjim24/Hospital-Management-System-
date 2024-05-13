<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database
    // Replace 'host', 'username', 'password', and 'database' with your actual database credentials
    $conn = new mysqli('localhost', 'root', '', 'test register');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO regi (firstname, lastname, phone, address, gender, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $firstname, $lastname, $phone, $address, $gender, $email, $password);

    // Set parameters and execute
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    
    if ($stmt->execute()) {
        // Registration successful
        $_SESSION["message"] = "Registration successful. You can now login.";
        header("Location: login.php");
        exit;
    } else {
        // Registration failed
        $_SESSION["error"] = "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
