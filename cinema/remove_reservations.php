<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Prepare the DELETE query
$query = "DELETE FROM reservations WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    // Successfully deleted the reservations
    header("Location: profile.php?message=Reservations removed successfully");
} else {
    // Handle errors
    header("Location: profile.php?message=Error removing reservations");
}
?>
