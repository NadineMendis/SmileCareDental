<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SmileCare | About Us</title>
  </head>
  <body>
    <!-- Navigation -->
    <?php include 'php/nav.php'?>

    <!-- Hero Image -->
    <section class="contact-img">
        <div class="container d-flex flex-column align-items-center">
            <h1>Contact Us</h1>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="contact-us">
        <div class="container">
            <h2>Contact Us</h2>
            <form action="php/contact.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <div class="row">
                <div class="col-6">
                <span>Smile Care Dental Clinic</span><br>
                <address>123 Main Street,<br>
                Parramatta, New South Wales, 2700</address>
                Phone: (123) 456-7890<br>
                Email: <a href="mailto:info@smilecareclinic.com">info@smilecareclinic.com</a>
                </div>
                <div class="col-6">
                <span>Opening Hours:</span><br><br>
                Monday - Friday:<span class="italics"> 9:00 AM - 6:00 PM</span><br>
                Saturday:<span class="italics"> 9:00 AM - 1:00 PM</span><br>
                Sunday:<span class="italics"> 9:00 AM - 1:00 PM</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'php/footer.php'?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
