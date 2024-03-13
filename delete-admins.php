<?php
    session_start();

    require_once('dbConn.php');

    if (isset($_POST['delete_admin'])) {
        $user_id = intval($_POST['user_id']);

        $delete_admin_query = "DELETE FROM admins WHERE UserID = ?";
        $stmt = $mysqli->prepare($delete_admin_query);
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
