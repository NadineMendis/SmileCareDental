<?php

// Query to fetch active bookings for the logged-in user
$sql = "SELECT appointments.*, appointment_types.type_name 
        FROM appointments 
        INNER JOIN appointment_types ON appointments.appointment_type_id = appointment_types.appointment_type_id
        INNER JOIN patients ON appointments.patient_id = patients.patient_id
        INNER JOIN users ON patients.user_id = users.user_id
        WHERE appointments.appointment_status = 'active' 
        AND users.username = '$loggedusername'";
// Connect to your database
include 'db_login.php'; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch active bookings for the logged-in user

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="container">';
    echo '<div class="booking-details-container">';
    echo '<h2>My Bookings</h2>';
    echo '<table class="table table-bordered">';
    echo '<thead class="thead-light">';
    echo '<tr>';
    echo '<th>#</th>';
    echo '<th>Date & Time</th>';
    echo '<th>Booking Type</th>';
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $count = 1;
    while($row = $result->fetch_assoc()) {
        // Display the booking details in table rows
        echo '<tr id="appointment-' . $row["appointment_id"] . '">';
        echo '<td>' . $count++ . '</td>';
        echo '<td>' . date("d F Y, h:ia", strtotime($row["appointment_date"])) . '</td>';
        echo '<td>' . $row["type_name"] . '</td>';
        echo '<td><a class="btn booking-btn ml-2 cancel-btn" href="#" data-id="' . $row["appointment_id"] . '">Cancel</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
} else {
    echo "No bookings for the current week.";
}
$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- JavaScript to handle cancel button click -->
<script>
$(document).ready(function(){
    $(".cancel-btn").click(function(e){
        e.preventDefault();
        var appointmentId = $(this).data('id');
        if(confirm("Cancelling appointment #" + appointmentId + " will incur a $50 fee. Do you want to proceed?")) {
            $.ajax({
                type: "POST",
                url: "cancel_booking.php",
                data: { id: appointmentId },
                success: function(response){
                    console.log("Response from server: " + response);
                    if(response.trim() === "success") {
                        alert("Booking cancelled.");
                        // Remove the cancelled appointment row from the table
                        $("#appointment-" + appointmentId).remove();
                    } else {
                        alert("An error occurred: " + response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred. Please try again.");
                }
            });
        }
    });
});
</script>
