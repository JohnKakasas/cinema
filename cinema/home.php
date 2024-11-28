<?php
session_start();
if(!isset($_SESSION["uname"]))
{
	header("Location:login.php");
}
include 'db.php';
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

            <!-- Playing Now -->
            <div class="home-card">
                <div class="home-card-content">
                    <h3 class="home-card-title">Playing Now</h3>
                    <?php
                    $query = "SELECT * FROM movies WHERE section = 'Playing Now'";  // Change the section as needed
                    $result = $conn->query($query);
                    
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='home-card'>";
                                echo '<div class="thumbnail-container">
                                    <img src="' . htmlspecialchars($row['thumbnail']) . '" alt="Video Thumbnail" class="video-thumbnail" data-video-url="' . htmlspecialchars($row['video_url']) . '">
                                </div>';      
                                echo '<div class="info">';
                                echo '<div class="tag">' . htmlspecialchars($row['category']) . '</div>';
                                    echo '<h3 class="title">' . htmlspecialchars($row['title']) . '</h3>';
                                    echo '<p class="description">' . htmlspecialchars($row['description']) . '</p>';
                                    echo '<div class="details">';
                                        echo '<p class="date"><i class="material-icons">date_range</i>Date: ' . htmlspecialchars($row['date']) . '</p>';
                                        echo '<p class="duration"><i class="far fa-hourglass"></i>Duration : ' . htmlspecialchars($row['duration']). '</p>';
                                    echo "</div>";
                                echo "</div>";
                                echo '<div class="trailer-container" style="display: none;">';
                                    echo '<button class="close-button">Close</button>';
                                    echo '<iframe class="video-iframe" title="Trailer" width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                echo "</div>";                        
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No movies available in this section.</p>";
                    }                    
                    ?>
                </div>
            </div>
            

            <!-- Pre-sales -->
            <div class="home-card">
                <div class="home-card-content">
                    <h3 class="home-card-title">Pre-sales</h3>
                    <?php
                    $query = "SELECT * FROM movies WHERE section = 'Pre-sales'";  // Change the section as needed
                    $result = $conn->query($query);
                    
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='home-card'>";
                                echo '<div class="thumbnail-container">
                                    <img src="' . htmlspecialchars($row['thumbnail']) . '" alt="Video Thumbnail" class="video-thumbnail" data-video-url="' . htmlspecialchars($row['video_url']) . '">
                                </div>';      
                                echo '<div class="info">';
                                echo '<div class="tag">' . htmlspecialchars($row['category']) . '</div>';
                                    echo '<h3 class="title">' . htmlspecialchars($row['title']) . '</h3>';
                                    echo '<p class="description">' . htmlspecialchars($row['description']) . '</p>';
                                    echo '<div class="details">';
                                        echo '<p class="date"><i class="material-icons">date_range</i>Date: ' . htmlspecialchars($row['date']) . '</p>';
                                        echo '<p class="duration"><i class="far fa-hourglass"></i>Duration : ' . htmlspecialchars($row['duration']). '</p>';
                                    echo "</div>";
                                echo "</div>";
                                echo '<div class="trailer-container" style="display: none;">';
                                    echo '<button class="close-button">Close</button>';
                                    echo '<iframe class="video-iframe" title="Trailer" width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                echo "</div>";                        
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No movies available in this section.</p>";
                    }                    
                    ?>
                </div>
            </div>

            <!-- Coming Soon -->
            <div class="home-card">
                <div class="home-card-content">
                    <h3 class="home-card-title">Coming Soon</h3>
                    <?php
                    $query = "SELECT * FROM movies WHERE section = 'Coming Soon'";  // Change the section as needed
                    $result = $conn->query($query);
                    
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='home-card'>";
                                echo '<div class="thumbnail-container">
                                    <img src="' . htmlspecialchars($row['thumbnail']) . '" alt="Video Thumbnail" class="video-thumbnail" data-video-url="' . htmlspecialchars($row['video_url']) . '">
                                </div>';      
                                echo '<div class="info">';
                                echo '<div class="tag">' . htmlspecialchars($row['category']) . '</div>';
                                    echo '<h3 class="title">' . htmlspecialchars($row['title']) . '</h3>';
                                    echo '<p class="description">' . htmlspecialchars($row['description']) . '</p>';
                                    echo '<div class="details">';
                                        echo '<p class="date"><i class="material-icons">date_range</i>Date: ' . htmlspecialchars($row['date']) . '</p>';
                                        echo '<p class="duration"><i class="far fa-hourglass"></i>Duration : ' . htmlspecialchars($row['duration']). '</p>';
                                    echo "</div>";
                                echo "</div>";
                                echo '<div class="trailer-container" style="display: none;">';
                                    echo '<button class="close-button">Close</button>';
                                    echo '<iframe class="video-iframe" title="Trailer" width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                echo "</div>";                        
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No movies available in this section.</p>";
                    }                    
                    ?>
                </div>
            </div>

            <!-- home Card 1 -->
            <div class="home-card">
                <div class="home-card-content">
                    <h3 class="home-card-title">Food & Drinks</h3>
                    <div class="home-card">
                        <img src="view\img\FOOD\pop.jpg" alt="home  1" style="width: 200px;">
                        <img src="view\img\FOOD\nachos.jpg" alt="home  1" style="width: 300px;">
                        <img src="view\img\FOOD\chips.jpg" alt="home  1" style="width: 200px;">
                        <img src="view\img\FOOD\cola.jpg" alt="home  1" style="width: 200px;">
                    </div>
                    <p class="home-card-description"><h4>Order your favorite snacks and pick them up from the special express checkout at Cinema.Movies</h4></p>
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
                <img src="view\img\HOME\MEMBER.JPG" alt="home  1" class="home-card-image">
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