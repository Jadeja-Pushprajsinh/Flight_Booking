<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: ../pages/login.php");
    exit();
} else {
    // User is logged in, proceed to booking page
    header("Location: ../pages/bookflight.php");
    exit();
}
?>
