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
            background-color: #aeeeee;
            font-family: 'Roboto', sans-serif;
            padding: 20px;
        }

        .ticket {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 5%;
            margin-bottom: 6%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        p {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .btn-print {
            display: block;
            margin: 30px auto 0;
            padding: 12px 25px;
            background-color: #00796b;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }

        .btn-print:hover {
            background-color: #005f56;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .ticket,
            .ticket * {
                visibility: visible;
            }

            .ticket {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                margin: 0;
                padding: 20px;
                border: none;
                box-shadow: none;
            }
        }

        /* Container for the video and content */
        .video-background {
            position: relative;
            height: 95vh;
            width: 100%;
            overflow: hidden;
        }

        /* Video styling */
        #background-video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translate(-50%, -50%);
            width: 1920px;
            height: 925px;
        }
    </style>
</head>

<body>
    <?php include("../pages/header.php"); ?>
    <div>
        <div class="video-background">
            <video autoplay muted loop id="background-video">
                <source src="../img/sky.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <div class="ticket">

                <h1>Your Booking Ticket Receipt</h1>
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
                <a href="javascript:window.print()" class="btn-print">Print Ticket</a>
            </div>
        </div>

</body>

</html>

<?php
$stmt_booking->close();
$conn->close();
?>