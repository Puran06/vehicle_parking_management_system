<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vpms";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])) {
    // Retrieve user data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Prepare and execute the SQL statement to insert the user into the database
    $sql = "INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
    if ($conn->query($sql) === TRUE) {
        // User created successfully
        echo "User created successfully.";
    } else {
        // Error occurred while creating the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// READ operation
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if a specific user ID is requested
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and execute the SQL statement to fetch the user from the database
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "User not found.";
        }
    } else {
        // No specific user ID requested, fetch all users
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        } else {
            echo "No users found.";
        }
    }
}

// UPDATE operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Prepare and execute the SQL statement to update the user in the database
    $sql = "UPDATE users SET name='$name', email='$email', password='$password', phone='$phone' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // User updated successfully
        echo "User updated successfully.";
    } else {
        // Error occurred while updating the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// DELETE operation
if ($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement to delete the user from the database
    $sql = "DELETE FROM users WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // User deleted successfully
        echo "User deleted successfully.";
    } else {
        // Error occurred while deleting the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
