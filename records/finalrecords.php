<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password
$dbname = "hospital"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient list for viewing records
$patients = $conn->query("SELECT id, first_name, last_name FROM patients");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 30px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f9f9f9;
        }

        td {
            background-color: #fff;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            cursor: pointer;
            padding: 12px;
            border-radius: 8px;
            border: none;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>View Patient Records</h2>
    <form method="GET">
        <div class="form-group">
            <label for="patient_id">Select Patient</label>
            <select id="patient_id" name="patient_id" required>
                <option value="">-- Select Patient --</option>
                <?php while ($row = $patients->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['first_name'] . ' ' . $row['last_name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" name="view_record">View Record</button>
    </form>

    <?php
    // Show records if a patient is selected
    if (isset($_GET['view_record'])) {
        $patient_id = $_GET['patient_id'];

        // Fetch patient diagnosis
        $diagnosis_query = $conn->query("SELECT * FROM diagnoses WHERE patient_id = $patient_id");
        // Fetch patient appointments
        $appointments_query = $conn->query("SELECT * FROM appointments WHERE patient_id = $patient_id");

        // Display diagnoses
        if ($diagnosis_query->num_rows > 0) {
            echo "<h3>Diagnosis History</h3><table><tr><th>Diagnosis</th><th>Treatment</th><th>Doctor's Notes</th></tr>";
            while ($diagnosis = $diagnosis_query->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($diagnosis['diagnosis']) . "</td><td>" . htmlspecialchars($diagnosis['treatment']) . "</td><td>" . htmlspecialchars($diagnosis['doctor_notes']) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No diagnoses found for this patient.</p>";
        }

        // Display appointments
        if ($appointments_query->num_rows > 0) {
            echo "<h3>Appointment History</h3><table><tr><th>Appointment Date</th><th>Status</th></tr>";
            while ($appointment = $appointments_query->fetch_assoc()) {
                echo "<tr><td>" . $appointment['appointment_date'] . "</td><td>" . htmlspecialchars($appointment['status']) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No appointments found for this patient.</p>";
        }
    }
    ?>
</div>

</body>
</html>

