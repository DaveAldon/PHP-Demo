<?php
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "dbname";

  $count = 0;

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  echo '
  <!DOCTYPE html>
  <html xmlns="https://www.w3.org/1999/html">
  <head lang="en">
      <meta charset="UTF-8"/>
      <title>DB Populate</title>
  </head>
  <body>
    <h2>Upload CSV File</h2>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="upfile" value="" />
    <br>
    <input type="submit" name="submit" value="Upload" /></form>

  </body>
  </html>
  ';

  if (isset($_POST['submit'])) {

  $handle = fopen($_FILES['upfile']['tmp_name'], "r");

  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $querystr="INSERT into friend(name,phone,age)values('$data[0]','$data[1]','$data[2]')";
      $conn->query ($querystr);
      $count++;
  }
  fclose($handle);

  echo "<br>Success! <br><br>";
  echo "Added $count records to the database.";
  }
?>
