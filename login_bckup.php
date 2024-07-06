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

    <script>
      $(document).ready(function() {
        // Check if there is a 'message' parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const errorMessage = urlParams.get('message');

        // Display appropriate error message based on the 'message' parameter
        if (errorMessage === 'login_required') {
          alert('You need to log in to access this page.');
        } else if (errorMessage === 'invalid_credentials') {
          $('#error-message').text('Invalid username or password.').show();
        } else if (errorMessage === 'missing_fields') {
          $('#error-message').text('Please fill in all fields.').show();
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
    </script>

    <!-- Footer -->
    <?php include 'php/footer.php'?>

   
    <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/8b/5Dl5L5xdE5K6k1d2c5X5XZdzgGnF1Z7c5pL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybVuHlIZuKrfzW3rxP4swacLcFi2RrJHo6OCGvEB7IYw4v8Y7" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    !-->
    <!-- Include form validation JavaScript file -->
    <script src="js/validation_login.js"></script>
  </body>
</html>