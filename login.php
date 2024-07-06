<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SmileCare | Home</title>
</head>
<body>
<!-- Navigation -->
<?php include 'php/nav.php'?>

<!-- Error message handling -->
<?php
if(isset($_GET['message']) && !empty($_GET['message'])) {
    $errorMessage = $_GET['message'];
    if($errorMessage === 'invalid_credentials') {
        echo '<div id="error-message" class="alert alert-danger">Invalid username or password.</div>';
    }
}
?>

<!-- Database Login -->
<?php include 'db_login.php'?>

<!-- Login -->
<section id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <div id="error-message" class="alert alert-danger" style="display:none;"></div>
                        <form id="login-form" action="login_process.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <div class="text-center mt-3">
                                <a href="forgot_password.php">Forgot Password?</a>
                            </div>
                            <p class="mt-4">Don't have an account? <a href="signup.php" class="link-info">Register here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-fQybjgWLrvvRgtW6mP1kWjWLMi0a3By4z+F3uIdYIk6Xk/XA3yUhbq1XGdUKp3dg" crossorigin="anonymous"></script>
<!-- Load Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Load Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Login script -->
<script>
    $(document).ready(function() {
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
</script>

<!-- Footer -->
<?php include 'php/footer.php'?>

<style>
    /* Style for the error message */
    #error-message {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }
</style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->
    <!-- Include form validation JavaScript file -->
    <!--<script src="js/validation_login.js"></script>-->

  </body>
</html>