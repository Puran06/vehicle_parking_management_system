<?php
  session_start(); // Start the session
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Vehicle Parking Management System</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Vehicle Parking Management System</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#users">Users</a></li>
        <li><a href="#parking_lots">Parking Lots</a></li>
        <li><a href="#vehicle_entries">Vehicle Entries</a></li>
        <li><a href="#parking_fees">Parking Fees</a></li>
      </ul>
    </nav>
    <section id="users">
      <h2>Users</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="users-table-body">
         
        </tbody>
      </table>
      <form id="add-user-form" method="POST" onsubmit="event.preventDefault(); addUser();">
        <h3>Add User</h3>
        <label for="user-name">Name:</label>
        <input type="text" id="user-name" name="name" required>
        <label for="user-email">Email:</label>
        <input type="email" id="user-email" name="email" required>
        <label for="user-password">Password:</label>
        <input type="password" id="user-password" name="password" required>
        <label for="user-phone">Phone:</label>
        <input type="text" id="user-phone" name="phone" required>
        <button type="submit">Add User</button>
      </form>
      <div id="edit-user-form-container"></div>
      
    </section>
    <section id="parking_lots">
      <h2>Parking Lots</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Slots</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="parking-lots-table-body">
          <!-- Parking lot rows will be dynamically added here -->
        </tbody>
      </table>
      <form id="add-parking-lot-form">
        <h3>Add Parking Lot</h3>
        <label for="parking-lot-name">Name:</label>
        <input type="text" id="parking-lot-name" name="name" required>
        <label for="parking-lot-location">Location:</label>
        <input type="text" id="parking-lot-location" name="location" required>
        <label for="parking-lot-slots">Slots:</label>
        <input type="number" id="parking-lot-slots" name="slots" required>
        <button type="submit">Add Parking Lot</button>
      </form>
      <div id="edit-parking-lot-form-container"></div>
    </section>

    <section id="vehicle_entries">
  <h2>Vehicle Entries</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Vehicle Number</th>
        <th>Entry Time</th>
        <th>Parking Lot</th>
        <th>Parking Slot</th>
        <th>Exit Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="vehicle-entries-table-body">
      <!-- Vehicle entry rows will be dynamically added here -->
    </tbody>
  </table>
  <form id="add-vehicle-entry-form">
    <h3>Add Vehicle Entry</h3>
    <label for="vehicle-number">Vehicle Number:</label>
    <input type="text" id="vehicle-number" name="vehicle_number" required>
    <label for="entry-time">Entry Time:</label>
    <input type="datetime-local" id="entry-time" name="entry_time" required>
    <label for="parking-lot">Parking Lot:</label>
    <input type="text" id="parking-lot" name="parking_lot" required>
    <label for="parking-slot">Parking Slot:</label>
    <input type="number" id="parking-slot" name="parking_slot" required>
    <label for="exit-time">Exit Time:</label>
    <input type="datetime-local" id="exit-time" name="exit_time" required>
    <button type="submit">Add Vehicle Entry</button>
  </form>
  <div id="edit-vehicle-entry-form-container"></div>
</section>


    <section id="parking_fees">
      <h2>Parking Fees</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Vehicle Number</th>
            <th>Parking Lot</th>
            <th>Parking Slot</th>
            <th>Entry Time</th>
            <th>Exit Time</th>
            <th>Total Time</th>
            <th>Total Cost</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="parking-fees-table-body">
          <!-- Parking fee rows will be dynamically added here -->
        </tbody>
      </table>
    </section>
    <script src="users.js"></script>
    <script src="parking_lots.js"></script>
    <script src="vehicle_entries.js"></script>
    <script src="parking_fees.js"></script>
  </body>
</html>
