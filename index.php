<html>
<?php
session_start();
?>

<head>
    <title>Flight Search</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/footerstyles.css">
    <link rel="stylesheet" href="./css/page3.css">
    <link rel="stylesheet" href="./css/reviewstyles.css">
    <link rel="stylesheet" href="./css/loader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="./css/fontawesome-free-6.6.0-desktop/fontawesome-free-6.6.0-desktop/svgs/regular/">
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
    <div id="contents" >
        <!-- header file  -->
        <?php include("pages/header.php"); ?>

        <!-- Main Section -->
        <div id="main" data-scroll-container>
            <div class="page1">
                <div class="video-background">
                    <video autoplay muted loop id="background-video">
                        <source src="./img/sky.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="flight-search-container">
                        <form action="./pages/searchresults.php" method="post" data-scroll data-scroll-speed="-0.5" data-scroll-direction="vertically">
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



            <div id="page3" data-scroll>
                <div class="page3main">
                    <h1>Why Choose Let's Book It?</h1>
                    <div class="flex-container">
                        <!-- Left content -->
                        <div class="content-left">
                            <div>
                                <h2>Flight Search and Aggregation</h2>
                                <p>It pulls in flight data from various sources, showing users a wide range of options with transparent pricing and details.</p>
                            </div>
                            <div>
                                <h2>Seamless Booking Experience</h2>
                                <p> Users can search for flights, view results, and book directly through the platform with minimal husle, enhancing convenience.</p>
                            </div>
                        </div>

                        <!-- Center image -->
                        <div class="image-center" data-scroll data-scroll-speed="3">
                            <img src="./img/planepage3.png" alt="plane">
                        </div>

                        <!-- Right content -->
                        <div class="content-right">
                            <div>
                                <h2>Customization</h2>
                                <p>It offers options to filter flights by preferences like class (economy, business), luggage weight pricing, and more, making it to individual needs.</p>
                            </div>
                            <div>
                                <h2>Security</h2>
                                <p>Ensures secure transactions during the booking process, adding trust to the platform.</p>
                            </div>
                            <div>
                                <h2>Payment Gateway Integration</h2>
                                <p>Flexibility by offering support for different payment options.</p>
                            </div>
                        </div>
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


            <div id="page4">

                <?php $reviews = [
                    [
                        'name' => 'Meena Bhatt',
                        'role' => 'Client',
                        'text' => 'Let\'s Book It made the booking process easy, and I didn’t face any issues.',
                        'image' => 'img/reviews-photo/ai1',
                        'stars' => 4
                    ],


                    [
                        'name' => 'Rohit Patel',
                        'role' => 'Client',
                        'text' => 'Let\'s Book It was convenient to use, and I found a good deal on my flight. Highly satisfied.',
                        'image' => '',
                        'stars' => 4
                    ],

                    [
                        'name' => 'Kiara Adhavni',
                        'role' => 'Client',
                        'text' => 'I enjoyed using the platform. It was simple, and I could quickly book my flight without any issues.',
                        'image' => 'img/reviews-photo/a7.webp',
                        'stars' => 5
                    ],
                    [
                        'name' => 'Pooja Shah',
                        'role' => 'Client',
                        'text' => 'Found my flight easily, and the prices were competitive. I will use it again.',
                        'image' => 'img/reviews-photo/a12.jpeg',
                        'stars' => 4
                    ],
                    [
                        'name' => 'Meena Bhatt',
                        'role' => 'Client',
                        'text' => 'Very intuitive interface, and I found the flight I wanted without any hassle. Great experience!',
                        'image' => 'img/reviews-photo/a12.jpeg',
                        'stars' => 4
                    ],
                    [
                        'name' => 'Sneha Desai',
                        'role' => 'Client',
                        'text' => 'Booking process was smooth, but I would appreciate more payment options. Still, very happy overall.',
                        'image' => 'img/reviews-photo/a11.jpeg ',
                        'stars' => 4
                    ],
                    [
                        'name' => 'Thomas Shelby',
                        'role' => 'Client',
                        'text' => 'Easy to navigate and book. Good deals available as well. Overall, a positive experience.',
                        'image' => 'img/reviews-photo/a9.jpeg',
                        'stars' => 4
                    ],
                    [
                        'name' => 'Wanda Maximoff',
                        'role' => 'Client',
                        'text' => 'I had a smooth experience booking my ticket. The interface could be a little faster, but still, it was great.',
                        'image' => 'img/reviews-photo/download.webp',
                        'stars' => 5
                    ],

                    [
                        'name' => 'Vishal Joshi ',
                        'role' => 'Client',
                        'text' => 'Booking my flight was easy, but I think the site can improve in speed. Overall, a positive experience!',
                        'image' => 'img/reviews-photo/download.jpeg',
                        'stars' => 4
                    ],
                    [
                        'name' => 'Mrunal Thakar',
                        'role' => 'Client',
                        'text' => 'Very user-friendly platform. I would definitely recommend Let\'s Book It.',
                        'image' => 'img/reviews-photo/ai2.webp',
                        'stars' => 4
                    ],
                    [
                        'name' => 'Robert downey jr.',
                        'role' => 'Client',
                        'text' => 'I had a great experience with Let\'s Book It. The website is easy to use and the customer support is excellent.',
                        'image' => 'img/reviews-photo/a3.jpeg',
                        'stars' => 5
                    ],
                    [
                        'name' => 'Nidhi Patel',
                        'role' => 'Client',
                        'text' => 'Happy with the flight booking experience. I will use this service again.',
                        'image' => 'img/reviews-photo/a8.jpeg',
                        'stars' => 3
                    ],
                    [

                        'name' => 'Elizabeth Olsen',
                        'role' => 'Client',
                        'text' => 'Booking my flight through Let\'s Book It was a breeze. The interface is user-friendly and I got a great deal. Highly recommend!',
                        'image' => 'img/reviews-photo/a4.jpeg',
                        'stars' => 5
                    ],
                    [
                        'name' => 'Tamanna Bhatia',
                        'role' => 'Client',
                        'text' => 'It was easy to find and book my flight. No major issues, and the service was good.',
                        'image' => 'img/reviews-photo/a5.jpeg',
                        'stars' => 5
                    ],
                    [
                        'name' => 'Ajay Trivedi',
                        'role' => 'Client',
                        'text' => 'The booking process was smooth, but I faced some issues with the payment gateway. Overall, a decent experience.',
                        'image' => 'img/reviews-photo/a6.jpeg',
                        'stars' => 5
                    ]
                ];

                ?>
                <div class="review-main">
                    <div class="title">TESTIMONIALS</div>
                    <div class="subtitle">What Our Customers Are Saying?</div>
                    <div class="reviews" id="reviews">
                        <div class="slide-track">
                            <?php foreach ($reviews as $review) : ?>
                                <div class="review-card">
                                    <img alt="Portrait of <?= $review['name']; ?>" height="60" src="<?= $review['image']; ?>" width="60" />
                                    <div class="name"><?= $review['name']; ?></div>
                                    <div class="role"><?= $review['role']; ?></div>
                                    <div class="text"><?= $review['text']; ?></div>
                                    <div class="stars">
                                        <?php for ($i = 0; $i < $review['stars']; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="slider-controls">
                        <button id="prev"><i class="fas fa-chevron-left"></i></button>
                        <button id="next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <!-- footer file  -->
            <?php
            include('./pages/footer.php');
            ?>
        </div>

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
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('.slide-track');
            const reviews = document.querySelectorAll('.review-card');
            const prevButton = document.getElementById('prev');
            const nextButton = document.getElementById('next');
            const cardWidth = 320; // Adjust based on your CSS width

            let index = 0;

            function updateSlidePosition() {
                const offset = -index * cardWidth; // Calculate offset based on index
                track.style.transform = `translateX(${offset}px)`;
            }

            nextButton.addEventListener('click', () => {
                index = (index + 1) % reviews.length; // Wrap around if at the end
                updateSlidePosition();
            });

            prevButton.addEventListener('click', () => {
                index = (index - 1 + reviews.length) % reviews.length; // Wrap around if at the beginning
                updateSlidePosition();
            });
        });
    </script>

</body>

</html>