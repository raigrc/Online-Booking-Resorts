<?php
    session_start();

    require_once('dbConn.php');

    if (isset($_POST['delete_user'])) {
        $user_id = intval($_POST['UserID']);

        $delete_user_query = "DELETE FROM users WHERE id = ?";
        $stmt = $mysqli->prepare($delete_user_query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "User successfully deleted.";
        } else {
            echo "Failed to delete user. Please try again.";
        }
        $stmt->close();
    }
?>
