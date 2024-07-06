<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Basic email validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "your-email@example.com"; 
        $subject = "New Contact Us Message";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        if (mail($to, $subject, $body)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "Invalid email format.";
    }
} else {
    echo "Invalid request method.";
}
?>
