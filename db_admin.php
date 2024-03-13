<?php
global $con;
    $con = mysqli_connect('localhost:3307', 'root', '');
    mysqli_select_db($con, 'solace');
?>