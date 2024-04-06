<?php
require './includes/config.php';
$sql = "SELECT * FROM rent LIMIT 9";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Data print kari ne jovo hoi to aa function vaparvanu
// print_r($data);
require pathOf('includes/header.php');
?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Find your Stay</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero2.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Rent your desired house</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/hero3.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="1000ms">Book a perfect vacay !</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Hero Area End ##### -->

<!-- ##### Featured Properties Area Start ##### -->
<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>Featured Properties</h2>
                    <p>Choose the perfect place for your vacation</p>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Featured Property -->
            <?php foreach ($data as $rentdata) { ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="<?= urlOf('uploads/property/').$rentdata['image'] ?>" alt="">

                            <div class="tag">
                                <span><?= $rentdata['categories'] ?></span>
                            </div>
                            <div class="list-price">
                                <p>₹ <?= $rentdata['amount'] ?></p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <p class="location"><img src="img/icons/location.png" alt="location img"><?= $rentdata['district'] ?></p>
                            <h6><?= $rentdata['state'] ?></h6>
                            <p class="location"><?= $rentdata['address'] ?></p>
                            <a href="./pages/single-listings.php?id=<?= $rentdata['id'] ?>" class="btn south-btn wow fadeInUp" data-wow-delay="500ms">Show</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                    <a href="./pages/listings.php" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->

<!-- ##### Testimonials Area Start ##### -->
<section class="south-testimonials-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                    <h2>Our Client's</h2>
                    <p>The reason behind your perfect vacay bookings</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">
                    <?php
                    $sql = "SELECT * FROM client LIMIT 4";
                    $result = mysqli_query($connection, $sql);
                    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>
                    <!-- Single Testimonial Slide -->
                    <?php foreach ($data as $clientData) { ?>
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for You</h5>
                            <p><?= $clientData['about'] ?></p>

                            <div class="testimonial-author-info">
                                <img src="img/bg-img/feature6.jpg" alt="">
                                <p><?= $clientData['name'] ?>
                                    <span>Client</span>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Single Testimonial Slide -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Testimonials Area End ##### -->

<?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>