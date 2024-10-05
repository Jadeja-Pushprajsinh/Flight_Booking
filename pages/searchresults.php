<?php
session_start();
include("../sql_database/conn.php");

// Retrieve search parameters from POST or SESSION
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // If form is submitted, get data from POST and store in SESSION
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $depart_date = $_POST['depart'];
    $passengers = $_POST['passengers'];

    $_SESSION['origin'] = $origin;
    $_SESSION['destination'] = $destination;
    $_SESSION['depart'] = $depart_date;
    $_SESSION['passengers'] = $passengers;
} else {
    // If not a POST request, retrieve data from SESSION
    if (isset($_SESSION['origin']) && isset($_SESSION['destination']) && isset($_SESSION['depart']) && isset($_SESSION['passengers'])) {
        $origin = $_SESSION['origin'];
        $destination = $_SESSION['destination'];
        $depart_date = $_SESSION['depart'];
        $passengers = $_SESSION['passengers'];
    } else {
        // If no search data is available, redirect to index.php
        header('Location: ../index.php');
        exit();
    }
}

// Retrieve sorting option from POST or SESSION
if (isset($_POST['sort_option'])) {
    $sort_option = $_POST['sort_option'];
    $_SESSION['sort_option'] = $sort_option;
} elseif (isset($_SESSION['sort_option'])) {
    $sort_option = $_SESSION['sort_option'];
} else {
    $sort_option = 'cheapest'; // Default sorting option
}

