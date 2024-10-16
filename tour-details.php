<?php
include('header.php')
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('select * from trips where Trip_id= :id');
    $query->bindParam('id',$id);
    $query->execute();
    $trip = $query->fetch(PDO::FETCH_ASSOC);
}
?>
    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Tour Details</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Tour Details</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
                    <div class="tour-page-single">
                        <div class="slider-area tour-slider1">
                            <div class="swiper th-slider mb-4" id="tourSlider4"
                                data-slider-options='{"effect":"fade","loop":true,"thumbs":{"swiper":".tour-thumb-slider"},"autoplayDisableOnInteraction":"true"}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="tour-slider-img"><img src="assets/img/tour/<?php echo $trip['Trip_image'] ?>" alt="img"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-content">
                            <div class="page-meta mb-45"><a class="page-tag" href="tour.php">Featured</a> <span
                                    class="ratting"><i class="fa-sharp fa-solid fa-star"></i><span>4.8</span></span>
                            </div>
                            <h2 class="box-title"><?php echo $trip['Tirp_name'] ?></h2>
                            <h4 class="tour-price"><span class="currency"><?php echo $trip['budget'] ?></span></h4>
                            <div class="destination-checklist mb-50">
                                <div class="checklist style2">
                                    <ul>
                                        <li>Destination</li>
                                        <li>End Date</li>
                                        <li>Departure Date</li>
                                    </ul>
                                </div>
                                <div class="checklist style2">
                                    <ul>
                                        <li><?php echo $trip['destination'] ?></li>
                                        <li><?php echo $trip['End_date'] ?></li>
                                        <li><?php echo $trip['Start_date'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tour-gallery-wrapper">
                <h3 class="page-title mt-50 mb-30">From our gallery</h3>
                <div class="row gy-4 gallery-row filter-active">
                    <div class="col-md-6 col-xl-auto filter-item">
                        <div class="tour-gallery-card">
                            <div class="gallery-img global-img"><img src="assets/img/gallery/gallery_5_1.jpg"
                                    alt="gallery image"> <a href="assets/img/gallery/gallery_5_1.jpg"
                                    class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto filter-item">
                        <div class="tour-gallery-card">
                            <div class="gallery-img global-img"><img src="assets/img/gallery/gallery_5_2.jpg"
                                    alt="gallery image"> <a href="assets/img/gallery/gallery_5_2.jpg"
                                    class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto filter-item">
                        <div class="tour-gallery-card">
                            <div class="gallery-img global-img"><img src="assets/img/gallery/gallery_5_3.jpg"
                                    alt="gallery image"> <a href="assets/img/gallery/gallery_5_3.jpg"
                                    class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto filter-item">
                        <div class="tour-gallery-card">
                            <div class="gallery-img global-img"><img src="assets/img/gallery/gallery_5_4.jpg"
                                    alt="gallery image"> <a href="assets/img/gallery/gallery_5_4.jpg"
                                    class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto filter-item">
                        <div class="tour-gallery-card">
                            <div class="gallery-img global-img"><img src="assets/img/gallery/gallery_5_5.jpg"
                                    alt="gallery image"> <a href="assets/img/gallery/gallery_5_5.jpg"
                                    class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup about-shape movingX d-none d-xxl-block" data-bottom="40%" data-right="17%"><img
                src="assets/img/normal/about-slide-img.png" alt="shape"></div>
        <div class="shape-mockup about-rating d-none d-xxl-block" data-bottom="48%" data-right="12%"><i
                class="fa-sharp fa-solid fa-star"></i><span>4.9k</span></div>
        <div class="shape-mockup about-emoji d-none d-xxl-block" data-bottom="45%" data-right="29%"><img
                src="assets/img/icon/emoji.png" alt=""></div>
        <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="55%" data-right="12%"><img
                src="assets/img/shape/shape_1.png" alt="shape"></div>
        <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="51%" data-right="8%"><img
                src="assets/img/shape/shape_2.png" alt="shape"></div>
        <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="53%" data-right="5%"><img
                src="assets/img/shape/shape_3.png" alt="shape"></div>
    </section>
       
<?php
include('footer.php')
?>