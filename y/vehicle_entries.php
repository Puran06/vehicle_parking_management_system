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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vehicle_number']) && isset($_POST['entry_time']) && isset($_POST['parking_lot']) && isset($_POST['parking_slot']) && isset($_POST['exit_time'])) {
    // Retrieve vehicle entry data from the form
    $vehicleNumber = $_POST['vehicle_number'];
    $entryTime = $_POST['entry_time'];
    $parkingLot = $_POST['parking_lot'];
    $parkingSlot = $_POST['parking_slot'];
    $exitTime = $_POST['exit_time'];

    // Prepare and execute the SQL statement to insert the vehicle entry into the database
    $sql = "INSERT INTO vehicle_entries (vehicle_number, entry_time, parking_lot, parking_slot, exit_time) VALUES ('$vehicleNumber', '$entryTime', '$parkingLot', '$parkingSlot', '$exitTime')";
    if ($conn->query($sql) === TRUE) {
        // Vehicle entry created successfully
        echo "Vehicle entry created successfully.";
    } else {
        // Error occurred while creating the vehicle entry
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// READ operation
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if a specific vehicle entry ID is requested
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and execute the SQL statement to fetch the vehicle entry from the database
        $sql = "SELECT * FROM vehicle_entries WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "Vehicle entry not found.";
        }
    } else {
        // No specific vehicle entry ID requested, fetch all vehicle entries
        $sql = "SELECT * FROM vehicle_entries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $vehicleEntries = array();
            while ($row = $result->fetch_assoc()) {
                $vehicleEntries[] = $row;
            }
            echo json_encode($vehicleEntries);
        } else {
            echo "No vehicle entries found.";
        }
    }
}

// UPDATE operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $vehicleNumber = $_POST['vehicle_number'];
    $entryTime = $_POST['entry_time'];
    $parkingLot = $_POST['parking_lot'];
    $parkingSlot = $_POST['parking_slot'];
    $exitTime = $_POST['exit_time'];

    // Prepare and execute the SQL statement to update the vehicle entry in the database
    $sql = "UPDATE vehicle_entries SET vehicle_number='$vehicleNumber', entry_time='$entryTime', parking_lot='$parkingLot', parking_slot='$parkingSlot', exit_time='$exitTime' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // Vehicle entry updated successfully
        echo "Vehicle entry updated successfully.";
    } else {
        // Error occurred while updating the vehicle entry
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// DELETE operation
if ($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement to delete the vehicle entry from the database
    $sql = "DELETE FROM vehicle_entries WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // Vehicle entry deleted successfully
        echo "Vehicle entry deleted successfully.";
    } else {
        // Error occurred while deleting the vehicle entry
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
