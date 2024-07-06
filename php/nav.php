<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <img src="images/menu.png">
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <span class="navbar-text ml-auto call"><img src="images/call.png" />0481 301 479</span> 
                <?php 
                session_start();
                if(isset($_SESSION['loggedusername'])) {
                    echo '<div class="btn-group ml-2">';
                    echo '<button type="button" class="btn login-btn booking-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    echo $_SESSION['loggedusername'];
                    echo '</button>';
                    echo '<div class="dropdown-menu">';
                    echo '<a class="dropdown-item" href="profile.php">Dashboard</a>';
                    echo '<a class="dropdown-item" href="#">Account</a>';
                    echo '<a class="dropdown-item" href="booking.php">Book Appointment</a>';
                    echo '<a class="dropdown-item" href="#">Settings</a>';
                    echo '<div class="dropdown-divider"></div>';
                    echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<a class="btn booking-btn ml-2" href="logout.php">Logout</a>';

                } else {
                    
                    echo '<a class="btn booking-btn ml-2" href="booking.php">Make Appointment</a>';
                    echo '<a class="btn login-btn booking-btn ml-2" href="login.php">Login</a>';
                
                }
                ?>
            </div>
        </nav>
    </div>
</div>
