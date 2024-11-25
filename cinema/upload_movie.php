<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $video_url = $_POST['video_url'];  // Only if you have this field in the form

    // File upload handling
    $uploadDir = 'uploads/';
    $thumbnail = $_FILES['thumbnail']['name'];
    $uploadFilePath = $uploadDir . basename($thumbnail);

    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create folder if it doesn't exist
    }

    // Move the uploaded file
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadFilePath)) {
        // Prepare and execute the database insert
        $stmt = $conn->prepare("INSERT INTO movies (title, description, category, date, duration, thumbnail, video_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $title, $description, $category, $date, $duration, $uploadFilePath, $video_url);

        if ($stmt->execute()) {
            echo "The movie has been successfully uploaded.";
            header("Location:index.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
