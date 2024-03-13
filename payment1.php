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
    <link rel="stylesheet" href="./css/payments.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <?php include 'solace-header.php'; ?>

        <?php
        $search = "SELECT * FROM bookings b, users u, resorts r WHERE b.booking_id = '$booking_id' AND b.user_id = u.UserID AND b.resort_id = r.resort_id";
        $search_result = $mysqli->query($search);

        function dateDiff($start, $end) {
            $start_ts = strtotime($start);
            $end_ts = strtotime($end);
            $diff = $end_ts - $start_ts;
            return round($diff / 86400);
        }

        
            if (mysqli_num_rows($search_result) > 0) {
                while($row = mysqli_fetch_assoc($search_result)) {
                    $booking_id = $row['booking_id'];
                    $user_name = $row['FirstName'];
                    $resort_name = $row["resort_name"];
                    $check_in = $row["check_in_datetime"];
                    $check_out = $row["check_out_datetime"];
                    $price = $row["price"];
                    $err_date = dateDiff("$check_in", "$check_out");
                    $total_amount = $err_date * $price;
                    

                }
            }     
        ?>
        <div class="main-content">
            <section class="left-container">
                <div class="left-items">
                    <h5>User Name: <?php echo($user_name);?></h5>
                    <h5>Resort: <?php echo($resort_name);?></h5>
                    <h5>Check In: <?php echo($check_in);?></h5>
                    <h5>Check Out:<?php echo($check_out);?></h5>
                    <h5>Price: ₱ <?php echo($price);?></h5>
                    <h5>Total Amount: ₱ <?php echo($total_amount);?></h5>
                </div>
            </section>
            <section class="right-container">
                <div class="right-items">
                    <div class="item-logo">
                        <img src="./images/payments/mastercard.svg" alt="">
                        <img src="./images/payments/visa.svg" alt="">
                    </div>
                    <input type="text" name="card_number" id="card_number" placeholder=" Card Number" required>
                    <input type="text" name="expiration_date" id="expiration_date" placeholder=" Expiration Date" required>
                    <input type="text" name="cvv" id="cvv" placeholder=" CVV" required>
                    <div class="button">
                    <button id="confirm-btn">Confirm Pay</button>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
$(document).ready(function() {
  $("#confirm-btn").click(function(event) {
    var cardNumber = $("#card_number").val();
    var expirationDate = $("#expiration_date").val();
    var cvv = $("#cvv").val();
    if (cardNumber.trim() === "" || expirationDate.trim() === "" || cvv.trim() === "") {
      event.preventDefault();
      alert("Please fill in all the required fields.");
    } else {
        window.location.href = "payment-confirm.php?id=<?php echo ($booking_id);?>"
    }
  });
});
</script>

</body>
</html>