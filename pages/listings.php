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
                    <h3 class="breadcumb-title">Listings</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Listing Content Wrapper Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
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
                            <p class="location"><img src="<?= urlOf('img/icons/location.png') ?>" alt="location img"><?= $rentdata['district'] ?></p>
                            <h6><?= $rentdata['state'] ?></h6>
                            <p class="location"><?= $rentdata['address'] ?></p>
                            <a href="./single-listings.php?id=<?= $rentdata['id'] ?>" class="btn south-btn wow fadeInUp" data-wow-delay="500ms">Show</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- ##### Listing Content Wrapper Area End ##### -->


<?php include("../includes/footer.php"); ?>
<?php include("../includes/scripts.php"); ?>