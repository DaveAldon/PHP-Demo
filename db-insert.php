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
    $querystr="SELECT * FROM friendt";
    $result = $conn->query ($querystr);

    // establish the HTML table
    echo '<table border="1">'; // start a table tag in the HTML
    echo "<tr><th>Name</th><th>Phone Number</th><th>Age</th></tr>";
    while ($row = $result->fetch_assoc()) {   //Creates a loop through the results query
        echo "<tr><td>" . $row['name'] . "</td><td>" . format_phone_number($row['phone']) . "</td><td>" . $row['age'] . "</td></tr>";
    }
    echo "</table>";

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
