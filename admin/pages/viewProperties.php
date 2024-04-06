<?php require '../../includes/config.php'; ?>
<?php
include('../assets/includes/sidebar.php');
include('../assets/includes/header.php');
?>
<?php

$sql = "SELECT * FROM rent";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayCation - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
<br>
<br>
    <div class="container mt-5">
        <h3 class="text-dark text-center">Properties</h3>
        <hr>
        <br>
            <table id="tb" class="table-striped table-bordered table-danger stripe">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Property Name</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Rent Amount</th>
                            <th>Area (in sq.ft)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php    
                            foreach($data as $rentdata) {
                        ?>    
                            <td><?= $rentdata['categories']?></td>
                            <td><?= $rentdata['propertyname']?></td>
                            <td><?= $rentdata['state']?></td>
                            <td><?= $rentdata['district']?></td>
                            <td><?= $rentdata['address']?></td>
                            <td><?= $rentdata['description']?></td>
                            <td><?= $rentdata['amount']?></td>
                            <td><?= $rentdata['size']?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
            </table>
    </div>
</body>
</html>
<script src="../assets/js/jquery-3.7.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function (){
    $('#tb').DataTable();
})
let table = new DataTable('#tb');

</script>

<?php
    include('../assets/includes/footer.php');
?>