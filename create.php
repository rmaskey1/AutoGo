<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"]))
    {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $address = $_POST["address"];

      // Create connection
      $conn = mysqli_connect("localhost", "root", "admin", "autogo");

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
    }
  }
?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">


    <div class="div-block"><img src="images/autogo_logo.png" class="center" loading="lazy" sizes="200px" srcset="images/autogo_logo-p-500.png 500w, images/autogo_logo.png 728w" alt=""></div>
  </div>
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

    <title>Autogo Sign up</title>
  </head>
  <body>

    <div class = "bottomBox">
      <div class ="useraccount">
        <div class = "Box">
        CREATE AN ACCOUNT
        </div>
        <form action="#" method="post">
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
              <input type="submit" value="Submit"> <!-- on submit save the entered fields into variables and then send the user to personal information collection page-->
            </div>
        </form>
      </div>
    </div>
  </body>
</html>
