<?php 
    session_start();

    require 'dbConn.php';
    require 'db_admin.php';

    if(isset($_POST["action"])) {{
        if($_POST["action"] == 'insert') {
            insert();
        }else if ($_POST["action"] == 'edit') {
            update();
        }else if ($_POST['action'] == 'resortupd') {
            updateresort();
        }else if ($_POST['action'] == 'insertadmin') {
            updateAdmin();
        }
    }}

    function insert() {
        global $mysqli;

        $id = uniqid('u-id-');
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $email = $_POST["emailaddress"];
        $pword = $_POST["password"];
        $number = $_POST["number"];
        $address = $_POST["address"];

        $sql = "INSERT INTO users VALUES ('', '$id', '$fname', '$lname', '$email', '$pword', '$number', '$address', CURRENT_TIME())";
        $result = $mysqli->query($sql);

        if ($result) {
            echo "successfully inserted";
            exit();
        }
        // echo "inserted successfully";
    }

    function update() {
        global $mysqli;

        $id = $_POST['id'];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $email = $_POST["emailaddress"];
        $pword = $_POST["password"];
        $number = $_POST["number"];
        $address = $_POST["address"];

        $sql = "UPDATE users SET FirstName = '$fname', LastName = '$lname', EmailAddress = '$email', Password = '$pword', MobileNumber = '$number', Address = '$address' WHERE id = $id";
        $result = $mysqli->query($sql);

        if ($result) {
            echo "successfully inserted";
            exit();
        }
    }

    function updateAdmin() {
        global $mysqli;

        $id = $_POST['id'];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $email = $_POST["emailaddress"];
        $pword = $_POST["password"];
        $number = $_POST["number"];

        $sql = "UPDATE admins SET FirstName = '$fname', LastName = '$lname', EmailAddress = '$email', Password = '$pword', MobileNumber = '$number' WHERE UserID = $id";
        $result = $mysqli->query($sql);

        if ($result) {
            echo "successfully updated";
            exit();
        }
    }

    function updateresort() {
        global $mysqli;
    
        $resort_id = $_POST['resort_id'];
        $resort_name = $_POST['resort_name'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $address = $_POST['address'];
        $rooms = $_POST['rooms'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $facilities = $_POST['facilities'];
    
        // check if a file was uploaded
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
    
            // check if the upload was successful
            if ($image['error'] == UPLOAD_ERR_OK) {
                $new_filename = time() . '_' . $image['name'];
                $destination = 'uploads/' . $new_filename;
    
                // move the uploaded file to the desired location
                move_uploaded_file($image['tmp_name'], $destination);
    
                // update the database
                $sql = "UPDATE resorts SET resort_name = '$resort_name', city = '$city', province = '$province', address = '$address', rooms = '$rooms', price = '$price', description = '$description', facilities = '$facilities', image = '$destination' WHERE resort_id = '$resort_id'";
                $result = $mysqli->query($sql);
                if ($result) {
                    echo "Successfully updated";
                }
            } else {
                echo "Error uploading image";
            }
        } else {
            // update the database without updating the image
            $sql = "UPDATE resorts SET resort_name = '$resort_name', city = '$city', province = '$province', address = '$address', rooms = '$rooms', price = '$price', description = '$description', facilities = '$facilities' WHERE resort_id = '$resort_id'";
            $result = $mysqli->query($sql);

            if ($result) {
                echo "Successfully updated";
            }
            
        }
    }
    
?>