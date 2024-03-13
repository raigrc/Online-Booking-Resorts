<?php
include("./dbConn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bookings1.css">
    <title>Document</title>
</head>
<body>
<?php include 'solace-header.php'; ?>
<?php
            $login_user = $_SESSION['id'];
             $sql = "SELECT * FROM bookings b, resorts r -- ,users u (kung gusto mo i-add details ni customer
            WHERE b.user_id = '$login_user' AND r.resort_id = b.resort_id ORDER BY b.date_added DESC"; // AND r.user_id = u.UserID
            $result = $mysqli->query($sql);

            if (mysqli_num_rows($result) > 0) {
        ?>
    <section class="users-container">
        <div class="users-content">
            <div class="content-header">
                <div class="header-left">
                    <h1>Your Bookings</h1>
                </div>
                <div class="header-right">
                    <!-- <div class="sort">
                        <img src="./images/admin-resorts/sort-icon.svg" alt="">
                        <p>Sort</p>
                    </div>
                    <div class="filter">
                        <img src="./images/admin-resorts/filter-icon.svg" alt="">
                        <p>Filter</p>
                    </div> -->
                </div>
            </div>
            <table class="users-tbl">
                <thead>
                    <tr>
                        <th>Resort</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Price</th>
                        <th>Booking Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["resort_name"]; ?></td>
                        <td><?php echo $row["check_in_datetime"] ?></td>
                        <td><?php echo $row["check_out_datetime"]; ?></td>
                        <td>₱ <?php echo ($row["price"] . "/day"); ?></td>
                        <td><?php echo ($row["booking_status"]); ?></td>
                        <?php
                            if ($row["booking_status"] == "Pending") { ?>
                                <td class="payments"><a href="payment1.php?id=<?php echo $row["booking_id"]?>"><button>Proceed to Payment</button></a></td>
                                <td class="Cancel"><a href="cancel-booking.php?id=<?php echo $row["booking_id"]?>"><button>Cancel</button></a></td>;
                            <?php } else {
                                echo '<td class="payments">Booked</td>';
                            }
                        ?>
                    </tr>

                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
                } else {
                    echo "hello";
                }
        ?>
</body>
</html>