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
    echo "</tr>";
}

// Allow administrators to add, cancel, and view flights
if (isset($_POST['add_flight'])) {
    // Add flight code here
}

if (isset($_POST['cancel_flight'])) {
    // Cancel flight code here
}

if (isset($_POST['view_flight'])) {
    // View flight code here
}
?>