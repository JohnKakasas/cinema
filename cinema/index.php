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
    <button class="button6 active" onclick="document.location='index.php'">
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
    <div class="categories-title-container">
        <div class="categories-title-left-container">
            <h3><i class="fa fa-th-large" style="font-size:24px; margin-right: 10px;"></i> Categories</h3>
        </div>
        <div class="categories-title-right-container">
            <button class="button5" id="list-view"><i class='fas fa-bars'></i></button>
            <button class="button5" id="grid-view"><i class='fa fa-th'></i></button>
        </div>
    </div>
    <div class="categories-container">
        <div class="categories">
            <button class="category-arrow button4" id="prev-arrow"><i class="material-icons">keyboard_arrow_left</i></button>
            <button class="category button3 active" data-category="all">All</button> <!-- New All button -->
            <button class="category button3" data-category="THRILLER">THRILLER</button>
            <button class="category button3" data-category="DRAMA">DRAMA</button>
            <button class="category button3" data-category="ANIMATION">ANIMATION</button>
            <button class="category button3" data-category="HORROR">HORROR</button>
            <button class="category button3" data-category="COMEDY">COMEDY</button>
            <button class="category button3" data-category="MUSIC">MUSIC</button>
            <button class="category button3" data-category="ACTION">ACTION</button>
            <button class="category button3" data-category="ROMANCE">ROMANCE</button>
            <button class="category button3" data-category="ANIME">ANIME</button>

            <button class="category-arrow button4" id="next-arrow"><i class="material-icons">keyboard_arrow_right</i></button>
        </div>
    </div>
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


        <?php
        require 'db.php'; // Include your database connection file

        $sql = "SELECT * FROM movies";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
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
                echo '<p class="duration"><i class="far fa-hourglass"></i>Duration : ' . htmlspecialchars($row['duration']). '</p>';
                echo '</div></div>';
                echo '<div class="trailer-container" style="display: none;">';
                echo '<button class="close-button">Close</button>';
                echo '<iframe class="video-iframe" title="Trailer" width="560" height="315" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                echo '</div></div>';
                // Ensure the movie exists before accessing its properties
                if (isset($movie['id'])) {
                    echo "<button class='like-btn' data-movie-id='" . $movie['id'] . "' onclick='likeMovie(this)'>Like</button>";
                }

                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No movies found.";
        }
        ?>
<div class="form-container">
    <h2>Reserve Your Movie</h2>
    <form id="reservationForm" method="POST">
        <div class="form-group">
            <label for="movie">Select Movie:</label>
            <select id="movie" name="movie_id" required>
                <option value="" disabled selected>Select a movie</option>
                <?php
                // Fetch movies from the database
                $query = "SELECT id, title FROM movies";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['title']}</option>";
                    }
                } else {
                    echo "<option value='' disabled>No movies available</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="show_date">Select Date:</label>
            <input type="date" id="show_date" name="show_date" required>
        </div>

        <div class="form-group">
            <label for="show_time">Select Time:</label>
            <input type="time" id="show_time" name="show_time" required>
        </div>

        <div class="form-group">
            <label for="seat">Enter Seat Number:</label>
            <input type="text" id="seat" name="seat_number" placeholder="Enter Seat Number" required>
        </div>

        <button type="submit" class="submit-btn">Reserve</button>
    </form>
</div>

<!-- Modal for Reserve Movie -->
<div id="reserveModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <iframe id="reserveFrame" src="" frameborder="0" width="100%" height="400px"></iframe>
    </div>
</div>
<div id="toast" class="toast"></div>


    </div>
</div>
<?php include 'view/footer.html'; ?>
<script src="view/activecategoryred.js"></script>
<script src="view/categoryhideactives.js"></script>
<script src="view/draging.js"></script>
<script src="view/gridlist.js"></script>
<script src="view/iframetrailer.js"></script>
<script src="view/sidebarhide.js"></script>
<script src="view/reserve.js"></script>



</body>
</html>