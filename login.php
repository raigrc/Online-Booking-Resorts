<?php 

session_start();

require_once("dbConn.php");

if (isset($_POST['emailad']) && isset($_POST['pword'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $emailAd = validate($_POST['emailad']);
    $password = validate($_POST['pword']);

    if(empty($emailAd) && empty($password)) {
        header('Location: login-page.php?error=Email Address and Password is required');
        exit();

    }else if (empty($emailAd) && !empty($password)) {
        header('Location: login-page.php?error=Email Address is required');
        exit();

    }else if (empty($password) && !empty($emailAd)) {
        header('Location: login-page.php?error=Password is required');
        exit();

    }else {
        $sql = "SELECT * FROM users WHERE EmailAddress ='" . $emailAd . "' AND Password ='" . $password . "'";
        
        $result = $mysqli->query($sql);

        if ($result->num_rows) {

            $user = mysqli_fetch_assoc($result);

            if ($user['EmailAddress'] === $emailAd && $user['Password'] === $password) {
                $_SESSION['fname'] = $user['FirstName'];
                $_SESSION['lname'] = $user['LastName'];
                $_SESSION['fullname'] = $_SESSION['fname'] . " " . $_SESSION['lname'];
                $_SESSION['id'] = $user['UserID'];
                $_SESSION['email'] = $user['EmailAddress'];
                $result->free_result();
                $mysqli->close();
    
                $_SESSION['loggedUser'] = $user['FirstName'];
    
                header ("Location: index.php");
                exit();
            }
        } else {
            header('Location: login-page.php?error=Email address or password is incorrect');
            exit();
        }
    }
}