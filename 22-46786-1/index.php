<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management System</title>
    <style>
        body {
            font-family: Georgia, serif;
            background-color: #BFFF00;
            margin: 0;
            padding: 0;
            color: #000000; /* Changed text color to black */
        }

        header {
            background-color: #AA00FF; /* Changed header background color */
            color: #000000; /* Changed header text color to black */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #000000; /* Changed link color to black */
            text-decoration: none;
            margin-right: 20px;
        }

        header a:hover {
            text-decoration: underline;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #000000; /* Changed title color to black */
        }

        header + header {
            margin-top: 20px;
        }

        header a:nth-last-child(1) {
            margin-right: 0;
        }

        /* Added style for logout link */
        .logout {
            color: #000000; /* Changed logout link color to black */
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px; /* Added padding to create a little box */
            border: 2px solid #000000; /* Added border to create a little box */
            border-radius: 5px; /* Added border radius for a rounded corner */
        }

        /* Added style for logout link on hover */
        .logout:hover {
            background-color: rgba(0, 0, 0, 0.1); /* Added background color on hover */
        }

        /* Added style for header container */
        .header-container {
            position: relative;
        }

        /* Added style for logout button position */
        .logout-container {
            position: absolute;
            top: 10px;
            right: 20px;
        }

     /* Button Style */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50; /* Green */
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Button Hover Effect */
.button:hover {
    background-color: #45a049; /* Darker Green */
}



    </style>
</head>
<body>

<?php
session_start();

require("connection.php");
require("functions.php");

$user_data = check_login($con);


if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

?>

<!-- Logout Button -->
<?php
if ($user_data) {
    echo "<div class='header-container'>";
    echo "<div class='logout-container'>";
    echo "<a href='?logout=true' class='logout'>Logout</a>"; /* Added class for logout link */
    echo "</div>";
    echo "</div>";
    echo "<br><br>";
}

?>

<!-- Profile Button -->
<header>
    <a href="profile.php" class="button">Profile</a>
</header>

<!-- Title -->
<h1>Hospital Management System</h1>

<!-- Menu Bar -->
<header>
    <a href="appointment.php">Appointment Management</a>
    <a href="prescription and diagonisis.php">Prescription and Diagnosis</a>
    <a href="doctor search.php">Doctor Search</a>
    <a href="blood bank.php">Blood Bank</a>
    <a href="Payment.php">Invoice and Payment Management</a>
</header>

</body>
</html>
