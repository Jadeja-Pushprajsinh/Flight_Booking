<html>
<?php
session_start();
?>
<head>
    <title>Flight Search</title>
    <link rel="stylesheet" href="./css/loader.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Loader -->
    <div class="container" id="load">
        <div class="loader-earth">
            <div class="earth-wrapper">
                <div class="earth"></div>
            </div>
            <div class="plane">
                <img src="https://zupimages.net/up/19/34/4820.gif" class="plane-img">
            </div>
        </div>
    </div>

    <!--Content -->
    <div id="contents" style="visibility: hidden;">
        <!-- header file  -->
        <?php include("./pages/header.php") ?>
        <!-- Main Section -->
        <div id="main" data-scroll-container>
            <div class="page1" data-scroll>
                <div class="video-background">
                    <video autoplay muted loop id="background-video">
                        <source src="./img/sky.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="flight-search-container">
                        <form action="./pages/searchresults.php" method="post">
                            <div class="flight-search-form">
                                <div class="trip-type">
                                    <input type="radio" id="oneWay" name="trip" value="oneWay" checked>
                                    <label for="oneWay">One Way</label>
                                    <input type="radio" id="roundTrip" name="trip" value="roundTrip">
                                    <label for="roundTrip">Round Trip</label>
                                    <h2>Book Your <span class="auto-type"></span> Flights</h2>
                                </div>
                                <div class="input-group">
                                    <label for="origin">
                                        <span><i class="fas fa-plane-departure"></i> Flying from</span>
                                        <input type="text" id="origin" name="origin" placeholder="Origin" autocomplete="off" required>
                                        <div id="origin-suggestions"></div>

                                    </label>

                                    <label for="destination">
                                        <span><i class="fas fa-plane-arrival"></i> Flying to</span>
                                        <input type="text" id="destination" name="destination" placeholder="Destination" autocomplete="off" required>
                                        <div id="destination-suggestions" ></div>
                                    </label>
                                    <label for="depart">
                                        <span><i class="fas fa-calendar-alt"></i> Depart</span>
                                        <input type="date" id="depart" name="depart" value="dd-mm-yyyy" required>
                                    </label>
                                    <label for="return">
                                        <span><i class="fas fa-exchange-alt"></i> Return</span>
                                        <input type="date" id="return" name="return" disabled>
                                    </label>
                                    <label for="passengers">
                                        <span><i class="fas fa-users"></i> Travelers</span>
                                        <input type="number" id="passengers" name="passengers" value="1" min="1" required>
                                    </label>
                                    <input id="searchBtn" type="submit" value="Search">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="page2" data-scroll>
                <div class="slide-track" data-scroll-speed="-2" data-scroll-direction="horizantal">
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/airport.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/goa.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/airplane.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/mumbai.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/setu.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/rajashtan.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/airplane (2).jpg" alt="">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/kashmir.jpg" alt="">
                    </div>
                </div>
            </div>

            <div id="page3" data-scroll>

            </div>
            <div id="page4" data-scroll>

            </div>

        </div>
        <!-- footer file  -->
        <?php include("./pages/footer.php") ?>
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="./js/searchscript.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>