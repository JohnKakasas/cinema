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
    <button class="button6 active" onclick="document.location='saved.php'">
        <i class="fas fa-heart"></i>
        <span class="sidebar-text" style="display: none;">Saved</span>
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











<h2>Saved Movies</h2>


<div class="video-grid">

<!-- Trailer -->
<div class="video-card" data-category="HORROR">
            <img src="view\img\HORROR\TERRIFIER3.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/vqEkjhlIEMo?si=53Beywrc_nvluyT0"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">HORROR</div> <!-- TYPE -->
                <h3 class="title">TERRIFIER 3</h3> <!-- NAME -->
                <p class="description">Art the Clown is set to unleash chaos on the unsuspecting residents of Miles County as they peacefully drift off to sleep on Christmas Eve.</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 125'</p> <!-- Duration -->
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
        <div class="video-card" data-category="COMEDY">
            <img src="view\img\COMEDY\redone.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/pvAB0rssrLI?si=vm_yDOQjNl7eXrZM"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">COMEDY</div> <!-- TYPE -->
                <h3 class="title">RED ONE</h3> <!-- NAME -->
                <p class="description">After Santa Claus (code name: Red One) is kidnapped, the North Pole's Head of Security (Dwayne Johnson) must team up with the world's most infamous bounty hunter (Chris Evans) in a globe-trotting, action-packed mission to save Christmas.</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 123'</p> <!-- Duration -->
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
        <div class="video-card" data-category="MUSIC">
            <img src="view\img\MUSIC\abc.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/oDvpk3n2alM?si=343XAp6wma19XJi6"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">MUSIC</div> <!-- TYPE -->
                <h3 class="title">ANDREA BOCELLI 30: THE CELEBRATION</h3> <!-- NAME -->
                <p class="description">Journey to the Teatro del Silenzio (Theatre of Silence), Lajatico, where once-in-a-lifetime performances showcase the Maestro’s extensive and beloved repertoire, alongside captivating duets with an unprecedented cast of global superstars, including Ed Sheeran, Shania Twain, Will Smith, Jon Batiste, Sofia Carson, Lang Lang, Nadine Sierra and more.                        With extraordinary staging, production, and visuals, set against a landscape of unparalleled beauty amongst the Tuscan hills, Andrea Bocelli’s sensational career comes to life in a truly unforgettable experience.</p> <!-- Description -->
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
    </div>








</div>
<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>