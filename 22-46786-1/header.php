<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <style>
        body {
            font-family: Georgia, serif; /* Set font-family to Georgia, serif */
            background-color: #BFFF00; /* Set background color to #BFFF00 */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #AA00FF;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative; /* Added position relative */
        }

        header a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Logout button style */
        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #AA00FF;
            color: #fff;
            border: 2px solid #fff;
            border-radius: 5px;
            padding: 5px 10px;
            font-weight: bold; /* Bold letters */
            cursor: pointer;
        }

        .logout:hover {
            background-color: #7700AA;
        }

        button {
            margin-top: 20px;
            background-color: #AA00FF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #7700AA;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hospital Management System</h1>
        <!-- Logout Button -->
        <button class="logout" onclick="window.location.href='logout.php'">Logout</button>
    </header>

    <header>
        <a href="appointment.php">Appointment Management</a>
        <a href="prescription_and_diagnosis.php">Prescription and Diagnosis</a>
        <a href="doctor_search.php">Doctor Search</a>
        <a href="blood_bank.php">Blood Bank</a>
        <a href="action.php">Invoice and Payment Management</a>
    </header>

    <button onclick="window.location.href='index.php'">Back to Dashboard</button>
</body>
</html>
