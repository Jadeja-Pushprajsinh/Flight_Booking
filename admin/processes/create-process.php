
<?php
include('../../sql_database/conn.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['flight_number'], $_POST['airline'], $_POST['departure_airport'], $_POST['arrival_airport'], $_POST['departure_time'], $_POST['arrival_time'], $_POST['price'], $_POST['duration'], $_POST['total_seats'])) {

    $flight_number = $_POST['flight_number'];
    $airline = $_POST['airline'];
    $departure_airport = $_POST['departure_airport'];
    $arrival_airport = $_POST['arrival_airport'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = (float)$_POST['price'];
    $duration = (int)$_POST['duration'];
    $total_seats = (int)$_POST['total_seats'];
    $available_seats = $total_seats; 

    $sql = $conn->prepare("INSERT INTO Flights (flight_number, airline, departure_airport, arrival_airport, departure_time, arrival_time, duration, total_seats, available_seats, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssssiii", $flight_number, $airline, $departure_airport, $arrival_airport, $departure_time, $arrival_time, $duration, $total_seats, $available_seats, $price);

    if ($sql->execute()) {
        header("Location: ../dashboard.php");  
        exit();
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
} else {

    echo "<p>Please fill in all the required fields.</p>";
}

$conn->close();
?>