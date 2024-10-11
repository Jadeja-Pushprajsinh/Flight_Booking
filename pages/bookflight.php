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
    $sqlinsert->bind_param("iiisisi", $user_id, $flight_id, $class_id, $total_price, $payment_method, $numPassengers, $luggage_weight);

    if ($sqlinsert->execute()) {
        $_SESSION['booking_id'] = $conn->insert_id; // Store booking ID
        $_SESSION['total_price'] = $total_price;

        // Redirect to ticket.php to show booking details
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
            background-color: #e0f7f7;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            padding: 50px;
        }

        .flight-book {
            background-color: white;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            text-align: left;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
        }

        .flight-book p {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .price,
        .total-price {
            color: #004d40;
            font-size: 22px;
            font-weight: bold;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 18px;
            cursor: pointer;
            transition: box-shadow 0.4s ease, transform 0.4s ease;
            width: 100%;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 121, 107, 0.3);
        }

        .dynamic-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
        }

        .total-price {
            font-size: 24px;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .flight-book {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Book Your Flight</h1>
        <div class="flight-book">
            <h1>Flight Number: <?= htmlspecialchars($flight_number); ?></h1>
            <h1>From: <?= htmlspecialchars($departure_airport); ?></h1>
            <h1>To: <?= htmlspecialchars($arrival_airport); ?></h1>
            <h1>Departure Time: <?= htmlspecialchars($departure_time); ?></h1>
            <h1 class="price">Price per person: ₹ <?= number_format($price); ?></h1>

            <!-- Form that sends data to confirm booking -->
            <form method="POST" action="">
                <!-- Dropdown for selecting class -->
                <label for="class_id">Select Class:</label>
                <select name="class_id" id="class_id" required onchange="updateTotalPrice(<?= $price; ?>)">
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?= $class['class_id']; ?>"><?= htmlspecialchars($class['class_type']); ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Input for number of passengers -->
                <div class="dynamic-price">
                    <label for="numPassengers">Number of Passengers:</label>
                    <input type="number" id="numPassengers" name="numPassengers" value="1" min="1" onchange="updateTotalPrice(<?= $price; ?>)" />
                </div>

                <!-- Input for extra baggage weight -->
                <div class="dynamic-price">
                    <label for="luggage_weight">Extra Baggage Weight (kg):</label>
                    <input type="number" id="luggage_weight" name="luggage_weight" value="0" min="0" />
                </div>

                <!-- Display total price -->
                <p class="total-price">Total Price: ₹ <span id="totalPrice"><?= number_format($price); ?></span></p>

                <!-- Payment method (Example) -->
                <label for="payment_method">Payment Method:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Net Banking">Net Banking</option>
                </select>

                <button type="submit">Confirm Booking</button>
            </form>
        </div>
    </div>

    <script>
        function updateTotalPrice(pricePerPerson) {
            const numPassengers = parseInt(document.getElementById('numPassengers').value);
            const luggageWeight = parseInt(document.getElementById('luggage_weight').value);
            const basePrice = pricePerPerson * numPassengers;
            const extraBaggageCost = luggageWeight > 15 ? (luggageWeight - 15) * 100 : 0;
            const totalPrice = basePrice + extraBaggageCost;
            document.getElementById('totalPrice').innerText = totalPrice.toLocaleString();
        }
    </script>
</body>
</html>
