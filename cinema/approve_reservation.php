<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation_id = $_POST['reservation_id'];
    $action = $_POST['action'];

    // Set status based on approval or rejection
    $status = ($action === 'approve') ? 'Approved' : 'Rejected';

    // Update reservation status
    $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $reservation_id);

    if ($stmt->execute()) {
        echo "Reservation {$status} successfully.";
        header("Location: employee_dashboard.php"); // Redirect back to dashboard
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
