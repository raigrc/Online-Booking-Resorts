<?php 

session_start();

require_once("dbConn.php");

if (isset($_POST['adminEmail']) && isset($_POST['adminpword'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $emailAd = validate($_POST['adminEmail']);
    $password = validate($_POST['adminpword']);

    if(empty($emailAd) && empty($password)) {
        header('Location: admin-login-page.php?error=Email Address and Password is required');
        exit();

    }else if (empty($emailAd) && !empty($password)) {
        header('Location: admin-login-page.php?error=Email Address is required');
        exit();

    }else if (empty($password) && !empty($emailAd)) {
        header('Location: admin-login-page.php?error=Password is required');
        exit();

    }else {
        $sql = "SELECT * FROM admins WHERE EmailAddress ='" . $emailAd . "' AND Password ='" . $password . "'";
        
        $result = $mysqli->query($sql);

        if ($result->num_rows) {
            echo 'hello';
            
            $admin = mysqli_fetch_assoc($result);

            if ($admin['EmailAddress'] === $emailAd && $admin['Password'] === $password) {
                $result->free_result();
                $mysqli->close();
                $_SESSION['fname'] = $admin['FirstName'];
                $_SESSION['lname'] = $admin['LastName'];
                $_SESSION['pword'] = $admin['Password'];     
                $_SESSION['mobnum'] = $admin['MobileNumber'];     
                $_SESSION['address'] = $admin['Address'];     
                $_SESSION['id'] = $admin['UserID'];
                $_SESSION['loggedAdmin'] = $emailAd;
    
                header ("Location: admin-dashboard-page.php");
                exit();
            }
        } else {
            header('Location: admin-login-page.php?error=Email address or password is incorrect');
            exit();
        }
    }
}