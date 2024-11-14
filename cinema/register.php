<?php
require 'db.php'; // Include the db.php file to define $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    // Execute and check for errors
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        if ($stmt->errno === 1062) { // Duplicate entry error code
            echo "Username or email already exists!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement
    $stmt->close();
}
?>
