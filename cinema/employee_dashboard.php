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
        <button class="button5" onclick="document.location='logout.php'">
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

                    <!-- New Section Dropdown -->
                    <div class="form-group">
                        <label for="section">Section</label>
                        <select id="section" name="section" required>
                            <option value="" disabled selected>Select movie section</option>
                            <option value="Ready">Ready</option>
                            <option value="Playing Now">Playing Now</option>
                            <option value="Pre-sales">Pre-sales</option>
                            <option value="Coming Soon">Coming Soon</option>
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

            <div class="form-container">
                <h2>Upload News</h2>
                <form action="news_upload.php" method="POST" enctype="multipart/form-data" class="styled-form">
                    <div class="form-group">
                        <label for="title">News Title:</label>
                        <input type="text" id="title" name="title" placeholder="Enter news title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">News Description:</label>
                        <textarea id="description" name="description" rows="4" placeholder="Enter news description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="submit" value="Upload News" class="submit-btn">
                    </div>
                </form>
            </div>
            
            <div class="form-container">

                <?php
                
                if (!isset($_SESSION["uname"]) || $_SESSION["role"] !== 'Employee') {
                    header("Location: login.php");
                    exit;
                }

                // Fetch messages from the database
                $query = "SELECT id, name, email, subject, message, created_at FROM contact_messages ORDER BY created_at DESC";
                $result = $conn->query($query);

                ?>

                <h2>Contact Messages</h2>

                <?php if ($result->num_rows > 0): ?>
                    <table class="messages-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Received At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                    <td>
                                        <form method="POST" action="delete_message.php" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                            <input type="hidden" name="message_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit" class="reset-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No messages found.</p>
                <?php endif; ?>
            </div>

            <div class="form-container">
                <?php
                // Fetch Movies
                $query = "SELECT * FROM movies ORDER BY id DESC";
                $result = $conn->query($query);

                echo "<h2>Movies</h2>";
                if ($result && $result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Title</th><th>Action</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>
                                <form method='POST' action='employee_dashboard.php'>
                                    <input type='hidden' name='delete_movie_id' value='{$row['id']}'>
                                    <button class=reset-btn type='submit' name='delete_movie'>Delete</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No movies found.</p>";
                }
                ?>
            </div>

            <div class="form-container">
                <?php
                // Fetch News
                $query = "SELECT * FROM news ORDER BY id DESC";
                $result = $conn->query($query);

                echo "<h2>News</h2>";
                if ($result && $result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Title</th><th>Action</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>
                                <form method='POST' action='employee_dashboard.php'>
                                    <input type='hidden' name='delete_news_id' value='{$row['id']}'>
                                    <button class=reset-btn type='submit' name='delete_news'>Delete</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No news found.</p>";
                }
                ?>
            </div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Delete Movie
                if (isset($_POST['delete_movie']) && isset($_POST['delete_movie_id'])) {
                    $movie_id = (int) $_POST['delete_movie_id'];
                    $query = "DELETE FROM movies WHERE id = $movie_id";
                    if ($conn->query($query)) {
                        echo "<p>Movie deleted successfully.</p>";
                    } else {
                        echo "<p>Error deleting movie: " . $conn->error . "</p>";
                    }
                }

                // Delete News
                if (isset($_POST['delete_news']) && isset($_POST['delete_news_id'])) {
                    $news_id = (int) $_POST['delete_news_id'];
                    $query = "DELETE FROM news WHERE id = $news_id";
                    if ($conn->query($query)) {
                        echo "<p>News deleted successfully.</p>";
                    } else {
                        echo "<p>Error deleting news: " . $conn->error . "</p>";
                    }
                }
            }
            ?>

        </div> 
    </div>

    <?php include 'view/footer.html'; ?>
    <script src="view/script.js"></script>
</body>
</html>