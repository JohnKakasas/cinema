<?php
session_start();
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
    <style>
        body {
            background-image: url("view/img/movie-theater.jpg");

            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <button class="button6" onclick="document.location='profile.php'">
        <i class="fas fa-user"></i>
        <span class="sidebar-text" style="display: none;">Profile</span>
    </button>
    <button class="button6 active" onclick="document.location='home.php'">
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
    <button class="button6" onclick="document.location='liked.php'">
        <i class="far fa-thumbs-up"></i>
        <span class="sidebar-text" style="display: none;">Liked</span>
    </button>
    <!-- Add more buttons as needed -->
</div>
<?php include 'view/header.html'; ?>
<div class="content">


    <div class="home-cards-container">
        <!-- home Card 1 -->






        <div class="home-card">
            <div class="home-card-content">
                <h3 class="home-card-title">Playing-now<br><br></h3>
                <div class="home-card" data-category="THRILLER">
                    <img src="view\img\THRILLER\CONCLAVE.jpg" alt="Video Thumbnail" class="video-card img" data-video-url="https://www.youtube.com/embed/JX9jasdi3ic?si=tMgar5mOtBZ0LGco"/> <!-- Trailer URL -->
                    <div class="info">
                        <div class="tag">THRILLER</div> <!-- TYPE -->
                        <h3 class="title">CONCLAVE</h3> <!-- NAME -->
                        <p class="description">When Cardinal Lawrence is tasked with leading one of the world's most secretive and ancient events, selecting a new Pope, he finds himself at the center of a conspiracy that could shake the very foundation of The Church.</p> <!-- Description -->
                        <div class="details">
                            <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                            <p class="duration"> <i class="far fa-hourglass"></i>Duration: 120'</p> <!-- Duration -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- home Card 1 -->
        <div class="home-card">
            <div class="home-card-content">
                <h3 class="home-card-title">Pre-sales<br><br></h3>
                <div class="home-card" data-category="COMEDY">
                    <img src="view\img\COMEDY\redone.jpg" alt="Video Thumbnail" class="video-card img" data-video-url="https://www.youtube.com/embed/pvAB0rssrLI?si=vm_yDOQjNl7eXrZM"/> <!-- Trailer URL -->
                    <div class="info">
                        <div class="tag">COMEDY</div> <!-- TYPE -->
                        <h3 class="title">RED ONE</h3> <!-- NAME -->
                        <p class="description">After Santa Claus (code name: Red One) is kidnapped, the North Pole's Head of Security (Dwayne Johnson) must team up with the world's most infamous bounty hunter (Chris Evans) in a globe-trotting, action-packed mission to save Christmas.</p> <!-- Description -->
                        <div class="details">
                            <p class="date"><i class="material-icons">date_range</i>Date: 2024</p>  <!-- Date -->
                            <p class="duration"> <i class="far fa-hourglass"></i>Duration: 123'</p> <!-- Duration -->
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- home Card 1 -->
        <div class="home-card">
            <div class="home-card-content">
                <h3 class="home-card-title">Food & Drinks</h3>
                <div class="home-card" style="background-color:#0E0E0E;">
                    <img src="view\img\FOOD\pop.jpg" alt="home  1" class="video-card img">
                    <img src="view\img\FOOD\nachos.jpg" alt="home  1" class="video-card img">
                    <img src="view\img\FOOD\chips.jpg" alt="home  1" class="video-card img">
                    <img src="view\img\FOOD\cola.jpg" alt="home  1" class="video-card img"></div>
                <p class="home-card-description"><h4>Order your favorite snacks and pick them up from the special express checkout at Cinema.Movies</h4></p>
            </div>
        </div>


        <!-- home Card 1 -->
        <div class="home-card">
            <div class="home-card-content">
                <h3 class="home-card-title">Coming Soon<br><br></h3>
                <div class="home-card" data-category="MUSIC">
                    <img src="view\img\MUSIC\abc.jpg" alt="Video Thumbnail" class="video-card img" data-video-url="https://www.youtube.com/embed/oDvpk3n2alM?si=343XAp6wma19XJi6"/> <!-- Trailer URL -->
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
                    </div>
                </div>
            </div>
        </div>


        <!-- home Card 1 -->
        <div class="home-card">
            <div class="home-card-content">
                <h3 class="home-card-title">News & Contests</h3>
                <div class="news-card">
                    <img src="view\img\NEWS\im8.jpg" alt="News 1" class="news-card-image">
                    <div class="news-card-content">
                        <h3 class="news-card-title">Mission: Impossible 8’ Now Titled ‘The Final Reckoning</h3>
                        <p class="news-card-description">In a subsequent Instagram post with the trailer, Cruise wrote, “Our lives are the sum of our choices.”

                            Cruise reprises his role as Ethan Hunt in the eighth film, which like many in the series is from writer-director Christopher McQuarrie, and will star Henry Czerny, Hayley Atwell, Ving Rhames, Simon Pegg, Pom Klementieff and Vanessa Kirby.

                            The film also features Hannah Waddingham, Nick Offerman, Katy O’Brian and Tramell Tillman.

                            Cruise and McQuarrie produce the Paramount and Skydance film. David Ellison, Dana Goldberg, Don Granger and Chris Brock executive produce.

                            While Cruise has been open about wanting to keep making Mission: Impossible movies into his 80s, The Hollywood Reporter revealed earlier this month that Paramount wanted to promote the eighth film as the “final” entry in the franchise, to boost audience interest. Paramount also wants to bring the film, the budget of which is approaching $400 million amid production delays, to Cannes.

                            The seventh film, Mission: Impossible: Dead Reckoning (originally titled Part One, with the eighth movie originally titled Part Two), has a 94 percent freshness rating on Rotten Tomatoes and grossed $571 million at the global box office.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- home Card 1 -->
        <div class="home-card">
            <img src="view\img\MEMBER.JPG" alt="home  1" class="home-card-image">
            <div class="home-card-content">
                <h3 class="home-card-title">Become a member<br>
                    Sign up and get more</h3>
                <a href="link-to-full-home-1" class="read-more">Read More</a>
            </div>
        </div>


        
        <div class="operating-hours">
            <div class="home-card">
                <div class="home-card-content">
                    <h3>Operating Hours</h3>
                    <div class="hours-list">
                        <?php
                        include 'db.php'; // Include database connection
                        $query = "SELECT * FROM operating_hours";
                        $result = $conn->query($query);

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<p><strong>{$row['day_of_week']}:</strong> " .
                                    date('h:i A', strtotime($row['opening_time'])) . 
                                    " - " . date('h:i A', strtotime($row['closing_time'])) . "</p>";
                            }
                        } else {
                            echo "<p>Operating hours are not yet set. Please check back later.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <!-- Add more home cards as needed -->
    </div>
</div>
<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>