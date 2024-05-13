<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription and Diagnosis</title>
</head>
<body>
<?php
    // Include the common header
    require "header.php";
    ?>
    <h1>Prescription and Diagnosis</h1>

    <h2>Edit Prescription</h2>
    <?php
    // Sample prescription data (for demonstration purposes)
    $prescription = "Medicine A - 1 tablet daily\nMedicine B - 2 tablets twice daily";
    
    // Handling prescription submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prescription = $_POST["prescription"];
        echo "<p>Prescription Updated Successfully!</p>";
    }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <textarea id="prescription" name="prescription" rows="4" cols="50"><?php echo $prescription; ?></textarea><br><br>
        <input type="submit" value="Save Prescription">
    </form>

    <h2>View Diagnosis Report</h2>
    <?php
    // Sample diagnosis report data (for demonstration purposes)
    $diagnosisReport = "Patient diagnosed with flu. Prescribed rest and plenty of fluids.";

    // Display diagnosis report
    echo "<p>$diagnosisReport</p>";
    ?>

</body>
</html>
