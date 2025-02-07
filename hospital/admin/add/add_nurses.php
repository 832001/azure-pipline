<!DOCTYPE html>
<html>
  <head>
    <title>Add Nurses</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <?php
      // Define variables and set to empty values
      $name = $age = $specialty = $phone_number = $email =$room_id = "";
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $name = test_input($_POST["name"]);
        $age = test_input($_POST["age"]);
        $specialty = test_input($_POST["specialty"]);
        $phone_number = test_input($_POST["phone_number"]);
        $email = test_input($_POST["email"]);
        $room = test_input($_POST["room_id"]);

        

        // Connect to the MySQL database
include 'config.php';
session_start();

    

        // Prepare the SQL statement
        $sql = "INSERT INTO nurses (name, age, specialty, phone_number, email, room_id) VALUES ('$name', '$age', '$specialty', '$phone_number', '$email' ,'$room')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
          echo "Nurse added successfully";
        } else {
          echo "Error adding Nurse " . $conn->error;
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

    <h2>Add Nurses</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>

      <label for="age">Age:</label>
      <input type="tel" id="age" name="age"><br><br>

      <label for="specialty">specialty:</label>
      <input type="text" id="specialty" name="specialty"><br><br>
      <label for="phone_number">Phone Number:</label>
      <input type="tel" id="phone_number" name="phone_number"><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email"><br><br>
      <label for="age">Room ID:</label>
      <input type="tel" id="room_id" name="room_id"><br><br>
      
      <input type="submit" value="Submit">
    </form>

  </body>
</html>