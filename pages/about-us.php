<?php
require '../includes/config.php';

$sql = "SELECT * FROM rent";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

require pathOf('includes/header.php');
?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">About us</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### About Content Wrapper Start ##### -->
<section class="about-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                        <h2>We search for the perfect home</h2>
                        <p>Recommendation's That Meets Your Needs</p>
                    </div>
                    <div class="about-content">
                        <img class="wow fadeInUp" data-wow-delay="350ms" src="<?= urlOf('img/bg-img/about.jpg')?>" alt="">
                        <p class="wow fadeInUp" data-wow-delay="450ms">"Welcome to StayCation, where finding your ideal home is our passion. With years of experience in the real estate industry, we've made it our mission to simplify the rental process and provide you with the finest properties that match your unique lifestyle. Our dedicated team of professionals takes pride in offering transparency, reliability, and exceptional service to both property owners and renters. From cozy apartments in vibrant neighborhoods to luxurious homes with breathtaking views, we've got it all. At StayCation, we don't just offer rentals; we offer a place to call home. Explore our diverse portfolio and let us help you find your next chapter.</p>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                        <h2>Featured Properties</h2>
                        <p>Suspendisse dictum enim sit amet libero</p>
                    </div>

                    <div class="featured-properties-slides owl-carousel wow fadeInUp" data-wow-delay="350ms">
                        <?php foreach($data as $rentdata){
                        ?>
                        <!-- Single Slide -->
                        <div class="single-featured-property">
                            <!-- Property Thumbnail -->
                            <div class="property-thumb">
                                <img src="<?= urlOf('uploads/property/').$rentdata['image'] ?>" alt="">

                                <div class="tag">
                                    <span><?= $rentdata['categories']?></span>
                                </div>
                                <div class="list-price">
                                    <p>₹ <?= $rentdata['amount']?></p>
                                </div>
                            </div>
                            <!-- Property Content -->
                            <div class="property-content">
                                <h5><?= $rentdata['propertyname']?></h5>
                                <p class="location"><img src="<?= urlOf('img/icons/location.png')?>" alt=""><?= $rentdata['district']?></p>
                                <h6><?= $rentdata['state'] ?></h6>
                                <p class="location"><?= $rentdata['address'] ?></p>
                            </div>
                        </div>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Content Wrapper End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(../img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                    <a href="listings.php" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->



<?php include("../includes/footer.php"); ?>
<?php include("../includes/scripts.php"); ?>