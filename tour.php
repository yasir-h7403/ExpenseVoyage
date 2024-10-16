<?php
include('header.php')
?>
    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Popular Tours</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Popular Tours</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="th-sort-bar">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto">
                        <div class="sorting-filter-wrap">
                            <div class="nav" role="tablist"><a class="active" href="#" id="tab-destination-grid"
                                    data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid"
                                    aria-selected="true"><i class="fa-light fa-grid-2"></i></a> <a href="#"
                                    id="tab-destination-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab"
                                    aria-controls="tab-list" aria-selected="false" class=""><i
                                        class="fa-solid fa-list"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="tab-grid" role="tabpanel"
                            aria-labelledby="tab-tour-grid">
                            <div class="row gy-24 gx-24">
                            <?php
                            $query = $pdo->query("Select * from trips");
                            $alltrips = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($alltrips as $trip) {
                            ?>
                                <div class="col-md-6">
                                    <div class="tour-box th-ani">
                                        <div class="tour-box_img global-img"><img src="assets/img/tour/<?php echo $trip['Trip_image'] ?>"
                                                alt="image"></div>
                                        <div class="tour-content">
                                            <h3 class="box-title"><?php echo $trip['Tirp_name'] ?></h3>
                                            <div class="tour-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong>
                                                        out of 5 based on <span class="rating">4.8</span>(4.8
                                                        Rating)</span></div><a href="#" class="woocommerce-review-link">(<span class="count">4.8</span>
                                                    Rating)</a>
                                            </div>
                                            <h4 class="tour-box_price"><span class="currency"><?php echo $trip['budget'] ?></span></h4>
                                            <div class="tour-action"><span><i class="fa-light fa-clock"></i><?php echo $trip['Start_date'] ?> - <?php echo $trip['End_date'] ?></span> 
                                            <a href="tour-details.php?id=<?php echo $trip['Trip_id'] ?>" class="th-btn style4">Detail View</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-tour-list">
                            <div class="row gy-30">
                                <div class="col-12">
                                    <div class="tour-box style-flex th-ani">
                                        <div class="tour-box_img global-img"><img src="assets/img/tour/tour_4_1.jpg"
                                                alt="image"></div>
                                        <div class="tour-content">
                                            <h3 class="box-title"><a href="tour-guider-details.html">Greece Tour
                                                    Package</a></h3>
                                            <div class="tour-rating">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong>
                                                        out of 5 based on <span class="rating">4.8</span>(4.8
                                                        Rating)</span></div><a href="tour-guider-details.html"
                                                    class="woocommerce-review-link">(<span class="count">4.8</span>
                                                    Rating)</a>
                                            </div>
                                            <h4 class="tour-box_price"><span class="currency">$980.00</span>/Person</h4>
                                            <div class="tour-action"><span><i class="fa-light fa-clock"></i>7
                                                    Days</span> <a href="tour-guider-details.html"
                                                    class="th-btn style4">Detail View</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="7%" data-right="8%"><img
                src="assets/img/shape/shape_1.png" alt="shape"></div>
        <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="1%" data-right="7%"><img
                src="assets/img/shape/shape_2.png" alt="shape"></div>
        <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="2%" data-right="4%"><img
                src="assets/img/shape/shape_3.png" alt="shape"></div>
    </section>
      
<?php
include('footer.php')
?>