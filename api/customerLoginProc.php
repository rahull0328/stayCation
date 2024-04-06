<?php
    include('customerLogin.php');
?>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $res=mysqli_query($connection, "SELECT * FROM `customer` where name='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($res);
    
    if(($row['name'] == $username) && ($row['password'] == $password)) {
        $_SESSION['name']=$username;
        $_SESSION['type']="customer";
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['number'] = $row['number'];
        $_SESSION['password'] = $row['password'];
        
        header("Content-Type: application/json");
        echo json_encode(array("status"=> true));
    }
    else {
        header("Content-Type: application/json");
        echo json_encode(array("status"=> false));
    }
?>