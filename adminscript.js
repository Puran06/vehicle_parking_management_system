function showRegistrationForm() {
	document.getElementById("loginForm").style.display = "none";
	document.getElementById("registrationForm").style.display = "block";
}

function showLoginForm() {
	document.getElementById("registrationForm").style.display = "none";
	document.getElementById("loginForm").style.display = "block";
}

function validateLogin() {
	var username = document.getElementById("loginUsername").value;
	var password = document.getElementById("loginPassword").value;

	

	// Example validation for demonstration
	if (username.trim() === "" || password.trim() === "") {
		document.getElementById("loginErrorMessage").innerText = "Please enter a username and password.";
		return false;
	}

	return true;
}

function validateRegister() {
	var name = document.getElementById("registerName").value;
	var username = document.getElementById("registerUsername").value;
	var password = document.getElementById("registerPassword").value;
// Add login form validation logic here
	// Add registration form validation logic here
	function validateLogin() {
		var username = document.getElementById("loginUsername").value;
		var password = document.getElementById("loginPassword").value;
	  
		if (username.trim() === "" || password.trim() === "") {
		  document.getElementById("loginErrorMessage").innerText = "Please enter a username and password.";
		  return false;
		}
	  
		// Additional validation logic can be added here if needed
	  
		return true;
	  }
	  

	// Example validation for demonstration
	if (name.trim() === "" || username.trim() === "" || password.trim() === "") {
		document.getElementById("registerErrorMessage").innerText = "Please fill in all the fields.";
		return false;
	}

	return true;
}
