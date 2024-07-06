<?php
// Start the session
session_start();

// Unset all session variables
unset($_SESSION['username']); // Assuming 'username' is the session variable storing the user's login information


// Redirect to the login page
header("Location: logout.php");
?>
