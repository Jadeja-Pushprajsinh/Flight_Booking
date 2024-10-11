
<?php
include './include/header.php';
include './include/sidebar.php';
?>


<!-- ========== tab components start ========== -->
<section class="tab-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2> Create New Package </h2>
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
                  Create Package
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

    <!-- ========== form-elements-wrapper start ========== -->
    <div class="form-elements-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!-- input style start -->
          <div class="card-style mb-30">
            <h6 class="mb-25">Input Fields</h6>
            <form action="./processes/create-package-process.php" method="post" enctype="multipart/form-data">
              <div class="input-style-1">
                <label>Packge Name</label>
                <input type="text" name="packagename" placeholder="Package Name" required />
              </div>
              <div class="input-style-1">
                <label>Package Title</label>
                <input type="text" name="packagetitle" placeholder="Package Title" required />
              </div>
              <div class="input-style-1">
                <label>Package Location</label>
                <input type="text" name="packagelocation" placeholder="Package Location" required />
              </div>
              <div class="input-style-1">
                <label>Package Price</label>
                <input type="number" name="packageprice" placeholder="Package Price" required />
              </div>
              <div class="input-style-1">
                <label>Package Details (Places)</label>
                <input type="text" name="packagedetails" placeholder="Package Details" required />
              </div>
              <div class="input-style-1">
                <label>Day</label>
                <input type="text" name="day" placeholder="Day" required />
              </div>
              <div class="input-style-1">
                <label>Night</label>
                <input type="text" name="night" placeholder="Night" required />
              </div>

              <div class="input-style-1">
                <label>Package image</label>
                <input type="file" name="packageimage" placeholder="Package image" required />
              </div>
              <input type="submit" name="upload" class="main-btn primary-btn btn-hover" value="Upload New Package">
            </form>
            <!-- end input -->
          </div>
        </div>
      </div>
    </div>
    <!-- end card -->
    <!-- ======= input style end ======= -->

    <?php include './include/footer.php'; ?>