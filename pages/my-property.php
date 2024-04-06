<?php
require '../includes/config.php';

if (!isset($_SESSION['id']))
    Header("Location: ./login.php");
$id = $_SESSION['id'];
$sql = "SELECT client.name, client.number, rent.propertyname, inquries.status, inquries.id FROM inquries INNER JOIN client ON client.id = inquries.clientid INNER JOIN rent ON rent.id = inquries.rentid WHERE inquries.customerid = $id ";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
require pathOf('includes/header.php');
?>
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Manage Requests</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>
<div class="container" style="display: flex; align-items: center;">
    <table border="1" class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Property Name</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $information) { ?>
                <tr>
                    <td><?= $information['name'] ?></td>
                    <td><?= $information['propertyname'] ?></td>
                    <td><button type="button"class="btn btn-danger" onclick="deleteInquiry(<?= $information['id'] ?>)">Delete</button></td>
                    <?php if($information['status'] == "Approved"){
                    ?>
                        <td class="text-success"><?= $information['status'] ?></td>
                    <?php } elseif($information['status'] == "Declined"){?>
                        <td class="text-danger"><?= $information['status'] ?></td>
                    <?php } else{?>
                        <td class="text-secondary"><?= $information['status'] ?></td>
                    <?php }?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<br>
<br>


<?php include("../includes/footer.php"); ?>
<?php include("../includes/scripts.php"); ?>

<script>
    function deleteInquiry(id) {
        var id = id;
        let data = {
            id:id
        }

        $.post("../api/deleteInquiry.php", data, function (response) {
            console.log(response);
            window.location.href = "./my-property.php"
        })
    }
</script>