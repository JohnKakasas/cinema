<?php
// Include the database connection file
include 'db.php';
session_start();

// Initialize the message variable
$message = "";

// Ensure the user is logged in (check session)
if (!isset($_SESSION['user_id'])) {
    echo 'Error: You must be logged in to make a reservation.';
    exit;
}

// Check if form data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure all required fields are set
    if (isset($_POST['movie_id'], $_POST['show_date'], $_POST['show_time'], $_POST['seat_number'])) {
        // Get data from the form
        $user_id = $_SESSION['user_id'];  // Get logged-in user's ID
        $movie_id = $_POST['movie_id'];
        $show_date = $_POST['show_date'];
        $show_time = $_POST['show_time'];
        $seat_number = $_POST['seat_number'];

        // Prepare the SQL query to insert the reservation into the database
        $stmt = $conn->prepare("INSERT INTO reservations (user_id, movie_id, show_date, show_time, seat_number, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
        $stmt->bind_param("iisss", $user_id, $movie_id, $show_date, $show_time, $seat_number);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            // Reservation successful
            echo 'success';  // Return success message to JavaScript
        } else {
            // If there's an error, return an error message
            echo 'Error: Unable to reserve movie. Please try again later.'; 
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // If required fields are missing
        echo 'Please complete all fields.';
    }
}

// Close the database connection
$conn->close();
?>
