<?php 
    session_start();

    require_once('dbConn.php');

    $sql = "SELECT * FROM admins";

    $result = $mysqli->query($sql);
    $data["results"] = [];
    $tempObj = new class{};

    if($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $tempObj->userid = $row['UserID'];
            $tempObj->firstname = $row['FirstName'];
            $tempObj->lastname = $row['LastName'];
            $tempObj->emailaddress =  $row['EmailAddress'];
            $tempObj->password = $row['Password'];
            $tempObj->mobilenumber = $row['MobileNumber'];
            $tempObj->dateadded = $row['DateAdded'];
            array_push($data["results"],$tempObj);
            $tempObj = new class{};
        };
    }
    echo json_encode($data["results"]);
    exit;
?>