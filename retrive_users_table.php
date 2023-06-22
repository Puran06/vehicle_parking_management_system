<?php
// Include the function and the database connection file
include 'db_connection.php';
include 'functions.php';

// Get all users
$users = get_all_users();

// Print the user details
foreach ($users as $user) {
  echo "Name: " . $user['name'] . "<br>";
  echo "Email: " . $user['email'] . "<br>";
}
?>