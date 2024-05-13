<?php 
session_start();
require("connection.php");
require("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Wrong Username or Password!";
    } else {
        echo "Wrong Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #fff; 
    color: #000; 
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
}

a:hover {
    color: #fff; 
}
    </style>
</head>
<body>

<main id="box">
    <form method="post" onsubmit="return validateForm()">
        <h2>Login</h2>

        <input type="text" id="user_name" name="user_name" placeholder="Username"><br><br>
        <input type="password" id="password" name="password" placeholder="Password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">Create new account</a><br><br>
        <a href="forgot_password.php">Forget Password</a><br><br> 
    </form>
</main>

<script>
    function validateForm() {
        var username = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;

        if (username.trim() == "") {
            alert("Please fill up the Username");
            return false;
        }

        if (password.trim() == "") {
            alert("Please fill up the Password");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
