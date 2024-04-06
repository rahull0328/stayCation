<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginstyle.css">
    <title>Sign - Up</title>
    <link rel="shortcut icon" href="../img/core-img/favicon.ico" type="image/x-icon">
</head>

<body>
    <h3>Welcome to StayCation !</h3>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h3>Create Account</h3>
                <input type="text" placeholder="Your Name" id="clname" />
                <input type="text" placeholder="Contact Number" id="clnumber" />
                <input type="email" placeholder="Your Email" id="clemail" />
                <input type="password" placeholder="Set New Password" id="clpassword" />
                <a>Enter Your Aadharcard
                <input type="file" id="adhar" /></a>
                <a>Enter Your Profile Photo
                <input type="file" id="profilePhoto">
                </a>    
                <button type="button" class="submitbtn" onclick="insertClient()">Submit</button>
                <a href="./login.php">Already An User</a>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h3>Create Account</h3>
                <input type="text" placeholder="Your Name" id="name" />
                <input type="email" placeholder="Your Email" id="email" />
                <input type="text" placeholder="Contact Number" id="number" />
                <input type="password" placeholder="Set New Password" id="password" />
                <button type="button" class="submitbtn" onclick="insertCustomer()">Submit</button>
                <a href="./login.php">Already a User</a>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Create Account as Client</h2>
                    <hr width="200px">
                    <button class="ghost" id="signIn" style="margin-top: 20px !important">Sign Up as a customer</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h2>Create Account as Customer</h2>
                    <hr width="200px">
                    <button class="ghost" id="signUp" style="margin-top: 20px !important">Sign Up as a client</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../js/loginjs.js"></script>
<script src="../js/jquery-3.7.0.min.js"></script>
<script>
    function insertCustomer() {
        let data = {
            name: $("#name").val(),
            email: $("#email").val(),
            number: $("#number").val(),
            password: $("#password").val(),
        }

        $.ajax({
            url: "../api/insertCustomer.php",
            method: "POST",
            data: data,
            success: function(response) {
                console.log(response);
                window.location = '../index.php';
            }
        })
        window.location.reload();
    }

    function insertClient() {
        var fileInput = document.getElementById('adhar');
        var file = fileInput.files[0];

        var fileInputs = document.getElementById('profilePhoto');
        var files = fileInputs.files[0];

        var formData = new FormData();
        formData.append('file', file);
        formData.append('files', files);
        formData.append('name', $("#clname").val());
        formData.append('email', $("#clemail").val());
        formData.append('number', $("#clnumber").val());
        formData.append('password', $("#clpassword").val());

        $.ajax({
            url: "../api/insertClient.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                window.location = '../index.php';
            }
        });
    }
</script>

</html>