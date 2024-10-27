<?php
include('./include/header.php');
include('./include/sidebar.php');
include('../sql_database/conn.php');
?>

<!-- ========== tab components start ========== -->
<section class="tab-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2> Create New Flights </h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a>Flights</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Create Flights
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="form-elements-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!-- input style start -->
          <div class="card-style mb-30">
            <h6 class="mb-25">Input Fields</h6>
            <form action="./processes/create-process.php" method="post" enctype="multipart/form-data">
              <div class="input-style-1">
                <label>Flight Number</label>
                <input type="text" name="flight_number" placeholder="Flight Number" required />
              </div>
              <div class="input-style-1">
                <label>Airline</label>
                <input type="text" name="airline" placeholder="Airline" required />
              </div>
              <div class="input-style-1">
                <label>Departure Airport</label>
                <input type="text" name="departure_airport" placeholder="Departure Airport" required />
              </div>
              <div class="input-style-1">
                <label>Arrival Airport</label>
                <input type="text" name="arrival_airport" placeholder="Arrival Airport" required />
              </div>
              <div class="input-style-1">
                <label>Departure Time</label>
                <input type="datetime-local" name="departure_time" required />
              </div>
              <div class="input-style-1">
                <label>Arrival Time</label>
                <input type="datetime-local" name="arrival_time" required />
              </div>
              <div class="input-style-1">
                <label>Duration (in minutes)</label>
                <input type="number" name="duration" placeholder="Duration in minutes" required />
              </div>
              <div class="input-style-1">
                <label>Total Seats</label>
                <input type="number" name="total_seats" placeholder="Total Seats" required />
              </div>
              <div class="input-style-1">
                <label>Price</label>
                <input type="number" step="0.01" name="price" placeholder="Price" required />
              </div>
              <input type="submit" class="main-btn primary-btn btn-hover" value="Add Flight">
            </form>
          </div>
        </div>
      </div>
    </div>
</section>

<?php include './include/footer.php'; ?>
