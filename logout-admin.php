<?php 
    session_start();

    unset($_SESSION['loggedAdmin']);

    session_destroy();

    header("Location: admin-login-page.php");
?>