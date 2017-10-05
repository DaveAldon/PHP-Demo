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
        <script src="db-searchname.php"></script>
        <title>DB Search Name</title>
    </head>
    <body>
      <h2>Insert into Database</h2>
      <form action="db-searchname.php" method="post" enctype="multipart/form-data">
        Name:<br>
        <input type="text" name="name" required="required"><br><br>
        <input type="submit" name="submit" value="Search">
      </form>
    </body>
  </html>
  ';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $querystr="SELECT * FROM friend WHERE name LIKE '%$name%'";
    $result = $conn->query ($querystr);

    // establish the HTML table
    echo '<table border="1">'; // start a table tag in the HTML
    echo "<tr><th>Name</th><th>Phone Number</th><th>Age</th></tr>";
    while ($row = $result->fetch_assoc()) {   //Creates a loop through the results query
        echo "<tr><td>" . $row['name'] . "</td><td>" . format_phone_number($row['phone']) . "</td><td>" . $row['age'] . "</td></tr>";
    }
    echo "</table>";
  }
    // to be called whenever needed
    function format_phone_number($phone) {
      // get length of the number and pass to a switch
      $length = strlen($phone);
      switch($length) {
      case 7:
        // apply regex to seperate number into groups, which we alter to look differently
        return preg_replace("/(\d{3})(\d{4})/", "$1-$2", $phone);
      break;
      case 11:
        return preg_replace("/(\d{3})(\d{3})(\d{4})/", "($1) $2-$3", $phone);
      break;
      default:
        return $phone;
      break;
      }
    }
?>
