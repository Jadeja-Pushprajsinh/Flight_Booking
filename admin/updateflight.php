<?php
include('./include/header.php');
include('./include/sidebar.php');
include('../sql_database/conn.php');

// Get flight ID from URL
$id = intval($_GET['id']);

// Prepare SQL query to fetch flight details securely
$sql = "SELECT * FROM flights WHERE flight_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result(); // Fetch the result set
$row = $result->fetch_assoc();
$stmt->close();
?>

<section class="section">
    <div class="container-fluid">
        <!-- Title Wrapper -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Update Flight</h2>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-30">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Update Flight</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- End Col -->
            </div>

            <div class="card-style mb-30">
                <h6 class="mb-25">Update Flight Details</h6>
                <form action="./processes/update-process.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="flight_id" value="<?= htmlspecialchars($row['flight_id']); ?>" />

                    <div class="input-style-1">
                        <label>Flight Number</label>
                        <input type="text" name="flight_number" value="<?= htmlspecialchars($row['flight_number']); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Airline</label>
                        <input type="text" name="airline" value="<?= htmlspecialchars($row['airline']); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Departure Airport</label>
                        <input type="text" name="departure_airport" value="<?= htmlspecialchars($row['departure_airport']); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Arrival Airport</label>
                        <input type="text" name="arrival_airport" value="<?= htmlspecialchars($row['arrival_airport']); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Departure Time</label>
                        <input type="datetime-local" name="departure_time" value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($row['departure_time']))); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Arrival Time</label>
                        <input type="datetime-local" name="arrival_time" value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($row['arrival_time']))); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Duration (in hours)</label>
                        <input type="number" name="duration" value="<?= htmlspecialchars($row['duration']); ?>" required min="1" />
                    </div>
                    <div class="input-style-1">
                        <label>Price</label>
                        <input type="number" name="price" value="<?= htmlspecialchars($row['price']); ?>" required step="0.01" />
                    </div>
                    <div class="input-style-1">
                        <label>Total Seats</label>
                        <input type="number" name="total_seats" value="<?= htmlspecialchars($row['total_seats']); ?>" required />
                    </div>
                    <div class="input-style-1">
                        <label>Available Seats</label>
                        <input type="number" name="available_seats" value="<?= htmlspecialchars($row['available_seats']); ?>" required />
                    </div>
                    <input type="submit" name="upload" class="main-btn primary-btn btn-hover" value="Update Flight">
                </form>
            </div>
        </div>
    </div>
</section>
