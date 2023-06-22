<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "vpms");

// Handle form submission
if (isset($_POST["register"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm-password"];
	if ($password !== $confirm_password) {
		echo "<script>alert('Passwords do not match');</script>";
	} else {
		$query = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 0) {
			$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
			if (mysqli_query($conn, $query)) {
				echo "<script>alert('Registration successful');</script>";
			} else {
				echo "<script>alert('Registration failed');</script>";
			}
		} else {
			echo "<script>alert('Email already exists');</script>";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="user_style.css">
</head>
<body>
	<div class="container">
		<div class="form-container">
			<form id="register-form" action="registration_user.php" method="post">
				<h2>Register</h2>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
				<label for="confirm-password">Confirm Password:</label>
				<input type="password" id="confirm-password" name="confirm-password" required>
				<button type="submit" name="register">Register</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="user_script.js"></script>
</body>
</html>