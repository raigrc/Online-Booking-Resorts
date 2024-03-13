<?php
session_start();
include("./dbConn.php");

include("./dbConn.php");

if (!isset($_SESSION['loggedAdmin'])) {
    header('Location: admin-login-page.php');
};


$select = "SELECT `booking_id` 'booking_id', `user_id` 'user_id', CONCAT(users.FirstName , ' ' , users.LastName) 'Name' , resorts.resort_name 'resort' , `check_in_datetime` 'check_in_datetime', `check_out_datetime` 'check_out_datetime', `booking_status` 'status'
            FROM `bookings`
            JOIN users ON users.UserID= bookings.user_id
            JOIN resorts ON resorts.resort_id= bookings.resort_id";
$result = mysqli_query($mysqli, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin-bookings-page.css">
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

        <section class="bookings-container">
            <div class="notif-search">
                <img src="./images/admin-dashboard/notif-icon.svg" alt="">
                <form action="">
                    <input type="search" name="search" id="search">
                    <label for="search"><img src="./images/admin-dashboard/search-icon.svg" alt=""></label>
                </form>
            </div>
            <div class="bookings-content">
                <div class="content-header">
                    <div class="header-left">
                        <h1>All Bookings</h1>
                        <button type="button"><a href="admin-add-users-page.php">Add Bookings</a></button>
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
                <table class="bookings-tbl">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>User Name</th>
                            <th>Resort Name</th>
                            <th>Booking date</th>
                            <th>End Booking date</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                $totalPrice = 0;
                                while ($row = mysqli_fetch_assoc($result)) {  
                                    $booking_id = $row['booking_id'];
                                    $user_name = $row["Name"];
                                    $resort_name = $row["resort"];
                                    $check_in = $row["check_in_datetime"];
                                    $check_out = $row["check_out_datetime"];
                                    $status = $row["status"];?>
                                    

                                    <!-- $totalPrice +=  -->
                                    
                                <tr>
                                    <td class="resort_id"><?php echo ($booking_id)?></td>
                                    <td><?php echo ($user_name)?></td>
                                    <td><?php echo ($resort_name)?></td>
                                    <td><?php echo ($check_in)?></td>
                                    <td><?php echo ($check_out)?></td>
                                    <td><?php echo ($status)?></td>
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
</body>
</html>