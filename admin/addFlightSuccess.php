<?php
require 'db_conn.php';

// Add a new flight
if (isset($_POST['add_flight'])) {
    $flight_no = $_POST['flight_no'];
    $origin = $_POST['origin'];
}
   ?>