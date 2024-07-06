<!-- Navigation -->
<?php 
include 'php/nav.php'; 

// Check if the user is logged in
if (isset($_SESSION['loggedusername']) && $_SESSION['loggedusername'] !== NULL) {
    // If logged in, display the username
    $loggedusername = $_SESSION['loggedusername'];
    $welcome_message = 'Welcome, ' . $loggedusername . '!';
} else {
    // If not logged in, redirect to login.php with a warning message
    header('Location: login.php?message=login_required');
    exit();
}

// Set the initial date and time
date_default_timezone_set('America/New_York'); // Set your desired timezone
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SmileCare | My Profile</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            // Function to update the date and time dynamically
            function updateTime() {
                var now = new Date();
                var year = now.getFullYear();
                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                var day = ("0" + now.getDate()).slice(-2);
                var hours = ("0" + now.getHours()).slice(-2);
                var minutes = ("0" + now.getMinutes()).slice(-2);
                var seconds = ("0" + now.getSeconds()).slice(-2);
                var currentDate = year + "-" + month + "-" + day;
                var currentTime = hours + ":" + minutes + ":" + seconds;
                document.getElementById('currentDate').innerHTML = "Date: " + currentDate;
                document.getElementById('currentTime').innerHTML = "Time: " + currentTime;
            }

            // Update the time every second
            setInterval(updateTime, 1000);
        });
    </script>
</head>
<body>
<!-- Booking -->
<section class="profile mt-md-5 pt-md-5"> 
  <div class="container">
      <div class="row">
          <div class="col-12 col-md-12">
              <div class="container">
                  <?php echo "<h1 class='userheading2'>$welcome_message</h1>"; ?>
                  
                  <!-- Display the current date and time in heading 3 -->
                  <div class="datetime">
                    <h6 id="currentDate"><?php echo "Date: " . $currentDate; ?></h6>
                    <h6 id="currentTime"><?php echo "Time: " . $currentTime; ?></h6>
                  </div>
                  
                  <?php include 'get_booking.php'; ?>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Footer -->
<?php include 'php/footer.php'?>

<!-- Include form calendar JavaScript file -->
<script src="js/calendar.js"></script>
<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-fQybjgWLrvvRgtW6mP1kWjWLMi0a3By4z+F3uIdYIk6Xk/XA3yUhbq1XGdUKp3dg" crossorigin="anonymous"></script>
<!-- Load Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7HibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Load Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</body>
</html>
