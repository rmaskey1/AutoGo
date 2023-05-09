<BR><BR><BR><BR><BR>
<?php
  session_start();
  if (isset($_GET['price'])&&isset($_GET['model'])) {
    $_SESSION['price'] = $_GET['price'];
    $_SESSION['license'] = $_GET['model'];
    header('Location: ./insurance.php');
  }


  $conn = mysqli_connect("localhost", "root", "", "autogo");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql1 = "SELECT * FROM autogo.cars";
  $result = mysqli_query($conn, $sql1);
  while($row = mysqli_fetch_assoc($result)) {
    if($row['available']=='yes') {
      echo '<img src="'.($row['img']).'" class="cars"';
      echo '<p> Model: '.($row['model']).'</p>';
      echo '<p> Transmission: '.($row['transmission']).'</p>';
      echo '<p> Seats: '.($row['seats']).'</p>';
      echo '<p> MPG: '.($row['mpg']).'</p>';
      echo '<p> Price: $'.($row['price']).'/day</p>';
      echo "<button onclick='window.location.href=\"./transactions2.php?price=".$row["price"]."&model=".$row["model"]."\"'>Rent this car</button>";
    }
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
        session_start();
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
    <?php


    ?>

    <!--  Car Selection
    <div class="container">
      <div class="team-grid">
        <div id="car1" class="team-card"><img src="images/compositor.jpeg" loading="lazy" srcset="images/compositor-p-500.jpeg 500w, images/compositor-p-800.jpeg 800w, images/compositor-p-1080.jpeg 1080w, images/compositor.jpeg 1440w" sizes="(max-width: 991px) 190px, 268px" alt="" class="team-member-image">
          <div class="carSelection"><strong>Tesla Model 3</strong></div>
          <div class="team-member-position">Tesla Model 3 <br>Standard Range<br></div><img src="images/Screen-Shot-2023-03-21-at-5.01.21-PM.png" loading="lazy" width="159" alt="" class="image">
          <a href="insurance.html" class="button-2 w-button">$ 78 / Day</a>

        </div>
        <div id="car2" class="team-card"><img src="images/3140.jpeg" loading="lazy" sizes="(max-width: 991px) 190px, 268px" srcset="images/3140-p-500.jpeg 500w, images/3140.jpeg 636w" alt="" class="team-member-image">
          <div class="carSelection"><strong>Large Sedan</strong></div>
          <div class="team-member-position">2018 Chevrolet Impala</div><img src="images/Screen-Shot-2023-03-21-at-5.01.21-PM.png" loading="lazy" width="159" alt="" class="image">
          <a href="insurance.html" class="button-2 w-button">$ 78 / Day</a>
        </div>
        <div id="car3" class="team-card"><img src="images/2018-Mazda-Mazda34-Door-GrandTouring.webp" loading="lazy" sizes="(max-width: 991px) 190px, 268px" srcset="images/2018-Mazda-Mazda34-Door-GrandTouring-p-500.webp 500w, images/2018-Mazda-Mazda34-Door-GrandTouring.webp 640w" alt="" class="team-member-image">
          <div class="carSelection"><strong>Medium Sedan</strong></div>
          <div class="team-member-position">2015 Mazda Sedan <br></div><img src="images/Screen-Shot-2023-03-21-at-5.01.21-PM.png" loading="lazy" width="159" alt="" class="image">
          <a href="insurance.html" class="button-2 w-button">$ 78 / Day</a>
        </div>
        <div id="car4" class="team-card"><img src="images/2017_chrysler_pacifica_angularfront.jpeg" loading="lazy" sizes="(max-width: 991px) 190px, 268px" srcset="images/2017_chrysler_pacifica_angularfront-p-500.jpeg 500w, images/2017_chrysler_pacifica_angularfront.jpeg 640w" alt="" class="team-member-image">
          <div class="carSelection"><strong>Minivan</strong></div>
          <div class="team-member-position">2017 Chrysler 200C</div><img src="images/Screen-Shot-2023-03-21-at-5.01.21-PM.png" loading="lazy" width="159" alt="" class="image">
          <a href="insurance.html" class="button-2 w-button">$ 78 / Day</a>
        </div>
        <div id="car5" class="team-card"><img src="images/Shelby-22GTH-herobanner.jpeg" loading="lazy" sizes="(max-width: 991px) 190px, 268px" srcset="images/Shelby-22GTH-herobanner-p-500.jpeg 500w, images/Shelby-22GTH-herobanner-p-800.jpeg 800w, images/Shelby-22GTH-herobanner-p-1080.jpeg 1080w, images/Shelby-22GTH-herobanner.jpeg 1440w" alt="" class="team-member-image">
          <div class="carSelection"><strong>Standard Eite Sport</strong></div>
          <div class="team-member-position">2018 Mustang GT <br>Convertible</div><img src="images/Screen-Shot-2023-03-21-at-5.01.21-PM.png" loading="lazy" width="159" alt="" class="image">
          <a href="insurance.html" class="button-2 w-button">$ 78 / Day</a>
        </div>
        <div id="car6" class="team-card"><img src="images/slide-16-manufacturer-1530132884.jpeg" loading="lazy" sizes="(max-width: 991px) 190px, 268px" srcset="images/slide-16-manufacturer-1530132884-p-500.jpeg 500w, images/slide-16-manufacturer-1530132884-p-800.jpeg 800w, images/slide-16-manufacturer-1530132884-p-1080.jpeg 1080w, images/slide-16-manufacturer-1530132884-p-1600.jpeg 1600w, images/slide-16-manufacturer-1530132884-p-2000.jpeg 2000w, images/slide-16-manufacturer-1530132884.jpeg 2250w" alt="" class="team-member-image">
          <div class="carSelection"><strong>Small Pickup Truck</strong></div>
          <div class="team-member-position">2006 Ford F1-50</div><img src="images/Screen-Shot-2023-03-21-at-5.01.21-PM.png" loading="lazy" width="159" alt="" class="image">
          <a href="insurance.html" class="button-2 w-button">$ 78 / Day</a>
        </div>
      </div>
    </div>


     insurance picture
    <img src = "insurance.png">

     Forms for creating reservation

    <form action="/AutoGo/transactions3.php" method="post">
      Select your car:
      <select name="cars" id="cars">
        <option value="Tesla Model 3">Tesla Model 3</option>
        <option value="2018 Chevrolet Impala">2018 Chevrolet Impala</option>
        <option value="2015 Mazda Sedan ">2015 Mazda Sedan </option>
        <option value="2017 Chrysler 200C">2017 Chrysler 200C</option>
        <option value="2018 Mustang GT ">2018 Mustang GT </option>
        <option value="2006 Ford F1-50">2006 Ford F1-50</option>
      </select>
      <BR>
        Select your insurance option:
      <select name="option1" id="option1">
        <option value="None">None</option>
        <option value="Gold">Gold</option>
        <option value="Silver">Silver</option>
        <option value="Bronze">Bronze</option>
      </select>

      <BR> Pick up location:
      <select name="pickup" id="pickup">
        <option value="San Jose Airport">San Jose Airport</option>
        <option value="San Francisco Airport">San Francisco Airport</option>
        <option value="Los Angelos Airport">Los Angelos Airport</option>
        <option value="Sunnyvale">Sunnyvale</option>
        <option value="Sacremento">Sacremento</option>
        <option value="San Diego">San Diego</option>
      </select>

      <BR> Return Car location:
      <select name="returncar" id="returncar">
        <option value="San Jose Airport">San Jose Airport</option>
        <option value="San Francisco Airport">San Francisco Airport</option>
        <option value="Los Angelos Airport">Los Angelos Airport</option>
        <option value="Sunnyvale">Sunnyvale</option>
        <option value="Sacremento">Sacremento</option>
        <option value="San Diego">San Diego</option>
      </select>
      -->




<!--
        <div class = "box">
        <label>Email: </label>
        <input type="email" name="email"
                autocomplete="off"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                required />
        </div>

        <div class = "box">
            <label>User ID: </label>
            <input type="text" name="username" />
        </div>

        <div class = "box">
            <label>Password: </label>
            <input type="password" name="password" autocomplete="off"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
            <required/>
        </div>
        <div class = "box">
            <label>First Name: </label>
            <input type="firstname" name="firstname" autocomplete="off"
                    onkeypress="return (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90)";
                    required/>
        </div>
        <div class = "box">
            <label>Last Name: </label>
            <input type="lastname" name="lastname" autocomplete="off"
                    onkeypress="return (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90)";
                    required/>
        </div>
        <div class = "box">
            <label>Phone: </label>
            <input type="phone" name="phone" autocomplete="off"
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                    placeholder="123-456-7890"
                    required/>
        </div>
        <div class = "box">
            <label>Address: </label>
            <input type="address" name="address" autocomplete="off"
                    minlength ="1"
                    maxlength="50"
                    required/>
        </div><br>

        <div class = "boxcenter">
          <input type="submit" value="Submit">
        </div>
    </form>
-->
</body>
</html>
