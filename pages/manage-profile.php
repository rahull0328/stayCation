<?php
require '../includes/config.php';


require pathOf('includes/header.php');
?>
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">Manage Profile</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<br><br>

<div class="container" >
  <div class="main-body" >
    <div class="row gutters-sm" >
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="d-flex flex-column align-items-center text-center">
            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
            ?>
              <img src="../uploads/profilePhoto/<?= $_SESSION['profilephoto']?>" id="profilephoto" alt="dp" class="rounded-circle" width="125px" height="125px">
            <?php }
            ?>
            <?php   if (isset($_SESSION['type']) && $_SESSION['type'] == "customer") {
            ?>
              <img src="../admin/assets/images/profile/user-1.jpg" alt="profile photo" class="rounded-circle" width="125px" height="125px">
            <?php }
            ?>
              <div class="mt-3">
                <h4><?= $_SESSION['name'] ?></h4>
                <hr class="bg-dark">
                <?php
                if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
                ?>
                  <p style="color: #947054;"><?= $_SESSION['status']?>&nbsp;<?= $_SESSION['type']?>&nbsp;<br>At Staycation !</p>
                <?php }
                ?>
                <?php
                if (isset($_SESSION['type']) && $_SESSION['type'] == "customer") {
                ?>
                  <p style="color: #947054;">&nbsp;<?= $_SESSION['type']?>&nbsp;<br>At Staycation !</p>
                <?php }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $_SESSION['name'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $_SESSION['email'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $_SESSION['number'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Password</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $_SESSION['password'] ?>
              </div>
            </div>
            <hr>
            <?php
            if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
            ?>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">

                  <?= $_SESSION['status'] ?>
                </div>
              </div>
              <hr>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['type']) && $_SESSION['type'] == "client") {
            ?>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Aadhar Card</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                    View Aadhar
                  </button>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--- Modal for edit profile--->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">    
                <label>Name</label>
                <input type="text" class="form-control" value="<?= $_SESSION['name']?>" id="newName">
                <label>Email</label>
                <input type="email" class="form-control" value="<?= $_SESSION['email']?>" id="newEmail">
                <label>Phone Number</label>
                <input type="text" class="form-control" value="<?= $_SESSION['number']?>" id="newNumber">
                <label>Profile Photo</label>
                <input type="file" id="newDP">
              </div>  
            </div>  
          </div>  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
  
  
  <!-- Modal for aadhar-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Aadhar Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img height="100%" width="100%" src="../uploads/adhar/<?= $_SESSION['aadharcard'] ?>">
      </div>
    </div>
  </div>
</div>

<br>
<br>

<?php include("../includes/footer.php"); ?>
<?php include("../includes/scripts.php"); ?>