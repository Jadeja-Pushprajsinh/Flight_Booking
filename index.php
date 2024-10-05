<html>
<?php
session_start();
?>

<head>
    <title>Flight Search</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/reviewstyles.css">
    <link rel="stylesheet" href="./css/loader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Loader -->
    <div class="loader" id="load">
        <div class="loader-earth">
            <div class="earth-wrapper">
                <div class="earth"></div>
            </div>
            <div class="plane">
                <img src="./img/planeImg.gif" class="plane-img">
            </div>
        </div>
    </div>

    <!--Content -->
    <div id="contents" style="visibility: hidden;">
        <!-- header file  -->
        <?php include("./pages/header.php"); ?>

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
                                        <div id="destination-suggestions"></div>
                                    </label>

                                    <label for="depart">
                                        <span><i class="fas fa-calendar-alt"></i> Depart</span>
                                        <input type="date" id="depart" name="depart" required>
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
                <div class="slide-track" data-scroll-speed="-2" data-scroll-direction="horizontal">
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/airport.jpg" alt="Airport">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/goa.jpg" alt="Goa">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/airplane.jpg" alt="Airplane">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/mumbai.jpg" alt="Mumbai">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/setu.jpg" alt="Bridge">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/rajashtan.jpg" alt="Rajasthan">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/airplane (2).jpg" alt="Airplane 2">
                    </div>
                    <div class="slide">
                        <img data-scroll data-scroll-speed="-1" class="slider" src="./img/kashmir.jpg" alt="Kashmir">
                    </div>
                </div>
            </div>

            <div id="page3" data-scroll>
            </div>
            <div id="page4" data-scroll>
            <?php
