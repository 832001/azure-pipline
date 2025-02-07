<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli("localhost", "root", "mohamed111111", "hospital");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the user input password using the SHA-256 hash function
$hashed_username = hash('sha256',  $_POST['username']);
$hashed_password = hash('sha256', $_POST['password']);

// SQL query to check if username and hashed password match
$sql = "SELECT * FROM admin WHERE admin_name='$hashed_username' AND admin_password='$hashed_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Successful login, redirect to admin page
    header("Location: admin/list_add.php");
} else {
    // Failed login,show error message
    echo "Invalid username or password.";

}

$conn->close();
?>