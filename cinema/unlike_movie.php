<?php
session_start();
include 'db.php';

if (!isset($_SESSION['uname'])) {
    echo 'Error: User not logged in.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['uname']; // Use the logged-in username from session
    $movie_id = intval($_POST['movie_id']); // Safely cast movie_id to integer

    // Prepare the SQL statement to delete the liked movie
    $stmt = $conn->prepare("DELETE FROM liked_movies WHERE username = ? AND movie_id = ?");
    $stmt->bind_param("si", $username, $movie_id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo 'unliked'; // Return success message
    } else {
        echo 'error'; // Return error message if nothing is deleted
    }

    $stmt->close();
    $conn->close();
}
?>
