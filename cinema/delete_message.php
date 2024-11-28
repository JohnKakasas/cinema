<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message_id'])) {
    $message_id = intval($_POST['message_id']);

    // Ensure the user is an employee
    if (!isset($_SESSION["uname"]) || $_SESSION["role"] !== 'Employee') {
        echo "Unauthorized access.";
        exit;
    }

    // Delete the message from the database
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->bind_param("i", $message_id);

    if ($stmt->execute()) {
        header("Location: employee_dashboard.php?message=Message deleted successfully.");
        exit;
    } else {
        echo "Error deleting message: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
