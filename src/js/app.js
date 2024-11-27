document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".nav-link");
    const sections = document.querySelectorAll(".section");

    navLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            // Remove 'active' class from all links
            navLinks.forEach(link => link.classList.remove("active"));

            // Add 'active' class to the clicked link
            link.classList.add("active");

            // Hide all sections
            sections.forEach(section => section.classList.remove("active"));

            // Show the corresponding section
            const sectionId = link.getAttribute("data-section");
            document.getElementById(sectionId).classList.add("active");
        });
    });
});

