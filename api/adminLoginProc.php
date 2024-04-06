<?php
    include('adminLogin.php');
?>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res=mysqli_query($connection, "SELECT * FROM `admin` where username='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($res);
    if(($row['username'] == $username) && ($row['password'] == $password)) {
        $_SESSION['username'] = $username;
        
        header("Content-Type: application/json");
        echo json_encode(array("status"=> true));
    }
    else {
        header("Content-Type: application/json");
        echo json_encode(array("status"=> false));
    }
?>
