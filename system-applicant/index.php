<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Applicant Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  />
  <link rel="stylesheet" href="assets/css/login.css" />
  <link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous"
  />
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">

  <style>
    *{
      font-family: 'Rajdhani', sans-serif;
    }

  #LogoAnimation{
    position: absolute; 
    z-index: 10;
    color: white;
    animation: myAnimation;
    animation-duration:4s;
    animation-fill-mode:forwards ;
    animation-timing-function: ease-out;
  }
  @keyframes myAnimation{
    0%{
      top: -50%;
      left: 5%;
    }

    100%{
      top: 10%;
      left: 5%;
    }

  } 
    body{
      background: url("../images/applicant.jpeg");
      background-size: cover;
      background-repeat: no-repeat;
      box-shadow: inset 50px 50px 300px #000000, inset -10px -10px 100px #000000;
    }
  .form-control{
    padding: 5px 10px !important;
  }
  .login_panel {
    padding: 15px;
    background: linear-gradient(rgba(160,160,160,0.2),rgba(10,10,10,0.8)) !important;  
  }
  .form-control{
    padding: 15px !important;
    height: 42px;
  }
  .input-group-text{
    height: 41px;
  }
  .btn-default{
    padding: 4px 16px;
    background: #ef6c00;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 0;
  }
  .btn-reset{
    background: #fff;
    color: #ef6c00;
  }
  .container_checkbox{
    color: #fff;
    border: solid;
    font-weight: bold;
    text-transform: uppercase;
    background: linear-gradient(rgba(10,10,10,0.5),rgba(10,10,10,0.5)) !important;  
  
  }
  </style>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div id="LogoAnimation">
        <a class="navbar-brand" >
          <img src="../system-client/assets/img/logo.png" width="30%" height="20%" alt="" />
        </a>
        <p class="tagLine" style="color: yellow;">
          <strong>SPECIALIZED IN BACKGROUND VERIFICATION</strong>
        </p>
      </div>
      <div class="row">
          <div class="col-md-8"><br></div>
          <div class="col-md-4">      
            <div class="login_panel">
            <div class="row no-gutters">
                <!-- <div class="col-md-7">
                  <div
                    id="carouselExampleSlidesOnly"
                    class="carousel slide"
                    data-ride="carousel"
                    style="height: 100%;"
                  >
                    <div class="carousel-inner" style="height: 100%;">
                      <div class="carousel-item active" style="height: 100%;">
                        <img
                          class="d-block w-100 login-card-img"
                          src="assets/images/image4.jpg"
                          alt="First slide"
                          style="background-size: cover;"
                        />
                      </div>
                      <div class="carousel-item" style="height: 100%;">
                        <img
                          class="d-block w-100 login-card-img"
                          src="assets/images/imgg.jpg"
                          alt="Second slide"
                          style="background-size: cover;"
                        />
                      </div>
                      <div class="carousel-item" style="height: 100%;">
                        <img
                          class="d-block w-100 login-card-img"
                          src="assets/images/image3.jpg"
                          alt="Third slide"
                          style="background-size: cover;"
                        />
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="brand-wrapper" style="border-bottom: solid 1px #fff;">
                      <img src="../system-client/assets/img/logo.png" alt="logo" class="logo" />
                      <p><strong style="color: #fff">APPLICANT PORTAL</strong></p>

                    </div>
                    <p style="color: #fff" class="login-card-description">SIGN IN</p>
                    <form action="#!">
                      <div class="input-group form-group" style="padding-bottom: 0;">
                        <div class="input-group-prepend" style="padding-bottom: 0;">
                          <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username"  />
                      </div>
                      <div class="input-group form-group" style="padding-bottom: 0;">
                        <div class="input-group-prepend" style="padding-bottom: 0;">
                          <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" style="margin-bottom: 5px;" />
                          <span class="btn_show_password"><i class="fa fa-eye-slash"></i>  </span>
                      </div>
                      <b ><a style="color: #fff;" href="../system-admin/Forgot-Password.php?forgot_type=<?php echo base64_encode('applicant_forgot'); ?>" class="forgot-password-link">Forgot password?</a></b>
                      <br> <br>
                      <a href="javascript:login_click()" type='submit' class="btn btn-default login-btn mb-4">Login</a>
                      <a href="" class="btn btn-default btn-reset mb-4">Reset</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $("input").each(function () {
        $(this).attr("autocomplete", "off");
      })
    </script>
    <style type="text/css">
      .input-group {
        position: relative;
      }
      .btn_show_password{
        position: absolute;
        right: 0;
        padding: 8px 12px;
        font-size: 15pt;
        color: #666;
        cursor: pointer;
        transition: 0.3s all ease;
        z-index: 9999999 !important;
      }
      .btn_show_password:hover{
        background: #eee;
      }
      .btn_show_password:active{
       background: #aaa;
     }
   </style>
   <script type="text/javascript">
    $( ".btn_show_password" ).click(function() {
      if($("#password").prop('type') == 'text')
      {
        $("#password").prop('type', 'password');
        $('.btn_show_password').html('<i class="fa fa-eye-slash"></i>');
      }
      else
      {
        $("#password").prop('type', 'text');
        $('.btn_show_password').html('<i class="fa fa-eye"></i>');
      }
    });
  </script>
  <script type="text/javascript">
    function login_click()
    {
      var username = $('#username').val();
      var password = $('#password').val();
      if(username == "")
      {
        alert("Please enter username!");
        $('#username').focus();
      }
      else if(password == "")
      {
        alert("Please enter password!");
        $('#password').focus();
      }
      else
      {
        $.ajax({
          type:'POST',
          url:'./API/Login.php',
          data:{username, password},
          success:function(html){
            if(html == 'success')
            {
              alert('Login success!');
              window.location.href = 'Dashboard.php'
            }
            else if(html == 'wrong')
            {
              alert('Please check username or password!');
            }
            else
            {
              alert('Error occurred!')
            }
          }
        });
      }
    }

    $('#password').on("keypress", function(e) {
      if (e.keyCode == 13) {
        login_click();
      }
    });
  </script>
  <?php
    include '../API/Validations.php';
  ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>