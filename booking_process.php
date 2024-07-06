<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedusername']) && $_SESSION['loggedusername'] !== NULL) {
    // If logged in, display the username
    $welcome_message = 'Welcome, ' . $_SESSION['loggedusername'] . '!';
} else {
    // If not logged in, redirect to login.php with a warning message
    header('Location: login.php?message=login_required');
    exit();
}

// Check if the booking date and time are received via POST
if (isset($_POST['bookingDate']) && isset($_POST['bookingTime'])) {
    // Get the logged-in user's username
    $loggedusername = $_SESSION['loggedusername'];

    // Connect to your database
    include 'db_login.php'; 

    // Get the booking date and time from POST
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];

    // Get the patients's ID from the database
    $sql = "SELECT patient_id FROM patients WHERE user_id = (SELECT user_id FROM users WHERE username = '$loggedusername')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $patient_id = $row["patient_id"];
        echo $patient_id;
    } else {
        // If user ID not found, redirect back to the booking page with an error message
        header("Location: booking.php?error=user_not_found");
        exit();
    }

    // Convert the booking date to MySQL format
    $bookingDate = date('Y-m-d', strtotime($bookingDate));

    // Convert the booking time to MySQL format
    $bookingTime = date('H:i:s', strtotime($bookingTime));

    // Insert the appointment into the database
    $sql = "INSERT INTO appointments (patient_id, appointment_date) VALUES ($patient_id, '$bookingDate $bookingTime')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the booking page with a success message
        header("Location: booking.php?success=1");

        exit();
    } else {
        // If there's an error with the SQL query, redirect back to the booking page with an error message
        header("Location: booking.php?error=" . urlencode($conn->error));
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // If booking date and time are not received, redirect back to the booking page with an error message
    header("Location: booking.php?error=missing_data");
    exit();
}

?>
