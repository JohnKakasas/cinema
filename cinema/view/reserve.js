document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById("toast"); // Toast notification element
    const reserveForm = document.getElementById("reservationForm"); // Reservation form
    const reserveButton = document.querySelector(".submit-btn"); // Reserve button

    // Handle form submission using AJAX (Fetch API)
    reserveForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the form from reloading the page
        const formData = new FormData(reserveForm); // Get the form data

        // Show the "processing" toast message when the user clicks the reserve button
        toast.textContent = 'Processing your reservation...';
        toast.classList.add('show');
        
        // Disable the Reserve button to prevent multiple submissions
        reserveButton.disabled = true;

        // Send form data via fetch
        fetch("reserve_movie.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.text())  // Get the response from the server
        .then((result) => {
            console.log(result); // Log the response for debugging

            // After processing the reservation
            if (result.trim() === 'success') {
                // Show success message in the toast notification
                toast.textContent = 'Reservation submitted! Waiting for approval.';
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000); // Hide after 3 seconds
            } else {
                // Show error message if something went wrong
                toast.textContent = 'Error: ' + result;
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000); // Hide after 3 seconds
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            toast.textContent = 'Something went wrong. Please try again later.';
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000); // Hide after 3 seconds
        })
        .finally(() => {
            // Re-enable the Reserve button after the process is complete
            reserveButton.disabled = false;
        });
    });
});
