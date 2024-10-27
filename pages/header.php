<?php
// session_start();
?>

<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="./css/fontawesome-free-6.6.0-desktop/fontawesome-free-6.6.0-desktop/svgs/regular/">

<!-- Header Section -->
<header class="main-header">
    <div class="top-bar">
        <div class="contact-info">
            <span>📞 +91 8758410422 | ✉ let'sbookit@flights.com | 📍Saru Section Road, Jamnagar, Gujarat, India</span>
        </div>
        <div class="social-links">
            <a>Follow Us:</a>
            <a href="in/jadeja-pushprajsinh"><i class="fab fa-linkedin"></i> Linkedin </a>
            <a href="https://github.com/Jadeja-Pushprajsinh"><i class="fab fa-github"></i> Github</a>
        </div>
    </div>
    <div class="nav-bar">
        <nav>
            <ul>
                <li><a href="../../Let's_Book_It/index.php">Home</a></li>
                <li><a href="#">Destinations</a></li>
                <li><a href="#page4">Pages</a></li>
                <li><a href="../../Let's_Book_It/pages/about-us.php">About Us</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="logo">
                <?php
                if (isset($_SESSION['username'])) {
                    // Display the logged-in username
                    echo '<span>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
                } else {
                    // Display the login link if not logged in
                    echo '<a href="login.php" class="login">Login</a>';
                }
                ?>
            </div>
            <a href="../../Let's_Book_It/admin/index.php" class="admin">Admin</a>
        </div>
    </div>
</header>
