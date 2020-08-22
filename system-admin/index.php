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
</head>
<style>
  body {
    background: url("assets/images/img5.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    box-shadow: inset 50px 50px 300px #000000, inset -10px -10px 100px #000000;

  }
</style>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <!-- <img src="assets/images/login.jpg" alt="login" class="login-card-img"> -->
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
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/Istarga_logo.jpg" alt="logo" class="logo" />
              </div>
              <p class="login-card-description">Sign in</p>
              <form id="ajax">
                <label class="container_checkbox">Admin
                  <input type="radio" id="Admin" name="user-type" value="Admin" />
                  <span class="checkmark"></span>
                </label>

                <label class="container_checkbox">Employee
                  <input type="radio" id="Employee" name="user-type" value="Employee" />
                  <span class="checkmark"></span>
                </label>
                <div class="form-group">
                  <label for="email" class="sr-only">Username</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email address" />
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="***********" />
                </div>
                <!--<input
                    name="login"
                    id="login"
                    class="btn btn-block login-btn mb-4"
                    type="button"
                    value="Login"
                  />-->
                <button type='submit' class="btn btn-block login-btn mb-4">Login</button>
              </form>
              <a href="#!" class="forgot-password-link">Forgot password?</a>
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
          window.location.href = "./employee_qc/Dashboard.php";
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