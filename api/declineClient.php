<?php

include('../includes/config.php');
$id = $_POST['id'];

$update = "UPDATE client SET status = 'Decline' WHERE id = $id";
mysqli_query($connection, $update);

mysqli_close($connection);
// header("Location: ../index.php");
