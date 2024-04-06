<?php

include('../includes/config.php');
$description = $_POST['description'];
$clientid = $_POST['clientid'];
$rentid = $_POST['rentid'];
$customerid = $_POST['customerid'];

$insert = "INSERT INTO `inquries`(`description`,`clientid`,`rentid`,`customerid`) VALUES('$description','$clientid','$rentid','$customerid')";
mysqli_query($connection,$insert);

mysqli_close($connection);
// header("Location: ../index.php");