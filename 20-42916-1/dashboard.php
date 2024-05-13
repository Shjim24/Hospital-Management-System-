<!..<?php
session_start();
// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: action.php");
    exit;
}
?>..!>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .box {
            width: 45%;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .box h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

        <br><br><br><br>
    <div class="container">
        <div class="box">
            <h3><a href="doctors_payment.php">Doctor's Payment</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="patient_payment.php">Patient Payment</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="staff_salary.php">Staff Salary</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="refund_discount.php">Refund and Discount</a></h3>
            
        </div>
        <div class="box">
            <h3><a href="report.php">Report</a></h3>
            
        </div>
    </div>
    <button type="submit">logout</button>
    <?php include 'footer.php'; ?>
</body>
</html>
