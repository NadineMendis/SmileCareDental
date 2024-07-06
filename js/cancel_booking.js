document.addEventListener("DOMContentLoaded", function() {
    // Add event listeners to cancel buttons
    const cancelButtons = document.querySelectorAll(".cancel-btn");
    cancelButtons.forEach(function(cancelButton) {
        cancelButton.addEventListener("click", function() {
            // Get the appointment ID from the data-id attribute
            const appointmentId = this.getAttribute("data-id");
            
            // Show confirmation dialog
            if (confirm("Are you sure you want to cancel this booking?")) {
                // If user confirms, redirect to cancel_booking.php with appointment ID
                window.location.href = "cancel_booking.php?id=" + appointmentId;
            }
        });
    });
});
