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
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Applicant Data
  </title>
  <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
    />
    <!-- CSS Files -->
    <link
      href="assets/css/material-dashboard.css?v=2.1.0"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/3aaaecc22c.js"
      crossorigin="anonymous"
    ></script>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"
    />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

   <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">
  <!--pop ups-->
  <link rel="stylesheet" href="popup.css">
</head>

<body class="dark-edition">
<div class="wrapper">
      <div
        class="sidebar"
        data-color="purple"
        data-background-color="black"
        data-image="assets/img/sidebar-2.jpg"
      >
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"> <a class="navbar-brand" href="#">
      <img src="assets/img/logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
      </a></div>
        <!--Side Bar-->
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="./adminDashboard_sidebar.php">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#client" class="nav-link" data-toggle="collapse"
                ><i class="material-icons">person</i>
                <p>Client</p></a
              >
              <div class="collapse" id="client">
                <ul class="list-unstyled nav">
                  <li class="nav-item">
                    <a class="nav-link" name href="./addClient.php"
                      >Add Client</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./modifyClient.php"
                    >Modify Client</a >
                    <li class="nav-item">                     
                        <a class="nav-link" href="./assignService.php">Assign Services</a>
                      </li> 
                      <li class="nav-item">
                        <a class="nav-link" href="./LOB.php">LOB</a>
                      </li> 
                      <li class="nav-item">
                        <a class="nav-link" href="./createPackage.php">Assign Package</a>
                     </li> 
                </ul>
              </div>
            </li>
            <li class="navbar-item">
              <a href="#services" class="nav-link" data-toggle="collapse" >
                <i class="material-icons">supervisor_account</i>
                <p>Services</p></a>
              <div class="collapse" id="services">
                <ul class="list-unstyled nav">
                  <li class="nav-item">
                    <a class="nav-link" name href="./serviceType.php"
                      >Add Service Type</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./createService.php">Add Services</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="./service.php
                    "
                      >Modify Service</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./package.php"
                      >Create/Modilfy Package </a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./#"
                      >Auto SLA </a
                    >
                  </li>

                </ul>
              </div>
            </li>
            <!-- <i class="material-icons">bubble_chart</i> -->
             <li class="navbar-item">
              <a href="#master" class="nav-link" data-toggle="collapse">
                <i class="material-icons">library_books</i>
                <p>Master</p></a > 

                <div class="collapse" id="master">
                  <ul class="list-unstyled nav">
                    <li class="nav-item">
                      <a class="nav-link" name href="./mandatoryDocuments.php"
                        >Mandatory Documents</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" name href="./standardMacro.php"
                        >Standard Macro</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" name href="./#"
                        >Auto SLA</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" name href="./reportColor.php"
                        >Report Color Code</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" name href="./reportConfig.php"
                        >Report Configuration Master</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" name href="./#"
                        >Insufficient Emial Triggers</a
                      >
                    </li>
                  </ul>
                </div>             
            </li>
            <li class="navbar-item">
              <a href="#user" class="nav-link" data-toggle="collapse"
                ><i class="material-icons">account_circle</i>
                <p>User</p></a >
                <div class="collapse" id="user">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./AddEmployeeOffQc.php">ADD/OF/QC</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./viewAllOFQC.php">View All OF QC</a>
                </li>
              </ul>
            </div>
            </li>
            <li class="navbar-item">
            <a href="#calendar" class="nav-link" data-toggle="collapse"><i class="material-icons">calendar_today</i>
              <p>calendar</p>
            </a>
            <div class="collapse" id="calendar">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./ViewAttendence.php">View calendar</a>
                </li>
              </ul>
            </div>
          </li>
          </ul>
        </div>
      <!--Side Bar End-->
      </div>
    <div class="main-panel">
       <!--toggle button-->
       <div class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
        <input type="checkbox" id="switch" name="theme">
        <label id="toggleButton" for="switch">Toggle</label>
      </div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a style="color: white;" class="navbar-brand" href="javascript:void(0)">Applicant Date Entry</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
         <!--end-->
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 style="color: white;" class="card-title">Applicant Data</h4>
                </div>
                <div class="card-body">
                  <form id="ajax" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control" name="First Name" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="Middle Name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="Last Name" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alias Name</label>
                          <input name="Alias Name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="Alias Middle Name" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="Alias Last Name" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Enter Email ID</label>
                          <input name="Enter Email ID" type="text" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Internal Reference ID</label>
                          <input name="Internal Reference ID" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Additional Internal Reference ID</label>
                          <input name="Internal Reference ID" type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                     
                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Joining Location</label>
                          <input name="Joining Location" type="text" class="form-control" required> 
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Current Location</label>
                          <input name="Joining Location" type="text" class="form-control" required> 
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label style="font-size:12px">Joining Date</label>
                          <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" required> 
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label style="margin-top:8%; font-size: 14px;">Select LOB/Vertical/Division</label>                       
                          <select style="margin-top: 15%;" class="browser-default custom-select" type="select" name="lob_type" id="lob_type"
                            style="color:#202940;margin-top:9%;"> 
                            <option value="">LOB</option>
                            <option value="">Vertical</option>
                            <option value="">Division</option>
                          </select>


                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top:2%">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label  class="bmd-label-floating">Additional Comments</label>
                            <input id="user_id" name="user_id" type="hidden" value="">
                            <textarea name='Additional Comments' class="form-control" rows="2"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Package Details-->

                    <div class="card-header card-header-primary" style="margin-top:3%;">
                      <h4 class="card-title" style="color:white; margin: 0; padding: 0;">Verified Country</h4>
                    </div>


                    <div class="row" style="margin-left:1%;margin-top:3%; margin-bottom: 4%;">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="font-size: 14px;">Selected Service</label>
                          <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="locality-dropdown" name="locality-dropdown" onchange="getpackage(this.value)"
                            style="color:#202940;" required>
                            <option value="">India</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                           <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="package-dropdown" name="package-dropdown" style="color:#202940;">
                            <option>Select Package</option>
                        </select>  
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                           <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="package-dropdown" name="package-dropdown" style="color:#202940;">
                            <option>Select Package</option>
                        </select>  
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                           <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="package-dropdown" name="package-dropdown" style="color:#202940;">
                            <option>Select Package</option>
                        </select>  
                        </div>
                      </div>
                     </div>

                    <!--upload document-->
                    <div class="card-header card-header-primary" style="margin-top:3%;">
                      <h4 class="card-title " style="color:white;margin: 0; padding: 0;">Upload Documents</h4>
                      </div>

                        <div class="row"style="margin-left:1%;margin-top:2%;">
                        <div class="col-md-4">
                           <h5 class="blackcolor docUpload">Upload Document Here</h5>
                              <div class="row"style="margin-left:1%;">
                                <p class="blackcolor docUpload" style="margin-top:2.7%;">Document 1</p>   
                                 <div class="form-group"style="margin-left:2%;">
                                  <label class="blackcolor border" for="exampleFormControlFile1"style="border: 1px solid white; cursor: pointer ;padding:3px;">Upload File</label>
                                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                               </div>

                         <div class="row"style="margin-left:1%;">
                            <p class=" docUpload docUpload" style="margin-top:2.7%;">Choose File</p>   
                             <div class="form-group"style="margin-left:2%;">
                               <label class="blackcolor border" for="exampleFormControlFile1"style="border: 1px solid white;padding:3px; cursor: pointer;">Upload File</label>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                      </div>

                      <!--File Format Part of Upload Document Starts Here-->

                      <div class="col-md-4">
                              <h5 class="blackcolor docUpload">File Formats</h5>           
                              <div class="row blackcolor"style="margin-left:2%;margin-top:2%;">
                              <i class="fa fa-file-word-o blackcolor"  style="font-size:40px; color: green;"></i>
                              <i class="fa fa-file-excel-o blackcolor" style="font-size:40px;margin-left:2%; color: crimson;"></i>
                              <i class="fa fa-file-powerpoint-o blackcolor" style="font-size:40px;margin-left:2%; color: purple;"></i>
                       </div>
   
                     <div class="row"style="margin-left:2%;margin-top:5%;">
                         <i class="fa fa-file-pdf-o blackcolor" style="font-size:40px; color: orangered;"></i>
                     </div>
                   </div>
                </div>
                  
                 <div class="row justify-content-end" style="margin-right:1%">
                   <button id="previewbtn" type="submit" class="btn btn-primary pull-left">Preview</button>
                   <button type="submit" style="margin-left:1%" class="btn btn-primary pull-left">Reset</button>
                   <button type="submit" style="margin-left:1%" class="btn btn-primary pull-left">Home</button>
                </div>
              </form>
            </div>
             <!--Card body close-->
              </div>
            </div>
          </div>
        </div>
      </div>
            <script>
              let div=document.querySelector(".togglediv");
              let btn=document.getElementById("previewbtn");
              let btn2=document.getElementById("cancel")
              div.style.display="none"
              
              btn.addEventListener("click" , ()=>{
                if(div.style.display === "block"){
                  div.style.display="none"
                }
                else{
                  div.style.display="block";
                }
              })

              btn2.addEventListener("click", ()=>{
                div.style.display="none"
              })
          
  
          </script>

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

  <script>


    var checkbox = document.querySelector('input[name=theme]');

checkbox.addEventListener('change', function() {
    if(this.checked) {
        trans()
        document.documentElement.setAttribute('data-theme', 'dark')
    } else {
        trans()
        document.documentElement.setAttribute('data-theme', 'light')
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
     updateList = function() {
    var input = document.getElementById('filexzc');
    var output = document.getElementById('fileList');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
        children += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML = '<ul>'+children+'</ul>';
}


 </script>
</html>