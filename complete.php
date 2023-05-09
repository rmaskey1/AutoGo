<BR><BR><BR><BR><BR><BR><BR>
  Checkout page: <BR>
<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // We have entered from the check-out page, let's create the reservation
    //echo "This is a post";
    $username = $_SESSION['username'];
    $confirm = $_SESSION['confirm'];
    $license = $_SESSION['license'];
    $option1 = $_SESSION['option1'];
    $pickup = $_SESSION['pickup'];
    $returncar = $_SESSION['returncar'];
    $date = $_SESSION['date'];
    $dateend = $_SESSION['dateend'];
    $total = $_SESSION['total'];

    $conn = mysqli_connect("localhost", "root", "", "autogo");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO reservations (username, confirm, license, option1, pickup, returncar, total)  VALUES ('$username', '$confirm', '$license', '$option1', '$pickup', '$returncar', '$total' );";
    $results = mysqli_query ($conn, $sql);
    if ($results){
      echo "<BR><BR>Your reservation has been created.";
    } else {
      echo mysqli_error($conn);
      echo "There was an error creating your reservation.";
    }
  }
  else{
    echo "There is something missing.<BR>";
  }
?>

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
