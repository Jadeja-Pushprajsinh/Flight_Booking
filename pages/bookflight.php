<?php
session_start();
include("../sql_database/conn.php");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if required session data is available
if (!isset($_SESSION['flight_number'], $_SESSION['price'], $_SESSION['departure_airport'], $_SESSION['arrival_airport'], $_SESSION['departure_time'])) {
    echo "Session flight details are missing!";
    exit();
}

// Fetch available classes
$sql_classes = "SELECT class_id, class_type FROM Classes";
$result_classes = $conn->query($sql_classes);
$classes = [];
if ($result_classes->num_rows > 0) {
    while ($row = $result_classes->fetch_assoc()) {
        $classes[] = $row;
    }
}

// Check if form was submitted with required fields
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class_id'], $_POST['numPassengers'], $_POST['payment_method'], $_POST['luggage_weight'])) {
    $user_id = $_SESSION['user_id'];
    $flight_number = $_SESSION['flight_number'];
    $class_id = (int)$_POST['class_id'];
    $numPassengers = (int)$_POST['numPassengers'];
    $price = (float)$_SESSION['price'];
    $payment_method = htmlspecialchars($_POST['payment_method']);
    $luggage_weight = (int)$_POST['luggage_weight'];

    // Fetch flight ID from Flights table
    $sql_flight = "SELECT flight_id FROM Flights WHERE flight_number = ?";
    $stmt_flight = $conn->prepare($sql_flight);
    $stmt_flight->bind_param("s", $flight_number);
    $stmt_flight->execute();
    $result_flight = $stmt_flight->get_result();

    if ($result_flight->num_rows > 0) {
        $flight = $result_flight->fetch_assoc();
        $flight_id = $flight['flight_id'];
    } else {
        echo "Flight not found!";
        exit();
    }

    // Calculate total price including extra baggage cost
    $extra_baggage_cost = $luggage_weight > 15 ? ($luggage_weight - 15) * 100 : 0;
    $total_price = ($price * $numPassengers) + $extra_baggage_cost;

    // Insert booking details into the Bookings table
    $sqlinsert = $conn->prepare("INSERT INTO Bookings (user_id, flight_id, class_id, booking_date, total_price, payment_method, quantity, luggage_weight) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?)");
    $sqlinsert->bind_param("iiissii", $user_id, $flight_id, $class_id, $total_price, $payment_method, $numPassengers, $luggage_weight);

    if ($sqlinsert->execute()) {
        $_SESSION['booking_id'] = $conn->insert_id; // Store booking ID
        $_SESSION['total_price'] = $total_price;

        // Change made: Corrected the redirect to point to ticket.php in the same directory
        header("Location: ticket.php");
        exit();
    } else {
        echo "Error booking flight: " . $sqlinsert->error;
    }

    $sqlinsert->close();
} else {
    // Display the form if it's a GET request or missing POST data
    $flight_number = $_SESSION['flight_number'];
    $departure_airport = $_SESSION['departure_airport'];
    $arrival_airport = $_SESSION['arrival_airport'];
    $departure_time = $_SESSION['departure_time'];
    $price = $_SESSION['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Flight</title>
    <style>
        body {
            background-color: #aeeeee;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Center the title */
        .page-title {
            text-align: center;
            font-size: 36px;
            color: #004d40;
            margin-bottom: 40px;
        }

        /* Booking Wrapper to contain both sections and the button */
        .booking-wrapper {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Flight and Passenger Details in a single row */
        .booking-section {
            display: flex;
            justify-content: space-between;
            width: 100%;
            gap: 30px;
        }

        /* Flight Details and Booking Form */
        .flight-details,
        .booking-form {
            flex: 1;
            padding: 20px;
        }

        .flight-details h2,
        .booking-form h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #004d40;
        }

        .flight-details p,
        .booking-form label {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .price {
            color: #00695c;
            font-size: 20px;
            font-weight: bold;
        }

        /* Inputs and select dropdown styling */
        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        /* Center the confirm button under the entire form */
        .center-btn {
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }

        button {
            background-color: #004d40;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            width: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #00796b;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 121, 107, 0.2);
        }

        @media (max-width: 768px) {
            /* Make layout stack vertically on smaller screens */
            .booking-section {
                flex-direction: column;
                align-items: center;
            }

            .center-btn button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php include("../pages/header.php"); ?>
    <div class="container">
        <h1 class="page-title">Book Your Flight</h1>

        <div class="booking-wrapper">
            <div class="booking-section">
                <!-- Flight Information -->
                <div class="flight-details">
                    <u style="color: #004d40;"><h1 style="margin-bottom: 20px;font-size: 27px;color: #004d40;">Flight Information</h1></u>
                    <p><strong>Flight Number:</strong> <?= htmlspecialchars($flight_number); ?></p>
                    <p><strong>From:</strong> <?= htmlspecialchars($departure_airport); ?></p>
                    <p><strong>To:</strong> <?= htmlspecialchars($arrival_airport); ?></p>
                    <p><strong>Departure Time:</strong> <?= htmlspecialchars($departure_time); ?></p>
                    <p class="price"><strong>Price per person:</strong> ₹ <?= number_format($price); ?></p>
                    <p style="font-size: 30px;font-weight: bold;color: #004d40;">Total Price: ₹ <span id="totalPrice"><?= number_format($price); ?></span></p>
                </div>

                <!-- Passenger Details -->
                <div class="booking-form">
                    <u style="color: #004d40;"><h2>Passenger Details</h2></u>
                    <form method="POST" action="">
                        <label for="class_id">Select Class:</label>
                        <select name="class_id" id="class_id" required onchange="updateTotalPrice(<?= $price; ?>)">
                            <?php foreach ($classes as $class) : ?>
                                <option value="<?= $class['class_id']; ?>"><?= htmlspecialchars($class['class_type']); ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="numPassengers">Number of Passengers:</label>
                        <input type="number" id="numPassengers" name="numPassengers" value="1" min="1" onchange="updateTotalPrice(<?= $price; ?>)" />

                        <label for="luggage_weight">Extra Baggage Weight (kg):</label>
                        <input type="number" id="luggage_weight" name="luggage_weight" value="0" min="0" onchange="updateTotalPrice(<?= $price; ?>)" />

                        <label for="payment_method">Payment Method:</label>
                        <select name="payment_method" id="payment_method" required>
                            <option value="credit_card">Credit Card</option>
                            <option value="debit_card">Debit Card</option>
                            <option value="net_banking">Net Banking</option>
                        </select>

                        <div class="center-btn">
                            <button type="submit">Confirm Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../pages/footer.php"); ?>

    <script>
        function updateTotalPrice(basePrice) {
            const numPassengers = document.getElementById('numPassengers').value;
            const luggageWeight = document.getElementById('luggage_weight').value;

            // Calculate extra baggage cost if luggage exceeds 15kg
            const extraBaggageCost = luggageWeight > 15 ? (luggageWeight - 15) * 100 : 0;

            // Calculate total price
            const totalPrice = (basePrice * numPassengers) + extraBaggageCost;

            // Update the total price in the UI
            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
        }
    </script>
</body>

</html>
