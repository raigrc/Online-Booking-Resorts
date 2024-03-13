<?php

include("./dbConn.php");

$select = "SELECT bookings.booking_id, bookings.user_id, bookings.resort_id, bookings.check_in_datetime, bookings.check_out_datetime, resorts.resort_id, resorts.price 
FROM bookings
INNER JOIN resorts ON bookings.resort_id = resorts.resort_id";
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
    <?php include 'solace-header.php'; ?>
    
        <section class="resorts-container">
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
                            <th>Booking ID</th>
                            <th>Name</th>
                            <th>User ID</th>
                            <th>Resort ID</th>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($booking = mysqli_fetch_assoc($result)) {  ?>
                                <tr>
                                    <td class="resort_id"><?=$booking['booking_id']?></td>
                                    <td><?=$_SESSION['fullname']?></td>
                                    <td><?=$booking['user_id']?></td>
                                    <td><?=$booking['resort_id']?></td>

                                    <td><?=$booking['check_in_datetime']?></td>
                                    <td><?=$booking['check_out_datetime']?></td>
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