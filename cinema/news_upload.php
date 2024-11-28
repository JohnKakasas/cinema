<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Handle image upload
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    
    // Check for upload errors
    if ($imageError === 0) {
        // Move the uploaded image to the desired directory
        $imageDestination = 'view/img/NEWS/' . $imageName;
        if (move_uploaded_file($imageTmp, $imageDestination)) {
            // Connect to the database
            $servername = "localhost"; // change as needed
            $username = "root"; // change as needed
            $password = ""; // change as needed
            $dbname = "cinema"; // change as needed

            // Insert news data into the database
            $stmt = $conn->prepare("INSERT INTO news (title, description, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $description, $imageName);
            if ($stmt->execute()) {
                header("Location: news.php?message=News uploaded successfully!");
            } else {
                echo "<script>alert('Failed to upload news.');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('Error uploading image.');</script>";
    }
}
?>
