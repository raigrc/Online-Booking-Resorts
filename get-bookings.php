<?php 

session_start();

require_once("dbConn.php");


if (isset($_POST['in_date']) && isset($_POST['out_date'])) {

    echo $_SESSION['res_id'];

    $check_in = $_POST['in_date'];
    $check_out = $_POST['out_date'];
    $booking_id = uniqid('b-id-');
    $sqlsign = "INSERT INTO bookings (booking_id, user_id, resort_id, check_in_datetime, check_out_datetime)
    SELECT '$booking_id', u.UserID, r.resort_id, ' $check_in', '$check_out'
    FROM users u
    JOIN resorts r
    WHERE u.UserID = '{$_SESSION['id']}' AND r.resort_id = '{$_SESSION['res_id']}'";
    $resultsign = $mysqli->query($sqlsign);

    if ($resultsign) {
        echo "successfully inserted";
        header('Location: bookings1.php'); 
        exit();
    }else {
        echo "unsuccesfully inserted";
        exit();
    }
}else {
    echo "error";
}