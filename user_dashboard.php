
<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Check if user submitted the profile form
if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
  // Update user profile in the database
  // ...
}

// Check if user submitted the vehicle form
if (isset($_POST['make'], $_POST['model'], $_POST['color'])) {
  // Add user vehicle to the database
  // ...
}

// Check if user submitted the reservation form
if (isset($_POST['date'], $_POST['time'], $_POST['duration'])) {
  // Add user reservation to the database
  // ...
}

// Check if user checked the parking availability
if (isset($_POST['availability'])) {
  // Check parking availability and return response
  // ...
}

// Check if user submitted feedback
if (isset($_POST['subject'], $_POST['message'])) {
  // Save user feedback to the database
  // ...
}

// Logout user if logout form is submitted
if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: login.php');
  exit();
}
?>

<?php include 'user_html_dashboard.php'; ?>