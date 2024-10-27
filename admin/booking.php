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
            <h2>Total Booking</h2>
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
                <li class="breadcrumb-item active" aria-current="page">
                  Booking
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <h6 class="mb-10">Booking List</h6>

            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6>Username</h6>
                    </th>
                    <th>
                      <h6>Flight Number</h6>
                    </th>
                    <th>
                      <h6>Airline</h6>
                    </th>
                    <th>
                      <h6>Departure</h6>
                    </th>
                    <th>
                      <h6>Arrival</h6>
                    </th>
                    <th>
                      <h6>Booking Date</h6>
                    </th>
                    <th>
                      <h6>Total Price</h6>
                    </th>
                    <th>
                      <h6>Status</h6>
                    </th>
                    <th width="15%">
                      <h6>Action</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT customers.username, flights.flight_number, flights.airline, 
                                   flights.departure_airport, flights.arrival_airport, 
                                   bookings.booking_date, bookings.total_price, bookings.booking_id, bookings.status 
                            FROM bookings 
                            INNER JOIN customers ON bookings.user_id = customers.user_id 
                            INNER JOIN flights ON bookings.flight_id = flights.flight_id 
                            ORDER BY bookings.booking_date DESC";

                    $data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($data)) {
                      echo "<tr>
                              <td>" . $row['username'] . "</td>
                              <td>" . $row['flight_number'] . "</td>
                              <td>" . $row['airline'] . "</td>
                              <td>" . $row['departure_airport'] . "</td>
                              <td>" . $row['arrival_airport'] . "</td>
                              <td>" . $row['booking_date'] . "</td>
                              <td>" . $row['total_price'] . "</td>
                              <td>" . $row['status'] . "</td>
                              <td>
                                <form action='./processes/booking-processs.php ?id=" . $row['booking_id'] . "' method='post'>
                                  <input type='submit' class='btn btn-danger' value='Reject' />
                                </form>
                              </td>
                            </tr>";
                    }
                  ?>
                  <!-- end table row -->
                </tbody>
              </table>
              <!-- end table -->
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
  </div>

<?php include './include/footer.php'; ?>
