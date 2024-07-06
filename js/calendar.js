// Get the container for the calendar
const calendarBody = document.querySelector('.calendar-body');
const currentMonthElement = document.getElementById('currentMonth');
const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');
const availabilitySection = document.querySelector('.availability');
const selectedDateElement = document.getElementById('selectedDate');

// Current date
let currentDate = new Date(); // 
let today = new Date(); // Current date

function updateCalendar() {
    // Clear existing days
    calendarBody.innerHTML = '';
    
    // Generate day labels starting from Sunday to Saturday
    const dayLabels = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
    dayLabels.forEach(label => {
        const day = document.createElement('div');
        day.classList.add('day');
        day.textContent = label;
        calendarBody.appendChild(day);
    });

    // Set the month and year in the header
    const options = { month: 'long', year: 'numeric' };
    currentMonthElement.textContent = currentDate.toLocaleDateString('en-US', options);

    // Define the number of days in the month
    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

    // Get the index of the first day of the month (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
    const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();

    // Generate the days of the month
    for (let i = 0; i < firstDayOfMonth; i++) {
        const placeholderDay = document.createElement('div');
        placeholderDay.classList.add('day', 'placeholder');
        calendarBody.appendChild(placeholderDay);
    }

    for (let i = 1; i <= daysInMonth; i++) {
        const day = document.createElement('div');
        day.classList.add('day');
        day.textContent = i;

        const currentLoopDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);

        // Highlight the current date
        if (currentDate.getFullYear() === today.getFullYear() &&
            currentDate.getMonth() === today.getMonth() &&
            i === today.getDate()) {
            day.classList.add('current-day');
            showAvailability(i); // Show availability for the current day
        }

        // Disable past days
        if (currentLoopDate < today) {
            day.classList.add('disabled');
        } else {
            day.addEventListener('click', () => {
                showAvailability(i);
                document.querySelectorAll('.day').forEach(d => d.classList.remove('current-day'));
                day.classList.add('current-day');
            });
        }

        calendarBody.appendChild(day);
    }
}

// Function to move to the previous month
function goToPreviousMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
}

// Function to move to the next month
function goToNextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    updateCalendar();
}

// Function to show availability for a selected date
function showAvailability(day) {
    const selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);

    // Don't show availability for past dates
    if (selectedDate < today) {
        availabilitySection.classList.add('hidden');
        selectedDateElement.textContent = '';
        return;
    }

    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    selectedDateElement.textContent = selectedDate.toLocaleDateString('en-US', options);

    // Example static data for demonstration purposes
    const times = ['9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '2:00PM', '3:00PM'];
    availabilitySection.innerHTML = ''; // Clear previous availability
    times.forEach((time, index) => {
        const availBtn = document.createElement('div');
        availBtn.classList.add('avail-btn');
        availBtn.innerHTML = `<input type="radio" name="time" id="time${index}"><label for="time${index}">${time}</label>`;
        availabilitySection.appendChild(availBtn);
    });
    availabilitySection.classList.remove('hidden'); // Show the availability section
}

// Event listeners for the buttons
prevMonthButton.addEventListener('click', goToPreviousMonth);
nextMonthButton.addEventListener('click', goToNextMonth);

// Initial calendar rendering
updateCalendar();

// Handle booking submission
document.addEventListener("DOMContentLoaded", function() {
    // Get the submit button
    const submitButton = document.getElementById('submitBooking');

    // Add event listener to the submit button
    submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        const selectedTime = document.querySelector('input[name="time"]:checked');
        
        if (selectedTime) {
            const time = selectedTime.nextElementSibling.textContent;
            const date = selectedDateElement.textContent;
            
            // Example of additional steps:
            // 1. Display confirmation dialog
            const confirmMessage = `You have selected an appointment on ${date} at ${time}. Confirm?`;
            if (confirm(confirmMessage)) {
                // Create a new form element
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'booking_process.php'; 
                
                // Create input fields for date and time
                const bookingDateInput = document.createElement('input');
                bookingDateInput.type = 'hidden';
                bookingDateInput.name = 'bookingDate';
                bookingDateInput.value = date;
                form.appendChild(bookingDateInput);
                
                const bookingTimeInput = document.createElement('input');
                bookingTimeInput.type = 'hidden';
                bookingTimeInput.name = 'bookingTime';
                bookingTimeInput.value = time;
                form.appendChild(bookingTimeInput);

                // Save the selected date and time in localStorage or sessionStorage
                localStorage.setItem('appointmentDate', date);
                localStorage.setItem('appointmentTime', time);

                // Append the form to the document body
                document.body.appendChild(form);

                // Submit the form
                form.submit();
            }
        } else {
            // Alert if no time slot is selected
            alert('Please select a time slot.');
        }
    });
});