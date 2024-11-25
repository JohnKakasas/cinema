<?php
session_start();
require 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['uname'])) {
    echo 'Error: You must be logged in to make a reservation.';
    exit;
}

$username = $_SESSION['uname']; // Use uname from session

// Fetch the user ID based on the username (because reservations table uses user_id)
$query = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists in the database
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_id = $user['id'];  // Get the user ID from the database
} else {
    echo 'Error: User not found.';
    exit;
}

// Check if form data is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['movie_id'], $_POST['show_date'], $_POST['show_time'], $_POST['seat_number'])) {
        $movie_id = $_POST['movie_id'];
        $show_date = $_POST['show_date'];
        $show_time = $_POST['show_time'];
        $seat_number = $_POST['seat_number'];

        // Prepare the SQL query to insert the reservation into the database
        $stmt = $conn->prepare("INSERT INTO reservations (user_id, movie_id, show_date, show_time, seat_number, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
        $stmt->bind_param("iisss", $user_id, $movie_id, $show_date, $show_time, $seat_number);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo 'success';  // Successfully reserved the movie
        } else {
            echo 'Error: Unable to reserve movie. Please try again later.';
        }

        $stmt->close();
    } else {
        echo 'Please complete all fields.';
    }
}

// Close the database connection
$conn->close();
?>
