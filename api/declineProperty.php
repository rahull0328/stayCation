<?php

include('../includes/config.php');
$id = $_REQUEST['id'];

$update = "UPDATE inquries SET status = 'Declined' WHERE id = $id";
mysqli_query($connection, $update);

mysqli_close($connection);
// header("Location: ../index.php");
?>