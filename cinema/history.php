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
    <button class="button6 active" onclick="document.location='history.php'">
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
    <button class="button6" onclick="document.location='liked.php'">
        <i class="far fa-thumbs-up"></i>
        <span class="sidebar-text" style="display: none;">Liked</span>
    </button>
    <!-- Add more buttons as needed -->
</div>
<?php include 'view/header.html'; ?>
<div class="content">







<h2>Movies you have Watched</h2>

<div class="video-grid">





        <!-- Trailer -->
        <div class="video-card" data-category="ACTION">
            <img src="view\img\ACTION\gladiatorII.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/uMbrMJ7a7v4?si=JTsH40w97g1uTxao"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">ACTION</div> <!-- TYPE -->
                <h3 class="title">GLADIATOR II</h3> <!-- NAME -->
                <p class="description">After his home is conquered by the tyrannical emperors who now lead Rome, Lucius is forced to enter the Colosseum and must look to his past to find strength to return the glory of Rome to its people.</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 148'</p> <!-- Duration -->
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
        <div class="video-card" data-category="ROMANCE">
            <img src="view\img\ROMANCE\We_Live_in_Time-537595663-large.jpg" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/hMSF8AEimcc?si=OLCkHTj7mMIOZaGh"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">ROMANCE</div> <!-- TYPE -->
                <h3 class="title">WE LIVE IN TIME</h3> <!-- NAME -->
                <p class="description">An up-and-coming chef and a recent divorcée find their lives forever changed when a chance encounter brings them together, in a decade-spanning, deeply moving romance.</p> <!-- Description -->
                <div class="details">
                    <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                    <p class="duration"> <i class="far fa-hourglass"></i>Duration: 108'</p> <!-- Duration -->
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
        <div class="video-card" data-category="ANIME">
            <img src="view\img\ANIME\ONE_PIECE.JPG" alt="Video Thumbnail" class="video-thumbnail" data-video-url="https://www.youtube.com/embed/dqCuLvUfVEo?si=opMP1K7P8PMor2aZ"/> <!-- Trailer URL -->
            <div class="info">
                <div class="tag">ANIME</div> <!-- TYPE -->
                <h3 class="title">ONE PIECE FILM: GOLD</h3> <!-- NAME -->
                <p class="description">Luffy and his pirates can't wait to board the glittering Sin City ship known as Gran Tesoro, but they soon find themselves in way over their heads.</p> <!-- Description -->
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