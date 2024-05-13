<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        input[type="time"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-bottom: 10px;
        }

        .appointment-section {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<?php
    // Include the common header
    require "header.php";
    ?>
    <h1>Appointment Booking</h1>

    <?php
    // Initialize appointment array
    $appointments = array();

    // Sample previous appointments (for demonstration purposes)
    $appointments[] = array("date" => "2024-03-10", "time" => "09:00 AM");
    $appointments[] = array("date" => "2024-03-15", "time" => "02:30 PM");

    // Handling form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedDate = $_POST["appointment_date"];
        $selectedTime = $_POST["appointment_time"];

        // Store the new appointment
        $appointments[] = array("date" => $selectedDate, "time" => $selectedTime);

        echo "<div class='appointment-section'>";
        echo "<h2>Appointment Confirmed</h2>";
        echo "<p>Date: $selectedDate</p>";
        echo "<p>Time: $selectedTime</p>";
        echo "</div>";
    }
    ?>

    <div class="appointment-section">
        <h2>Upcoming Appointments</h2>
        <?php
        // Display upcoming appointments
        foreach ($appointments as $appointment) {
            $date = $appointment["date"];
            $time = $appointment["time"];
            echo "<p>Date: $date | Time: $time</p>";
        }
        ?>
    </div>

    <div class="appointment-section">
        <h2>Previous Appointments</h2>
        <?php
        // Sample previous appointments (for demonstration purposes)
        foreach ($appointments as $appointment) {
            $date = $appointment["date"];
            $time = $appointment["time"];
            echo "<p>Date: $date | Time: $time</p>";
        }
        ?>
    </div>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="appointment_date">Select Date:</label><br>
        <input type="date" id="appointment_date" name="appointment_date" required><br><br>

        <label for="appointment_time">Select Time:</label><br>
        <input type="time" id="appointment_time" name="appointment_time" required><br><br>

        <input type="submit" value="Book Appointment">
    </form>
</body>
</html>
