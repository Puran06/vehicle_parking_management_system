<!DOCTYPE html>
<html>
<head>
	<title>User Login and Registration Form</title>
	<link rel="stylesheet" type="text/css" href="user_style.css">
</head>
<body>
	<div class="container">
		<div class="form-container">
			<form id="login-form" action="login_user.php" method="post">
				<h2>Login</h2>
				<label for="email">Email:</label>
				<input type="email" id="login-email" name="email" required>
				<label for="password">Password:</label>
				<input type="password" id="login-password" name="password" required>
				<button type="submit" name="login">Login</button>
				<p>Don't have an account? <a href="#" class="switch-link" onclick="showRegistrationForm()">Register</a></p>
			</form>
			<form id="register-form" action="registration_user.php" method="post">
				<h2>Register</h2>
				<label for="name">Name:</label>
				<input type="text" id="register-name" name="name" required>
				<label for="email">Email:</label>
				<input type="email" id="register-email" name="email" required>
				<label for="password">Password:</label>
				<input type="password" id="register-password" name="password" required>
				<label for="confirm-password">Confirm Password:</label>
				<input type="password" id="confirm-password" name="confirm-password" required>
				<button type="submit" name="register">Register</button>
				<p>Already have an account? <a href="#" class="switch-link" onclick="showLoginForm()">Login</a></p>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="user_script.js"></script>
</body>
</html>
