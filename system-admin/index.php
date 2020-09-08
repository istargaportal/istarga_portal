<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/login.css" />
  <!--Fontawesome CDN-->
  <link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous"
  />
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
</head>
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
  body {
    background: url("../images/admin.jpg");
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
      <div class="row no-gutters">
          <!-- <div class="col-md-7">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="height: 100%;">
              <div class="carousel-inner" style="height: 100%;">
                <div class="carousel-item active" style="height: 100%;">
                  <img class="d-block w-100 login-card-img" src="assets/images/login1.jpeg" alt="First slide" />
                </div>
                <div class="carousel-item" style="height: 100%;">
                  <img class="d-block w-100 login-card-img" src="assets/images/login2.jpg" alt="Second slide" />
                </div>
                <div class="carousel-item" style="height: 100%;">
                  <img class="d-block w-100 login-card-img" src="assets/images/login3.jpeg" alt="Third slide" />
                </div>
              </div>
            </div>
          </div> -->
          <div class="col-md-8"><br></div>
          <div class="col-md-4">
            <div class="login_panel">
              <div class="card-body">
                <div class="brand-wrapper" style="border-bottom: solid 1px #fff;">
                  <img src="../system-client/assets/img/logo.png" alt="logo" class="logo" />
                  <p><strong style="color: #fff">ADMIN PORTAL</strong></p>
                </div>
                <p style="color: #fff;" class="login-card-description">SIGN IN</p>
                <form id="ajax">
                  <label class="container_checkbox">Admin
                    <input type="radio" id="Admin" name="user-type" value="Admin" />
                    <span class="checkmark"></span>
                  </label>

                  <label class="container_checkbox">Employee
                    <input type="radio" id="Employee" name="user-type" value="Employee" />
                    <span class="checkmark"></span>
                  </label>
                  <div class="input-group form-group" style="padding-bottom: 0;">
                    <div class="input-group-prepend" style="padding-bottom: 0;">
                      <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email address" />
                  </div>

                  <div class="input-group form-group" style="padding-bottom: 0;">
                    <div class="input-group-prepend" style="padding-bottom: 0;">
                      <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" style="margin-bottom: 5px;" />
                    <span class="btn_show_password"><i class="fa fa-eye-slash"></i>  </span>
                  </div>

                  <div class="form-group" style="margin-bottom: 0;">
                    <label for="password" class="sr-only">Password</label>

                  </div>
                <!--<input
                    name="login"
                    id="login"
                    class="btn btn-block login-btn mb-4"
                    type="button"
                    value="Login"
                    />-->
                    <b><a style="color: #fff;text-decoration: underline;" href="Forgot-Password.php?forgot_type=<?php echo base64_encode('admin_forgot'); ?>" class="forgot-password-link">Forgot password?</a></b>
                    <br> <br>
                    <button type='submit' class="btn btn-default login-btn mb-4">Login</button>
                    <a href="" class="btn btn-default btn-reset mb-4">Reset</a>
                  </form>
              <!-- <p class="login-card-footer-text">
                  Don't have an account?
                  <a href="#!" class="text-reset">Register here</a>
                </p> -->
              <!-- <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav> -->
              </div>
            </div>
          </div>
          <div class="new-modal">
            <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#exampleModal">
              Launch demo modal
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Service Assigned Successfully</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="modal-ok-btn" data-dismiss="modal" class="btn btn-primary">OK</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .input-group {
      position: relative;
    }
    .btn_show_password{
      position: absolute;
      right: 0;
      padding: 6px 12px;
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
  $("input").each(function () {
    $(this).attr("autocomplete", "off");
  })
</script>
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
<script>
  let modal = document.querySelector(".new-modal #exampleModal")
  let modalOkBtn = document.querySelector(".new-modal #modal-ok-btn")
  let modalLabel = document.querySelector(".new-modal #exampleModalLabel")
  
  let modalLaunchButton = document.querySelector(".new-modal .launch")
  let modalCloseButton = document.querySelector(".new-modal .close")
</script>
<script>
  const form = document.getElementById('ajax');

  $("form").submit(function(event) {
    event.preventDefault();
    var formdata = $("form").serializeArray();
    var data = {};
    $(formdata).each(function(index, obj) {
      data[obj.name] = obj.value;
    });
    fetch('./API/login.php', {
      method: 'post',
      body: JSON.stringify(data),
    }).then(function(response) {
      return response.text();
    }).then(function(text) {
      if (text == "Please Select User-type") {
        modalLabel.innerHTML = text
        modalLaunchButton.click()
      } else if (text == "Please enter Email Address") {
        modalLabel.innerHTML = text
        modalLaunchButton.click()
      } else if (text == "Please enter Password") {
        modalLabel.innerHTML = text
        modalLaunchButton.click()
      } else if (text == "Wrong admin Credentials") {
        modalLabel.innerHTML = text
        modalLaunchButton.click()
      } else if (text == "admin_login") {
        window.location.href = "Dashboard.php";
      } else if (text == "qf_login") {
        window.location.href = "./system-of/Dashboard.php";
      } else if (text == "qc_login") {
        window.location.href = "./system-qc/Dashboard.php";
      } else if (text == "verifier_login") {
        window.location.href = "./system_verifier/Dashboard.php";
      } else if (text == "Wrong User Credentials") {
        modalLabel.innerHTML = text
        modalLaunchButton.click()
      }
    }).catch(function(error) {
        // console.error(error);
      })
  })
  $.ajax;
</script>
</body>

</html>