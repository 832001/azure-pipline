<!DOCTYPE html>
<html>
  <head>
    <title>Add Patient</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <?php
      // Define variables and set to empty values
      $name = $dob = $gender = $address = $phone_number = $email = $dob = $admission_date = $discharge_date = $room_id = "";
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $name = test_input($_POST["name"]);
        $dob = test_input($_POST["dob"]);
        $gender = test_input($_POST["gender"]);
        $address = test_input($_POST["address"]);
        $phone_number = test_input($_POST["phone_number"]);
        $email = test_input($_POST["email"]);
        $dob = test_input($_POST["dob"]);
        $admission_date = test_input($_POST["admission_date"]);
        $discharge_date = test_input($_POST["discharge_date"]);
        $room_id = test_input($_POST["room_id"]);

        // Connect to the MySQL database
       include 'config.php';
session_start();


        // Prepare the SQL statement
        $sql = "INSERT INTO patients (patient_id ,name, date_of_birth, gender, address, phone_number, email, dob, admission_date, discharge_date, room_id) VALUES ('5','$name', '$dob', '$gender', '$address', '$phone_number', '$email', '$dob', '$admission_date', '$discharge_date', '$room_id')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
          echo "Patient added successfully";
        } else {
          echo "Error adding patient: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
      }

      // Function to sanitize the input data
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <h2>Add Patient</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob"><br><br>
      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select><br><br>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address"><br><br>
      <label for="phone_number">Phone Number:</label>
      <input type="tel" id="phone_number" name="phone_number"><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email"><br><br>
      <label for="admission_date">Admission Date:</label>
      <input type="datetime-local" id="admission_date" name="admission_date"><br><br>
      <label for="discharge_date">Discharge Date:</label>
      <input type="datetime-local" id="discharge_date" name="discharge_date"><br><br>
      <label for="room_id">Room ID:</label>
      <input type="number" id="room_id" name="room_id"><br><br>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>