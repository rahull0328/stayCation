<?php require '../includes/config.php'; ?>
<?php
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
  header("Location: ./pages/login.php");
}

?>

<?php
include('./assets/includes/sidebar.php');
include('./assets/includes/header.php');
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4 bg-dark text-center pb-1">
            <h5 class="card-title mb-4 text-light">
              Dashboard
            </h5>
          </div>
        </div>
      </div>
    </div>
    <div class="card col-6" style="width: 18rem;">
      <div class="card-body bg-success text-center">
        <?php
        $reg_pro = "SELECT * FROM rent";
        $result = mysqli_query($connection, $reg_pro);
        
        if ($totalpro = mysqli_num_rows($result)) {
          echo '<h4 class="mb-0 text-center text-dark">'.$totalpro.'</h4>';
        } else {
          echo '<h4 class="mb-0">No Data</h4>';
        }
        ?>
        <br>
        <h5 class="card-title text-center text-dark">Total <br>Properties</h5>
        <br>
        <a href="./pages/viewProperties.php" class="text-dark">Full Details &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z" />
          </svg>
        </a>
      </div>
    </div>
    
    <div class="card col-6" style="width: 18rem;">
      <div class="card-body bg-danger text-center">
        <?php
        $queries = "SELECT * FROM inquries";
        $query_run = mysqli_query($connection, $queries);
        
        if ($totalquery = mysqli_num_rows($query_run)) {
          echo '<h4 class="mb-0 text-center">'. $totalquery.'</h4>';
        } else {
          echo '<h4 class="mb-0">No Data</h4>';
        }
        ?>
        <br>
        <h5 class="card-title text-center">Total <br>Inquiries</h5>
        <br>
        <a href="./pages/totalInquiries.php" class="text-dark">Full Details &nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>


<?php include('./assets/includes/footer.php'); ?>