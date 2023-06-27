<?php
// Start a session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vpms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Handle admin login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Check if username and password are correct
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
		// Set session variables and redirect to dashboard
		$_SESSION["admin_username"] = $username;
		header('Location: ../y/dashboard.php');
		exit();
	} else {
		// Display error message
		echo "Invalid username or password.";
	}
}
?>