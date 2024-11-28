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
    $section = $_POST['section'];  // New field for section

    // File upload handling
    $uploadDir = 'view/img/MOVIES/';
    
    // Ensure the uploads/thumbnails directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create folder if it doesn't exist
    }

    // Get the file name
    $thumbnail = $_FILES['thumbnail']['name'];
    $uploadFilePath = $uploadDir . basename($thumbnail);

    // Move the uploaded file
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadFilePath)) {
        // Prepare and execute the database insert
        $stmt = $conn->prepare("INSERT INTO movies (title, description, category, date, duration, thumbnail, video_url, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $title, $description, $category, $date, $duration, $uploadFilePath, $video_url, $section);

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
