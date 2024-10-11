<?php
include './include/header.php';
include './include/sidebar.php';
include '../database/connection.php';
?>

<!-- <?php
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['tms'];
?> -->



<!-- ========== tab components start ========== -->
<section class="tab-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2> Total Booking </h2>
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
                      <h6>Booking Name</h6>
                    </th>
                    <th>
                      <h6>Package Name</h6>
                    </th>
                    <th>
                      <h6>Phone Number</h6>
                    </th>
                    <th>
                      <h6>Tour Date</h6>
                    </th>
                    <th>
                      <h6>No of Traveller</h6>
                    </th>
                    <th>
                      <h6>Totalprice</h6>
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
                  <tr>
                    <?php



                    // $sql = "SELECT user.username,packages.packagename as username,pname,booking.name,booking.phonenumber,booking.date,booking.countpeople,booking.totalamount FROM user,packages,booking where user.id=booking.user_id and packages.id=booking.package_id";
                    $sql = "SELECT user_name.username as username, packages.packagename as pname, booking.name,booking.id, booking.phonenumber, booking.date, booking.countpeople, booking.totalamount, booking.status 
                      FROM user AS user_name, user AS user_id, packages, booking 
                      WHERE user_name.id = booking.user_id AND user_id.id = booking.user_id AND packages.id = booking.package_id";
                    $data = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($data)) {
                      echo "  <tr>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['pname'] . "</td>
                                    <td>" . $row['phonenumber'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['countpeople'] . "</td>
                                    <td>" . $row['totalamount'] . "</td>
                                    <td>" . $row['status'] . "</td>
                                    <td>
                                    <form action='./processes/booking-processs.php?id=$row[id]' method='post'>
                                      <input type='submit'  class='btn btn-primary' value='Approve' />
                                      </form>
                                    </td>
                                      <td>
                                      <form action='./processes/booking-process.php?id=$row[id]' method='post'>
                                      <input type='submit'  class='btn btn-danger' value='Cancel' />
                                      </form>
                                      </td>
                                </tr>";
                    }
                    ?>

                  </tr>
                  <!-- end table row -->
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