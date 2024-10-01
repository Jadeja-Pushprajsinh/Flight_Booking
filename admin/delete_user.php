<?php
require 'db_conn.php';

// Delete a user
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM user WHERE User_id='" . $user_id . "'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error deleting user: " . mysqli_error($conn);
    } else {
        echo "User deleted successfully";
    }
}
?>