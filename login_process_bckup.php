<?php
session_start();
include 'db_login.php'; 

$response = array('success' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $db_username, $db_password);
            $stmt->fetch();

            if (password_verify($password, $db_password)) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['loggedin'] = true;

                $response['success'] = true;
                $response['message'] = 'Login successful.';
                // Redirect to profile.php
                header("Location: profile.php");
                exit(); // Ensure script execution stops after redirection
            } else {
                // Invalid username or password
                header("Location: login.php?message=invalid_credentials");
                exit();
            }
        } else {
            // Invalid username or password
            header("Location: login.php?message=invalid_credentials");
            exit();
        }

        $stmt->close();
    } else {
        // Please fill in all fields
        header("Location: login.php?message=missing_fields");
        exit();
    }
}

// If not successful, return a failure response with warning message
$response['success'] = false;
$response['message'] = 'Invalid username or password.';

echo json_encode($response);
?>
