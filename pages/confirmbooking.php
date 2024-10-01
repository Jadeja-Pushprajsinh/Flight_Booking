<?php
session_start();

// Check if session variables are set
if (isset($_SESSION['flight_number']) && isset($_SESSION['departure_airport']) && isset($_SESSION['arrival_airport']) && isset($_SESSION['departure_time']) && isset($_SESSION['price'])) {
    // Use the session variables to display the booking confirmation
    echo "Flight Number: " . $_SESSION['flight_number'];
    echo "Departure Airport: " . $_SESSION['departure_airport'];
    echo "Arrival Airport: " . $_SESSION['arrival_airport'];
    echo "Departure Time: " . $_SESSION['departure_time'];
    echo "Price: " . $_SESSION['price'];
} else {
    echo "Error: Session variables are not set.";
}
?>