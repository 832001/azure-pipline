<!DOCTYPE html>
<html>
<head>
	<title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
	<div class="container">
		
		<h2>Nurses</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>specialty</th>
				<th>Phone</th>
				<th>Email</th>
                        <th>Room ID</th>
			</tr>
			<?php
				// connect to the database
			 include 'config.php';
session_start();

				// query the nurses table
				$sql = "SELECT * FROM nurses";
				$result = mysqli_query($conn, $sql);

				// loop through the results and display the data in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['nurse_id'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['age'] . "</td>";
					echo "<td>" . $row['specialty'] . "</td>";
					echo "<td>" . $row['phone_number'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
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