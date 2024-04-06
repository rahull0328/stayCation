<?php
require '../includes/config.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM rent WHERE clientid = $id";
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
                    <h3 class="breadcumb-title">Manage Property</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->
<?php
    if(isset($_SESSION['status']) && $_SESSION['status'] == "Approved"){
?>
<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Add New Property</p>
                    </div>
                    <!-- Search Form -->
                    <form  onsubmit="return false">
                        <div class="row">

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="categories" required>
                                        <option>Choose Categories</option>
                                        <option value="House">House</option>
                                        <option value="Appartments">Appartments</option>
                                        <option value="Farm House">Farm House</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="state" required>
                                        <option>State</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="district" required>
                                        <option>District</option>
                                        <option value="Amaravati">Amaravati</option>
                                        <option value="Itanagar">Itanagar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <textarea class="form-control" id="propertyname" placeholder="Enter Property Name" cols="20" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <textarea class="form-control" id="address" placeholder="Enter Address" cols="20" rows="10" required></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <textarea class="form-control" id="description" cols="20" placeholder="Enter Property Description" rows="10" required></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <input type="file" class="form-control" id="image">
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <input type="text" id="amount" class="form-control" placeholder="Enter the amount: " required>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <input type="text" id="area" class="form-control" placeholder="Enter the area in sq. ft: " required>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group mb-0 ml-12">
                                <input type="button" class="btn south-btn" onclick="addProperty()" value="Submit">
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
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
            <?php foreach ($data as $rentdata) {?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="../uploads/property/<?= $rentdata["image"]?>" id="image">

                            <div class="tag">
                                <span><?= $rentdata['categories'] ?></span>
                            </div>
                            <div class="list-price">
                                <p><?= $rentdata['amount'] ?> ₹</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <p class="location"><img src="<?= urlOf('img/icons/location.png') ?>" alt="location img"><?= $rentdata['state'] ?></p>
                            <h6><?= $rentdata['propertyname'] ?></h6>
                            <p class="location"><?= $rentdata['address'] ?></p>
                            <p><?= $rentdata['description'] ?></p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter1" onclick="storeDeleteId(<?= $rentdata['id'] ?>)">
                                Delete
                            </button>                                                   
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php 
    } else{
       echo '<h3 style="text-align:center; margin-top:20px">Your Account is not Approved yet!! Please wait for some time to get it approved</h3>'; 
?>

<?php }?>
<!-- ##### Advance Search Area End ##### --> 

<!-- Modal delete-->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this property? Deleting this will resulting in removing this property from the cloud...</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="propertyDelete">
        <button type="button" class="btn btn-outline-secondary" onclick="deleteProperty()">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php include("../includes/footer.php") ?>
<?php include("../includes/scripts.php"); ?>
<script>
    function addProperty() {
        var fileInput = document.getElementById('image');
        var file = fileInput.files[0];

        var formData = new FormData();
        formData.append('file', file);
        formData.append('categories', $("#categories").val());
        formData.append('propertyname', $("#propertyname").val());
        formData.append('state', $("#state").val());
        formData.append('district', $("#district").val());
        formData.append('address', $("#address").val());
        formData.append('description', $("#description").val());
        formData.append('amount', $("#amount").val());
        formData.append('area', $("#area").val());

        $.ajax({
            url: "../api/insertProperty.php",
            data: formData,
            method: "POST",
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                window.location = 'manage-property.php'
            }
        })
    }

    function storeDeleteId(id){
        let deleteId = id;
        $("#propertyDelete").val(deleteId)
    }

    function deleteProperty() {
        let clientId = $("#propertyDelete").val();
        
        $.ajax({
            url: '../api/deleteProperty.php',
            data: {
                id: clientId
            },
            method: "POST",
            success:function(response){
                console.log(response);
                window.location = 'manage-property.php'
            }
        })
    }

</script>
