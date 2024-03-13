<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title>Solace</title>
    <link rel="icon" type="image/x-icon" href="resort-imgs/icon.svg">
  <link rel="stylesheet" href="./css/solace-header.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo">
        <a href="index.php"><img src = "./images/solace-header/Solace Logo - White.png" class = "logo-pic"></a>
      </div>
      <div class="nav-links">
        <ul class="links">
            <?php
              session_start();
              
              if (isset($_SESSION['loggedUser'])) {
                echo "<li class='logged-user'>Hello, " . $_SESSION['fname'] . "</li>";
              }
            ?>
          <li>
            <a href="#"><img src = "images/solace-header/AccountBurger.png" class = "links-ab"></a>
            <ul class="accBurger-sub-menu sub-menu">
              <!-- <li><a href="#">Inbox</a></li>
              <li><a href="notification.php">Notifications</a></li> -->
              <li><a href="blog_one.php">Tips & Articles</a></li>
              <?php
                  if (isset($_SESSION['loggedUser'])) {
                      echo "<li><a href='bookings1.php'>Your Bookings</a></li>";
                      echo "<li><a href='account.php'>Account</a></li>";
                      echo "<li><a href='logout.php'>Logout</a></li>";
                  } else {
                      echo "<li><a href='login-page.php'>Your Bookings</a></li>";
                      echo "<li><a href='login-page.php'>Account</a></li>";
                      echo "<li><a href='login-page.php'>Login</a></li>";
                  }
              ?>
            </ul>
          </li>
        </ul>
      </div>

    </div>
  </nav>

</body>
</html>
