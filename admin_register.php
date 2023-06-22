<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'vpms');

// Check if connection was successful
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

// Check if admin table exists
$result = mysqli_query($conn, "SHOW TABLES LIKE 'admin'");
if ($result->num_rows == 0) {
    die("Error: admin table doesn't exist");
}

// Insert admin data into database
$query = "INSERT INTO admin (name, username, password) VALUES ('$name', '$username', '$password')";
if (mysqli_query($conn, $query)) {
    echo "Admin registered successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>