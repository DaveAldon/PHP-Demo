<?php
  $servername = "localhost";
  $username = "id3118717_crawford";
  $password = "e@rthw1ndf1r3";
  $dbname = "id3118717_database";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // sql to create table
  $sql = "CREATE TABLE friendt (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  age INT(3) NOT NULL
  )";

  if (mysqli_query($conn, $sql)) {
      echo "Table friendt created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
