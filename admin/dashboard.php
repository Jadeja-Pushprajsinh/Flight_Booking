<?php include './include/header.php';
include './include/sidebar.php';
include '../database/connection.php';

$sql = "SELECT count(*)as allpackage FROM packages;";
$all_package = $con->query($sql);

$sql = "SELECT count(*)as alluser FROM user;";
$all_user = $con->query($sql);

$sql = "SELECT count(*)as allmessage FROM contectmessage;";
$all_message = $con->query($sql);

$sql = "SELECT count(*)as allbooking FROM booking;";
$all_booking = $con->query($sql);

?>

<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Krishna Torism Managment</h2>
          </div>
        </div>
        <!-- end col -->
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
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="row">
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
            <a href="./managepackage.php">
            <i class="lni lni-package"></i>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Package</h3>
            <?php
                foreach ($all_package as $p) { ?>
                  <h3><?php echo $p['allpackage'] ?></h3>
                <?php }   ?>
            <!-- <h6 class="mb-10">10</h6> -->
          </div>
        </div>
        </a>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
          <a href="./user.php">
            <i class="lni lni-user"></i>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Users</h3>
            <?php
                foreach ($all_user as $p) { ?>
                  <h3><?php echo $p['alluser'] ?></h3>
                <?php }   ?>
          </div>
        </div>
                </a>
        <!-- End Icon Cart -->
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
          <a href="./message.php">
            <i class="lni lni-inbox"></i>
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Message</h3>
            <?php
                foreach ($all_message as $message) { ?>
                  <h3><?php echo $message['allmessage'] ?></h3>
                <?php }   ?>
          </div>
        </div>
                </a>
        <!-- End Icon Cart -->
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
            <i class="lni lni-book"></i>
            <a href="./booking.php">
          </div>
          <div class="content">
            <h3 class="text-bold mb-10">Total Booking</h3>
            <?php
                foreach ($all_booking as $booking) { ?>
                  <h3><?php echo $booking['allbooking'] ?></h3>
                <?php }   ?>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
    </div>
    <!-- End Row -->
  </div>
</section>
<?php include './include/footer.php';
?>