<?php
include("./dbConn.php");
$booking_id = $_GET["id"];
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
        $search = "SELECT * FROM bookings b, users u, resorts r WHERE b.booking_id = '$booking_id' AND b.user_id = u.UserID AND b.resort_id = r.resort_id";
        $search_result = $mysqli->query($search);
            if (mysqli_num_rows($search_result) > 0) {
                while($row = mysqli_fetch_assoc($search_result)) {
                    $booking_id = $row['booking_id'];
                    $user_name = $row['FirstName'];
                    $resort_name = $row["resort_name"];
                    $check_in = $row["check_in_datetime"];
                    $check_out = $row["check_out_datetime"];
                    $price = $row["price"];
                }
            }     
        ?>
        <br>
        <br>
        <br>
        <br> <!-- nilagay ko lang para makita, gawin mo nalang yung spacing sa taas thru css, lamats. -->
        <h5> User Name:&nbsp;  <b><?php echo($user_name);?></b></h5>
        <h5> Resort:&nbsp;  <b><?php echo($resort_name);?></b></h5>
        <h5> Check In:&nbsp;  <b><?php echo($check_in);?></b></h5>
        <h5> Check Out:&nbsp;  <b><?php echo($check_out);?></b></h5>
        <h5> Price:&nbsp;  <b>₱ <?php echo($price);?></b></h5>

        <!-- Credit Card Details For Payment (mema input lungs) -->
        <input type="text" name="card_number" id="card_number" placeholder=" Card Number" style="margin-bottom: 1rem;" required>
        <br>
        <input type="text" name="expiration_date" id="expiration_date" placeholder=" Expiration Date" style="margin-bottom: 1rem;" required>
        <br>
        <input type="text" name="cvv" id="cvv" placeholder=" CVV" style="margin-bottom: 3rem;" required>
        <br>
        <a href="payment-confirm.php?id=<?php echo ($booking_id);?>"><button>Confirm Pay</button></a>
    </div>
</body>
</html>