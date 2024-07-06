document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signupForm");
    const usernameInput = document.getElementById("username");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");
    const contactInput = document.getElementById("contact");
    const zipInput = document.getElementById("zip");

    // Email Validation
    function checkEmail() {
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailInput.value.match(emailPattern)) {
            document.getElementById("emailError").textContent = "Please enter a valid email";
            return false;
        } else {
            document.getElementById("emailError").textContent = "";
            return true;
        }
    }

    // Password Validation
    function checkPassword() {
        const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordInput.value.match(passPattern)) {
            document.getElementById("passwordError").textContent = "Please enter at least 8 characters with at least one uppercase letter, one lowercase letter, one numeric digit, and one special character.";
            return false;
        } else {
            document.getElementById("passwordError").textContent = "";
            return true;
        }
    }

    // Confirm Password Validation
    function confirmPass() {
        if (passwordInput.value !== confirmPasswordInput.value || confirmPasswordInput.value === "") {
            document.getElementById("confirmPasswordError").textContent = "Passwords do not match!";
            return false;
        } else {
            document.getElementById("confirmPasswordError").textContent = "";
            return true;
        }
    }

    // Contact Number Validation
    function checkContact() {
        const contactPattern = /^\d{10}$/;
        if (!contactInput.value.match(contactPattern)) {
            document.getElementById("contactError").textContent = "Please enter a valid 10-digit contact number";
            return false;
        } else {
            document.getElementById("contactError").textContent = "";
            return true;
        }
    }

    // ZIP Code Validation
    function checkZIP() {
        const zipPattern = /^\d{4}$/;
        if (!zipInput.value.match(zipPattern)) {
            document.getElementById("zipError").textContent = "ZIP code must be 4 digits";
            return false;
        } else {
            document.getElementById("zipError").textContent = "";
            return true;
        }
    }

    // Form Submission Validation
    form.addEventListener("submit", function(event) {
        if (!checkEmail() || !checkPassword() || !confirmPass() || !checkContact()) {
            event.preventDefault();
        }
    });

    // Add event listeners for input validation
    emailInput.addEventListener("keyup", checkEmail);
    passwordInput.addEventListener("keyup", checkPassword);
    confirmPasswordInput.addEventListener("keyup", confirmPass);
    contactInput.addEventListener("keyup", checkContact);
    zipInput.addEventListener("keyup", checkZIP);
});
