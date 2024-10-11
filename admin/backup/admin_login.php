<?php
require 'db_conn.php';

// Display administrator account details
$sql = "SELECT * FROM admin WHERE Admin_id='" . $_SESSION['Admin_id'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo "Admin ID: " . $row['Admin_id'];
echo "Name: " . $row['Name'];
echo "Email: " . $row['Email'];
echo "Phone: " . $row['Phone'];
?>