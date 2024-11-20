<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "";     // Your MySQL password
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add a new patient
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_patient'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Insert into database
    $sql = "INSERT INTO patients (first_name, last_name, age,birthday, address, contact)
            VALUES ('$first_name', '$last_name', $age,'$birthday', '$address', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Patient information added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, textarea, select, button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .message {
            text-align: center;
            font-size: 1.1em;
            color: green;
        }
    </style>
</head>
<body>

    <h1>Patient Profile </h1>
    <div class="container">
        <h2>Add Patient Information</h2>
        <form method="POST" onsubmit="return confirmSubmission();">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" min="0" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" pattern="[0-9]{11}">
            </div>
            <button type="submit" name="add_patient">Add Patient</button>
        </form>
    </div>
    <script>
        function confirmSubmission() {
            const firstName = document.getElementById('first_name').value;
            const lastName = document.getElementById('last_name').value;
            const age = document.getElementById('age').value;
            const birthday = document.getElementById('birthday').value;
            const address = document.getElementById('address').value;
            const contact = document.getElementById('contact').value;

            const message = `Please confirm the following details:\n\n` +
                            `First Name: ${firstName}\n` +
                            `Last Name: ${lastName}\n` +
                            `Age: ${age}\n` +
                            `Birthday: ${birthday}\n` +
                            `Address: ${address}\n` +
                            `Contact: ${contact}\n\n` +
                            `Do you want to submit this information?`;

            return confirm(message);
        }
    </script>
</body>
</html>