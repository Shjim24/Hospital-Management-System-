<?php
session_start();
if (!isset($_SESSION['fname'])) {
    header("Location: action.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Payment Form</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Doctor Payment Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="doctorName">Doctor Name:</label>
            <input type="text" id="doctorName" name="doctorName" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" required>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>

            <input type="submit" name="submit" value="Submit">
        </form>
        <div id="paymentResult">
            <?php
            // Process form data and display payment result
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $doctorName = $_POST["doctorName"];
                $phoneNumber = $_POST["phoneNumber"];
                $amount = $_POST["amount"];

                echo "<p> Dr {$doctorName} has paid {$amount}.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
