<?php
  session_start();


  error_reporting(E_ERROR | E_PARSE);
  $username = "$_SESSION[username]";
  if ("$_SESSION[username]" === "incorrect password" || "$_SESSION[username]" === "One of the information is empty" || "$_SESSION[username]" === "Account has been created! Please log in with your brand new account."){
    echo $username;
  }

  if (isset($_POST["username"]) &&
      isset($_POST['password'])) {
    if ($_POST["username"] && $_POST["password"]) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $_SESSION['username'] = $username;

      //create connection
      $conn = mysqli_connect("localhost", "root", "admin", "autogo");

      //Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      else {
        echo "connected";
      }

      // select user, check for password
      $sql = "SELECT password FROM users WHERE username = '$username'";
      $results = mysqli_query($conn, $sql);

      if ($results) {
        $row = mysqli_fetch_assoc($results);
        if ($row["password"] === $password) {
          $logged_in = true;
          $sql = "SELECT * FROM users";
          $results = mysqli_query($conn, $sql);
          // Store username variable, go to main
          $_SESSION['username']=$username;
          header("Location: accountInfo.php");
        } else {
            $_SESSION["username"] = "incorrect password";
            echo "password incorrect";
          header("Location: accountLogin.php");
          echo "password incorrect";
        }
      } else {
        echo mysqli_error($conn);
      }
      mysqli_close($conn); //close connection
    }else {
      $_SESSION["username"] = "One of the information is empty";
      header("Location: accountLogin.php");
      echo "Nothing was submitted";
    }
  }
  else{
    session_destroy();
    unset ($_SESSION['username']);
  }

  ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Autogo Account Login</title>
  </head>
  <body>
<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="homepage.php" id="topcolor">Autogo</a></button>
        </div>
        <div class = "buttonGroup">

          <div class = "rightBoxL">
            <button class="toplink"><a href="aboutUsPage.html" id="topcolor">Home</a></button>
          </div>
          <div class = "rightBoxR">
            <button class="toplink"><a href="login.php" id="topcolor">Log Out</a></button>
          </div>

        </div>
      </div>
      <div class = "bottomBox">
        <div class = "centerBox">
            <div class = "centerLeftBox">
                <video width="500rem" height="280rem" controls>
                    <source src="vid.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class = "centerBox2">
            <div class = "centerRightBox">
              <form action="login.php" method="post">
                <h2 class="custom">Welcome Back!</h2>
                  <label for="username">Username:</label><br>
                    <input type="text" name="username"><BR><br>
                      <label for="username">Password:</label><br>
                      <input type="password" name="password"><BR><BR>
                      <input type="submit">
                      <br><br>
                      <button class="otherOptionButton"><a href="createUser.php" id="topcolor">Don't have an account? Click here!</a></button>
                      <br>
                      <a class href="admin.php" style="text-decoration:none;">‎ ‎ </a>
              </form>
            </div>
          </div>
      </div>
  </body>
</html>
