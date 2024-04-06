<?php

include('../includes/config.php');
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];

$insert = "INSERT INTO `customer`(`name`,`email`,`number`,`password`) VALUES('$name','$email','$number','$password')";
mysqli_query($connection,$insert);

mysqli_close($connection);
// header("Location: ../index.php");