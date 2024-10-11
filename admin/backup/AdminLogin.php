<?php
require 'db_conn.php';

// Authenticate administrator login credentials
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='" . $username . "' AND password='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Login successful";
        // Redirect to administrator dashboard
    } else {
        echo "Invalid username or password";
    }
}
?>