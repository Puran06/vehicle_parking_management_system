<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin_dashboard_style.css">
</head>
<body>
	<!-- Navigation bar -->
	<div class="navbar">
		<a href="#">Dashboard</a>
		<a href="#">Users</a>
		<a href="#">Parking Lots</a>
		<a href="#">Vehicle Entry/Exit</a>
		<a href="#">Parking Fees</a>
		<a href="#">Logout</a>
	</div>

	<!-- Main content area -->
	<div class="main-content">
		<h1>Dashboard Overview</h1>
		<div class="metrics">
			<div class="metric">
				<h2>Total Users</h2>
				<p>100</p>
			</div>
			<div class="metric">
				<h2>Active Parking Slots</h2>
				<p>50</p>
			</div>
			<div class="metric">
				<h2>Occupied Slots</h2>
				<p>30</p>
			</div>
			<div class="metric">
				<h2>Revenue Generated</h2>
				<p>$500</p>
			</div>
		</div>

		<!-- Users table -->
		<h2>Users</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>John Doe</td>
					<td>johndoe@example.com</td>
					<td>123-456-7890</td>
					<td>
						<button>Edit</button>
						<button>Delete</button>
					</td>
				</tr>
				<!-- Repeat for other users -->
			</tbody>
		</table>
		<button>Add User</button>

		<!-- Parking lots table -->
		<h2>Parking Lots</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Location</th>
					<th>Number of Slots</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Parking Lot A</td>
					<td>Main Street</td>
					<td>50</td>
					<td>
						<button>Edit</button>
						<button>Delete</button>
					</td>
				</tr>
				<!-- Repeat for other parking lots -->
			</tbody>
		</table>
		<button>Add Parking Lot</button>

		<!-- Vehicle entry/exit table -->
		<h2>Vehicle Entry/Exit</h2>
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
			<tbody>
				<tr>
					<td>1</td>
			
					<td>ABC-123</td>
					<td>2023-06-17 09:00:00</td>
					<td>Parking Lot A</td>
					<td>1</td>
					<td>2023-06-17 18:00:00</td>
					<td>
						<button>Edit</button>
						<button>Delete</button>
					</td>
				</tr>
				<!-- Repeat for other vehicle entries -->
			</tbody>
		</table>
		<button>Add Vehicle Entry</button>

		<!-- Parking fees table -->
		<h2>Parking Fees</h2>
		<table>
			<thead>
				<tr>
					<th>Vehicle Type</th>
					<th>Parking Duration</th>
					<th>Fee</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Car</td>
					<td>1 hour</td>
					<td>$5</td>
					<td>
						<button>Edit</button>
					</td>
				</tr>
				<!-- Repeat for other parking fees -->
			</tbody>
		</table>
		<button>Add Parking Fee</button>
	</div>
</body>
<script src="admin_dashboard.js"></script>
</html>