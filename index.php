<?php
include('header.php');
?>


<div class="th-hero-wrapper hero-1" id="hero">
    <div class="swiper th-slider hero-slider-1" id="heroSlide1"
        data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_1.jpg"></div>
                    <div class="container">
                        <div class="hero-style1"><span class="sub-title style1" data-ani="slideinup"
                                data-ani-delay="0.2s">Welcome <?php echo htmlspecialchars($user_name); ?></span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Let’s make your best
                trip with us
            </div></h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="tour.php"
                                    class="th-btn th-icon">Explore Tours</a></div>
                        </div>
                    </div>
                </div>
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_2.jpg"></div>
                    <div class="container">
                        <div class="hero-style1"><span class="sub-title style1" data-ani="slideinup"
                                data-ani-delay="0.2s">Welcome <?php echo htmlspecialchars($user_name); ?></span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Get unforgettable pleasure 
                            with us</h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="tour.php"
                                    class="th-btn th-icon">Explore Tours</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_3.jpg"></div>
                    <div class="container">
                        <div class="hero-style1"><span class="sub-title style1" data-ani="slideinup"
                                data-ani-delay="0.2s">Welcome <?php echo htmlspecialchars($user_name); ?></span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Explore beauty of the
                                whole world</h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="tour.php"
                                    class="th-btn th-icon">Explore Tours</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="th-swiper-custom"><button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev"><img
                    src="assets/img/icon/right-arrow.svg" alt=""></button>
            <div class="slider-pagination"></div><button data-slider-next="#heroSlide1"
                class="slider-arrow slider-next"><img src="assets/img/icon/left-arrow.svg" alt=""></button>
        </div>
    </div>
</div>
<section class="position-relative bg-top-center overflow-hidden space" id="service-sec" data-bg-src="assets/img/bg/tour_bg_1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <?php
               
                $query = "SELECT Tirp_name FROM trips where User_id = 1";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="title-area text-center">
                    <span class="sub-title">Best Place For You</span>
                    <h2 class="sec-title">Most Popular Tour</h2>

                    
                    <form class="d-flex" id="tourSearchForm">
                        <input class="form-control me-2" id="tourSearchInput" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tour list -->
        <div class="row" id="tourList">
            <?php
            $query = $pdo->query("SELECT * FROM trips where User_id = 11");
            $alltrips = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($alltrips as $trip) {
                ?>
                <div class="col-lg-4 tour-item" data-tour-name="<?php echo htmlspecialchars($trip['Tirp_name']); ?>">
                    <div class="tour-box th-ani gsap-cursor">
                        <div class="tour-box_img global-img"><img src="assets/img/tour/<?php echo $trip['Trip_image'] ?>" alt="image"></div>
                        <div class="tour-content">
                            <h3 class="box-title"><a href="tour-details.php?id=<?php echo $trip['Trip_id'] ?>"><?php echo $trip['Tirp_name'] ?></a></h3>
                            <div class="tour-rating">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">4.8</span>(4.8 Rating)</span>
                                </div>
                                <a href="#" class="woocommerce-review-link">(<span class="count">4.8</span> Rating)</a>
                            </div>
                            <h4 class="tour-box_price"><span class="currency"><?php echo $trip['budget'] ?></span></h4>
                            <div class="tour-action">
                                <span><i class="fa-light fa-clock"></i><?php echo $trip['Start_date'] ?> - <?php echo $trip['End_date'] ?></span>
                                <a href="tour-details.php?id=<?php echo $trip['Trip_id'] ?>" class="th-btn style4 th-icon">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

</section>

<script>
    document.getElementById('tourSearchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        filterTours();
    });

    document.getElementById('tourSearchInput').addEventListener('input', function() {
        filterTours(); // Filter tours as you type
    });

    function filterTours() {
        const searchInput = document.getElementById('tourSearchInput').value.toLowerCase();
        const tourItems = document.querySelectorAll('.tour-item');

        tourItems.forEach(function(tour) {
            const tourName = tour.getAttribute('data-tour-name').toLowerCase();
            if (searchInput === "" || tourName.includes(searchInput)) {
                tour.style.display = 'block'; // Show the tour
            } else {
                tour.style.display = 'none'; // Hide the tour
            }
        });
    }
