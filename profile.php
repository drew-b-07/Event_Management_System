<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Profile</title>
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>
    <div class="profile-container">
        <h2>Patient's Profile</h2>
        <form>
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Schedule:</label>
                <input type="date" name="schedule" required>
            </div>
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Birthday:</label>
                <input type="date" name="birthday" required>
            </div>
            <div class="form-group">
                <label>Middle Initials:</label>
                <input type="text" name="middle_initials">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" required>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input type="number" name="age" required>
            </div>
            <div class="form-group">
                <label>Contact:</label>
                <input type="text" name="contact" required>
            </div>
            <button type="submit" class="submit-button">Submit</button>
            <button type="button" onclick="window.location.href='mainpage.html'" class="back-button">Back</button>
        </form>
    </div>
</body>
</html>