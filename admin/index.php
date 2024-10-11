<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishna Tourism Management</title>
    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-image: linear-gradient(90deg, #9C27B0, #673AB7);
        }

        .content {
            height: 100vh;
        }

        .btn-dark {
            background: #673AB7 !important;
        }
    </style>
    <section class="container">
        <div class="row content d-flex justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="box shadow bg-white p-4">
                    <h3 class="mb-4 text-center fs-1">Admin Login</h3>
                    <form action="./processes/admin-process.php" method="post">
                        <div class="form-group first">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email"  placeholder="Enter Email Address" required />
                        </div>
                        <div class="form-group last mb-4">
                        <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password" required />
                        </div>
                        <input type="submit" value="Log In" class="btn text-white btn-block btn-primary" />
                    </form>

                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="../vendor/jquery/jquery.min.js">
</body>

</html>