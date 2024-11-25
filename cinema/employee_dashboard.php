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

</head>
<body>
<div class="sidebar">
    <button class="button1" id="toggle-button">
        <i class="fa fa-bars"></i>
        <span style="display: none;"></span> <!-- Initially hidden -->
    </button>
    <button class="button6 active" onclick="document.location='profile.php'">
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
    <button class="button6" onclick="document.location='liked.php'">
        <i class="far fa-thumbs-up"></i>
        <span class="sidebar-text" style="display: none;">Liked</span>
    </button>
    <!-- Add more buttons as needed -->
</div>
<?php include 'view/header.html'; ?>
<div class="content">






<!-- In the sidebar or anywhere in your HTML -->
<button class="button2" onclick="document.location='logout.php'">
    <i class="fas fa-sign-out-alt"></i>
    <span class="sidebar-text" style="display: none;">Logout</span>
</button>



    <!-- Flex container to arrange the form and reservations side by side -->
    <div class="dashboard-container">
        
        <!-- Pending Reservations Section (Left) -->
        <div class="reservations-container">
            <?php
            include 'db.php'; // Ensure you're including the correct database connection

            // Fetch pending reservations
            $query = "SELECT r.id, r.seat_number, r.status, r.show_date, r.show_time, m.title
                      FROM reservations r
                      JOIN movies m ON r.movie_id = m.id
                      WHERE r.status = 'Pending'"; // Ensure correct query

            // Execute the query
            $result = $conn->query($query);

            // Check for any database errors
            if ($conn->error) {
                echo "Error with the query: " . $conn->error;
            }

            // Check if query returned any results
            if ($result && $result->num_rows > 0) {
                echo "<div class='reservation-cards'>";
                // There are pending reservations
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='reservation-card'>";
                    echo "<div class='movie-title'><strong>Movie:</strong> {$row['title']}</div>";
                    echo "<div class='reservation-details'>";
                    echo "<p><strong>Show Date:</strong> {$row['show_date']} <strong>Time:</strong> {$row['show_time']}</p>";
                    echo "<p><strong>Seat:</strong> {$row['seat_number']}</p>";
                    echo "</div>";

                    // Create a form for approving/rejecting reservations
                    echo "<div class='reservation-actions'>";
                    echo "<form method='POST' action='approve_reservation.php'>
                            <input type='hidden' name='reservation_id' value='{$row['id']}'>
                            <button type='submit' name='action' value='approve' class='approve-btn'>Approve</button>
                            <button type='submit' name='action' value='reject' class='reject-btn'>Reject</button>
                          </form>";
                    echo "</div>";
                    echo "</div>"; // Close reservation card
                }
                echo "</div>"; // Close reservation-cards container
            } else {
                echo "<p>No pending reservations.</p>";
            }
            ?>
        </div>



        <div class="form-container">
    <h2>Manage Operating Hours</h2>
    <form action="update_hours.php" method="POST">
        <div class="form-group">
            <label for="day_of_week">Day of the Week:</label>
            <select name="day_of_week" id="day_of_week" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>

        <div class="form-group">
            <label for="opening_time">Opening Time:</label>
            <input type="time" id="opening_time" name="opening_time" required>
        </div>

        <div class="form-group">
            <label for="closing_time">Closing Time:</label>
            <input type="time" id="closing_time" name="closing_time" required>
        </div>

        <button type="submit" class="submit-btn">Update Hours</button>
    </form>

    <h3>Current Operating Hours</h3>
    <div class="hours-display">
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
            echo "<p>No hours set yet.</p>";
        }
        ?>
    </div>
    <div class="reset-container">
    <form action="reset_hours.php" method="POST" onsubmit="return confirm('Are you sure you want to reset all operating hours?');">
        <button type="submit" class="reset-btn">Reset All Hours</button>
    </form>
    </div>
    <?php
    if (isset($_GET['reset']) && $_GET['reset'] === 'success') {
        echo "<p class='success-message'>All operating hours have been reset successfully.</p>";
    }
    ?>
</div>





        <!-- Movie Upload Form Section (Right) -->
        <div class="form-container">
            <h2>Upload Movie</h2>
            <form action="upload_movie.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Movie Name</label>
                    <input type="text" name="title" placeholder="Movie Title" required>
                </div>

                <div class="form-group">
                    <label for="category">Category & Type</label>
                    <select id="category" name="category" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="THRILLER">THRILLER</option>
                        <option value="DRAMA">DRAMA</option>
                        <option value="ANIMATION">ANIMATION</option>
                        <option value="HORROR">HORROR</option>
                        <option value="COMEDY">COMEDY</option>
                        <option value="MUSIC">MUSIC</option>
                        <option value="ACTION">ACTION</option>
                        <option value="ROMANCE">ROMANCE</option>
                        <option value="ANIME">ANIME</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" required>
                </div>

                <div class="form-group">
                    <label for="video_url">Trailer URL</label>
                    <input type="text" id="video_url" name="video_url" placeholder="Enter trailer URL" required>
                </div>

                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" id="duration" name="duration" placeholder="Enter duration (e.g., 87')" required>
                </div>

                <div class="form-group">
                    <label for="date">Release Date (Year)</label>
                    <input type="text" id="date" name="date" placeholder="Enter release date (e.g., 2024)" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Enter description" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Upload Movie</button>
            </form>
        </div>
    </div>
</div>





<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>