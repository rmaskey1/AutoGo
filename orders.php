<?php
  session_start();
  $username = "$_SESSION[username]";
 ?>



<html>
  <head>
    <meta charset="UTF-8">
    <title> Main </title>
    <link rel="stylesheet" href="styles2.css">
  </head>
  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="index.php" id="topcolor">Autogo</a></button>
        </div>
        <div class = "buttonGroup">


            <div class = "rightBoxR">
              <button class="toplink"><a href="index.php" id="topcolor">Logout</a></button>
            </div>
          </div>
      </div>

      <div>
        Order History/Transaction History
      </div>

      <?php
        {
          /*
        $username = "$_SESSION[username]";
        */
        $conn = mysqli_connect("localhost", "root", "", "autogo");
        $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
        $result = $conn->query($sql);
        foreach($result as $row) {
          //echo "<div class ='centerBoxDisplayBalance'>";
          echo "<BR> customer/username:";
          echo "$row[username]";
          echo "<BR> Order number:";
          echo "$row[confirm]";
          echo "<BR> Date(s):";
          echo "$row[date]";
          echo "<BR> Car/License Number:";
          echo "$row[license]";
          echo "<BR> Options 1:";
          echo "$row[option1]";
          echo "<BR> Options 2:";
          echo "$row[option2]";
          echo "<BR> Options 3:";
          echo "$row[option3]";
          echo "<BR> Total Order:";
          echo "$ $row[total]";
          echo "<BR><BR><BR>";


          /*
          echo "<h1><FONT COLOR=black>Balance: $" . $row["balance"] . ", " .$row["accountname"] . ", xxxx-xxxx-xxxx-" .substr($row["account"],-4);
          echo "</div>";
          echo "<div class = 'centerTab'>";
          echo "</div>";
          */
        }
      }
      ?>


                  <form id="orderdelete" name="orderdelete" method="post" action="deleteorder2.php">
                    <div id="orderdelete">
                              <!--<form method="post" action="accountDeleted.php">-->
                                  <h3>Reservation List:</h3>
                                  Select a reservation to cancel
                                  <BR>
                                  <select name="orderdelete">

                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "autogo");
                                    $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
                                    $result = $conn->query($sql);
                                    foreach($result as $row){?>
                                      <option value="<?php echo $row['confirm']; ?>"><?php echo $row['confirm']; ?></option>
                                    <?php }?>
                                  </select>
                              <input type="submit" name="delete" value="Cancel this Reservation ">
                              </div>
                              </form>



      <div class = "bottomBox">
        <div class = "centerBox3">
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountInfo.php" id="topcolor">User Information</a></button>
          </div>
        </div>
      </div>
  </body>
</html>
