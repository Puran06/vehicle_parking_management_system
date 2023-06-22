<!DOCTYPE html>
<html>
<head>
	<title>Admin Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	<script type="text/javascript" src="adminscript.js"></script>
</head>
<body>
	<div class="container">
		<div class="form-box">
			<h1>Admin Login and Registration</h1>
			<div id="loginForm">
				<h2>Login</h2>
				<form method="post" action="admin_login.php" onsubmit="return validateLogin()">
					<label for="loginUsername">Username:</label>
					<input type="text" id="loginUsername" name="username" required>
					<br>
					<label for="loginPassword">Password:</label>
					<input type="password" id="loginPassword" name="password" required>
					<br>
					<p class="error-message" id="loginErrorMessage"></p>
					<input type="submit" value="Login">
					<p>Don't have an account? <a href="#" class="switch-link" onclick="showRegistrationForm()">Register</a></p>
				</form>
			</div>
			<div id="registrationForm" style="display: none;">
				<h2>Register</h2>
				<form method="post" action="admin_register.php" onsubmit="return validateRegister()">
					<label for="registerName">Name:</label>
					<input type="text" id="registerName" name="name" required>
					<br>
					<label for="registerUsername">Username:</label>
					<input type="text" id="registerUsername" name="username" required>
					<br>
					<label for="registerPassword">Password:</label>
					<input type="password" id="registerPassword" name="password" required>
					<br>
					<p class="error-message" id="registerErrorMessage"></p>
					<input type="submit" value="Register">
					<p>Already have an account? <a href="#" class="switch-link" onclick="showLoginForm()">Login</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="adminscript.js"></script>
</html>
