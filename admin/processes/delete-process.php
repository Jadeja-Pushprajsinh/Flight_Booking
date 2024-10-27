<?php
include ('../../sql_database/conn.php');

$flight_id = $_GET['flight_id']; 

$sql = "DELETE FROM Flights WHERE flight_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $flight_id); 

if ($stmt->execute()) {
    header("Location: ../manageflight.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$stmt->close();
mysqli_close($conn);
?>
