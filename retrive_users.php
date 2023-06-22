<?php
// Include the database connection file
include 'db_connection.php';

function get_all_users() {
  global $conn;
  
  // Prepare the SQL query
  $sql = "SELECT * FROM users";
  
  // Execute the query
  $result = $conn->query($sql);
  
  // Fetch the rows as an associative array
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  
  // Free the result set
  $result->free();
  
  // Return the rows
  return $rows;
}
?>