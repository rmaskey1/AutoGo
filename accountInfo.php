<?php
  // this php code checks if user is logged in
  session_start();
  $username = "$_SESSION[username]";
 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Autogo Account Information</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
<div class="div-block"><img src="images/autogo_logo.png" loading="lazy" sizes="200px" srcset="images/autogo_logo-p-500.png 500w, images/autogo_logo.png 728w" alt=""></div>
</div>
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="index.php" id="topcolor">Autogo</a></button>
        </div>

        <div class = "buttonGroup">
          <div class = "rightBoxR">
            <button class="toplink"><a href="login.php" id="topcolor">Logout</a></button>
          </div>
        </div>
    </div>
          <H3><p style="color:black;"> Account Information </H3>
          <div class = "centerRightBox">

            <?php
            // checks username, and puts the table row into variables
            // prints out
              {
                $conn = mysqli_connect("localhost", "root", "admin", "autogo");
                $sql = "SELECT * FROM `users` WHERE `username`='$username'  ";
                $result = $conn->query($sql);
                //$_SESSION['username']=$username;
                foreach($result as $row) {
                  $firstName = $row["firstname"];
                  $lastName = $row["lastname"];
                  $phoneNumber = $row["phone"];
                  $email = $row["email"];
                  $address = $row["address"];

                  echo "<table>";
                  echo  "<tr>";
                  echo    "<th>First Name</th>";
                  echo    "<th>".$firstName."</th>";
                  echo "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Last Name</th>";
                  echo    "<th>".$lastName."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Address</th>";
                  echo    "<th>".$address."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Email</th>";
                  echo    "<th>".$email."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Phone Number</th>";
                  echo    "<th>".$phoneNumber."</th>";
                  echo  "<tr/>";
                  echo"</table>";
                }
              }
            ?>
    </html>
