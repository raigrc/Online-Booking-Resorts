<?php 
session_start();
include("./dbConn.php");

if (!isset($_SESSION['loggedAdmin'])) {
    header('Location: admin-login-page.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin-add-bookings.css">
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
                        <h1>Update Resort</h1>
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
                <?php 
                    // session_start();
                        require 'dbConn.php';

                        $id = $_GET['id'];
                        $rows = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM resorts where id ='$id'"));
                    ?>
                    <input type="hidden" id="resort-id" value="<?php echo $rows['resort_id']?>">
                    <div class="form-item">
                        <label for="resort-name">Resort Name</label>
                        <input type="text" name="resort-name" id="resort-name" value="<?php echo $rows['resort_name']?>">
                    </div>
                    <div class="form-item">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" value="<?php echo $rows['city']?>">
                        <!-- <select name="city" id="city">
                            <option value="" selected>Choose a City</option>
                        </select> -->
                    </div>
                    <div class="form-item">
                        <label for="province">Province</label>
                        <input type="text" name="province" id="province" value="<?php echo $rows['province']?>">
                        <!-- <select name="province" id="province">
                            <option value="" selected>Choose a Province</option>
                        </select> -->
                    </div>
                    <div class="form-item">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="<?php echo $rows['address']?>">
                    </div>
                    <div class="form-item">
                        <label for="rooms">Rooms</label>
                        <input type="text" name="rooms" id="rooms" value="<?php echo $rows['rooms']?>">
                        <!-- <select name="rooms" id="rooms">
                            <option value="" selected>Choose a room</option>
                        </select> -->
                    </div>
                    <div class="form-item">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" value="<?php echo $rows['price']?>">
                    </div>
                    <div class="form-item">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"><?php echo $rows['description']?></textarea>
                    </div>
                    <div class="form-item">
                        <label for="facilities">Facilities/Amenities</label>
                        <textarea name="facilities" id="facilities"><?php echo $rows['facilities']?></textarea>
                    </div>
                    <div class="form-item">
                        <label for="resort_img">Image</label>
                        <input type="file" name="resort_img" id="resort_img">
                    </div>
                    <button type="button" onclick="submitData1('resortupd')">insert</button>
                </form>
            </div>
        </section>
    </div>

    <?php require 'script.php'; ?>
    <script src="./js/resort-table.js"></script>

</body>
</html>