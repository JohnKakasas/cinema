<?php
session_start();
include 'db.php';
if(!isset($_SESSION["uname"]))
{
	header("Location:login.php");
}

$user_id = $_SESSION['user_id']; // Use the correct session variable for user_id
$query = "SELECT r.*, m.title, m.thumbnail 
          FROM reservations r
          JOIN movies m ON r.movie_id = m.id
          WHERE r.user_id = ? 
          ORDER BY r.created_at DESC"; // Ensure this query is correctly formatted

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id); // Bind the user ID
$stmt->execute();
$result = $stmt->get_result();

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
        <button class="button6 active" onclick="document.location='history.php'">
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
        <h2>Your Reservation History</h2>
        <div class="video-grid">

            <?php
            require 'db.php';
            // Get the logged-in user's username from the session
            $username = $_SESSION['uname'];

            // Fetch reservations for the logged-in user
            $query = "SELECT r.*, m.* 
                    FROM reservations r
                    JOIN movies m ON r.movie_id = m.id
                    WHERE r.user_id = (SELECT id FROM users WHERE username = ?)"; 
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if there are any reservations
            if ($result->num_rows > 0) {
                echo '<div class="reservation-cards-container">';  // Flex container for side by side layout

                // Loop through and display the reservations
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="video-card" data-category="' . htmlspecialchars($row['category']) . '">';
                        echo '<img src="' . htmlspecialchars($row['thumbnail']) . '" alt="Movie Thumbnail" class="video-thumbnail" data-video-url="' . htmlspecialchars($row['video_url']) . '">';
                        echo "<div class='reservation-info'>";
                            echo '<div class="tag">' . htmlspecialchars($row['category']) . '</div>';
                            echo '<h3 class="title">' . htmlspecialchars($row['title']) . '</h3>';
                            echo '<p class="description">' . htmlspecialchars($row['description']) . '</p>';
                            echo '<div class="details">';
                                echo '<p class="date"><i class="material-icons">date_range</i>Show Date: ' . htmlspecialchars($row['show_date']) . '</p>';
                                echo '<p class="duration"><i class="far fa-hourglass"></i>Show Time: ' . htmlspecialchars($row['show_time']) . '</p>';
                                echo '<p class="duration"><i class="far fa-clock"></i>Seat: ' . htmlspecialchars($row['seat_number']) . '</p>';
                                echo '<p class="status"><strong>Status:</strong> ' . htmlspecialchars($row['status']) . '</p>';
                            echo '</div>';
                        echo '</div>'; // End .reservation-info

                        // Add more actions like a button if needed (e.g., cancel reservation)
                        echo "<button class='cancel-btn'>Cancel Reservation</button>";
                    echo '</div>'; // End .video-card
                        
                }
                echo '</div>';  // End .reservation-cards-container
            } else {
                echo "<p>You have no reservations yet.</p>";
            }

            $stmt->close();
            $conn->close();
            ?>
        
        </div>
    </div>

    <?php include 'view/footer.html'; ?>
    <script src="view/script.js"></script>
</body>
</html>