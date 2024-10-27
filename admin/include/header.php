<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
    <title>Let's Book It</title>

    <!--  All CSS files linkup -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        /* Custom theme styles */
        body {
            background-color: #f0f8f9; /* Light background color */
        }

        .header {
            background-color: #20b2a6; /* Teal color for header */
            color: white;
        }

        .header h4 {
            color: white;
        }

        .main-btn.primary-btn {
            background-color: #20b2a6; /* Teal button color */
            color: white;
        }

        .main-btn.primary-btn:hover {
            background-color: #1c9e94; /* Darker teal on hover */
        }

        .dropdown-menu {
            background-color: #20b2a6; /* Teal dropdown */
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: #1c9e94; /* Darker teal on hover */
        }

        .profile-info h6 {
            color: white; /* White text for admin profile */
        }
    </style>
</head>

<body>

    <!--  main-wrapper start -->
    <main class="main-wrapper">
        <!--  header start  -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>
                            </div>
                            <h4>Let's Book It</h4> <!-- Updated title -->
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>Admin</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="./processes/logout.php"> <i class="lni lni-exit"></i> Sign Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--  header end  -->
