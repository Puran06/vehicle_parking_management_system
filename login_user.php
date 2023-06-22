<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "vpms");

// Handle form submission
if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
		session_start();
		$_SESSION["email"] = $email;
		header("Location: user_html_dashboard.php");
		exit();
	} else {
		echo "<script>alert('Invalid email or password');</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="user_style.css">
</head>
<body>
	<div class="container">
		<div class="form-container">
			<form id="login-form" action="login_user.php" method="post">
				<h2>Login</h2>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
				<button type="submit" name="login">Login</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="user_script.js"></script>
</body>
</html>