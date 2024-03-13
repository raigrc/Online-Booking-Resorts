<?php
    session_start();

    require_once('dbConn.php');

    if (isset($_POST['delete_resort'])) {
        $resort_id = ($_POST['resort_id']);

        $delete_resort_query = "DELETE FROM resorts WHERE resort_id = '$resort_id'";
        $result = $mysqli->query($delete_resort_query);

        if ($result->affected_rows > 0) {
            echo "Resort successfully deleted.";
        } else {
            echo "Failed to delete user. Please try again.";
        }
        $result->close();
    }
?>
