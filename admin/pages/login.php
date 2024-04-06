<?php 
include ('../../includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= urlOf('admin/assets/css/loginStyle.css')?>">
    <link rel="shortcut icon" href="<?= urlOf('img/core-img/favicon.ico')?>" type="image/x-icon">
    <title>Admin - Panel</title>
</head>
<body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login !!</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read....</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
        <label for="username">Username</label>
        <input type="text" id="username">
        <label for="password">Password</label>
        <input type="password" id="password">
        <input type="button" id="submit" value="Submit" onclick="userLogin()">
      </div>
    </div>
  </div>
</div>
</body>

  <script src="<?= urlOf('js/jquery/jquery-2.2.4.min.js')?>"></script>
  <script src="<?= urlOf('admin/assets/js/loginjs.js')?>"></script>
  <script src="<?= urlOf('js/jquery-3.7.0.min.js')?>"></script>
  <script src="<?= urlOf('admin/assets/js/anime.min.js')?>"></script>
  </script>

  <script>
    function userLogin() {
      let data = {
      username: $('#username').val(),
      password: $('#password').val(), 
    }

    $.ajax({
      url: '../../api/adminLoginProc.php',
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