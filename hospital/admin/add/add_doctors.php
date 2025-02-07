<!DOCTYPE html>
<html>
  <head>
    <title>Add Doctors</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <?php
      // Define variables and set to empty values
 include 'config.php';
session_start();
      $name = $age = $specialty = $phone_number = $email = "";
     


      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $name = test_input($_POST["name"]);
        $age = test_input($_POST["age"]);
        $specialty = test_input($_POST["specialty"]);
        $phone_number = test_input($_POST["phone_number"]);
        $email = test_input($_POST["email"]);
        

        // Connect to the MySQL database
       // $conn = new mysqli("localhost", "root", "mohamed111111", "hospital");
       // if ($conn->connect_error) {
         // die("Connection failed: " . $conn->connect_error);
       // }

        // Prepare the SQL statement
        $sql = "INSERT INTO doctors (name, age, specialty, phone_number, email) VALUES ('$name', '$age', '$specialty', '$phone_number', '$email')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
          echo "Doctor added successfully";
        } else {
          echo "Error adding Doctor " . $conn->error;
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

    <h2>Add Doctors</h2>

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
      
      <input type="submit" value="Submit">
    </form>

  </body>
</html>