// Perform the search query
$sql = "SELECT departure_airport, arrival_airport, flight_number, airline, departure_time, duration, price 
        FROM flights 
        WHERE LOWER(departure_airport) = LOWER('$origin') 
        AND LOWER(arrival_airport) = LOWER('$destination') 
        AND DATE(departure_time) = '$depart_date'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $flights = [];
    while ($row = $result->fetch_assoc()) {
        $flights[] = $row;
    }

    // Sort the flights based on user's choice
    if ($sort_option == 'cheapest') {
        usort($flights, function ($a, $b) {
            return $a['price'] <=> $b['price'];
        });
    } elseif ($sort_option == 'fastest') {
        usort($flights, function ($a, $b) {
            return $a['duration'] <=> $b['duration'];
        });
    }
} else {
    header('Location: error.php?error=No flights found for your search criteria.');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Flight Search Results</title>
    <style>
        :root {
            --main-teal: #008080;
            --hover-teal: #007272;
            --secondary-teal: #e0f7f7;
            --shadow-color: rgba(0, 128, 128, 0.2);
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--secondary-teal);
        }

        .btn-teal {
            background-color: var(--main-teal);
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-teal:hover {
            background-color: var(--hover-teal);
        }

        .flex-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px var(--shadow-color);
            padding: 14px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            gap: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px var(--shadow-color);
        }

        .flight-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .flight-details {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex: 1;
        }

        .flight-time,
        .flight-price,
        .flight-book {
            text-align: center;
        }

        .flight-book button {
            background-color: var(--main-teal);
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .flight-book button:hover {
            background-color: var(--hover-teal);
        }

        .hover-section:hover {
            background-color: var(--main-teal);
            border-color: var(--main-teal);
        }

        .hover-section:hover span,
        .hover-section:hover i {
            color: white;
        }

        .icon {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body class="bg-teal-50 py-8">
   

        <div class="container mx-auto px-4">

            <!-- Header -->
            <header class="text-center mb-8">
                <h1 class="text-4xl font-bold text-teal-800">Flight Search Results</h1>
                <p class="text-gray-600 mt-2">Find the best flights for your trip</p>
            </header>

            <!-- Filters Section -->
            <section class="flex justify-center mb-8 space-x-6">
                <!-- Cheapest -->
                <div class="flex-1 max-w-xs text-center bg-white py-4 px-6 rounded-lg shadow-lg border hover-section transition-all duration-300">
                    <form method="POST" action="">
                        <input type="hidden" name="origin" value="<?= htmlspecialchars($origin); ?>">
                        <input type="hidden" name="destination" value="<?= htmlspecialchars($destination); ?>">
                        <input type="hidden" name="depart" value="<?= htmlspecialchars($depart_date); ?>">
                        <input type="hidden" name="passengers" value="<?= htmlspecialchars($passengers); ?>">
                        <input type="hidden" name="sort_option" value="cheapest">
                        <button type="submit" class="w-full">
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-rupee-sign text-teal-600"></i>
                                <span class="font-semibold text-teal-600">CHEAPEST</span>
                            </div>
                        </button>
                    </form>
                </div>
                <!-- Fastest -->
                <div class="flex-1 max-w-xs text-center bg-white py-4 px-6 rounded-lg shadow-lg border hover-section transition-all duration-300">
                    <form method="POST" action="">
                        <input type="hidden" name="origin" value="<?= htmlspecialchars($origin); ?>">
                        <input type="hidden" name="destination" value="<?= htmlspecialchars($destination); ?>">
                        <input type="hidden" name="depart" value="<?= htmlspecialchars($depart_date); ?>">
                        <input type="hidden" name="passengers" value="<?= htmlspecialchars($passengers); ?>">
                        <input type="hidden" name="sort_option" value="fastest">
                        <button type="submit" class="w-full">
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-bolt text-teal-600"></i>
                                <span class="font-semibold text-teal-600">FASTEST</span>
                            </div>
                        </button>
                    </form>
                </div>
            </section>

            <!-- Flight Results -->
            <section class="flex-container">
                <?php if (isset($flights) && !empty($flights)) : ?>
                    <?php foreach ($flights as $flight) : ?>
                        <div class="card">
                            <!-- Airline logo and name -->
                            <div class="flight-info">
                                <img src="https://placehold.co/50x50" alt="<?= $flight['airline']; ?> logo" class="icon">
                                <div>
                                    <h2 class="font-semibold text-teal-800"><?= $flight['airline']; ?></h2>
                                    <p class="text-gray-500"><?= $flight['flight_number']; ?></p>
                                </div>
                            </div>

                            <!-- Flight Details -->
                            <div class="flight-details">
                                <div class="flight-time">
                                    <p class="text-lg font-semibold text-teal-800"><?= date('H:i', strtotime($flight['departure_time'])); ?></p>
                                    <p class="text-sm text-gray-500"><?= ucfirst($flight['departure_airport']); ?></p>
                                </div>

                                <div class="duration">
                                    <p class="text-sm text-gray-500"><?= floor($flight['duration'] / 60) . 'h ' . ($flight['duration'] % 60) . 'm'; ?></p>
                                    <p class="text-sm text-green-500">Non-stop</p>
                                </div>

                                <div class="arrival-time">
                                    <?php
                                    $departure_time = new DateTime($flight['departure_time']);
                                    $arrival_time = clone $departure_time;
                                    $arrival_time->modify("+{$flight['duration']} minutes");
                                    ?>
                                    <p class="text-lg font-semibold text-teal-800"><?= $arrival_time->format('H:i'); ?></p>
                                    <p class="text-sm text-gray-500"><?= ucfirst($flight['arrival_airport']); ?></p>
                                </div>
                            </div>

                            <!-- Price and Book Button -->
                            <div class="flight-price">
                                <p class="text-xl font-bold text-teal-800">₹ <?= number_format($flight['price']); ?></p>
                                <p class="text-sm text-gray-500">per adult</p>
                            </div>

                            <div class="flight-book">
                                <form method="POST" action="bookflight.php">
                                    <input type="hidden" name="flight_number" value="<?= $flight['flight_number']; ?>">
                                    <input type="hidden" name="departure_airport" value="<?= $flight['departure_airport']; ?>">
                                    <input type="hidden" name="arrival_airport" value="<?= $flight['arrival_airport']; ?>">
                                    <input type="hidden" name="departure_time" value="<?= $flight['departure_time']; ?>">
                                    <input type="hidden" name="price" value="<?= $flight['price']; ?>">
                                    <button type="submit">Book Flight</button>
                                </form>

                                </form>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    
</body>

</html>