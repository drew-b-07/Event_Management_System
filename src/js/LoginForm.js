function togglePassword(passwordId) {
    const passwordInput = document.getElementById(passwordId);
    const icon = passwordInput.nextElementSibling;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; 
        icon.classList.remove('fa-eye'); 
        icon.classList.add('fa-eye-slash'); 
    } else {
        passwordInput.type = 'password'; 
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function hideAllForms() {
    const forms = ['signUpForm', 'signInForm', 'forgotPasswordForm'];
    forms.forEach(id => {
        const form = document.getElementById(id);
        form.classList.remove('show');
        form.setAttribute('aria-hidden', 'true');
    });
}

function showSignUp() {
    hideAllForms();
    const form = document.getElementById('signUpForm');
    form.classList.add('show');
    form.setAttribute('aria-hidden', 'false');
    document.getElementById('toggle-header').textContent = "REGISTRATION";
}

function showSignIn() {
    hideAllForms();
    const form = document.getElementById('signInForm');
    form.classList.add('show');
    form.setAttribute('aria-hidden', 'false');
    document.getElementById('toggle-header').textContent = "SIGN IN";
}

function showForgotPassword() {
    hideAllForms();
    const form = document.getElementById('forgotPasswordForm');
    form.classList.add('show');
    form.setAttribute('aria-hidden', 'false');
    document.getElementById('toggle-header').textContent = "Forgot Password?";
}

showSignIn();

document.querySelector('#signUpForm form').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = e.target.querySelector('input[type="email"]').value;
    const password = e.target.querySelector('input[type="password"]').value;
    const confirmPassword = e.target.querySelector('input[placeholder="Confirm Password"]').value;

    if (!email.includes('@')) {
        alert('Please enter a valid email.');
    } else if (password.length < 6) {
        alert('Password must be at least 6 characters long.');
    } else if (password !== confirmPassword) {
        alert('Passwords do not match.');
    } else {
        alert('Account created successfully!');
    }
});

document.querySelector('#signInForm form').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = e.target.querySelector('input[type="email"]').value;
    const password = e.target.querySelector('input[type="password"]').value;

    if (email === "test@example.com" && password === "password123") {
        showFeedback('Login successful!', false);
    } else {
        showFeedback('Invalid email or password.', true);
    }
});

function showFeedback(message, isError = false) {
    const feedback = document.createElement('p');
    feedback.textContent = message;
    feedback.style.color = isError ? 'red' : 'green';
    feedback.style.textAlign = 'center';

    document.querySelector('.form-container.show form').appendChild(feedback);
    setTimeout(() => feedback.remove(), 3000);
}