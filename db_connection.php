<?php
$host = 'localhost'; // Database host
$user = 'root'; // Database username
$password = ''; // Database password
$database = 'vpms'; // Database name

// Create a new mysqli object
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>