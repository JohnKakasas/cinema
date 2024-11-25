<?php
session_start();
if(isset($_SESSION["uname"]))
{
	header("Location:profile.php");
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username']; // Use username instead of email
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Successful login logic here
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['uname'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'Employee') {
                header("Location: employee_dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        }
    }
    echo "Invalid username or password.";
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
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
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








<div class="form-container">
    <!-- Form Toggle Buttons -->
    <div class="form-toggle">
        <button id="login-btn" class="toggle-btn active">Login</button>
        <button id="register-btn" class="toggle-btn">Register</button>
    </div>

    <!-- Login Form -->
    <form id="login-form" class="form-content active" action="login.php" method="POST">
        <h3 class="form-title">Login</h3>
        <input type="text" class="form-input" name="username" placeholder="Username" required>
        <input type="password" class="form-input" name="password" placeholder="Password" minlength="8" required>
        <button type="submit" class="form-submit">Login</button>
        <p class="form-switch">Don't have an account? <span id="switch-to-register">Register</span></p>
    </form>

    <!-- Register Form -->
    <form id="register-form" class="form-content" action="register.php" method="POST">
        <h3 class="form-title">Register</h3>
        <input type="text" class="form-input" name="username" placeholder="Username" required>
        <input type="password" class="form-input" name="password" placeholder="Password" minlength="8" required>
        <select class="form-input" name="role" required>
            <option value="Customer">Customer</option>
            <option value="Employee">Employee</option>
        </select>
        <button type="submit" class="form-submit">Register</button>
        <p class="form-switch">Already have an account? <span id="switch-to-login">Login</span></p>
    </form>
</div>










</div>
<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>