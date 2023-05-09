<BR><BR><BR><BR><BR><BR><BR>

  <?php
  session_start();
  $username = "$_SESSION[username]";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected = $_POST['orderdelete'];
    $conn = mysqli_connect("localhost", "root", "", "autogo");
    //$sql = "SELECT balance FROM accounts where account = $selected";
    $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);

    //$selected = $_POST['accountdelete'];
    echo "Order $selected has been deleted!<BR><BR>";
    $conn = mysqli_connect("localhost", "root", "", "autogo");
    $sql = "DELETE FROM `reservations` WHERE `confirm` = '$selected'";
    // convirmation order is confirm. we want to  deleted the $selected
    $result = $conn->query($sql);
  }
  ?>


  Order Summary: <BR>
<?php
  {

  $username = "$_SESSION[username]";
  $conn = mysqli_connect("localhost", "root", "", "autogo");
  $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
  $result = $conn->query($sql);
  foreach($result as $row) {
    //echo "<div class ='centerBoxDisplayBalance'>";
    echo "<BR> Customer (username): ";
    echo "$row[username]";
    echo "<BR> Order number: ";
    echo "$row[confirm]";
    echo "<BR> Car/Vehicle: ";
    echo "$row[license]";
    echo "<BR> Date pickup: ";
    echo "$row[date]";
    //echo substr($row['date'],0,10);
    echo "<BR> Date return: ";
    echo "$row[dateend]";
    //echo substr($row['dateend'],0,10);
    echo "<BR> Location pickup: ";
    echo "$row[pickup]";
    echo "<BR> Location return: ";
    echo "$row[returncar]";
    echo "<BR> Insurance Option: ";
    echo "$row[option1]";
    //echo "<BR> Options 2: ";
    //echo "$row[option2]";
    //echo "<BR> Options 3: ";
    //echo "$row[option3]";
    echo "<BR> Total Order: ";
    echo "$ $row[total]";
    echo "<BR><BR><BR>";
  }
}
?>


            <form id="orderdelete" name="orderdelete" method="post" action="orders.php">
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


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="transactions2.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/daterangepicker/daterangepicker.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Calendar API -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Map API -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- Dropdown API -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>AutoGo</title>
</head>
<body>
    <div class="bg_img"></div>
    <div class="navbar">
        <div class="logo">
            <img src="autogo_logo.png" alt="logo"/>
        </div>
        <div class="nav">
            <a href="./contact.html">Contact</a>
            <a href="./contact.html">Contact</a>
            <a href="./contact.html">Contact</a>
        </div>
        <?php
        //session_start();
        if (!isset($_SESSION['username'])){
        echo "<div class='user_info'>
            <a href='./login.php'>Login</a>
            <a href='./signup.php'>Sign Up</a>
            </div>";
        }
        else {
          echo "Your are logged in already!";
        }
        ?>
    </div>

</body>
</html>
