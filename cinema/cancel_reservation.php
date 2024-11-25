<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';  // Database connection

// Get the reservation ID from the form submission
if (isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];

    // Prepare the query to update the reservation status
    $query = "UPDATE reservations SET status = 'Cancelled' WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $reservation_id, $_SESSION['user_id']);  // Bind reservation ID and user ID

    if ($stmt->execute()) {
        // Redirect to profile.php with a success message
        header("Location: profile.php?message=Reservation cancelled successfully.");
        exit;
    } else {
        // Redirect to profile.php with an error message
        header("Location: profile.php?message=Error: Unable to cancel reservation.");
        exit;
    }
} else {
    header("Location: profile.php?message=Error: Reservation ID not found.");
    exit;
}

?>
