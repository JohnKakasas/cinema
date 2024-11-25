<?php
session_start();
include 'db.php';

if (!isset($_SESSION['uname'])) {
    echo 'Error: User not logged in.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['uname'];
    $movie_id = $_POST['movie_id'];

    // Check if the movie is already liked
    $stmt = $conn->prepare("SELECT * FROM liked_movies WHERE username = ? AND movie_id = ?");
    $stmt->bind_param("si", $username, $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'already_liked';
    } else {
        // Insert the like into the database
        $stmt = $conn->prepare("INSERT INTO liked_movies (username, movie_id) VALUES (?, ?)");
        $stmt->bind_param("si", $username, $movie_id);

        if ($stmt->execute()) {
            echo 'liked';
        } else {
            echo 'error';
        }
    }

    $stmt->close();
    $conn->close();
}
?>
