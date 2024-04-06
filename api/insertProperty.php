<?php

include('../includes/config.php');

if (isset($_FILES['file'])) {

    $categories = $_POST['categories'];
    $propertyname = $_POST['propertyname'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $area = $_POST['area'];
    $id = $_SESSION['id'];

    $time = time();
    $fileName = "$time-" . $_FILES['file']['name'];
    $tmpFileName = $_FILES['file']['tmp_name'];

    $fileUploaded = move_uploaded_file($tmpFileName, pathOf("uploads/property/$fileName"));

    if (!$fileUploaded) {
        echo json_encode(["status" => false, "message" => "Error uploading file."]);
        exit();
    }

    $insert = "INSERT INTO `rent`(`categories`,`propertyname`,`state`,`district`,`address`,`description`,`amount`,`size`, `clientid`,`image`) VALUES('$categories','$propertyname','$state','$district','$address','$description','$amount','$area','$id','$fileName')";
    mysqli_query($connection, $insert);
} else {
    echo json_encode(["status" => false, "message" => "No file uploaded."]);
}

mysqli_close($connection);

// header("Location: ../index.php");
