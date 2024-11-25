<?php
session_start();
if(!isset($_SESSION["uname"]))
{
	header("Location:index.php");
}
?>
<?php
require 'db.php'; // Include the db.php file to define $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role']; // 'Customer' or 'Employee'

    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
