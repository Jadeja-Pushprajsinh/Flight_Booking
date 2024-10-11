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
            <h2> Manage Package </h2>
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
                <li class="breadcrumb-item"><a>Package</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Manage Package
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
            <h6 class="mb-10">Package List</h6>

            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                  <th width="15%">
                      <h6> Id</h6>
                    </th>
                    <th width="15%">
                      <h6>Package Name</h6>
                    </th>
                    <th width="15%">
                      <h6>Package Location</h6>
                    </th>
                    <th width="15%">
                      <h6>Package Price</h6>
                    </th>
                    <th width="15%">
                      <h6>Package Details</h6>
                    </th>
                    <th width="15%">
                      <h6>Package Image</h6>
                    </th>
                    <th width="15%">
                      <h6>Action</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <?php

                  $sql = "SELECT * FROM packages";
                  $data = mysqli_query($con, $sql);

                  while ($row = mysqli_fetch_assoc($data)) {
                    echo "  <tr>
                    <td>" . $row['id'] . "</td>
          <td>" . $row['packagename'] . "</td>
          <td>" . $row['packagelocation'] . "</td>
          <td>" . $row['packageprice'] . "</td>
          <td>" . $row['packagedetails'] . "</td>
          <td><img src= './upload/" . $row['packageimage'] . "' height='100px' width='100px'></td>
          <td>
          <form action='./update-package.php?id=$row[id]' method='post'>                              
          <input type='submit' class='btn btn-primary' value='Update' />
          </form>
          <td/>
          <td>
          <form action='./processes/delete-packege.php?id=$row[id]'method='post' >
          <input type='submit'  class='btn btn-danger' value='Delete' />
          </td>
          </form>
          
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