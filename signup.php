<?php 

session_start();

require_once("dbConn.php");

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['emailAd']) && isset($_POST['pword']) && isset($_POST['confPword'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $firstname = validate($_POST['fname']);
    $lastname = validate($_POST['lname']);
    $emailAd = validate($_POST['emailAd']);
    $password = validate($_POST['pword']);
    $confirmpassword = validate($_POST['confPword']);

    $sqlchecker = "SELECT * FROM users WHERE EmailAddress ='" . $emailAd . "'";
    
    $result = $mysqli->query($sqlchecker);

    if ($result->num_rows > 0) {
        echo "Email address is already taken";
        exit();
        
    } else {
        $user_id = uniqid('u-id-');
        $sqlsign = "INSERT INTO users(UserID, FirstName, LastName, EmailAddress, Password) VALUES ('$user_id','$firstname','$lastname','$emailAd','$password')";
        $resultsign = $mysqli->query($sqlsign);

        if ($resultsign) {
            echo "successfully inserted";
            exit();
        }else {
            echo "unsuccesfully inserted";
            exit();
        }
    }
}