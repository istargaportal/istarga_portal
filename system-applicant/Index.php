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
    <style>
      body{
        background: url("assets/images/image0.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        box-shadow: inset 50px 50px 300px #000000, inset -10px -10px 100px #000000;
      }
    </style>
  </head>
  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-7">
              <!-- <img src="assets/images/login.jpg" alt="login" class="login-card-img"> -->
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
            </div>
            <div class="col-md-5">
              <div class="card-body">
                <div class="brand-wrapper">
                  <img
                    src="assets/images/Istarga_logo.jpg"
                    alt="logo"
                    class="logo"
                  />
                </div>
                <p class="login-card-description">Sign in</p>
                <form action="#!">
                  <div class="form-group">
                    <label for="email" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username"
                    />
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********"
                    />
                  </div>
                  <a href="javascript:login_click()" class="btn btn-block login-btn mb-4">Login</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>