<?php 

    session_start();

    require_once('dbConn.php');

    $sql = "SELECT * FROM users";

    $result = $mysqli->query($sql);
    $data["results"] = [];
    $tempObj = new class{};

    if($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $tempObj->id = $row['id'];
            $tempObj->userid = $row['UserID'];
            $tempObj->firstname = $row['FirstName'];
            $tempObj->lastname = $row['LastName'];
            $tempObj->emailaddress =  $row['EmailAddress'];
            $tempObj->password = $row['Password'];
            $tempObj->mobilenumber = $row['MobileNumber'];
            $tempObj->address = $row['Address'];
            $tempObj->dateadded = $row['DateAdded'];
            array_push($data["results"],$tempObj);
            $tempObj = new class{};

            $_SESSION['usrid'] = $row['UserID'];
        };
    }
    echo json_encode($data["results"]);
    exit;
?>