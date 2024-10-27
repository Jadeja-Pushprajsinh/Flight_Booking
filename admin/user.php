<?php
include ('./include/header.php');  
include ('./include/sidebar.php'); 
include ('../sql_database/conn.php');
?>

<!--  tab components start  -->
<section class="tab-components">
  <div class="container-fluid">
    <!--  title-wrapper start  -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Total Users</h2>  <!-- Heading updated -->
          </div>
        </div>
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
      </div>
    </div>
    <!--  title-wrapper end  -->

    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <h6 class="mb-10">Users List</h6>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th><h6>Id</h6></th>
                    <th><h6>Username</h6></th>
                    <th><h6>First Name</h6></th>
                    <th><h6>Last Name</h6></th>
                    <th><h6>Phone Number</h6></th>
                    <th><h6>Password</h6></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Updated query to retrieve user information
                  $sql = "SELECT user_id, username, first_name, last_name, phone_number, password FROM customers";
                  $result = mysqli_query($conn, $sql);  

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['user_id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['first_name'] . "</td>
                            <td>" . $row['last_name'] . "</td>
                            <td>" . $row['phone_number'] . "</td>
                            <td>" . $row['password'] . "</td>
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

<?php include './include/footer.php'; ?>
