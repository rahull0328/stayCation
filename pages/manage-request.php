<?php
require '../includes/config.php';

$id = $_SESSION['id'];
$sql = "SELECT inquries.id as inquiryId, status, customer.name, customer.email, customer.number, rent.propertyname FROM inquries INNER JOIN customer ON customer.id = inquries.customerid  INNER JOIN rent ON rent.id = inquries.rentid WHERE inquries.clientid =  $id";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

require pathOf('includes/header.php');
?>


<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
          <div class="breadcumb-content">
          <h3 class="breadcumb-title">Manage Request</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<br><br>
<h3 class="text-dark text-center">Customer Inquiries</h3>
<br>
<div class="container" style="display: flex; align-items: center;">
  <table class="table table-dark ">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Property Name</th>
        <td>Status</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $inquires) { ?>
        <tr>
          <td><?= $inquires['name'] ?></td>
          <td><?= $inquires['email'] ?></td>
          <td><?= $inquires['number'] ?></td>
          <td><?= $inquires['propertyname'] ?></td>
          <?php if ($inquires['status'] == "Approved") {
          ?>
            <td class="text-primary"><?= $inquires['status'] ?></td>
          <?php } elseif ($inquires['status'] == "Declined") { ?>
            <td class="text-primary"><?= $inquires['status'] ?></td>
          <?php } else { ?>
            <td>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check-square" viewBox="0 0 16 16" onclick="approveProperty(<?= $inquires['inquiryId'] ?>)">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
              </svg> &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-square" viewBox="0 0 16 16" onclick="declineProperty(<?= $inquires['inquiryId'] ?>)">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
              </svg>
            </td>
          <?php } ?>
          <?php if ($inquires['status'] == "Approved") {
          ?>
            <td>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-building-fill-check" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z" />
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
              </svg>
            </td>
          <?php } ?>
          <?php if ($inquires['status'] == "Declined") {
          ?>
            <td>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-building-x" viewBox="0 0 16 16">
              <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z"/>
              <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm5 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
              </svg>
            </td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<br>
<br>


<script>
  function approveProperty(id) {
    let inquiryId = id;

    $.ajax({
      url: '../api/approveProperty.php',
      data: {
        id: inquiryId
      },
      method: "POST",
      success: function(response) {
        console.log(response);
        window.location = './manage-request.php';
      }
    })
  }

  function declineProperty(id) {
    let inquiryId = id;

    $.ajax({
      url: '../api/declineProperty.php',
      data: {
        id: inquiryId
      },
      method: "POST",
      success: function(response) {
        console.log(response);
        window.location = './manage-request.php';
      }
    })
  }
</script>

<?php include("../includes/footer.php"); ?>
<?php include("../includes/scripts.php"); ?>