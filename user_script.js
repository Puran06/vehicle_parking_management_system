// Hide the registration form by default
document.getElementById("register-form").style.display = "none";

// Function to show the registration form
function showRegistrationForm() {
	document.getElementById("login-form").style.display = "none";
	document.getElementById("register-form").style.display = "block";
}

// Function to show the login form
function showLoginForm() {
	document.getElementById("register-form").style.display = "none";
	document.getElementById("login-form").style.display = "block";
}