</script>

<section class="position-relative bg-top-center overflow-hidden space" id="service-sec" data-bg-src="assets/img/bg/tour_bg_1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <?php

                if (isset($_SESSION['expenseId'])) { 
                    $userId = $_SESSION['expenseId'];

                    $query = "SELECT Tirp_name FROM trips WHERE User_id = :userId";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT); 
                    $stmt->execute();
                    $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    echo "<p class='text-danger'>Please log in to view your trips.</p>";
                }
                ?>

                <div class="title-area text-center">
                    <h2 class="sec-title">My Tours</h2>

                    <!-- Search bar -->
                    <form class="d-flex" id="tourSearchForm">
                        <input class="form-control me-2" id="tourSearchInput" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tour list -->
        <div class="row" id="tourList">
            <?php
            $query = $pdo->prepare("SELECT * FROM trips WHERE User_id = :userId");
            $query->bindParam(':userId', $userId, PDO::PARAM_INT); 
            $query->execute();
            $alltrips = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alltrips as $trip) {
                ?>
                <div class="col-lg-4 tour-item" data-tour-name="<?php echo htmlspecialchars($trip['Tirp_name']); ?>">
                    <div class="tour-box th-ani gsap-cursor">
                        <div class="tour-box_img global-img"><img src="assets/img/tour/<?php echo $trip['Trip_image'] ?>" alt="image"></div>
                        <div class="tour-content">
                            <h3 class="box-title"><a href="tour-details.php?id=<?php echo $trip['Trip_id'] ?>"><?php echo $trip['Tirp_name'] ?></a></h3>
                            <div class="tour-rating">
                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">4.8</span>(4.8 Rating)</span>
                                </div>
                                <a href="#" class="woocommerce-review-link">(<span class="count">4.8</span> Rating)</a>
                            </div>
                            <h4 class="tour-box_price"><span class="currency"><?php echo $trip['budget'] ?></span></h4>
                            <div class="tour-action">
                                <span><i class="fa-light fa-clock"></i><?php echo $trip['Start_date'] ?> - <?php echo $trip['End_date'] ?></span>
                                <a href="tour-details.php?id=<?php echo $trip['Trip_id'] ?>" class="th-btn style4 th-icon">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<script>
    document.getElementById('tourSearchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        filterTours();
    });

    document.getElementById('tourSearchInput').addEventListener('input', function() {
        filterTours(); 
    });

    function filterTours() {
        const searchInput = document.getElementById('tourSearchInput').value.toLowerCase();
        const tourItems = document.querySelectorAll('.tour-item');

        tourItems.forEach(function(tour) {
            const tourName = tour.getAttribute('data-tour-name').toLowerCase();
            if (searchInput === "" || tourName.includes(searchInput)) {
                tour.style.display = 'block'; 
            } else {
                tour.style.display = 'none'; 
            }
        });
    }
</script>

<div class="gallery-area">
    <div class="container th-container">
        <div class="title-area text-center"><span class="sub-title">Make Your Tour More Pleasure</span>
            <h2 class="sec-title">Recent Gallery</h2>
        </div>
        <div class="row gy-10 gx-10 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-2">
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_1.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_1.jpg" alt="gallery image">
                        </a></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_2.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_2.jpg" alt="gallery image">
                        </a></div>
                </div>
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_3.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_3.jpg" alt="gallery image">
                        </a></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_4.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_4.jpg" alt="gallery image">
                        </a></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_5.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_5.jpg" alt="gallery image">
                        </a></div>
                </div>
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_6.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_6.jpg" alt="gallery image">
                        </a></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="gallery-card">
                    <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_7.jpg" class="popup-image">
                            <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                src="assets/img/gallery/gallery_1_7.jpg" alt="gallery image">
                        </a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup d-none d-xl-block" data-top="-25%" data-left="0%"><img src="assets/img/shape/line.png"
            alt="shape"></div>
    <div class="shape-mockup movingX d-none d-xl-block" data-top="30%" data-left="3%"><img class="gmovingX"
            src="assets/img/shape/shape_4.png" alt="shape"></div>
