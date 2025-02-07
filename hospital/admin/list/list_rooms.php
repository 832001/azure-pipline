<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
	
		<h2>Rooms</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>Room Number</th>
				<th>Room Type</th>
				<th>Availability</th>
			</tr>
			<?php
				// connect to the database
				 include 'config.php';
session_start();

				// query the rooms table
				$sql = "SELECT * FROM rooms";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['room_number'] ."</td>";
					echo "<td>" . $row['room_type'] . "</td>";
					echo "<td>" . ($row['availability'] ? 'Yes' : 'No') . "</td>";
					echo "</tr>";
				}

				// close the database connection
				mysqli_close($conn);
			?>
		</table>
	</div>
</body>
</html>