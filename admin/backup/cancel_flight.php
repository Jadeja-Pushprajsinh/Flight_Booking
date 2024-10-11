<?php
require 'db_conn.php';

// Display a list of flights
$sql = "SELECT * FROM flight";
$result = mysqli_query($conn, $sql);

// Display the list of flights
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['F_no'] . "</td>";
    echo "<td>" . $row['Origin'] . "</td>";
    echo "<td>" . $row['Destination'] . "</td>";
    echo "<td>" . $row['Dep'] . "</td>";
    echo "<td>" . $row['Arr'] . "</td>";
    echo "<td>" . $row['Fare'] . "</td>";
    echo "<td><input type='radio' name='cancel_flight' value='" . $row['F_no'] . "'></td>";
    echo "</tr>";
}

// Cancel the selected flight
if (isset($_POST['cancel'])) {
    $flight_no = $_POST['cancel_flight'];
    $sql = "DELETE FROM flight WHERE F_no='" . $flight_no . "'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error canceling flight: " . mysqli_error($conn);
    } else {
        echo "Flight canceled successfully";
    }
}
?>