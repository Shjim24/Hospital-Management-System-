<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Username or Password required!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body {
            font-family: Georgia, serif;
            background-color: #BFFF00;
            margin: 0;
            padding: 0;
        }

        table {
            margin: 100px auto;
            border-collapse: collapse;
            background-color: #000;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
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
            color: #000;
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

        a {
            text-decoration: none;
            color: #fff; 
            display: block;
            text-align: center;
        }

        a:hover {
            color: #fff; 
        }
    </style>
</head>
<body>
    <table border="0" cellspacing="0" cellpadding="20">
        <form method="post">
            <tr>
                <td colspan="2"><h2>Signup</h2></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="user_name" placeholder="Username">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Signup"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="login.php">Click to Login</a><br><br>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>
