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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['location']) && isset($_POST['slots'])) {
    // Retrieve parking lot data from the form
    $name = $_POST['name'];
    $location = $_POST['location'];
    $slots = $_POST['slots'];

    // Prepare and execute the SQL statement to insert the parking lot into the database
    $sql = "INSERT INTO parking_lots (name, location, slots) VALUES ('$name', '$location', '$slots')";
    if ($conn->query($sql) === TRUE) {
        // Parking lot created successfully
        echo "Parking lot created successfully.";
    } else {
        // Error occurred while creating the parking lot
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// READ operation
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if a specific parking lot ID is requested
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and execute the SQL statement to fetch the parking lot from the database
        $sql = "SELECT * FROM parking_lots WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "Parking lot not found.";
        }
    } else {
        // No specific parking lot ID requested, fetch all parking lots
        $sql = "SELECT * FROM parking_lots";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $parkingLots = array();
            while ($row = $result->fetch_assoc()) {
                $parkingLots[] = $row;
            }
            echo json_encode($parkingLots);
        } else {
            echo "No parking lots found.";
        }
    }
}

// UPDATE operation
if ($_SERVER["REQUEST_METHOD"] == "PUT" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $slots = $_POST['slots'];

    // Prepare and execute the SQL statement to update the parking lot in the database
    $sql = "UPDATE parking_lots SET name='$name', location='$location', slots='$slots' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // Parking lot updated successfully
        echo "Parking lot updated successfully.";
    } else {
        // Error occurred while updating the parking lot
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// DELETE operation
if ($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement to delete the parking lot from the database
    $sql = "DELETE FROM parking_lots WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // Parking lot deleted successfully
        echo "Parking lot deleted successfully.";
    } else {
        // Error occurred while deleting the parking lot
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
