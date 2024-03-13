<?php
session_start();
include("./dbConn.php");

if (!isset($_SESSION['loggedAdmin'])) {
    header('Location: admin-login-page.php');
};

if (isset($_POST['insert'])) {
  $resort_name = ucfirst($_POST['resort-name']);
  $city = ucfirst($_POST['city']);
  $province = ucfirst($_POST['province']);
  $address = ucfirst($_POST['address']);
  $rooms = ucfirst($_POST['rooms']);
  $price = $_POST['price'];
  $description = ucfirst($_POST['description']);
  $facilities = ucfirst($_POST['facilities']);

  $img_name = $_FILES['resort_img']['name'];
  $img_size = $_FILES['resort_img']['size'];
  $tmp_name = $_FILES['resort_img']['tmp_name'];
  $error = $_FILES['resort_img']['error'];

  if ($error === 0) {
      if ($img_size > 20000000) {
          $em = "file size is too large! (minimum of 20mb)";
          header("Location: admin-add-bookings-page.php?error=$em");
      } else {
          $img_e = pathinfo($img_name, PATHINFO_EXTENSION);
          $img_e_lc = strtolower($img_e);
          $allowed_e = array("jpg", "jpeg", "png", "webp");

          if (in_array($img_e_lc, $allowed_e)) {
              $new_img_name = uniqid("r-img-", true).'.'.$img_e_lc;
              $img_path = './resort-imgs/'.$new_img_name;
              move_uploaded_file($tmp_name, $img_path);

              $resort_id = uniqid('r-id-');
              $insert = "INSERT INTO resorts(resort_id, resort_name, city, province, address, rooms, price, description, facilities, image) VALUES('$resort_id', '$resort_name', '$city', '$province', '$address', '$rooms', '$price', '$description', '$facilities', '$new_img_name')";
              mysqli_query($mysqli, $insert);
              header("Location: admin-resorts-page.php");
          } else{
              $em = "You can't upload files of this type";
              header("Location: admin-add-bookings-page.php?error=$em");
          }
      }
  } else {
      $em = "unknown error occurred!";
      header("Location: admin-add-bookings-page.php?error=$em");
  }

} else {
  // header("Location: admin-add-bookings-page.php?error=$em");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin-add-resorts.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
    <section class="admin-nav">
            <div class="dashboard-logo">
                <img src="./images/admin-dashboard/dashboard-logo.png" alt="">
            </div>
            <nav class="dashboard-nav">
                <ul>
                    <li>
                        <a href="./admin-dashboard-page.php">
                            <img src="./images/admin-dashboard/dashboard-icon.svg" alt="">
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin-resorts-page.php">
                            <img src="./images/admin-dashboard/resort-icon.svg" alt="">
                            <p>Resorts</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin-users-page.php">
                            <img src="./images/admin-dashboard/users-icon.svg" alt="">
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="./admin-bookings-page.php">
                            <img src="./images/admin-dashboard/bookings-icon.svg" alt="">
                            <p>Bookings</p>
                        </a>
                    </li>
                    <li>
                    <a href="./admin-settings-page.php?id=<?php echo $_SESSION['loggedAdmin']?>">
                            <img src="./images/admin-dashboard/settings-icon.svg" alt="">
                            <p>Settings</p>
                        </a>
                    </li>
                </ul>
            </nav>

            <nav class="report-nav">
                <a href="logout-admin.php" class="admin-logout"><img src="./images/admin-dashboard/logout-icon.svg" alt="">Logout</a>
            </nav>
        </section>

        <section class="user-update-container">
            <div class="notif-search">
                <img src="./images/admin-dashboard/notif-icon.svg" alt="">
                <form action="">
                    <input type="search" name="search" id="search">
                    <label for="search"><img src="./images/admin-dashboard/search-icon.svg" alt=""></label>
                </form>
            </div>
            <div class="update-content">
                <div class="content-header">
                    <div class="header-left">
                        <h1>Add Resort</h1>
                    </div>
                    <div class="header-right">
                        <div class="sort">
                            <img src="./images/admin-resorts/sort-icon.svg" alt="">
                            <p>Sort</p>
                        </div>
                        <div class="filter">
                            <img src="./images/admin-resorts/filter-icon.svg" alt="">
                            <p>Filter</p>
                        </div>
                    </div>
                </div>
                <div class="userid-num">
                    
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-item">
                        <label for="resort-name">Resort Name</label>
                        <input type="text" name="resort-name" id="resort-name">
                    </div>
                    <div class="form-item">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city">
                        <!-- <select name="city" id="city">
                            <option value="" selected>Choose a City</option>
                        </select> -->
                    </div>
                    <div class="form-item">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province">
                        <!-- <select name="province" id="province">
                            <option value="" selected>Choose a Province</option>
                        </select> -->
                    </div>
                    <div class="form-item">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div class="form-item">
                        <label for="rooms">Rooms</label>
                        <input type="text" name="rooms" id="rooms">
                        <!-- <select name="rooms" id="rooms">
                            <option value="" selected>Choose a room</option>
                        </select> -->
                    </div>
                    <div class="form-item">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price">
                    </div>
                    <div class="form-item">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <div class="form-item">
                        <label for="facilities">Facilities/Amenities</label>
                        <textarea name="facilities" id="facilities"></textarea>
                    </div>
                    <div class="form-item">
                        <label for="resort_img">Image</label>
                        <input type="file" name="resort_img">
                    </div>
                    <input type="submit" name="insert" value="Insert" class="form-btn">
                </form>
            </div>
        </section>
    </div>
</body>
</html>