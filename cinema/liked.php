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
    <button class="button1" id="toggle-button">
        <i class="fa fa-bars"></i>
        <span style="display: none;"></span> <!-- Initially hidden -->
    </button>
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
    <button class="button6" onclick="document.location='saved.php'">
        <i class="fas fa-heart"></i>
        <span class="sidebar-text" style="display: none;">Saved</span>
    </button>
    <button class="button6" onclick="document.location='updated.php'">
        <i class="fas fa-bell"></i>
        <span class="sidebar-text" style="display: none;">Updated</span>
    </button>
    <button class="button6 active" onclick="document.location='liked.php'">
        <i class="far fa-thumbs-up"></i>
        <span class="sidebar-text" style="display: none;">Liked</span>
    </button>
    <!-- Add more buttons as needed -->
</div>
<?php include 'view/header.html'; ?>

<div class="content">

<div class="content">

<?php
require 'db.php';

$username = $_SESSION['uname']; // Get the logged-in username

$query = "SELECT m.* 
          FROM liked_movies lm 
          JOIN movies m ON lm.movie_id = m.id 
          WHERE lm.username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Your Liked Movies</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="video-card" data-category="' . htmlspecialchars($row['category']) . '">';
        echo '<img src="' . htmlspecialchars($row['thumbnail']) . '" alt="Video Thumbnail" class="video-thumbnail" data-video-url="' . htmlspecialchars($row['video_url']) . '">';
        echo "<div class='like-button'>";
        echo '<div class="info">';
        echo '<div class="tag">' . htmlspecialchars($row['category']) . '</div>';
        echo '<h3 class="title">' . htmlspecialchars($row['title']) . '</h3>';
        echo '<p class="description">' . htmlspecialchars($row['description']) . '</p>';
        echo '<div class="details">';
        echo '<p class="date"><i class="material-icons">date_range</i>Date: ' . htmlspecialchars($row['date']) . '</p>';
        echo '<p class="duration"><i class="far fa-hourglass"></i>Duration: ' . htmlspecialchars($row['duration']) . '</p>';
        echo '</div></div>';
        echo '<div class="trailer-container" style="display: none;">';
        echo '<button class="close-button">Close</button>';
        echo '<iframe class="video-iframe" title="Trailer" width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo '</div></div>';
        
        // Add "Unlike" button
        echo '<button class="unlike-btn" data-movie-id="' . htmlspecialchars($row['id']) . '">Unlike</button>';


        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>You have not liked any movies yet.</p>";
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