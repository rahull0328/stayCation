<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginstyle.css">
    <title>Sign - In</title>
    <link rel="shortcut icon" href="../img/core-img/favicon.ico" type="image/x-icon">
</head>

<body>
    <h2>Welcome To Staycation !</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form>
                <h3>Sign - In As Client</h3>
                <input type="text" placeholder="Your Name" id="username" />
                <input type="password" placeholder="Password" id="password" />
                <button type="button" class="submitbtn" onclick="userLogin()">Submit</button>
                <a href="./createAccount.php">Didn't Have an Account? <br> Create One here!</a>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form>
                <h3>Sign - In As Customer</h3>
                <input type="text" placeholder="Your Name" id="name" />
                <input type="password" placeholder="Set New Password" id="currentpassword" />
                <button type="button" class="submitbtn" onclick="customerLogin()">Submit</button>
                <a href="./createAccount.php">Didn't Have an Account? <br> Create One here!</a>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Welcome Back Our Client</h2>
                    <hr width="200px">
                    <button class="ghost" id="signIn" style="margin-top: 20px !important">Sign-In As customer</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h2>Sign-In As Customer</h2>
                    <hr width="200px">
                    <button class="ghost" id="signUp" style="margin-top: 20px !important">Sign-In As client</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../js/loginjs.js"></script>
<script src="../js/jquery-3.7.0.min.js"></script>
<script>
    
	function userLogin() {
		
      let data = {
      username: $('#username').val(),
      password: $('#password').val(), 
    }

    $.ajax({
      url: '../api/clientLoginProc.php',
      data: data,
      method: "POST",
      success: function(response){
        console.log(response);
        if(response.status) { 
          window.location.href = "../index.php"
        } else {
          alert("Invalid Creds!")
        }
      }

    })
  }
	
  function customerLogin() {
		
      let data = {
      username: $('#name').val(),
      password: $('#currentpassword').val(), 
    }
    $.ajax({
      url: '../api/customerLoginProc.php',
      data: data,
      method: "POST",
      success: function(response){
        console.log(response);
        if(response.status) { 
          window.location.href = "../index.php"
        } else {
          alert("Invalid Creds!")
        }
      }

    })
  }

</script>

</html>