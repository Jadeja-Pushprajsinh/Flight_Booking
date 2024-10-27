<?php
include('../../sql_database/conn.php');

// Check if flight_id is set
if (isset($_GET['id'])) {
    $flight_id = intval($_GET['id']);  // Get flight ID

    // Retrieve updated flight details from POST request
    $flight_number = $_POST['flight_number'];
    $airline = $_POST['airline'];
    $departure_airport = $_POST['departure_airport'];
    $arrival_airport = $_POST['arrival_airport'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $duration = (int)$_POST['duration'];
    $total_seats = (int)$_POST['total_seats'];
    $available_seats = (int)$_POST['available_seats'];
    $price = (float)$_POST['price']; // Make sure this is a float

    // Prepare SQL statement to update flight details securely
    $sql = "UPDATE Flights SET  
            flight_number = ?,
            airline = ?,
            departure_airport = ?,
            arrival_airport = ?,
            departure_time = ?,
            arrival_time = ?,
            duration = ?,
            total_seats = ?,
            available_seats = ?,
            price = ?
            WHERE flight_id = ?";

    $stmt = $conn->prepare($sql);

    // Correctly include flight_id in the bind_param
    $stmt->bind_param(
        "ssssssiidii",
        $flight_number,
        $airline,
        $departure_airport,
        $arrival_airport,
        $departure_time,
        $arrival_time,
        $duration,
        $total_seats,
        $available_seats,
        $price,
        $flight_id // Last parameter
    );
    error_log("Flight ID: $flight_id, Flight Number: $flight_number, Airline: $airline, ...");

    if ($stmt->execute()) {
        // Redirect to manage flights page after successful update
        header("Location: ../manageflight.php");
        exit();
    } else {
        // Handle error if the update fails
        error_log("Error updating flight: " . $stmt->error); // Log the error for debugging
        echo "Error updating flight. Please try again later.";
    }

    $stmt->close();
} else {
    // Handle case where flight_id is not set
    echo "Flight ID is missing.";
}

$conn->close();
