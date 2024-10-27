<?php
include('../../sql_database/conn.php');

$booking_id = $_GET['id'];

if (is_numeric($booking_id)) {

    // Update the status to 'rejected'
    $sql = "UPDATE Bookings SET status='rejected' WHERE booking_id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        header("Location:../booking.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    
} else {
    echo "Invalid booking ID.";
}

$conn->close();
?>