$reviews = [
    [
        'name' => 'Elizabeth Olsen',
        'role' => 'Client',
        'text' => 'Booking my flight through Let\'s Book It was a breeze. The interface is user-friendly and I got a great deal. Highly recommend!',
        'image' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTBGhLEqs75i962qqqp7lkvJWgadT4w2p3wZNa1zwx1rhHf5f1-o_a5oYUbBt-sRyaIbFeotnNW9jV0srOzFokQ1jdG1J2ltOgShjh49ow',
        'stars' => 5
    ],
    [
        'name' => 'Priya Sharma',
        'role' => 'Client',
        'text' => 'The booking process was smooth, but I faced some issues with the payment gateway. Overall, a decent experience.',
        'image' => 'https://storage.googleapis.com/a1aa/image/Be2b2lmNdcUNUaJnUvcLZsfI1CfU52e1BK0nhN0qTX8f0LdcC.jpg',
        'stars' => 4
    ],
    // Add more reviews as needed
];
?>

                <div class="review-main">
                    <div class="title">
                        TESTIMONIALS
                    </div>
                    <div class="subtitle">
                        What Our Customers Are Saying Us?
                    </div>
                    <div class="reviews" id="reviews">
                        <div class="slide-track">
                            <div class="review-card">
                                <img alt="Portrait of Elizabeth olsen" height="60" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTBGhLEqs75i962qqqp7lkvJWgadT4w2p3wZNa1zwx1rhHf5f1-o_a5oYUbBt-sRyaIbFeotnNW9jV0srOzFokQ1jdG1J2ltOgShjh49ow" width="60" />
                                <div class="name">
                                    Elizabeth olsen
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    Booking my flight through Let's Book It was a breeze. The interface is user-friendly and I got a great deal. Highly recommend!
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Priya Sharma" height="60" src="https://storage.googleapis.com/a1aa/image/Be2b2lmNdcUNUaJnUvcLZsfI1CfU52e1BK0nhN0qTX8f0LdcC.jpg" width="60" />
                                <div class="name">
                                    Priya Sharma
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    The booking process was smooth, but I faced some issues with the payment gateway. Overall, a decent experience.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Anil Mehta" height="60" src="https://storage.googleapis.com/a1aa/image/YMyVp16iN2ozORmfoWP2mhlA7tXXvZQR2LTKGrYusJsUv0xJA.jpg" width="60" />
                                <div class="name">
                                    Anil Mehta
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    I found the best prices for my flight on Let's Book It. The customer service was also very helpful.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Sunita Verma" height="60" src="https://storage.googleapis.com/a1aa/image/7Dl6Ab6lchKVEpcQ4HeQUuC8SsfPdafUsANzyzGq5ebC7lOOB.jpg" width="60" />
                                <div class="name">
                                    Sunita Verma
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    The website is easy to navigate, but I wish there were more payment options available.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Vikram Singh" height="60" src="https://storage.googleapis.com/a1aa/image/9eCZVb4YcW3fbUJKtKuCqaoY7D1gUFwhCORfx78BZynZ9SHnA.jpg" width="60" />
                                <div class="name">
                                    Vikram Singh
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    Great experience! I was able to book my flight quickly and got a good discount. Will use again.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Neha Gupta" height="60" src="https://storage.googleapis.com/a1aa/image/46MesSyjJPRIBSGMgZzG9VrryzeYQkYYoR7gcV2RDppteSHnA.jpg" width="60" />
                                <div class="name">
                                    Neha Gupta
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    The booking process was straightforward, but I had to wait a while for the confirmation email.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Ramesh Patel" height="60" src="https://storage.googleapis.com/a1aa/image/XuTAV74EIeUOO6jhq59I39IleFqUDODpxAeRFQKtyHpU9SHnA.jpg" width="60" />
                                <div class="name">
                                    Ramesh Patel
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    I had a good experience booking my flight. The site is easy to use and I found a good deal.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Elizabeth olsen" height="60" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTBGhLEqs75i962qqqp7lkvJWgadT4w2p3wZNa1zwx1rhHf5f1-o_a5oYUbBt-sRyaIbFeotnNW9jV0srOzFokQ1jdG1J2ltOgShjh49ow" width="60" />
                                <div class="name">
                                    Elizabeth olsen
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    Booking my flight through Let's Book It was a breeze. The interface is user-friendly and I got a great deal. Highly recommend!
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Priya Sharma" height="60" src="https://storage.googleapis.com/a1aa/image/Be2b2lmNdcUNUaJnUvcLZsfI1CfU52e1BK0nhN0qTX8f0LdcC.jpg" width="60" />
                                <div class="name">
                                    Priya Sharma
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    The booking process was smooth, but I faced some issues with the payment gateway. Overall, a decent experience.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Anil Mehta" height="60" src="https://storage.googleapis.com/a1aa/image/YMyVp16iN2ozORmfoWP2mhlA7tXXvZQR2LTKGrYusJsUv0xJA.jpg" width="60" />
                                <div class="name">
                                    Anil Mehta
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    I found the best prices for my flight on Let's Book It. The customer service was also very helpful.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Sunita Verma" height="60" src="https://storage.googleapis.com/a1aa/image/7Dl6Ab6lchKVEpcQ4HeQUuC8SsfPdafUsANzyzGq5ebC7lOOB.jpg" width="60" />
                                <div class="name">
                                    Sunita Verma
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    The website is easy to navigate, but I wish there were more payment options available.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Vikram Singh" height="60" src="https://storage.googleapis.com/a1aa/image/9eCZVb4YcW3fbUJKtKuCqaoY7D1gUFwhCORfx78BZynZ9SHnA.jpg" width="60" />
                                <div class="name">
                                    Vikram Singh
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    Great experience! I was able to book my flight quickly and got a good discount. Will use again.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Neha Gupta" height="60" src="https://storage.googleapis.com/a1aa/image/46MesSyjJPRIBSGMgZzG9VrryzeYQkYYoR7gcV2RDppteSHnA.jpg" width="60" />
                                <div class="name">
                                    Neha Gupta
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    The booking process was straightforward, but I had to wait a while for the confirmation email.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                            <div class="review-card">
                                <img alt="Portrait of Ramesh Patel" height="60" src="https://storage.googleapis.com/a1aa/image/XuTAV74EIeUOO6jhq59I39IleFqUDODpxAeRFQKtyHpU9SHnA.jpg" width="60" />
                                <div class="name">
                                    Ramesh Patel
                                </div>
                                <div class="role">
                                    Client
                                </div>
                                <div class="text">
                                    I had a good experience booking my flight. The site is easy to use and I found a good deal.
                                </div>
                                <div class="stars">
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                    <i class="fas fa-star">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-controls">
                        <button id="prev">
                            <i class="fas fa-chevron-left">
                            </i>
                        </button>
                        <button id="next">
                            <i class="fas fa-chevron-right">
                            </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer file  -->
        <?php include("./pages/footer.php"); ?>
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="./js/searchscript.js"></script>
    <script src="./js/script.js"></script>

    <!-- Handling session-based welcome message -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const username = '<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?>';
            if (username) {
                // Replace login button with username if logged in
                const loginElement = document.querySelector('a[href="login.php"]');
                if (loginElement) {
                    loginElement.innerHTML = "Welcome, " + username;
                    loginElement.href = "#"; // Change href if needed
                }
            }
        });
        const reviews = document.querySelector('.slide-track');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        let scrollAmount = 0;

        function scrollReviews(direction) {
            const scrollStep = 320; // Width of review card + margin
            if (direction === 'next') {
                scrollAmount += scrollStep;
                if (scrollAmount >= reviews.scrollWidth - reviews.clientWidth) {
                    scrollAmount = 0;
                }
            } else {
                scrollAmount -= scrollStep;
                if (scrollAmount < 0) {
                    scrollAmount = reviews.scrollWidth - reviews.clientWidth;
                }
            }
            reviews.style.transform = `translateX(-${scrollAmount}px)`;
        }

        prevButton.addEventListener('click', () => scrollReviews('prev'));
        nextButton.addEventListener('click', () => scrollReviews('next'));

        setInterval(() => scrollReviews('next'), 5000); // Auto-scroll every 5 seconds
    </script>

</body>

</html>