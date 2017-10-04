<?php
  $servername = "localhost";
  $username = "id3118717_crawford";
  $password = "e@rthw1ndf1r3";
  $dbname = "id3118717_database";

  $count = 0;

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['submit'])) {

  $handle = fopen($_FILES['upfile']['tmp_name'], "r");

  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $querystr="INSERT into friendt(name,phone,age)values('$data[0]','$data[1]','$data[2]')";
      $conn->query ($querystr);
      $count++;
  }
  fclose($handle);

  echo "Success! <br><br>";
  echo "Added $count records to the database.";
  }
?>
