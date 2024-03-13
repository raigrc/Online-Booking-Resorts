<?php 

session_start();

require_once("dbConn.php");

$booking_id = $_GET["id"];

$search = "SELECT * FROM bookings WHERE booking_id = '$booking_id'";
$search_result = $mysqli->query($search);
    if (mysqli_num_rows($search_result) > 0) {
        $cancel = "UPDATE bookings SET booking_status = 'Cancelled' WHERE booking_id = '$booking_id'";
        $cancel_result = $mysqli->query($cancel);

        if ($cancel_result) {
            ob_start();
            echo "<script>alert('Your Booking is Deleted!');window.location='destination.php'</script>";
            ob_end_flush();
            exit();
        }else {
            echo "unsuccessfully deleted";
            exit();
        }
    }