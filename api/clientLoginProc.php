<?php
    include('clientLogin.php');
?>

<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res=mysqli_query($connection, "SELECT * FROM `client` WHERE name='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($res);
    
    if(($row['name'] == $username) && ($row['password'] == $password)) {
        $_SESSION['name'] = $username;
        $_SESSION['type'] = "client";
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $row['email'];
        $_SESSION['number'] = $row['number'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['aadharcard'] = $row['aadharcard'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['profilephoto'] = $row['profilephoto'];
        
        header("Content-Type: application/json");
        echo json_encode(array("status"=> true));
    }
    else {
        header("Content-Type: application/json");
        echo json_encode(array("status"=> false));
    }
?>
