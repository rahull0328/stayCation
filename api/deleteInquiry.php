<?php

include('../includes/config.php');

$id = $_REQUEST['id'];
$sql = "DELETE FROM inquries WHERE id = $id";
mysqli_query($connection,$sql);

mysqli_close($connection);

?>