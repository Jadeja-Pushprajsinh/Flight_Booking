<?php
include ('./include/header.php');
include ('./include/sidebar.php');
include ('../sql_database/conn.php');

// Fetch total flights
$sql = "SELECT count(*) as total_flights FROM flights;";
$all_flights = $conn->query($sql);

// Fetch total users
$sql = "SELECT count(*) as total_users FROM customers;";
$all_users = $conn->query($sql);

// Fetch total bookings
$sql = "SELECT count(*) as total_bookings FROM bookings;";
$all_bookings = $conn->query($sql);

// Fetch total classes
$sql = "SELECT count(*) as total_classes FROM classes;";
$all_classes = $conn->query($sql);
?>

<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Let's Book It Dashboard</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a>Dashboard</a>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="row">
      <!-- Total Flights -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon teal">
            <a href="./manage_flights.php">
              <i class="lni lni-plane"></i>
            </a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Flights</h3>
            <?php foreach ($all_flights as $flight) { ?>
              <h3><?php echo $flight['total_flights'] ?></h3>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Total Users -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon teal">
            <a href="./customers.php">
              <i class="lni lni-user"></i>
            </a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Users</h3>
            <?php foreach ($all_users as $user) { ?>
              <h3><?php echo $user['total_users'] ?></h3>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Total Bookings -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon teal">
            <a href="./bookings.php">
              <i class="lni lni-ticket"></i>
            </a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Bookings</h3>
            <?php foreach ($all_bookings as $booking) { ?>
              <h3><?php echo $booking['total_bookings'] ?></h3>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Total Classes -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon teal">
            <a href="./classes.php">
              <i class="lni lni-layers"></i>
            </a>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Classes</h3>
            <?php foreach ($all_classes as $class) { ?>
              <h3><?php echo $class['total_classes'] ?></h3>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include './include/footer.php'; ?>
