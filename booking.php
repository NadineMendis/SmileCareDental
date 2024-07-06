<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SmileCare | Make an Appointment</title>
</head>
<body>
<!-- Navigation -->
<?php include 'php/nav.php'?>

<!-- Booking -->
<section class="booking mt-md-5 pt-md-5"> 
  <div class="container">
      <div class="row">
          <div class="col-12 col-md-3">
              <div class="calendar">
                  <div class="calendar-header d-flex justify-content-between align-items-center">
                      <button class="btn btn-link arrow" id="prevMonth"><img src="images/arrow-left.png"></button>
                      <h2 id="currentMonth">May 2024</h2>
                      <button class="btn btn-link arrow" id="nextMonth"><img src="images/arrow.png"></button>
                  </div>
                  <div class="calendar-body">
                      <!-- Days will be added here -->
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-9">
            <!-- Availabilities -->
            <div class="container">
                <!-- Add heading with username -->
                <?php if (isset($_SESSION['loggedusername'])): ?>
                    <h3 class="userheading"><span><?php echo $_SESSION['loggedusername']; ?></span>, please book from below available schedule:</h3>
                <?php endif; ?>
                <div class="row">
                    <h4 id="selectedDate">19 May 2024</h4>
                    <div class="availability hidden">
                        <!-- Times will be added here -->
                    </div>
                    <a class="btn booking-btn ml-2" href="#" id="submitBooking">Submit</a>
                </div>
            </div>
          </div>
      </div>
  </div>
</section>

<!-- Footer -->
<?php include 'php/footer.php'?>

<script src="js/calendar.js"></script>

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-fQybjgWLrvvRgtW6mP1kWjWLMi0a3By4z+F3uIdYIk6Xk/XA3yUhbq1XGdUKp3dg" crossorigin="anonymous"></script>
<!-- Load Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Load Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7HibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
-->
</body>
</html>