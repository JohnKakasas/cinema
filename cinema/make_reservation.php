<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $seat = $_POST['seat'];
    $user_id = $_SESSION['user_id']; // Assumes user is logged in and session is active.

    // Check seat availability
    $query = $conn->prepare("SELECT * FROM seats WHERE seat_number = ? AND date = ? AND time = ?");
    $query->bind_param("sss", $seat, $date, $time);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo "Seat is already booked!";
    } else {
        // Insert reservation into the database
        $stmt = $conn->prepare("INSERT INTO reservations (user_id, date, time, seat, status) VALUES (?, ?, ?, ?, 'Pending')");
        $stmt->bind_param("isss", $user_id, $date, $time, $seat);
        if ($stmt->execute()) {
            echo "Reservation submitted! Waiting for approval.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
