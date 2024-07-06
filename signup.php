<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SmileCare | Sign Up</title>
</head>
<body>
<!-- Database Login -->
<?php include 'db_login.php'?>

<!-- Navigation -->
<?php include 'php/nav.php'?>

<!-- Sign Up -->
<section id="signup">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <!-- Account Section -->
                        <h5 class="text-center">Account Information</h5>
                        <form action="signup_process.php" method="POST" id="signupForm">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                                <small id="usernameError" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <small id="emailError" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <small id="passwordError" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <small id="confirmPasswordError" class="text-danger"></small>
                            </div>
                            <!-- Personal Details Section -->
                            <h5 class="text-center mt-4">Personal Details</h5>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input type="tel" class="form-control" id="contact" name="contact" required>
                                <small id="contactError" class="text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                            </div>
                            <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="street">Street</label>
                               <input type="text" class="form-control" id="street" name="street" required>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="city">City</label>
                               <input type="text" class="form-control" id="city" name="city" required>
                           </div>
                          </div>
                          <div class="form-row">
                           <div class="form-group col-md-6">
                               <label for="state">State</label>
                               <select class="form-control" id="state" name="state" required>
                                  <option value="">Select State</option>
                                  <option value="ACT">Australian Capital Territory</option>
                                  <option value="NSW">New South Wales</option>
                                  <option value="NT">Northern Territory</option>
                                  <option value="QLD">Queensland</option>
                                  <option value="SA">South Australia</option>
                                  <option value="TAS">Tasmania</option>
                                  <option value="VIC">Victoria</option>
                                  <option value="WA">Western Australia</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="zip">Zip</label>
                               <input type="text" class="form-control" id="zip" name="zip" required>
                           </div>
                          </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
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

<!-- Include form validation JavaScript file -->
<script src="js/validation_form.js"></script>

</body>
</html>