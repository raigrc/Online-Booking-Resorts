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
    <link rel="stylesheet" href="./css/admin-dashboard.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <?php 
            $users = "SELECT COUNT(UserID) 'nousers' FROM users";
            $users_result = $mysqli->query($users);
            $bookings = "SELECT COUNT(id) 'nobookings' FROM bookings WHERE DATE(date_added) = CURDATE()";
            $bookings_result = $mysqli->query($bookings);
            $income = "SELECT `booking_id` 'booking_id', `user_id` 'user_id', CONCAT(users.FirstName , ' ' , users.LastName) 'Name' , resorts.resort_name 'resort' , `check_in_datetime` 'check_in_datetime', `check_out_datetime` 'check_out_datetime', `booking_status` 'status', resorts.price 'price'
            FROM `bookings`
            JOIN users ON users.UserID= bookings.user_id
            JOIN resorts ON resorts.resort_id= bookings.resort_id
            WHERE bookings.booking_status = 'Paid'";
            $income_result = $mysqli->query($income);
        ?>
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

        <section class="today-statistics">
            <div class="stats-header">
                <h1>Todays Statistics</h1>
                <p>Thu, 9 Feb, 2023, 11:30AM</p>
            </div>
            <div class="stats-contents">
                <div class="income-stats">
                    <div class="income-header">
                        <h1>No. Bookings</h1>
                        <h3>Today</h3>
                    </div>
                    <div class="income-contents">
                        <div class="income-today">
                        <?php 
                            if (mysqli_num_rows($bookings_result) > 0) {
                                while ($no_bookings = mysqli_fetch_assoc($bookings_result)) {
                                    echo '<h1>' . $no_bookings['nobookings'] . '</h1>';
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="expenses-stats">
                    <div class="expenses-header">
                        <h1>Income</h1>
                        <h3>Today</h3>
                    </div>
                    <div class="expenses-contents">
                        <div class="expenses-today">
                        <?php
                            if (mysqli_num_rows($income_result) > 0) {
                                $totalPrice = 0;

                                function dateDiff($start, $end) {
                                    $start_ts = strtotime($start);
                                    $end_ts = strtotime($end);
                                    $diff = $end_ts - $start_ts;
                                    return round($diff / 86400);
                                }
                                while ($noincome = mysqli_fetch_assoc($income_result)) {  
                                    $booking_id = $noincome['booking_id'];
                                    $user_name = $noincome["Name"];
                                    $resort_name = $noincome["resort"];
                                    $check_in = $noincome["check_in_datetime"];
                                    $check_out = $noincome["check_out_datetime"];
                                    $status = $noincome["status"];
                                    $price = $noincome["price"];

                                    $err_date = dateDiff("$check_in", "$check_out");
                                    $updated_price = $price * $err_date;

                                    $totalPrice = $totalPrice + $updated_price;
                                }
                                echo '<h1>Php'.$totalPrice.'</h1>';
                                
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="users-stats">
                <div class="users-header">
                    <h1>No. of Users</h1>
                    <h3>Today</h3>
                </div>
                <div class="users-contents">
                    <div class="users-today">
                        <?php 
                            if (mysqli_num_rows($users_result) > 0) {
                                while ($no_users = mysqli_fetch_assoc($users_result)) {
                                    echo '<h1>' . $no_users['nousers'] . '</h1>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            </div>
        </section>
        </div>    
    </div>
</body>
</html>