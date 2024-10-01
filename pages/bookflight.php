<?php
session_start();
include("../sql_database/conn.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve flight details from POST or SESSION
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate POST data
    $flight_number = mysqli_real_escape_string($conn, $_POST['flight_number']);
    $departure_airport = mysqli_real_escape_string($conn, $_POST['departure_airport']);
    $arrival_airport = mysqli_real_escape_string($conn, $_POST['arrival_airport']);
    $departure_time = mysqli_real_escape_string($conn, $_POST['departure_time']);
    $price = (float)$_POST['price'];  // Cast to float for safety

    // Store flight details in SESSION
    $_SESSION['flight_number'] = $flight_number;
    $_SESSION['departure_airport'] = $departure_airport;
    $_SESSION['arrival_airport'] = $arrival_airport;
    $_SESSION['departure_time'] = $departure_time;
    $_SESSION['price'] = $price;
} else {
    // Retrieve flight details from SESSION
    if (isset($_SESSION['flight_number'], $_SESSION['departure_airport'], $_SESSION['arrival_airport'], $_SESSION['departure_time'], $_SESSION['price'])) {
        $flight_number = $_SESSION['flight_number'];
        $departure_airport = $_SESSION['departure_airport'];
        $arrival_airport = $_SESSION['arrival_airport'];
        $departure_time = $_SESSION['departure_time'];
        $price = $_SESSION['price'];
    } else {
        echo "Flight details are missing!";
        exit;
    }
}

// Handle booking confirmation
if (isset($_POST['confirm_booking'])) {
    $user_id = $_SESSION['user_id'];

    // insert booking data into the Bookings table
    $sqlinsert = $conn->prepare("INSERT INTO Bookings (user_id, flight_number, departure_airport, arrival_airport, departure_time, total_price, booking_date) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    // $sqlinsert->bind_param("sssssd", $user_id, $flight_number, $departure_airport, $arrival_airport, $departure_time, $price);

    if ($sqlinsert->execute()) {
        echo "Flight booked successfully!";
        $_SESSION['flight_number'];
        $_SESSION['departure_airport'];
        $_SESSION['arrival_airport'];
        $_SESSION['departure_time'];
        $_SESSION['price'];
    } else {
        echo "Error booking flight: " . $sqlinsert->error;
    }
    $sqlinsert->close();
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
            background-color: #e0f7f7; /* Light teal theme */
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 32px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 40px;
            transition: color 0.3s ease;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: textColorAnimation 10s ease infinite;
            background-size: 600% 600%;
        }

        .flight-book {
            background-color: white;
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            text-align: left;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
        }

        .flight-book:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .flight-book p {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .price, .total-price {
            color: #004d40;
            font-size: 22px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
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
            position: relative;
            overflow: hidden;
        }

        button:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 121, 107, 0.3);
        }

        button:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background-color: rgba(255, 255, 255, 0.2);
            transition: width 0.4s ease, height 0.4s ease, top 0.4s ease, left 0.4s ease;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }

        button:hover:before {
            width: 0;
            height: 0;
            top: 50%;
            left: 50%;
        }

        .dynamic-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
        }

        .dynamic-price label {
            font-size: 16px;
            color: #00796b;
        }

        .total-price {
            font-size: 24px;
            margin-top: 10px;
        }

        @keyframes bgAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes textColorAnimation {
            0% {
                background-image: linear-gradient(270deg, #004d40, #00796b, #004d40);
            }
            50% {
                background-image: linear-gradient(270deg, #00796b, #004d40, #00796b);
            }
            100% {
                background-image: linear-gradient(270deg, #004d40, #00796b, #004d40);
            }
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(270deg, #d1f2eb, #b2dfdb, #4db6ac);
            background-size: 600% 600%;
            z-index: -1;
            animation: bgAnimation 10s ease infinite;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Book Your Flight</h1>
        <div class="flight-book">
            <p>Flight Number: <?= htmlspecialchars($flight_number); ?></p>
            <p>From: <?= htmlspecialchars($departure_airport); ?></p>
            <p>To: <?= htmlspecialchars($arrival_airport); ?></p>
            <p>Departure Time: <?= htmlspecialchars($departure_time); ?></p>
            <p class="price">Price per person: ₹ <?= number_format($price); ?></p>
            
            <form method="POST" action="">
                <div class="dynamic-price">
                    <label for="numPassengers">Number of Passengers:</label>
                    <input type="number" id="numPassengers" name="numPassengers" value="1" min="1" max="70" oninput="updateTotalPrice(<?= $price; ?>)">
                </div>
                <p class="total-price">Total Price: <span id="totalPrice">₹ <?= number_format($price); ?></span></p>
                
                <input type="hidden" name="confirm_booking" value="1">
                <button type="submit">Confirm Booking</button>
            </form>
        </div>
    </div>
    <script>
        function updateTotalPrice(pricePerPerson) {
            const numberOfPeople = document.getElementById('numPassengers').value;
            if (numberOfPeople > 70) {
                alert("You cannot book for more than 70 passengers.");
                document.getElementById('numPassengers').value = 70; // Set it back to 70 if over limit
            }
            const totalPrice = pricePerPerson * numberOfPeople;
            document.getElementById('totalPrice').innerText = '₹ ' + totalPrice.toLocaleString();
        }
    </script>
</body>
</html>
