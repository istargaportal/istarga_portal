<?php
 session_start();



 if(isset($_SESSION['uname']) && isset($_SESSION['password']))
 {
   header("location:Dashboard.php");
 
   
 }
 else
 {
    
  //header("location:index.php");
  //echo "Hello";
 }
 
 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Kodinger" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>
    <style>
    </style>
    <!--Bootsrap 4 CDN-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!--Fontawesome CDN-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css" />

    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="assets/css/IndexDemo.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/indexStyle.css" />
   <script type="text/javascript" src="assets/js/IndexSlideEffects.js"></script>
   <style>
      
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

   </style>

  </head>

  <body id="page">
    <div class="container">
    
      <ul class="cb-slideshow">
        <li><span>Image 01</span></li>
        <li><span>Image 02</span></li>
        <li><span>Image 03</span></li>
        <li><span>Image 04</span></li>
        <li><span>Image 05</span></li>
        <li><span>Image 06</span></li>
    </ul>







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






  <div class="container">
      <div id="LogoAnimation">
        <a class="navbar-brand" href="#">
          <img src="./assets/img/logo.png" width="30%" height="20%" alt="" />
        </a>
        <p class="tagLine" style="color: aqua;">
          <strong>SPECIALIZED IN BACKGROUND VERIFICATION</strong>
        </p>
      </div>
        <!-- login card-->
      <div class="d-flex justify-content-end h-100">
        <div class="card">
          <div class="card-header">
            <div>
              <img
                src="./assets/img/logo.png"
                width="60%"
                height="160%"
                alt=""
              />
            </div>
            <div
              class="tag"
              style="
                position: absolute;

                left: 40%;
                color: antiquewhite;
                top: 10%;
                font-size: 80%;
              "
            >
              <p><strong>CLIENT ERP</strong></p>
            </div>
          </div>
          <div class="card-body" style="padding-bottom: 0;">
            <form id="postform" class="my-login-validation" style="padding-bottom: 0;">
              <div class="input-group form-group" style="padding-bottom: 0;">
                <div class="input-group-prepend" style="padding-bottom: 0;">
                  <span class="input-group-text" style="padding-bottom: 0;"
                    ><i class="fas fa-user"></i
                  ></span>
                </div>
                <input
                style="padding-bottom: 0;"
                  type="email"
                  class="form-control"
                  name="username"
                  id="username"
                  placeholder="Enter Email Id"
                  autocomplete="username"
                  required
                />
              </div>
              <a style="margin-top: 0;" href="forgotUsername.php">Forgot your username ?</a>
            


             
              <div class="input-group form-group" style="margin-top: 4%; padding-bottom: 0;">
                <div class="input-group-prepend"  style="padding-bottom: 0;">
                  <span class="input-group-text"
                    ><i class="fas fa-key"></i
                  ></span>
                </div>
                <input
                style="padding-bottom: 0;"
                  type="password"
                  class="form-control"
                  id="pwd"
                  placeholder="Enter password"
                  autocomplete="current-password"
                  required
                />
              </div>
              <a href="forgotPassword.php">Forgot your password?</a>
              <div class="row align-items-center remember">
                <!-- <input
                  type="checkbox"
                  name="remember"
                  id="remember"
                  class="custom-control-input"
                />Remember Me -->
                <div class="form-check" style=" margin-top: 2% !important;"  >
                  <label class="form-check-label"  style="margin-bottom:14px !important;">Remember
                    <input class="form-check-input" type="checkbox" value="" checked style="cursor: pointer;">
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <input
                  type="submit"
                  value="Login"
                  class="btn float-right login_btn"
                />
              </div>
            </form>
          </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-center"></div>
          </div>
        </div>
      </div>















    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- <script>
      $(document).ready(function () {
        $("body").addClass("lol")
        var urls = [
          "./assets/img/login.jpg",
          "./assets/img/loginc2.jpg",
          "./assets/img/loginc3.jpg",
        ];

        var cout = 1;
        $("body").css("background-image", 'url("' + urls[0] + '")');
        setInterval(function () {
          $("body").css("background-image", 'url("' + urls[cout] + '")');
          cout == urls.length - 1 ? (cout = 0) : cout++;
        }, 5000);
      });
    </script> -->

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    
    
    
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="js/my-login.js"></script>
    <script src="js/index.js"></script>
  <script>
    let modal = document.querySelector(".new-modal #exampleModal")
    let modalOkBtn = document.querySelector(".new-modal #modal-ok-btn")
    let modalLabel = document.querySelector(".new-modal #exampleModalLabel")
  
    let modalLaunchButton = document.querySelector(".new-modal .launch")
    let modalCloseButton = document.querySelector(".new-modal .close")
    // modalLaunchButton.click()
    // console.log(modalLaunchButton)
    // alert("ok")
    const launchModal = () => {
  
    }
  </script>
  </body>


<?php 
		if(isset($_GET['msg']) && $_GET['msg'] == "invalid"){
			?>
        <script>
          // alert('Invalid username/password');
          modalLabel.innerHTML = "Invalid username/password"
          modalLaunchButton.click()

          // deleteModalLaunchButton.click()
        </script>
			<?php
		}
	
	?>
<?php 

		if(isset($_GET['msg']) && $_GET['msg'] == "Success"){
			?>
        <script>
          // alert('Successfully Logout');
          modalLabel.innerHTML = "Successfully Logout"
          modalLaunchButton.click()

        </script>
			<?php
		}
	
	?>  

</html>