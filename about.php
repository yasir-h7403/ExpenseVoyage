<?php
include('header.php')
    ?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Tourm</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>About Tourm</li>
            </ul>
        </div>
    </div>
</div>
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="img-box3">
                    <div class="img1"><img src="assets/img/normal/about_3_1.jpg" alt="About"></div>
                    <div class="img2"><img src="assets/img/normal/about_3_2.jpg" alt="About"></div>
                    <div class="img3 movingX"><img src="assets/img/normal/about_3_3.jpg" alt="About"></div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="ps-xl-4">
                    <div class="title-area mb-20"><span class="sub-title style1">Welcome To ExpenseVoyage</span>
                        <h2 class="sec-title mb-20 pe-xl-5 me-xl-5 heading">We are world reputeted travel agency
                        </h2>
                    </div>
                    <p class="pe-xl-5">There are many variations of passages of available but the majority have
                        suffered alteration in some form, by injected hum randomised words.</p>
                    <p class="mb-30 pe-xl-5">Leiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt.</p>
                    <div class="about-item-wrap">
                        <div class="about-item style2">
                            <div class="about-item_img"><img src="assets/img/icon/about_1_1.svg" alt=""></div>
                            <div class="about-item_centent">
                                <h5 class="box-title">Exclusive Trip</h5>
                                <p class="about-item_text">There are many variations of passages of available but
                                    the majority.</p>
                            </div>
                        </div>
                        <div class="about-item style2">
                            <div class="about-item_img"><img src="assets/img/icon/about_1_2.svg" alt=""></div>
                            <div class="about-item_centent">
                                <h5 class="box-title">Safety First Always</h5>
                                <p class="about-item_text">There are many variations of passages of available but
                                    the majority.</p>
                            </div>
                        </div>
                        <div class="about-item style2">
                            <div class="about-item_img"><img src="assets/img/icon/about_1_3.svg" alt=""></div>
                            <div class="about-item_centent">
                                <h5 class="box-title">Professional Guide</h5>
                                <p class="about-item_text">There are many variations of passages of available but
                                    the majority.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-35"><a href="contact.php" class="th-btn style3 th-icon">Contact With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup movingX d-none d-xxl-block" data-top="4%" data-left="2%"><img
            src="assets/img/shape/shape_2_1.png" alt="shape"></div>
    <div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="5%"><img
            src="assets/img/shape/shape_2_2.png" alt="shape"></div>
    <div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="2%"><img
            src="assets/img/shape/shape_2_3.png" alt="shape"></div>
    <div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="2%"><img
            src="assets/img/shape/shape_2_4.png" alt="shape"></div>
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
<div class="brand-area overflow-hidden">
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
<br><br>
<?php
include('footer.php')
    ?>