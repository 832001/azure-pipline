<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
		
	
		<h2>Patients</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th>Adress</th>
				<th>Phone</th>
				<th>Email</th>
				<th>dob</th>
				<th>Admission Date</th>
				<th>Discharge Date</th>
				<th>Room ID</th>
			</tr>
			<?php
				// connect to the database
			 include 'config.php';
session_start();

				// query the patients table
				$sql = "SELECT * FROM patients";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['patient_id'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['date_of_birth'] . "</td>";
					echo "<td>" . $row['gender'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "<td>" . $row['phone_number'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['dob'] . "</td>";
					echo "<td>" . $row['admission_date'] . "</td>";
					echo "<td>" . $row['discharge_date'] . "</td>";
					echo "<td>" . $row['room_id'] . "</td>";
					echo "</tr>";
				}

				// close the database connection
				mysqli_close($conn);
			?>
		</table>
		
	</div>
</body>
</html>