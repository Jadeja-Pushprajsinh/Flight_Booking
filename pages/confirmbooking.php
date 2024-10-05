<?php
session_start();
include("../sql_database/conn.php");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Debugging: Print POST and SESSION data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>';
    echo "POST Data:\n";
    print_r($_POST); // Display POST data

    echo "SESSION Data:\n";
    print_r($_SESSION); // Display SESSION data
    echo '</pre>';
}

// Check if required session data is available
if (!isset($_SESSION['flight_number'], $_SESSION['price'], $_SESSION['departure_airport'], $_SESSION['arrival_airport'], $_SESSION['departure_time'])) {
    echo "Session flight details are missing!";
    print_r($_SESSION); // Print session data to debug
    exit();
}

// Check if form was submitted with required fields
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class_id'], $_POST['numPassengers'], $_POST['payment_method'])) {
    $user_id = $_SESSION['user_id'];
    $flight_number = $_SESSION['flight_number'];
    $class_id = (int)$_POST['class_id'];
    $numPassengers = (int)$_POST['numPassengers'];
    $price = (float)$_SESSION['price'];
    $payment_method = htmlspecialchars($_POST['payment_method']);

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

    // Calculate total price
    $total_price = $price * $numPassengers;

    // Insert booking details into the Bookings table
    $sqlinsert = $conn->prepare("INSERT INTO Bookings (user_id, flight_id, class_id, booking_date, total_price, payment_method, quantity) VALUES (?, ?, ?, NOW(), ?, ?, ?)");
    $sqlinsert->bind_param("iiissi", $user_id, $flight_id, $class_id, $total_price, $payment_method, $numPassengers);

    if ($sqlinsert->execute()) {
        $_SESSION['booking_id'] = $conn->insert_id; // Store booking ID
        $_SESSION['total_price'] = $total_price;

        // Redirect to payment page
        header("Location: confirm_payment.php");
        exit();
    } else {
        echo "Error booking flight: " . $sqlinsert->error;
    }

    $sqlinsert->close();
} else {
    echo "Missing booking information!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #e0f7f7;
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center;
            padding: 50px;
        }

        .ticket {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 60%;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #004d40;
        }

        .details {
            font-size: 18px;
            margin-bottom: 10px;
        }

        select, input[type="number"], input[type="submit"], button {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        button {
            background-color: #00796b;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #004d40;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="ticket">
        <h1>Confirm Your Booking</h1>
        <p class="details">Flight Number: <?= htmlspecialchars($_SESSION['flight_number']); ?></p>
        <p class="details">From: <?= htmlspecialchars($_SESSION['departure_airport']); ?></p>
        <p class="details">To: <?= htmlspecialchars($_SESSION['arrival_airport']); ?></p>
        <p class="details">Departure Time: <?= htmlspecialchars($_SESSION['departure_time']); ?></p>
        <p class="details">Price per person: ₹<?= number_format($_SESSION['price']); ?></p>

        <form method="POST" action="confirmbooking.php">
            <!-- Class selection -->
            <label for="class_id">Select Class:</label>
            <select name="class_id" id="class_id" required>
                <?php
                // Fetch class types from the Classes table
                $sql_class = "SELECT class_id, class_type FROM Classes";
                $result_class = $conn->query($sql_class);
                while ($class = $result_class->fetch_assoc()) : ?>
                    <option value="<?= $class['class_id']; ?>"><?= htmlspecialchars($class['class_type']); ?></option>
                <?php endwhile; ?>
            </select>

            <!-- Number of passengers -->
            <label for="numPassengers">Number of Passengers:</label>
            <input type="number" name="numPassengers" id="numPassengers" value="1" min="1" required>

            <!-- Payment method selection -->
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Net Banking">Net Banking</option>
            </select>

            <!-- Submit button to confirm booking -->
            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('numPassengers').addEventListener('input', function() {
        const pricePerPerson = <?= $_SESSION['price']; ?>;
        const numPassengers = this.value;
        const totalPrice = pricePerPerson * numPassengers;
        document.getElementById('display_total_price').textContent = totalPrice.toLocaleString();
        document.getElementById('total_price').value = totalPrice;
    });
</script>

</body>

</html>
