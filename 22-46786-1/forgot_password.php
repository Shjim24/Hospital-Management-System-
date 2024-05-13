<?php
session_start();

require("connection.php");
require("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_identifier = $_POST['user_identifier'];

    $query = "SELECT * FROM users WHERE user_name = '$user_identifier' OR email = '$user_identifier' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);

        $temp_password = bin2hex(random_bytes(4)); 

        $user_id = $user_data['user_id'];
        $update_query = "UPDATE users SET password = '$temp_password' WHERE user_id = '$user_id'";
        mysqli_query($con, $update_query);

        echo "Your temporary password is: $temp_password. Please use this to log in and then change your password immediately.";
    } else {
        echo "User not found. Please check your username or email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        body {
            font-family: Georgia, serif;
            background-color: #BFFF00;
            margin: 0;
            padding: 0;
        }

        #box {
            background-color: #000;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        #button {
            width: 100%;
            padding: 10px;
            background-color: #AA00FF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #6B238F; 
        }

        a {
            text-decoration: none;
            color: #fff;
            display: block;
            text-align: center;
        }

        a:hover {
            color:#6B238F ; 
        }
    </style>
</head>
<body>
<main id="box">
    <form method="post">
        <h2>Forget Password</h2>
        <p>Enter your username or email address to reset your password.</p>

        <input type="text" name="user_identifier" placeholder="Username or Email"><br><br>

        <input id="button" type="submit" value="Reset Password"><br><br>

        <a href="login.php">Back to Login</a><br><br>
    </form>
</main>
</body>
</html>
