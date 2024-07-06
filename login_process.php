<?php
// Start the session
session_start();

// Include your database connection code here
include 'db_login.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Get the submitted username and password
        $loggedusername = $_POST['username'];
        $loggedpassword = $_POST['password'];

        // Prepare and execute SQL statement to retrieve user information
        $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $loggedusername);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $db_username, $db_password);
            $stmt->fetch();

            // Debug output
            echo "DB User ID: $user_id <br>";
            echo "DB Username: $db_username <br>";
            echo "DB Password: $db_password <br>";
            echo "Logged Password: $loggedpassword <br>";           

            // Verify the password
            if (password_verify($loggedpassword, $db_password)) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['loggedusername'] = $db_username;
                $_SESSION['loggedin'] = true;

                // Debug output
                echo "True DB User ID: $user_id <br>";
                echo "True DB Username: $db_username <br>";
                echo "True DB Password: $db_password <br>";
                echo "True Logged Password: $loggedpassword <br>";
                // Redirect to the desired page (e.g., profile.php)
                header("Location: profile.php");
                exit();
            } else {
                // Invalid password, redirect back to login.php with error message
                //header("Location: login.php?message=invalid_credentials");
                //exit();
            }
        } else {
            // User not found, redirect back to login.php with error message
            //header("Location: login.php?message=invalid_credentials");
            //exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        // Username or password not provided, redirect back to login.php with error message
        //header("Location: login.php?message=invalid_credentials");
        //exit();
    }
}
?>
