<?php 
    global $mysqli;

    $mysqli = new mysqli('localhost:3307', 'root', '', 'php_group');

    if ($mysqli->connect_error) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>