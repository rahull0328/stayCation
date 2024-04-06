<?php

include('../includes/config.php');

$select = "SELECT * FROM client";

$result = mysqli_query($connection, $select);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connection);

header("Content-type:application/json");
echo json_encode($data);
// header("Location: ../index.php");
