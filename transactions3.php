<?php
  session_start();
  $username = "$_SESSION[username]";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cars"]) && isset($_POST["option1"]))
    {
      $confirm = rand(10000,99999); // random number
      $confirm = "A".$confirm;
      $license = $_POST["cars"];
      $option1 = $_POST["option1"];
      $pickup = $_POST["pickup"];
      $returncar = $_POST["returncar"];
      $total = 78;

      echo "Order number: ".$confirm;
      echo "<BR>";
      echo "car option: ".$license;
      echo "<BR>";
      echo "insurance option: ".$option1;
      echo "<BR>";
      echo "customer (username): ".$username;
      echo "<BR>";
      echo "Pick up location: ".$username;
      echo "<BR>";
      echo "The total cost is: ".$total;


      $conn = mysqli_connect("localhost", "root", "admin", "autogo");

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "INSERT INTO reservations (username, confirm, license, option1, pickup, returncar, total)  VALUES ('$username', '$confirm', '$license', '$option1', '$pickup', '$returncar', '$total' );";
      $results = mysqli_query ($conn, $sql);
      if ($results){
        echo "<BR><BR>Your reservation has been created.";
      } else {
        echo mysqli_error($conn);
      }

      /*
      $username = $_POST["cars"];
      $password = $_POST["option1"];
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $address = $_POST["address"];
      */


      /*
      // Create connection
      $conn = mysqli_connect("localhost", "root", "", "autogo");

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      //login user
      // $sql = "INSERT  creditcard (creditCardNumber, pin) VALUES ('$creditCardNumber', '$pin')";
      $sql = "INSERT INTO users (username, password, firstname, lastname, phone, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$phone', '$email', '$address');";
      $results = mysqli_query ($conn, $sql);

      if ($results){
        echo "The user has been added.";
      } else {
        echo mysqli_error($conn);
      }
    }


    else
    {
        $error_message = "Missing input";
        */
    }
  }

?>

<html>
  <head.
    <title>Transaction (continued)</title>
  </head>
  <body>


  </body>
</html>
