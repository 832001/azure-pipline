<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
	
		<h2>Bills</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>Patient ID</th>
				<th>Date Created</th>
				<th>Description</th>
				<th>Amount</th>
				<th>Payment Status</th>


			</tr>
			<?php
				// connect to the database
				 include 'config.php';
session_start();

				// query the bills table
				$sql = "SELECT * FROM bills";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['bill_id'] . "</td>";
					echo "<td>" . $row['patient_id'] . "</td>";
					echo "<td>" . $row['date_of_service'] . "</td>";
					echo "<td>" . $row['description'] . "</td>";
					echo "<td>" . $row['charge'] . "</td>";
					echo "<td>" . $row['payment_status'] . "</td>";

					echo "</tr>";
				}

				// close the database connection
				mysqli_close($conn);
			?>
		</table>
		
	</div>
</body>
</html>