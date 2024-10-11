<?php
include './include/header.php';
include './include/sidebar.php';
include '../database/connection.php';
?>


      <!-- ========== tab components start ========== -->
      <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2> Total Users </h2>
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
                      Users
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
                  <h6 class="mb-10">Users List</h6>
                  
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                        <th><h6> Id</h6></th>
                          <th><h6>Username</h6></th>
                          <th><h6>Phone Number</h6></th>
                          <th><h6>Email</h6></th>
                          <th><h6>Password</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <tr>
                        <?php
                          $sql = "SELECT * FROM user";
                          $data = mysqli_query($con, $sql);

                          while ($row = mysqli_fetch_assoc($data)) {
                            echo "  <tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td>" . $row['phonenumber'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['password'] . "</td>
                                    </tr>";
                                     }
                             ?>
                        </tr>
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