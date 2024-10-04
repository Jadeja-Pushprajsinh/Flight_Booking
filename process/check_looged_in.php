<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../pages/login.php");
    exit();
} else {
    header("Location: ../pages/bookflight.php");
    exit();
}
?>