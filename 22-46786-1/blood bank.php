<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management</title>
</head>
<body>
<?php
require "header.php";
?>
<h1>Blood Bank Management</h1>

<div>
    <h2>Donate Blood</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="donor_name">Donor Name:</label><br>
        <input type="text" id="donor_name" name="donor_name" required><br><br>

        <label for="blood_group">Blood Group:</label><br>
        <select id="blood_group" name="blood_group" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br><br>

        <input type="submit" value="Donate">
    </form>

    <?php
    
    $bloodBankFile = "blood_bank.json";

    $bloodBank = [];

    if (file_exists($bloodBankFile)) {
        $jsonContent = file_get_contents($bloodBankFile);
        $bloodBank = json_decode($jsonContent, true);
        
        if ($bloodBank === null) {
            $bloodBank = [];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donor_name"]) && isset($_POST["blood_group"])) {
        $donorName = $_POST["donor_name"];
        $bloodGroup = $_POST["blood_group"];

        // Update blood bank inventory
        if (isset($bloodBank[$bloodGroup])) {
            $bloodBank[$bloodGroup]++;
            echo "<p>$donorName donated blood of group $bloodGroup. Thank you for your donation!</p>";
        } else {
            $bloodBank[$bloodGroup] = 1;
            echo "<p>$donorName donated blood of group $bloodGroup. Thank you for your donation!</p>";
        }

        file_put_contents($bloodBankFile, json_encode($bloodBank));
    }
    ?>
</div>

<div>
    <h2>Blood Distribution</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="recipient_name">Recipient Name:</label><br>
        <input type="text" id="recipient_name" name="recipient_name" required><br><br>

        <label for="blood_group_needed">Blood Group Needed:</label><br>
        <select id="blood_group_needed" name="blood_group_needed" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br><br>

        <input type="submit" value="Distribute">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["recipient_name"]) && isset($_POST["blood_group_needed"])) {
        $recipientName = $_POST["recipient_name"];
        $bloodGroupNeeded = $_POST["blood_group_needed"];

        if (isset($bloodBank[$bloodGroupNeeded]) && $bloodBank[$bloodGroupNeeded] > 0) {
            $bloodBank[$bloodGroupNeeded]--;
            echo "<p>Blood of group $bloodGroupNeeded distributed to $recipientName. We hope it helps!</p>";
        } else {
            echo "<p>Sorry, blood of group $bloodGroupNeeded is not available in the blood bank.</p>";
        }

        file_put_contents($bloodBankFile, json_encode($bloodBank));
    }
    ?>
</div>

<div>
    <h2>Blood Bank</h2>
    <?php
    echo "<table border='1'>";
    echo "<tr><th>Blood Group</th><th>Units Available</th></tr>";
    foreach ($bloodBank as $bloodGroup => $units) {
        echo "<tr><td>$bloodGroup</td><td>$units</td></tr>";
    }
    echo "</table>";
    ?>
</div>
</body>
</html>
