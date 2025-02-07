<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
		
	
		<h2>Medical Records</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>Patient ID</th>
				<th>Doctor ID</th>
				<th>Nurse ID</th>
				<th>The Last Visit Date</th>
				<th>Diagnosis</th>
				<th>Treatment Plan</th>
				<th>Prescription</th>
			</tr>
			<?php
				// connect to the database
				 include 'config.php';
session_start();

				// query the medical records table
				$sql = "SELECT * FROM medical_records";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['record_id'] . "</td>";
					echo "<td>" . $row['patient_id'] . "</td>";
					echo "<td>" . $row['doctor_id'] . "</td>";
					echo "<td>" . $row['nurse_id'] . "</td>";
					echo "<td>" . $row['visit_date'] . "</td>";
					echo "<td>" . $row['diagnosis'] . "</td>";
					echo "<td>" . $row['treatment_plan'] . "</td>";
					echo "<td>" . $row['prescription'] . "</td>";
					echo "</tr>";
				}

				// close the database connection
				mysqli_close($conn);
			?>
	</div>
</body>
</html>