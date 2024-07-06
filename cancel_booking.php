<?php
include 'db_login.php'; 

session_start();

if(isset($_POST['id']) && !empty($_POST['id'])) {
    $appointmentId = $_POST['id'];

    $sql = "UPDATE appointments SET appointment_status = 'cancelled' WHERE appointment_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointmentId);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
} else {
    echo "error";
}

$conn->close();
?>
