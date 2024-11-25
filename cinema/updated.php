<?php
session_start();
include 'db.php';
if(!isset($_SESSION["uname"]))
{
	header("Location:login.php");
}

// Fetch the reservations for the logged-in user
$user_id = $_SESSION['user_id']; // Get the logged-in user's ID
$query = "SELECT r.id, r.show_date, r.show_time, r.seat_number, r.status, m.title 
          FROM reservations r
          JOIN movies m ON r.movie_id = m.id
          WHERE r.user_id = ?"; // Filter by the logged-in user's ID

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
    <button class="button6" onclick="document.location='history.php'">
        <i class="far fa-clock"></i>
        <span class="sidebar-text" style="display: none;">History</span>
    </button>
    <button class="button6" onclick="document.location='saved.php'">
        <i class="fas fa-heart"></i>
        <span class="sidebar-text" style="display: none;">Saved</span>
    </button>
    <button class="button6 active" onclick="document.location='updated.php'">
        <i class="fas fa-bell"></i>
        <span class="sidebar-text" style="display: none;">Updated</span>
    </button>
    <button class="button6" onclick="document.location='liked.php'">
        <i class="far fa-thumbs-up"></i>
        <span class="sidebar-text" style="display: none;">Liked</span>
    </button>
</div>
<?php include 'view/header.html'; ?>
<div class="content">









<h2>Your Updates</h2>

    <!-- Display success/error message -->
    <?php
    if (isset($_GET['message'])) {
        echo "<p>{$_GET['message']}</p>";
    }
    ?>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='reservation'>";
            echo "<p><strong>Movie:</strong> {$row['title']}</p>";
            echo "<p><strong>Show Date:</strong> {$row['show_date']} <strong>Time:</strong> {$row['show_time']}</p>";
            echo "<p><strong>Seat:</strong> {$row['seat_number']}</p>";
            echo "<p><strong>Status:</strong> {$row['status']}</p>";
            echo "</div><br>";
        }
    } else {
        echo "<p>You have no reservations.</p>";
    }
    ?>

    <!-- Button to remove all reservations -->
    <form method="POST" action="remove_reservations.php">
        <button type="submit" class="remove-btn">Remove All Reservations</button>
    </form>










</div>
<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>