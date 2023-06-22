<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="user_d_style.css">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
  <h1>Dashboard</h1>
  <div class="dashboard-container">
    <div class="option-card">
      <h2>Profile</h2>
      <button class="option-button" onclick="toggleVisibility('profile-options')">Show Options</button>
      <div id="profile-options" class="option-container">
        <form>
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name">

          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email">

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password">

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>

    <div class="option-card">
      <h2>Vehicle</h2>
      <button class="option-button" onclick="toggleVisibility('vehicle-options')">Show Options</button>
      <div id="vehicle-options" class="option-container">
        <form>
          <label for="make">Make</label>
          <input type="text" id="make" name="make" placeholder="Enter your vehicle's make">

          <label for="model">Model</label>
          <input type="text" id="model" name="model" placeholder="Enter your vehicle's model">

          <label for="color">Color</label>
          <input type="text" id="color" name="color" placeholder="Enter your vehicle's color">

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>

    <div class="option-card">
      <h2>Reservation</h2>
      <button class="option-button" onclick="toggleVisibility('reservation-options')">Show Options</button>
      <div id="reservation-options" class="option-container">
        <form>
          <label for="date">Date</label>
          <input type="date" id="date" name="date">

          <label for="time">Time</label>
          <input type="time" id="time" name="time">

          <label for="duration">Duration (in hours)</label>
          <input type="number" id="duration" name="duration" min="1" max="24" step="1">

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>

    <div class="option-card">
      <h2>Status</h2>
      <button class="option-button" onclick="toggleVisibility('status-result')">Check Availability</button>
      <div id="status-result" class="option-result"></div>
    </div>

    <div class="option-card">
      <h2>Payment</h2>
      <h3>Current Balance: $100</h3>
      <table>
        <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Amount</th>
        </tr>
        <tr>
          <td>01/01/2022</td>
          <td>Monthly fee</td>
          <td>$50</td>
        </tr>
        <tr>
          <td>02/01/2022</td>
          <td>Overdue fee</td>
          <td>$50</td>
        </tr>
      </table>
    </div>

    <div class="option-card">
      <h2>Feedback</h2>
      <button class="option-button" onclick="toggleVisibility('feedback-options')">Show Options</button>
      <div id="feedback-options" class="option-container">
        <form id="feedback-form">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" placeholder="Enter feedback subject">

          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Enter your feedback message"></textarea>

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>

  <div class="logout-form">
    <form method="post" action="logout.php">
      <button type="submit">Logout</button>
    </form>
  </div>
</div>
<script src="user_d_script.js"></script>
</body>
</html>
