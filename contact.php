<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Dental Care</title>
    <link rel="stylesheet" href="/css/allpages.css">
</head>
<body>
    <header>
        <nav>
            <div class="nav-left">
                <h1>Dental Care</h1>
            </div>
            <ul>
                <li><a href="mainpage.html">Home</a></li>
                <li><a href="service.html">Service</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="profile.html">
                        <div class="profile-icon-button">
                            <img src="/src/img/profile.jpg" alt="Profile" class="profile-icon">
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <section class="contact-content">
        <h2>Contact Us</h2>
        <p>We'd love to hear from you! Please reach out with any questions or to book an appointment.</p>
        <form class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
    </section>
</body>
</html>