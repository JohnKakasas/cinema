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




<h2>Movies for you</h2>

<div class="video-grid">

        <!-- Trailer -->
        <div class="video-card" data-category="THRILLER"> <!-- TYPE -->
            <img src="view\img\THRILLER\CONCLAVE.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/JX9jasdi3ic?si=tMgar5mOtBZ0LGco"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">THRILLER</div> <!-- TYPE -->
                <h3 class="title">CONCLAVE</h3> <!-- NAME -->
                <p class="description">When Cardinal Lawrence is tasked with leading one of the world's most secretive and ancient events, selecting a new Pope, he finds himself at the center of a conspiracy that could shake the very foundation of The Church.</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 120'</p> <!-- Duration -->
                </div>
            </div>
            <div class="trailer-container" style="display: none;">
                <button class="close-button">Close</button>
                <iframe
                    class="video-iframe"
                    title="Trailer"
                    width="560"
                    height="315"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>

        </div>

        <!-- Trailer -->
        <div class="video-card" data-category="DRAMA">
            <img src="view\img\DRAMA\Partenope.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/qaPKeCdsY1M?si=WlyohOByQ8Bwgbky"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">DRAMA</div> <!-- TYPE -->
                <h3 class="title">PARTHENOPE</h3> <!-- NAME -->
                <p class="description">Partenope is a woman who bears the name of her city. Is she a siren or a myth?</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 136'</p> <!-- Duration -->
                </div>
            </div>
            <div class="trailer-container" style="display: none;">
                <button class="close-button">Close</button>
                <iframe
                    class="video-iframe"
                    title="Trailer"
                    width="560"
                    height="315"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- Trailer -->
        <div class="video-card" data-category="ANIMATION">
            <img src="view\img\ANIMATION\ozi.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/bBheC-aGF3g?si=_bekFTai6LIp4uBm"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">ANIMATION</div> <!-- TYPE -->
                <h3 class="title">OZI: VOICE OF THE FOREST</h3> <!-- NAME -->
                <p class="description">This is the story of Ozi, an orphan orangutan who uses her influencer skills to save her forest and home from deforestation.</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 87'</p> <!-- Duration -->
                </div>
            </div>
            <div class="trailer-container" style="display: none;">
                <button class="close-button">Close</button>
                <iframe
                    class="video-iframe"
                    title="Trailer"
                    width="560"
                    height="315"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>









</div>
<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>