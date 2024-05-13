<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search</title>
</head>
<body>
<?php
    require "header.php";
    ?>
    <h1>Doctor Search</h1>

    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="specialization">Select Specialization:</label>
        <select id="specialization" name="specialization">
            <option value="">All Specializations</option>
            <option value="General Physician">General Physician</option>
            <option value="Dermatologist">Dermatologist</option>
            <option value="Cardiologist">Cardiologist</option>
            <option value="Pediatrician">Pediatrician</option>

        </select>
        <input type="submit" value="Search">
    </form>

    <?php
    $doctors = array(
        array("name" => "Dr. John Doe", "specialization" => "General Physician", "location" => "City Hospital"),
        array("name" => "Dr. Emily Smith", "specialization" => "Dermatologist", "location" => "Skin Clinic"),
        array("name" => "Dr. Michael Johnson", "specialization" => "Cardiologist", "location" => "Heart Center"),
        array("name" => "Dr. Sarah Lee", "specialization" => "Pediatrician", "location" => "Children's Hospital"),
        array("name" => "Dr. David Brown", "specialization" => "General Physician", "location" => "City Clinic"),
        array("name" => "Dr. Jennifer Adams", "specialization" => "Dermatologist", "location" => "Skin Care Center"),
        array("name" => "Dr. Christopher White", "specialization" => "Cardiologist", "location" => "Heart Clinic"),
        array("name" => "Dr. Amanda Miller", "specialization" => "Pediatrician", "location" => "Pediatric Hospital"),
        array("name" => "Dr. Daniel Wilson", "specialization" => "General Physician", "location" => "Medical Center"),
        array("name" => "Dr. Olivia Moore", "specialization" => "Dermatologist", "location" => "Beauty Clinic"),
        array("name" => "Dr. Samuel Clark", "specialization" => "Cardiologist", "location" => "Cardiac Care Center"),
        array("name" => "Dr. Sophia Taylor", "specialization" => "Pediatrician", "location" => "Children's Health Clinic"),
        array("name" => "Dr. Ethan Martinez", "specialization" => "General Physician", "location" => "Family Health Center"),
        array("name" => "Dr. Victoria Anderson", "specialization" => "Dermatologist", "location" => "Skin Health Clinic"),
        array("name" => "Dr. Matthew Thomas", "specialization" => "Cardiologist", "location" => "Heart and Vascular Center"),
        array("name" => "Dr. Chloe Hernandez", "specialization" => "Pediatrician", "location" => "Pediatric Care Clinic"),
        array("name" => "Dr. Ethan Allen", "specialization" => "General Physician", "location" => "Primary Care Clinic"),
        array("name" => "Dr. Lily Garcia", "specialization" => "Dermatologist", "location" => "Cosmetic Dermatology Clinic"),
        array("name" => "Dr. Mason Rodriguez", "specialization" => "Cardiologist", "location" => "Cardiovascular Institute"),
        array("name" => "Dr. Harper Perez", "specialization" => "Pediatrician", "location" => "Pediatric Medical Group"),
        array("name" => "Dr. Leo Sanchez", "specialization" => "General Physician", "location" => "Community Health Clinic"),
        array("name" => "Dr. Bella Rivera", "specialization" => "Dermatologist", "location" => "Skin and Laser Clinic"),
        array("name" => "Dr. Lucas Carter", "specialization" => "Cardiologist", "location" => "Cardiovascular Health Center"),
        array("name" => "Dr. Stella Flores", "specialization" => "Pediatrician", "location" => "Pediatric Associates"),
        array("name" => "Dr. Jack Hill", "specialization" => "General Physician", "location" => "Health and Wellness Center"),
        array("name" => "Dr. Penelope Scott", "specialization" => "Dermatologist", "location" => "Dermatology Center"),
        array("name" => "Dr. Sebastian Evans", "specialization" => "Cardiologist", "location" => "Heart Specialist Clinic"),
        array("name" => "Dr. Hazel Ward", "specialization" => "Pediatrician", "location" => "Pediatric Care Center"),
        array("name" => "Dr. Logan Murphy", "specialization" => "General Physician", "location" => "Urgent Care Clinic"),
        array("name" => "Dr. Jasmine Reed", "specialization" => "Dermatologist", "location" => "Advanced Dermatology Clinic"),
        array("name" => "Dr. Nathan Price", "specialization" => "Cardiologist", "location" => "Heart Care Clinic"),
        array("name" => "Dr. Hailey King", "specialization" => "Pediatrician", "location" => "Children's Medical Center"),
        array("name" => "Dr. Lincoln Barnes", "specialization" => "General Physician", "location" => "Family Medicine Clinic"),
        array("name" => "Dr. Isabella Cooper", "specialization" => "Dermatologist", "location" => "Skin Cancer Center"),
        array("name" => "Dr. Cooper Wilson", "specialization" => "Cardiologist", "location" => "Cardiovascular Clinic"),
        array("name" => "Dr. Maya Moore", "specialization" => "Pediatrician", "location" => "Pediatric Hospital"),
        array("name" => "Dr. Adrian Foster", "specialization" => "General Physician", "location" => "Primary Care Medical Center"),
        array("name" => "Dr. Elise Robinson", "specialization" => "Dermatologist", "location" => "Dermatology and Skin Care Clinic"),
        array("name" => "Dr. Owen Diaz", "specialization" => "Cardiologist", "location" => "Heart and Vascular Clinic"),
        array("name" => "Dr. Grace Bailey", "specialization" => "Pediatrician", "location" => "Pediatric Care Associates"),
        array("name" => "Dr. Julian Powell", "specialization" => "General Physician", "location" => "Primary Health Clinic"),
        array("name" => "Dr. Ruby Reed", "specialization" => "Dermatologist", "location" => "Skin Health and Beauty Clinic"),
        array("name" => "Dr. Jackson Clark", "specialization" => "Cardiologist", "location" => "Heart Center"),
        array("name" => "Dr. Amelia Roberts", "specialization" => "Pediatrician", "location" => "Pediatric Wellness Clinic"),
        array("name" => "Dr. Ethan Patterson", "specialization" => "General Physician", "location" => "Community Health Center"),
        array("name" => "Dr. Sophie James", "specialization" => "Dermatologist", "location" => "Skin Clinic"),
        array("name" => "Dr. Owen Turner", "specialization" => "Cardiologist", "location" => "Heart and Vascular Health Clinic"),
        array("name" => "Dr. Lucy Adams", "specialization" => "Pediatrician", "location" => "Pediatric Medical Clinic"),
        array("name" => "Dr. Luke Harrison", "specialization" => "General Physician", "location" => "Primary Care Medical Group"),
        array("name" => "Dr. Leah Scott", "specialization" => "Dermatologist", "location" => "Dermatology Care Clinic"),
        array("name" => "Dr. Oliver Martinez", "specialization" => "Cardiologist", "location" => "Heart Clinic"),
        array("name" => "Dr. Lily Gray", "specialization" => "Pediatrician", "location" => "Children's Clinic"),
        array("name" => "Dr. William Murphy", "specialization" => "General Physician", "location" => "Family Practice Clinic"),
        array("name" => "Dr. Mia Carter", "specialization" => "Dermatologist", "location" => "Skin Specialist Clinic"),
        array("name" => "Dr. Elijah Adams", "specialization" => "Cardiologist", "location" => "Cardiovascular Institute"),
        array("name" => "Dr. Bella Peterson", "specialization" => "Pediatrician", "location" => "Pediatric Health Center")
       
    );

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["specialization"]) && $_GET["specialization"] != "") {
        $selectedSpecialization = $_GET["specialization"];
        $filteredDoctors = array_filter($doctors, function($doctor) use ($selectedSpecialization) {
            return $doctor["specialization"] == $selectedSpecialization;
        });
    } else {
        $filteredDoctors = $doctors;
    }
    if (!empty($filteredDoctors)) {
        echo "<h2>Doctors:</h2>";
        echo "<ul>";
        foreach ($filteredDoctors as $doctor) {
            echo "<li>{$doctor['name']} - {$doctor['specialization']} ({$doctor['location']})</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No doctors found.</p>";
    }
    ?>

</body>
</html>
