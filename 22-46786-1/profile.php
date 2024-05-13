<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Georgia, serif;
            background-color: #BFFF00;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff
            color: ##0095FF;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #fff;
            text-decoration: none;
        }

        h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #000;
}

        form {
            background-color: #000;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px auto;
            color: #fff;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #AA00FF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #6B238F;
        }
    </style>
</head>
<body>

<?php
session_start();

require("connection.php");
require("functions.php");
require("header.php");
$user_data = check_login($con);

if (!$user_data) {
    header("Location: login.php");
    exit();
}


$stmt = $con->prepare("SELECT * FROM users WHERE user_id = ?"); // Fetch user data using prepared statement
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
?>



<!-- Profile Information -->
<div>
    <h2>User Profile</h2>
    <form action="update_profile.php" method="POST">
        <p><strong>User ID:</strong> <?php echo $row['user_id']; ?></p>
        <p><strong>User Name:</strong> <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>"></p>
        <p><strong>Password:</strong> <input type="password" name="password" value="<?php echo $row['password']; ?>"></p>
        <p><strong>Registration Date:</strong> <?php echo $row['date']; ?></p>
        <input type="submit" value="Update Profile">
    </form>
</div>

<?php
} else {
    echo "Error retrieving user data.";
}
$stmt->close();
$con->close();
?>

</body>
</html>
