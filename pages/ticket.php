<?php
session_start();
include("../sql_database/conn.php");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if booking ID is available
if (!isset($_SESSION['booking_id'])) {
    echo "No booking found!";
    exit();
}

// Fetch booking details from the database
$booking_id = $_SESSION['booking_id'];
$sql_booking = "SELECT b.booking_id, b.total_price, b.payment_method, b.quantity, b.luggage_weight, f.flight_number, f.departure_airport, f.arrival_airport, f.departure_time, c.class_type
                FROM Bookings b
                JOIN Flights f ON b.flight_id = f.flight_id
                JOIN Classes c ON b.class_id = c.class_id
                WHERE b.booking_id = ?";
$stmt_booking = $conn->prepare($sql_booking);
$stmt_booking->bind_param("i", $booking_id);
$stmt_booking->execute();
$result_booking = $stmt_booking->get_result();

if ($result_booking->num_rows === 0) {
    echo "Booking details not found!";
    exit();
}

$booking_details = $result_booking->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            padding: 20px;
        }

        .ticket {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        .btn-print {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #00796b;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn-print:hover {
            background-color: #005f56;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <h1>Your Booking Ticket</h1>
        <p><strong>Booking ID:</strong> <?= htmlspecialchars($booking_details['booking_id']); ?></p>
        <p><strong>Flight Number:</strong> <?= htmlspecialchars($booking_details['flight_number']); ?></p>
        <p><strong>From:</strong> <?= htmlspecialchars($booking_details['departure_airport']); ?></p>
        <p><strong>To:</strong> <?= htmlspecialchars($booking_details['arrival_airport']); ?></p>
        <p><strong>Departure Time:</strong> <?= htmlspecialchars($booking_details['departure_time']); ?></p>
        <p><strong>Class:</strong> <?= htmlspecialchars($booking_details['class_type']); ?></p>
        <p><strong>Number of Passengers:</strong> <?= htmlspecialchars($booking_details['quantity']); ?></p>
        <p><strong>Total Price:</strong> ₹ <?= number_format($booking_details['total_price']); ?></p>
        <p><strong>Extra Baggage Weight:</strong> <?= htmlspecialchars($booking_details['luggage_weight']); ?> kg</p>
        <p><strong>Payment Method:</strong> <?= htmlspecialchars($booking_details['payment_method']); ?></p>
    </div>

    <a href="javascript:window.print()" class="btn-print">Print Ticket</a>
</body>

</html>

<?php
$stmt_booking->close();
$conn->close();
?>
