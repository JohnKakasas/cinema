<?php
session_start();
include 'db.php';
if(!isset($_SESSION["uname"])) {
    header("Location:login.php");
    exit();
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
        <button class="button6 active" onclick="document.location='news.php'">
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
        <h2>Your News</h2>
    

        <div class="news-cards-container">
            <?php
            // Get news
            $sql = "SELECT * FROM news ORDER BY created_at DESC";
            $result = $conn->query($sql);

            // Loop through the results and display each news item
            while ($row = $result->fetch_assoc()) {
                echo '<div class="news-card">';
                echo '<img src="view/img/NEWS/' . $row['image'] . '" alt="News Image" class="news-card-image">';
                echo '<div class="news-card-content">';
                echo '<h3 class="news-card-title">' . $row['title'] . '</h3>';
                echo '<p class="news-card-description">' . $row['description'] . '</p>';
                echo '</div>';
                echo '</div>';
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
        
    </div>
    <?php include 'view/footer.html'; ?>
    <script src="view/script.js"></script>
</body>
</html>