<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice and Payment Management</title>
</head>
<body>
    <?php
    // Include the common header
    require "header.php";
    ?>
    <h1>Invoice and Payment Management System</h1>
    <h2>Invoice</h2>
    <table border="1">
        <tr>
            <th>Invoice Number</th>
            <th>Amount Due</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>INV001</td>
            <td>$100.00</td>
            <td>Unpaid</td>
            <td><a href="payment.php?invoice=INV001">Pay Now</a></td>
        </tr>
        <!-- Add more invoice rows as needed -->
    </table>
    <h2>Payment History</h2>
    <table border="1">
        <tr>
            <th>Invoice Number</th>
            <th>Payment Date</th>
            <th>Amount Paid</th>
            <th>Status</th>
        </tr>
        <?php
        // Retrieve and display payment history dynamically
        // For demonstration purposes, let's use static data
        $payment_history = array(
            array("INV001", "2024-03-17", "$100.00", "Paid"),
            // Add more payment history entries as needed
        );

        foreach ($payment_history as $payment) {
            echo "<tr>";
            echo "<td>" . $payment[0] . "</td>";
            echo "<td>" . $payment[1] . "</td>";
            echo "<td>" . $payment[2] . "</td>";
            echo "<td>" . $payment[3] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
