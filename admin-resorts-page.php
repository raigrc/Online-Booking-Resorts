<?php
session_start();
include("./dbConn.php");

if (!isset($_SESSION['loggedAdmin'])) {
    header('Location: admin-login-page.php');
};


$select = "SELECT * FROM resorts";
$result = mysqli_query($mysqli, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin-resorts.css">
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

        <section class="resorts-container">
            <div class="notif-search">
                <img src="./images/admin-dashboard/notif-icon.svg" alt="">
                <form action="">
                    <input type="search" name="search" id="search">
                    <label for="search"><img src="./images/admin-dashboard/search-icon.svg" alt=""></label>
                </form>
            </div>
            <div class="resorts-content">
                <div class="content-header">
                    <div class="header-left">
                        <h1>All Resorts</h1>
                        <button type="button"><a href="admin-add-resorts-page.php">Add Resort</a></button>
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
                <table class="resort-tbl">
                    <thead>
                        <tr>
                            <th>Resort ID</th>
                            <th class="h-resort-details">Resort details</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Rooms</th>
                            <th>Amenities</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($resort = mysqli_fetch_assoc($result)) {  ?>
                                <tr>
                                    <td class="resort_id"><?=$resort['resort_id']?></td>
                                    <td class="d-resort-details">
                                        <div class="resort-img">
                                            <img src="./resort-imgs/<?=$resort['image']?>" class="resort-img">
                                        </div>
                                        <div class="detail-txt">
                                            <h3><?=$resort['resort_name']?></h3>
                                            <p>Updated 1 day ago</p>
                                        </div>
                                    </td>
                                    <td><?=$resort['address']?>, <?=$resort['city']?>, <?=$resort['province']?></td>
                                    <td><?=$resort['description']?></td>
                                    <td><?=$resort['rooms']?></td>
                                    <td><?=$resort['facilities']?></td>
                                    <td><?=$resort['price']?></td>
                                    <td><?=$resort['availability']?></td>
                                    <td class="crud-icon">
                                        <div class="crud-option">
                                            <button type="button" name="updatebtn"><a href="admin-update-resorts-page.php?id=<?php echo $resort['id']?> ">Update</a></button>
                                            <button type="button" name="deletebtn">Delete</button>
                                            </div>
                                            <img src="./images/admin-dashboard/crud-icon.svg" alt="">
                                    </td>
                                </tr>
                            <?php    }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="./js/resort-table.js"></script>
</body>
</html>