</div>
<div class="counter-area space">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">12</span></h3>
                        <h6 class="counter-title">Years Experience</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">97</span>%</h3>
                        <h6 class="counter-title">Retention Rate</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">8</span>k</h3>
                        <h6 class="counter-title">Tour Completed</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 counter-card-wrap">
                <div class="counter-card">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">19</span>k</h3>
                        <h6 class="counter-title">Happy Travellers</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup shape1 d-none d-xl-block" data-top="30%" data-left="2%"><img
            src="assets/img/shape/shape_1.png" alt="shape"></div>
    <div class="shape-mockup shape2 d-none d-xl-block" data-top="45%" data-left="2%"><img
            src="assets/img/shape/shape_2.png" alt="shape"></div>
    <div class="shape-mockup shape3 d-none d-xl-block" data-top="32%" data-left="7%"><img
            src="assets/img/shape/shape_3.png" alt="shape"></div>
    <div class="shape-mockup d-none d-xl-block" data-bottom="0%" data-left="3%"><img src="assets/img/shape/shape_6.png"
            alt="shape"></div>
    <div class="shape-mockup jump d-none d-xl-block" data-top="5%" data-right="5%"><img
            src="assets/img/shape/shape_5.png" alt="shape"></div>
</div>
<section class="testi-area overflow-hidden space" id="testi-sec">
    <div class="container-fluid p-0">
        <div class="title-area mb-20 text-center"><span class="sub-title">Testimonial</span>
            <h2 class="sec-title">What Client Say About us</h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider testiSlider1 has-shadow" id="testiSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"767":{"slidesPerView":"2","centeredSlides":"true"},"992":{"slidesPerView":"2","centeredSlides":"true"},"1200":{"slidesPerView":"2","centeredSlides":"true"},"1400":{"slidesPerView":"3","centeredSlides":"true"}}}'>
                <div class="swiper-wrapper">
                    <?php
                    $query = $pdo->query("Select * from contactus");
                    $allmessages = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($allmessages as $message) {
                        ?>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="testi-card_wrapper">
                                    <div class="testi-card_profile">
                                        <div class="media-body">
                                            <h3 class="box-title"><?php echo $message['User_Name'] ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <p class="testi-card_text"><?php echo $message['User_Message'] ?></p>
                                <div class="testi-card-quote"><img src="assets/img/icon/testi-quote.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="slider-pagination"></div>
            </div>
        </div>
    </div>
    <div class="shape-mockup d-none d-xl-block" data-bottom="-2%" data-right="0%"><img src="assets/img/shape/line2.png"
            alt="shape"></div>
    <div class="shape-mockup movingX d-none d-xl-block" data-top="30%" data-left="5%"><img
            src="assets/img/shape/shape_7.png" alt="shape"></div>
</section>
<div class="brand-area overflow-hidden space-bottom">
    <div class="container th-container">
        <div class="swiper th-slider brandSlider1" id="brandSlider1"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"6"},"1400":{"slidesPerView":"8"}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_1.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_1.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_2.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_2.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_3.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_3.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_4.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_4.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_5.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_5.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_6.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_6.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_7.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_7.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_8.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_8.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_4.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_4.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_3.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_3.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_2.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_2.svg"
                                alt="Brand Logo"></a></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-box"><a href="#"><img class="original" src="assets/img/brand/brand_1_1.svg"
                                alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_1.svg"
                                alt="Brand Logo"></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>