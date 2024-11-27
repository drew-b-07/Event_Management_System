<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="src/css/calendar.css">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/main.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2>Admin </h2>
            <ul>
                <li><a href="#" class="nav-link active" data-section="dashboard">Dashboard</a></li>
                <li><a href="#" class="nav-link" data-section="appointments">Manage Appointments</a></li>
                <li><a href="#" class="nav-link" data-section="patients">Patients</a></li>
                <li><a href="#" class="nav-link" data-section="reports">Reports</a></li>
                <li><a href="#" class="nav-link" data-section="settings">Settings</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="content">
            
            <section id="dashboard" class="section active">
                <h1>Dashboard</h1>
            </section>

            <section id="appointments" class="section">
                <h1>Manage Appointments</h1>
                <div id="calendar"></div>
            </section>
                       
            <!-- Add FullCalendar Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.5/index.global.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var calendarEl = document.getElementById('calendar');
            
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth', // Default month view
                        headerToolbar: {
                            left: 'prev,next today', // Navigation buttons
                            center: 'title',         // Title (November 2024)
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        events: [
                            {
                                title: 'Doctor Appointment',  // Example predefined events
                                start: '2024-11-25',
                            },
                        ],
                        contentHeight: 'auto', // Automatically adjust height for responsiveness
                        aspectRatio: 1.35,    // Default aspect ratio
                        editable: true,        // Allow drag-and-drop of events
                        dayMaxEvents: true,    // Limit the number of events per day
                    });
            
                    calendar.render();
                });
            </script>
            
            <section id="patients" class="section">
                <h1>Patients</h1>
                
            </section>

            
            <section id="reports" class="section">
                <h1>Reports</h1>
                
            </section>

            
            <section id="settings" class="section">
                <h1>Settings</h1>
               
            </section>
        </main>
    </div>

    <script src="src/js/app.js"></script>
</body>
</html>