<?php

if(isset($_GET['encrypted_platrom_key_generation']))
{
  $email_id_encrypted = base64_decode($_GET['encrypted_platrom_key_generation']);
  $auth_key = base64_decode($_GET['auth_key']);
  $forgot_type = base64_decode($_GET['forgot_type']);
  $valid_link = base64_decode(@$_GET['valid_link']);
  require_once "../config/config.php";

  $get_connection=new connectdb;
  $db=$get_connection->connect();

  if (mysqli_connect_errno($db)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if($forgot_type == "client_forgot")
  {
    $sql = "SELECT id AS usr_id, forgot_password FROM client WHERE email = '$email_id_encrypted' AND id = '$auth_key' ";  
  }
  if($forgot_type == "admin_forgot")
  {
    $sql = "SELECT email_id, first_name, forgot_password, user_id AS usr_id FROM user_master WHERE email_id = '$email_id_encrypted' AND user_id = '$auth_key' ";  
  }
  if($forgot_type == "applicant_forgot")
  {
    $sql = "SELECT order_id AS usr_id, forgot_password FROM order_master WHERE email_id = '$email_id_encrypted' AND order_id = '$auth_key' ";  
  }

  $result = $db->query($sql);
  if($result->num_rows > 0)
  {
    if($row = $result->fetch_assoc())
    {
      $user_id = $row['usr_id'];
      if($row['forgot_password'] == 0)
      {
        echo '
        <script>
          alert("This link is expired");
          window.location.href="index.php";
        </script>
        ';
      }
    }
  }
  else
  {
    echo '
    <script>
      alert("Invalid Link");
      window.location.href="index.php";
    </script>
    ';
  }
}
else
{
  echo '
  <script>
    alert("Invalid Link");
    window.location.href="index.php";
  </script>
  ';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Change Password</title>
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
                <input type="hidden" id="user_id" value="<?php echo @$user_id; ?>" >
                <p class="tagLine" style="color: orange;">
                  <strong>SPECIALIZED IN BACKGROUND VERIFICATION</strong>
                </p>
              </div>
              <p class="login-card-description">Change Password</p>
              <b><i class="fa fa-user"></i> <?php echo $email_id_encrypted; ?></b>
              <br>
              <br>
              <div class="input-group form-group" style="padding-bottom: 0;">
                <div class="input-group-prepend" style="padding-bottom: 0;">
                  <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" id="new_password" class="form-control" placeholder="Enter Password" />
                <span id="btn_new_password" class="btn_show_password"><i class="fa fa-eye-slash"></i>  </span>    
              </div>
              <div class="input-group form-group" style="padding-bottom: 0;">
                <div class="input-group-prepend" style="padding-bottom: 0;">
                  <span class="input-group-text" style="padding-bottom: 0;"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" id="re_password" class="form-control" placeholder="Confirm Password" />
                <span id="btn_re_password" class="btn_show_password"><i class="fa fa-eye-slash"></i>  </span>    
              </div>
              <br>
              <button onclick="change_password_click()" id="continue_btn" class="btn btn-default login-btn mb-4"> Change Password</button>
              <a href="" class="btn btn-default btn-reset mb-4">Reset</a>
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

    $( "#btn_new_password" ).click(function() {
      if($("#new_password").prop('type') == 'text')
      {
        $("#new_password").prop('type', 'password');
        $('#btn_new_password').html('<i class="fa fa-eye-slash"></i>');
      }
      else
      {
        $("#new_password").prop('type', 'text');
        $('#btn_new_password').html('<i class="fa fa-eye"></i>');
      }
    });

    $( "#btn_re_password" ).click(function() {
      if($("#re_password").prop('type') == 'text')
      {
        $("#re_password").prop('type', 'password');
        $('#btn_re_password').html('<i class="fa fa-eye-slash"></i>');
      }
      else
      {
        $("#re_password").prop('type', 'text');
        $('#btn_re_password').html('<i class="fa fa-eye"></i>');
      }
    });

    function change_password_click()
    {
      let new_password = $('#new_password').val().trim();
      let password_length = $("#new_password").val().trim().length;
      let re_password = $('#re_password').val().trim();
      let user_id = $('#user_id').val();
      let forgot_type = '<?php echo $forgot_type; ?>'
      
      if(new_password == "")
      {
        alert('Please enter password');
        $('#new_password').focus();
      }
      else if(password_length < 12)
      {
        alert('Please enter minimum 12 digit password!')
        $('#new_password').focus();
      }
      else if(re_password == "")
      {
        alert('Please enter password');
        $('#re_password').focus();
      }
      else if(re_password != new_password)
      {
        alert('Please new password and confirm password does not match ');
        $('#new_password').focus();
      }
      else
      {
        var action = 'change_password';
        $('#new_password').prop("disabled", true);
        $('#re_password').prop("disabled", true);
        $("#continue_btn").prop("disabled", true);
        $("#continue_btn").html("<i class='fas fa-spinner fa-spin'></i> Change Password");
        $('#print_result').html('<b style="color:blue;">Please wait while we updating your Password!</b>');
        $.ajax({
          type:'POST',
          url:'./API/Change-Password.php',
          data:{action, new_password, forgot_type, user_id},
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