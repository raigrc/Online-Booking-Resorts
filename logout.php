<?php 
    session_start();

    unset($_SESSION['loggedUser']);

    session_destroy();

    header("Location: index.php");
?>