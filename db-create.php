<?php
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "dbname";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // sql to drop table
  $dropsql = "DROP TABLE IF EXISTS friend;";

  // sql to create table
  $sql = "CREATE TABLE friend (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  age INT(3) NOT NULL
  )";

  mysqli_query($conn, $dropsql);

  if (mysqli_query($conn, $sql)) {
      echo "Table friend created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
