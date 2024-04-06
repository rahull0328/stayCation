<?php
include('../includes/config.php');

if (isset($_FILES['file'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $time = time();
    $fileName = "$time-" . $_FILES['file']['name'];
    $tmpFileName = $_FILES['file']['tmp_name'];

    $fileNames = "$time-" . $_FILES['files']['name'];
    $tmpFileNames = $_FILES['files']['tmp_name'];

    $fileUploaded = move_uploaded_file($tmpFileName, pathOf("uploads/adhar/$fileName"));
    $fileUpload = move_uploaded_file($tmpFileNames, pathOf("uploads/profilePhoto/$fileNames"));

    if (!$fileUploaded) {
        echo json_encode(["status" => false, "message" => "Error uploading file."]);
        exit();
    }

    if (!$fileUpload) {
        echo json_encode(["status" => false, "message" => "Error uploading file."]);
        exit();
    }

    $insert = "INSERT INTO `client`(`name`,`email`,`number`,`password`,`aadharcard`,`profilephoto`) VALUES('$name','$email','$number','$password','$fileName','$fileNames')";
    mysqli_query($connection, $insert);
} else {
    echo json_encode(["status" => false, "message" => "No file uploaded."]);
}


mysqli_close($connection);
// header("Location: ../index.php");