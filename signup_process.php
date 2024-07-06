<?php
// Include your database connection file
include 'db_login.php';

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$street = $_POST['street']; 
$city = $_POST['city']; 
$state = $_POST['state']; 
$zip = $_POST['zip']; 

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into users table
$sql = "INSERT INTO users (username, password, email, user_type) VALUES (?, ?, ?, 'patient')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $hashedPassword, $email);
$stmt->execute();

// Get the inserted user_id
$user_id = $stmt->insert_id;

// Insert data into patients table
$sql = "INSERT INTO patients (user_id, first_name, last_name, date_of_birth, contact_number, street, city, state, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issssssss", $user_id, $firstname, $lastname, $dob, $contact, $street, $city, $state, $zip);
$stmt->execute();

// Check if insertion was successful
if ($stmt->affected_rows > 0) {
    // Close the database connection
    $stmt->close();
    $conn->close();
    // Redirect to signup_successful.php
    header("Location: signup_successful.php");
    exit;
} else {
    // Handle insertion failure (redirect to error page or show error message)
    header("Location: signup_error.php");
    exit;
}
?>
