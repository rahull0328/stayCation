<?php

include('../includes/config.php');

$id = $_REQUEST['id'];
$select = "SELECT aadharcard FROM client WHERE id = $id";

$result = mysqli_query($connection, $select);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connection);

header("Content-type:application/json");
echo json_encode($data[0]);

?>