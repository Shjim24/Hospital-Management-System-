<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
</head>
<body>
<?php
    // Include the common header
    require_once "header.php";
    ?>
    <h1>Make Payment</h1>
    <?php
    if(isset($_GET['invoice'])) {
        $invoice_number = $_GET['invoice'];
        echo "<p>Processing payment for Invoice $invoice_number...</p>";
        // Here you can include your payment processing logic
        // For demonstration purposes, let's just simulate processing
        // Sleep for 2 seconds to simulate processing time
        sleep(2);
        echo "<p>Payment for Invoice $invoice_number successful.</p>";
    } else {
        echo "<p>No invoice specified.</p>";
    }
    ?>
    <p><a href="action.php">Go back to Invoice and Payment Management</a></p>
</body>
</html>
