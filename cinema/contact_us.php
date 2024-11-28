<?php
session_start();
include 'db.php';
if(!isset($_SESSION["uname"]))
{
	header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEMA.MOVIES</title>
    <link rel="stylesheet" href="view/styles.css">
    <script src="https://kit.fontawesome.com/a3cf2330ae.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <button class="button6" onclick="document.location='profile.php'">
            <i class="fas fa-user"></i>
            <span class="sidebar-text" style="display: none;">Profile</span>
        </button>
        <button class="button6" onclick="document.location='home.php'">
            <i class="fas fa-home"></i>
            <span class="sidebar-text" style="display: none;">Home</span>
        </button>
        <button class="button6" onclick="document.location='index.php'">
            <i class="fas fa-th-large"></i>
            <span class="sidebar-text" style="display: none;">Categories</span>
        </button>
        <button class="button6" onclick="document.location='news.php'">
            <i class="fa fa-bullhorn"></i>
            <span class="sidebar-text" style="display: none;">News</span>
        </button>
        <button class="button6" onclick="document.location='cart.php'">
            <i class="fas fa-shopping-cart"></i>
            <span class="sidebar-text" style="display: none;">Cart</span>
        </button>
        <button class="button6" onclick="document.location='history.php'">
            <i class="far fa-clock"></i>
            <span class="sidebar-text" style="display: none;">History</span>
        </button>
        <button class="button6" onclick="document.location='updated.php'">
            <i class="fas fa-bell"></i>
            <span class="sidebar-text" style="display: none;">Updated</span>
        </button>
        <button class="button6" onclick="document.location='liked.php'">
            <i class="far fa-thumbs-up"></i>
            <span class="sidebar-text" style="display: none;">Liked</span>
        </button>
        <!-- Add more buttons as needed -->
    </div>
    <?php include 'view/header.html'; ?>
    <div class="content">

        <div class="dashboard-container">

            <div class="reservations-container">
                <!-- home Card 1 -->
                <div class="contact-container">
                    <h2>Contact Us</h2>
                    <form action="contact_us.php" method="POST" id="contactForm">
                        <div class="form-group">
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" placeholder="Enter your subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message:</label>
                            <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>

            
            <?php
            require 'db.php'; // Include database connection

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get form data
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject']; // Fetch the subject
                $message = $_POST['message'];

                // Prepare SQL query to insert into the database
                $query = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $name, $email, $subject, $message);

                // Execute query and check for success
                if ($stmt->execute()) {
                    echo "<script>alert('Your message has been sent successfully!');</script>";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
            }
            ?>
            

        </div>
    </div>
    <?php include 'view/footer.html'; ?>
    <script src="view/script.js"></script>
</body>
</html>