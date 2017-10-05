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

  echo '
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DB Insert</title>
    </head>
    <body>
      <h2>Insert into Database</h2>
      <form method="post" enctype="multipart/form-data">
        Name:<br>
        <input class="in" type="text" name="name" required="required" pattern="([A-Z][a-z]*){1}(\s{1}[A-Z][a-z]*)?(\s{1}[A-Z][a-z]*)?" title="Please capitalize each name and/or initial."><br>
        Phone Number:<br>
        <input class="in" type="text" name="phone" required="required" pattern="([0-9]{7}|[0-9]{10})" title="Please use the following format: ####### or ##########."><br>
        Age:<br>
        <input class="in" type="number" name="age" required="required"><br><br>
        <input type="submit" name="submit" value="Submit">
      </form>
    </body>
    <style>
        .in:invalid {
      background-color: LightCoral;
    }
    .in:valid {
      background-color: LightGreen;
    }
    </style>
  </html>
  ';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $querystr="INSERT into friend(name,phone,age)values('$name','$phone','$age')";
    $conn->query ($querystr);

    echo "Success! <br><br>";
    echo "Added $name to the database.";
}
?>
