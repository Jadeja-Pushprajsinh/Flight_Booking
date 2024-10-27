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
            <h2>Manage Flights</h2>
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
                <li class="breadcrumb-item"><a>Flight</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Manage Flights
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
            <h6 class="mb-10">Flight List</h6>

            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="10%">
                      <h6>Flight ID</h6>
                    </th>
                    <th width="20%">
                      <h6>Flight Number</h6>
                    </th>
                    <th width="20%">
                      <h6>Airline</h6>
                    </th>
                    <th width="15%">
                      <h6>Departure</h6>
                    </th>
                    <th width="15%">
                      <h6>Arrival</h6>
                    </th>
                    <th width="10%">
                      <h6>Price</h6>
                    </th>
                    <th width="10%">
                      <h6>Action</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM Flights";
                  $data = mysqli_query($conn, $sql);

                  while ($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                      <td>" . $row['flight_id'] . "</td>
                      <td>" . $row['flight_number'] . "</td>
                      <td>" . $row['airline'] . "</td>
                      <td>" . $row['departure_airport'] . "</td>
                      <td>" . $row['arrival_airport'] . "</td>
                      <td>₹" . number_format($row['price'], 2) . "</td>
                      <td>
                        <form action='./updateflight.php?id={$row['flight_id']}' method='post'>
                          <input type='submit' class='btn btn-primary' value='Update' />
                        </form>
                      </td>
                      <td>
                          <form action='./processes/delete-process.php?flight_id={$row['flight_id']}' method='post'>
                              <input type='submit' class='btn btn-danger' value='Delete' />
                          </form>
                      </td>
                    </tr>";
                  }
                  ?>
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
</section>
<!-- ========== tab components end ========== -->

<?php include './include/footer.php'; ?>