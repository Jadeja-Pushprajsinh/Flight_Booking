<!--  sidebar-nav start-->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="./dashboard.php">
            <img src="./assets/images/logo/logo.png" alt="logo" style="height: 180px; width: auto; filter: brightness(0) invert(1);" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="./dashboard.php">
                    <span class="icon">
                        <i class="lni lni-dashboard"></i>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-item-has-children">
                <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_2"
                    aria-controls="ddmenu_2"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="icon">
                        <i class="lni lni-package"></i>
                    </span>
                    <span class="text">Flights</span>
                </a>
                <ul id="ddmenu_2" class="collapse dropdown-nav">
                    <li>
                        <a href="createflight.php"> Create Flight </a>
                    </li>
                    <li>
                        <a href="manageflight.php"> Manage Flight </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="user.php">
                    <span class="icon">
                        <i class="lni lni-user"></i>
                    </span>
                    <span class="text">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="booking.php">
                    <span class="icon">
                        <i class="lni lni-book"></i>
                    </span>
                    <span class="text">Booking</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
<div class="overlay"></div>
<!--sidebar-nav end  -->

<style>
    /* Custom sidebar styles */
    .sidebar-nav-wrapper {
        background: linear-gradient(135deg, #20b2a6 0%, #1c9e94 100%); /* Teal gradient for sidebar */
        color: white;
        height: 100vh; /* Full height sidebar */
        padding: 20px; /* Padding for the sidebar */
    }

    .navbar-logo {
        display: flex;
        justify-content: center;
        margin-bottom: 20px; /* Space below the logo */
    }

    .sidebar-nav {
        margin-top: 20px; /* Space above the nav */
    }

    .sidebar-nav a {
        color: white; /* White text for links */
        display: flex;
        align-items: center;
        padding: 12px 15px; /* Padding for better click area */
        border-radius: 5px; /* Rounded corners */
        transition: background-color 0.3s; /* Smooth transition for hover */
    }

    .sidebar-nav a:hover {
        background-color: rgba(255, 255, 255, 0.1); /* Light overlay on hover */
    }

    .sidebar-nav .nav-item {
        position: relative;
    }

    .sidebar-nav .nav-item .dropdown-nav li a {
        background-color: transparent; /* Clear background for dropdown items */
        color: white; /* White text for dropdown items */
        padding: 10px 30px; /* Increased padding for dropdown */
    }

    .sidebar-nav .nav-item .dropdown-nav li a:hover {
        background-color: rgba(255, 255, 255, 0.1); /* Light overlay on hover for dropdown items */
    }

    /* Add styles for icons */
    .sidebar-nav .icon {
        font-size: 20px; /* Increase icon size */
        margin-right: 10px; /* Space between icon and text */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar-nav-wrapper {
            padding: 10px; /* Reduce padding on smaller screens */
        }

        .sidebar-nav a {
            padding: 10px; /* Reduce padding on smaller screens */
        }
    }
</style>
