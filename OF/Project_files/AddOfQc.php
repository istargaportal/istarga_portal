<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Add OF/QC
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="../CSS-file-icons-master/build/css-file-icons.css" rel="stylesheet" />
  <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="CreateOrder.css">


<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"> <a class="navbar-brand" href="#">
          <img src="assets\img\logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
        </a></div>
       <!--Side Bar-->
       <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="./AddOfQc.php">
              <p>Add Of QC</p></a
            >
          <li class="navbar-item ">
            <a class="nav-link" href="./viewALLOFQC.php">
              <p>View All</p></a>
          </li>
        </ul>
      </div>
    <!--Side Bar End-->
    </div>
    <div class="main-panel">
      <!--toggle button-->
      <div class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
        <input name="name" type="checkbox" id="switch" name="theme">
        <label id="toggleButton" for="switch">Toggle</label>
      </div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a style="color: white;" class="navbar-brand" href="javascript:void(0)">ADD OF/QC</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                  <div class="ripple-container"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./index.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row" style="margin-top: 1%;">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">ADD OF/QC</h4>
                </div>
                <div class="card-body">
                  <form id="ajax" enctype="multipart/form-data">
                    <div class="row" style="margin-top: 1%;">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control" name="First Name" data-name="First Name" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="Middle Name" data-name="Middle Name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="Last Name" data-name="Last Name" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label >DOB</label>
                              <input type="date" name="Joining date" data-name="Joining date" id="dateofbirth" class="form-control" required>
                            </div>
                          </div>
                      <!-- <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="Alias Middle Name" data-name="Alias Middle Name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="Alias Last Name" data-name="Alias Last Name" type="text" class="form-control">
                        </div>
                      </div> -->
                    </div>
                    <div class="row" style="margin-top: 1%;">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Permanent Address</label>
                          <input name="Permanent Address"  type="text" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Temparary Address</label>
                          <input name="Temparary Addres"  type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input name="State1"  type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input name="City1"  type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input name="State2"  type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input name="City2"  type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-between" style="margin-top: 1%;">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-size: 13px;" class="bmd-label-floating">Country</label>
                            <select style="margin-top: 1%;" class="browser-default custom-select" type="select"
                              id="Country1" name="Country1" >
                              <option>Select Country</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-4" style="margin-right: 17%;">
                        <div class="form-group">
                            <label style="font-size: 13px;" class="bmd-label-floating">Country</label>
                            <select style="margin-top: 1%;" class="browser-default custom-select" type="select"
                              id="Country2" name="Country2">
                              <option>Select Country</option>
                            </select>
                          </div>
                      </div>
                    </div>
                   
                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" name="Email" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contact</label>
                            <input name="Contacte"  type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alternate Contact</label>
                            <input name="Alternate Contact"  type="text" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="row" style="margin-top: 1%;">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">PAN Number</label>
                            <input type="text" class="form-control" name="PAN Number" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Adhar Number</label>
                            <input name="Adhar Number"  type="text" class="form-control">
                          </div>
                        </div>                     
                      </div>                             
                    </div>

                    <!--Bank Details-->
                    <div class="card-header card-header-primary" style="margin-top:1%;">
                      <h4 class="card-title" style="color:white;">Bank Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: 1%;">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Bank Name</label>
                              <input type="text" class="form-control" name="Bank Name"  required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Account Number</label>
                              <input name="Account Number"  type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                    </div>
                  <!--Bank Details ends-->

                           
                    <!--Position  Details-->
                    <div class="card-header card-header-primary" style="margin-top:5%; margin-bottom: 2%;">
                      <h4 class="card-title" style="color:white;">Position</h4>
                    </div>
                    <div class="card-body">
                          <div class="row" style="margin-top: 1%;">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Position</label>
                                <input type="text" class="form-control" name="Position"  required>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label style="font-size: 13px;">DOJ</label>
                                <input name="Account Number"  type="date" class="form-control">
                              </div>
                            </div>
                          </div>
                      </div>


                  

                    <div class="row justify-content-end" style="margin-right:2% ; margin-top:3%; margin-bottom:2%">

                      <button type="submit" id="" class="btn btn-primary pull-left"
                        style="margin-left:4%;">Save</button>
                      <div class="clearfix"></div>

                      <button type="submit" class="btn btn-primary pull-left" style="margin-left:2%;">Ok</button>
                      <div class="clearfix"></div>

                      <button type="submit" class="btn btn-primary pull-left" style="margin-left:2%;">Cancel</button>
                      <div class="clearfix"></div>

                    </div>

                    <!--Upload Document Closes Here-->




                    <!--<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>-->
                  </form>
                </div>


              </div>
            </div>

            <!--<footer class="footer">
              <div class="container-fluid">
                <nav class="float-left">
                  <ul>
                    <li>
                      <a href="https://www.creative-tim.com">
                        Creative Tim
                      </a>
                    </li>
                    <li>
                      <a href="https://creative-tim.com/presentation">
                        About Us
                      </a>
                    </li>
                    <li>
                      <a href="http://blog.creative-tim.com">
                        Blog
                      </a>
                    </li>
                    <li>
                      <a href="https://www.creative-tim.com/license">
                        Licenses
                      </a>
                    </li>
                  </ul>
                </nav>
                <div class="copyright float-right" id="date">
                  , made with <i class="material-icons">favorite</i> by
                  <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
              </div>
            </footer>-->
            <script>
              const x = new Date().getFullYear();
              let date = document.getElementById('date');
              date.innerHTML = '&copy; ' + x + date.innerHTML;
            </script>
          </div>
        </div>
        <!--<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard-dark" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> 
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.php" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard/tree/dark-edition" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>-->
        <!--mode changing-->
        <script>
          let darkmode = localStorage.getItem("darkmode");
          const darkmodetoggle = document.querySelector('input[name=theme]');

          const enabledarkmode = () => {
            document.documentElement.setAttribute('data-theme', 'dark')
            localStorage.setItem("darkmode", "enabled");
          }


          const disabledarkmode = () => {
            document.documentElement.setAttribute('data-theme', 'light')
            localStorage.setItem("darkmode", null);
          }


          if (darkmode === "enabled") {
            enabledarkmode();
          }


          darkmodetoggle.addEventListener("change", () => {
            darkmode = localStorage.getItem("darkmode");
            if (darkmode !== "enabled") {
              trans()
              enabledarkmode();
            } else {
              trans()
              disabledarkmode();
            }
          })

          let trans = () => {
            document.documentElement.classList.add('transition');
            window.setTimeout(() => {
              document.documentElement.classList.remove('transition');
            }, 1000)
          }
        </script>
        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="https://unpkg.com/default-passive-events"></script>
        <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chartist JS -->
        <script src="assets/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="assets/demo/demo.js"></script>
        <script src="js/createorder12.js">




        </script>
</body>
<script>
  updateList = function () {
    var input = document.getElementById('filexzc');
    var output = document.getElementById('fileList');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
      children += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML = '<ul>' + children + '</ul>';
  }
</script>

</html>