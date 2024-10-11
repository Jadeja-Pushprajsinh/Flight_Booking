<?php 
include './include/header.php';
include './include/sidebar.php';
include '../database/connection.php';

$id = $_GET['id'];

$sql = "SELECT * FROM packages where id=$id";
$data = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($data);
?>
<section class="section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="titlemb-30">
                <h2>Update Package</h2>
              </div>
            </div>

            <div class="col-md-6">
              <div class="breadcrumb-wrapper mb-30">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="Create Package">
                      Update Package
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- end col -->
            <div class="card-style mb-30">
              <h6 class="mb-25">update Package</h6>
              <form action="./processes/update-package-process.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?= $row['id']; ?>" />

                <div class="input-style-1">
                  <label>Package Name</label>
                  <input type="text" name="packagename" value="<?= $row['packagename']; ?>" />
                </div>
                <div class="input-style-1">
                  <label>Package Location</label>
                  <input type="text" name="packagelocation" value="<?= $row['packagelocation']; ?>" />
                </div>
                <div class="input-style-1">
                  <label>Package Price</label>
                  <input type="text" name="packageprice" value="<?= $row['packageprice']; ?>" />
                </div>
                <div class="input-style-1">
                  <label>Package Details </label>
                  <textarea name="packagedetails" ><?= $row['packagedetails']; ?> </textarea>
                </div>
                <div class="input-style-1">
                <label>Day</label>
                <input type="text" name="day" value="<?= $row['day']; ?>"   />
              </div>
              <div class="input-style-1">
                <label>Night</label>
                <input type="text" name="night" value="<?= $row['night']?>" />
              </div>
                <div class="input-style-1">
                  <label>Package image</label>
                  <img src="./upload/<?php echo $row['packageimage'] ?>" width="100px;" >
                  <input type="file" name="packageimage"  />
                  <input type="hidden" name="packageimageold" value="<?php echo $row['packageimage']; ?>">
                </div>
                <input type="submit" name="upload" class="main-btn primary-btn btn-hover" value="Update Package">
                <!-- <a class="main-btn primary-btn btn-hover" type="submit" name="upload">Upload New Package</a> -->
              </form>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
      </div>
      <!-- end container -->
    </section>
