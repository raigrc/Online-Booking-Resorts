<?php 

session_start();

require_once("dbConn.php");

$booking_id = $_GET["id"];

$search = "SELECT * FROM bookings WHERE booking_id = '$booking_id'";
$search_result = $mysqli->query($search);
    if (mysqli_num_rows($search_result) > 0) {
        $cancel = "UPDATE bookings SET booking_status = 'Paid' WHERE booking_id = '$booking_id'";
        $cancel_result = $mysqli->query($cancel);

        if ($cancel_result) {
            ob_start(); // start output buffering
            echo "<script>alert('Your Reservation is Complete! Thank You!');window.location='bookings1.php'</script>";
            ob_end_flush(); // send output to browser
            exit();
        }else {
            echo "unsuccessfully paid";
            exit();
        }
    }