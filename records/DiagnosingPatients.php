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

// Handle patient diagnosis
if (isset($_POST['submit_diagnosis'])) {
    $patient_id = $_POST['patient_id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $doctor_notes = $_POST['doctor_notes'];

    // Insert diagnosis into the database
    $sql = "INSERT INTO diagnoses (patient_id, diagnosis, treatment, doctor_notes) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $patient_id, $diagnosis, $treatment, $doctor_notes);

    if ($stmt->execute()) {
        echo "<script>alert('Diagnosis recorded successfully!');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch patient list for diagnosis
$patients = $conn->query("SELECT id, first_name, last_name FROM patients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnose Patient</title>
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

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        textarea, select, button {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 100px;
        }

        select {
            background-color: #f9f9f9;
        }

        button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group:last-child {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Diagnose Patient</h2>
<form method="POST">
    <div class="form-group">
        <label for="patient_id">Select Patient</label>
        <select id="patient_id" name="patient_id" required>
            <option value="">-- Select Patient --</option>
            <?php while ($row = $patients->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['first_name'] . ' ' . $row['last_name'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="diagnosis">Diagnosis</label>
        <textarea id="diagnosis" name="diagnosis" required></textarea>
    </div>
    <div class="form-group">
        <label for="treatment">Treatment</label>
        <textarea id="treatment" name="treatment" required></textarea>
    </div>
    <div class="form-group">
        <label for="doctor_notes">Doctor's Notes</label>
        <textarea id="doctor_notes" name="doctor_notes" required></textarea>
    </div>
    <button type="submit" name="submit_diagnosis">Record Diagnosis</button>
</form>
</body>
</html>
