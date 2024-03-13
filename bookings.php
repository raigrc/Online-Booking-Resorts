<?php
include("./dbConn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <?php include 'solace-header.php'; ?>

        <?php
            $login_user = $_SESSION['id'];
             $sql = "SELECT * FROM bookings b, resorts r -- ,users u (kung gusto mo i-add details ni customer
            WHERE b.user_id = '$login_user' AND r.resort_id = b.resort_id AND b.booking_status = 'Pending' ORDER BY booking_id"; // AND r.user_id = u.UserID
            $result = $mysqli->query($sql);

            if (mysqli_num_rows($result) > 0) {
        ?>

        <div class="container" style="padding-top: 80px;">
            <div class="jumbotron">
                <h1 class="text-center">Your Bookings</h1>
            </div>
        </div>
    
        <div class="table-responsive" style="padding-left: 100px; padding-right: 100px; padding-bottom: 50px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Resort</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo $row["resort_name"]; ?></td>
                        <td><?php echo $row["check_in_datetime"] ?></td>
                        <td><?php echo $row["check_out_datetime"]; ?></td>
                        <td>₱ <?php echo ($row["price"] . "/day"); ?></td>
                        <td><a href="payment1.php?id=<?php echo $row["booking_id"];?>"><button>Proceed to Payment</button></a></td>
                        <td><a href="cancel-booking.php?id=<?php echo $row["booking_id"];?>"><button style="color: red;">Cancel</button></a></td>
                    </tr>

                <?php
                    }
                ?>

            </table>
        </div>

        <?php
                } else {
                    echo "hello";
                }
        ?>
    </div>
</body>
</html>