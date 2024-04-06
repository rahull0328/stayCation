<?php
require '../includes/config.php';
if (!isset($_GET['id']))
    Header("Location: ../index.php");

$id = $_GET['id'];
$sql = "SELECT *, rent.id as rentid FROM rent INNER JOIN client ON rent.clientid = client.id WHERE rent.id = $id";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($result);
// print_r($data);
require pathOf('includes/header.php');
?>

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Property</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Listings Content Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Single Listings Slides -->
                <div>
                    <!-- Single Slide -->
                    <img src="<?= urlOf('uploads/property/') . $data['image'] ?>" alt="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="listings-content">
                    <!-- Price -->
                    <div class="list-price">
                        <p>₹ <?= $data['amount'] ?></p>
                    </div>
                    <h5><?= $data['propertyname'] ?></h5>
                    <p class="location"><img src="<?= urlOf('img/icons/location.png') ?>" alt=""><?= $data['address'] ?></p>
                    <p><?= $data['description'] ?></p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-realtor-wrapper">
                    <div class="realtor-info">
                        <div class="realtor---info">
                            <br>
                            <br>
                            <h2><?= $data['name'] ?></h2>
                            <p>StayCation <?= $data['status']?> Client</p>
                        </div>
                        <?php if (!isset($_SESSION['username']) || $_SESSION['username'] == "") { ?>
                            <div class="realtor--contact-form">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="hidden" id="clientid" value="<?= $data['clientid'] ?>">
                                        <input type="hidden" id="rentid" value="<?= $data['rentid'] ?>">
                                        <input type="hidden" id="customerid" value="<?= $_SESSION['id'] ?>" />
                                        <textarea name="message" class="form-control" id="description" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                    <button type="button" class="btn south-btn" onclick="sendInquiry()">Send Inquiry</button>
                                </form>
                            </div>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </div>
</section>
<!-- ##### Listings Content Area End ##### -->

<?php include("../includes/footer.php"); ?>
<?php include("../includes/scripts.php"); ?>
<script>
    function sendInquiry() {
        let data = {
            description: $("#description").val(),
            clientid: $("#clientid").val(),
            rentid: $("#rentid").val(),
            customerid: $("#customerid").val(),
        }

        $.post('../api/insertInquiry.php', data, function(response) {
            console.log(response);
            window.location.href = "./my-property.php";
        })
    }
</script>