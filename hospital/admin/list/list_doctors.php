<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
		<h1>Hospital Management System</h1>
		<h2>Doctors</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>Specialty</th>
				<th>Phone</th>
				<th>Email</th>

			</tr>
			<?php
				// connect to the database
	 include 'config.php';
session_start();

				// query the doctors table
				$sql = "SELECT * FROM doctors";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['doctor_id'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['age'] . "</td>";
					echo "<td>" . $row['specialty'] . "</td>";
					echo "<td>" . $row['phone_number'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";

					echo "</tr>";
				}

				// close the database connection
				mysqli_close($conn);
			?>
		</table>
		
	</div>
</body>
</html>