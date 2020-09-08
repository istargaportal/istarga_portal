<?php 
if(isset($_GET['forgot_type']))
{
  $forgot_type = base64_decode($_GET['forgot_type']);
  if($forgot_type == "client_forgot")
  {
    $cancel_link = '../system-client/Index.php';
  }
  if($forgot_type == "admin_forgot")
  {
    $cancel_link = 'Index.php';
  }
  if($forgot_type == "applicant_forgot")
  {
    $cancel_link = '../system-applicant/Index.php';
  }
}
else
{
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Forget Password</title>
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
    /*background: url("../images/admin.jpg");*/
    background-size: cover;
    background-repeat: no-repeat;
    box-shadow: inset 50px 50px 300px #444, inset -10px -10px 100px #a3a3a3;
  }
  .form-control{
    padding: 5px 10px !important;
  }
  .login_panel {
    background: linear-gradient(rgba(160,160,160,0.2),rgba(10,10,10,0.8)) !important;
    background: #fff !important;
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
      <div class="row no-gutters">
        <div class="col-md-4"><br></div>
        <div class="col-md-4">
          <div class="login_panel">
            <div class="card-body">
              <div class="brand-wrapper" style="border-bottom: solid 1px #000;">
                <img src="./assets/images/Istarga_logo.jpg" alt="logo" class="logo" />
                <p class="tagLine" style="color: orange;">
                  <strong>SPECIALIZED IN BACKGROUND VERIFICATION</strong>
                </p>
              </div>
              <p class="login-card-description">FORGOT PASSWORD</p>
              <span>To reset your password, enter your email address and we will send you an email with instructions</span>
              <br><br>
              <div class="input-group form-group" style="padding-bottom: 0;">
                <div class="input-group-prepend" style="padding-bottom: 0;">
                  <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" id="email_id" class="form-control" placeholder="Email address" />
              </div>
              <br>
              <button onclick="forgot_password_click()" id="continue_btn" class="btn btn-default login-btn mb-4"> Continue</button>
              <a href="<?php echo @$cancel_link; ?>" class="btn btn-default btn-reset mb-4">Cancel</a>
              <div id="print_result"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function forgot_password_click()
    {
      let email_id = $('#email_id').val().trim();
      let forgot_type = '<?php echo $forgot_type; ?>'
      if(email_id == "")
      {
        alert('Please enter email id');
        $('#email_id').focus();
      }
      else
      {
        var action = 'forgot_password';
        $('#email_id').prop("disabled", true);
        $("#continue_btn").prop("disabled", true);
        $("#continue_btn").html("<i class='fas fa-spinner fa-spin'></i> Continue");
        $('#print_result').html('<b style="color:blue;">Please wait while we sending you an Email <i class="fa fa-envelope"></i></b>');
        $.ajax({
          type:'POST',
          url:'./API/Forgot-Password.php',
          data:{action, email_id, forgot_type},
          success:function(html) {
            $("#email_id").prop("disabled", false);
            $("#continue_btn").prop("disabled", false);
            $("#continue_btn").html("Continue");
            $('#print_result').html(html);
          }
        });
      }
    }
  </script>
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


</body>

</html>