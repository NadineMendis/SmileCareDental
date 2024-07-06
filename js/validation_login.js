$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('message') === 'login_required') {
        alert('You need to log in to access this page.');
    }

    $('#login-form').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = 'profile.php';
                } else {
                    $('#error-message').text(response.message).show();
                }
            },
            error: function() {
                $('#error-message').text('An error occurred. Please try again.').show();
            }
        });
    });
});


/*document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("login-form");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");

    // Function to validate the login form
    function validateLogin() {
        let isValid = true;

        // Clear any previous error messages
        errorMessage.style.display = "none";
        errorMessage.textContent = "";

        // Basic validation checks
        if (usernameInput.value.trim() === "") {
            errorMessage.textContent = "Username is required.";
            isValid = false;
        } else if (passwordInput.value.trim() === "") {
            errorMessage.textContent = "Password is required.";
            isValid = false;
        }

        // Show error message if invalid
        if (!isValid) {
            errorMessage.style.display = "block";
        }

        return isValid;
    }

    // Form submission event listener
    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        if (validateLogin()) {
            const formData = new FormData(loginForm);

            // Send login request via AJAX
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "profile.php";
                } else {
                    errorMessage.textContent = data.message;
                    errorMessage.style.display = "block";
                }
            })
            .catch(error => {
                errorMessage.textContent = "Invalid username or password!";
                errorMessage.style.display = "block";
            });
        }
    });
});*/
