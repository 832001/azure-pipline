<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
		
	
		<h2>Appointments</h2>
		<table>
			<tr>
				<th>Appointments ID</th>
				<th>Patient ID</th>
				<th>Doctor ID</th>
				<th>Appointments Date</th>
				<th>Appointments Status</th>
			</tr>
			<?php
				// connect to the database
			 include 'config.php';
session_start();

				// query the medical records table
				$sql = "SELECT * FROM appointments";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['appointment_id'] . "</td>";
					echo "<td>" . $row['patient_id'] . "</td>";
					echo "<td>" . $row['doctor_id'] . "</td>";
					echo "<td>" . $row['appointment_datetime'] . "</td>";
					echo "<td>" . $row['appointment_status'] . "</td>";
					echo "</tr>";
				}

				// close the database connection
				mysqli_close($conn);
			?>
	</div>
</body>
</html>