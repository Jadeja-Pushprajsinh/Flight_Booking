<?php
require 'db_conn.php';

// Add a new flight
if (isset($_POST['add_flight'])) {
    $flight_no = $_POST['flight_no'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $dep = $_POST['dep'];
    $arr = $_POST['arr'];
    $fare = $_POST['fare'];

    $sql = "INSERT INTO flight (F_no, Origin, Destination, Dep, Arr, Fare) VALUES ('$flight_no', '$origin', '$destination', '$dep', '$arr', '$fare')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error adding flight: " . mysqli_error($conn);
    } else {
        echo "Flight added successfully";
    }
}
?>