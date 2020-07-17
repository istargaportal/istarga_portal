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
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    View Orders
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/3aaaecc22c.js" crossorigin="anonymous"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

  <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="dark-edition">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
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
            <a href="#client" class="nav-link" data-toggle="collapse"><i class="material-icons">person</i>
              <p>Client</p>
            </a>
            <div class="collapse" id="client">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./addClient.php">Add Client</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./modifyClient.php">Modify Client</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="./vieworder2.php">View Order</a>
                </li>
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
            <a href="#services" class="nav-link" data-toggle="collapse">
              <i class="material-icons">supervisor_account</i>
              <p>Services</p>
            </a>
            <div class="collapse" id="services">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./serviceType.php">Add Service Type</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./createService.php">Add Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./service.php
                    ">Modify Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./package.php">Create/Modilfy Package </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./#">Auto SLA </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="./vieworder2.php">View Order</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <i class="material-icons">bubble_chart</i> -->
          <li class="navbar-item">
            <a href="#master" class="nav-link" data-toggle="collapse">
              <i class="material-icons">library_books</i>
              <p>Master</p>
            </a>

            <div class="collapse" id="master">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./mandatoryDocuments.php">Mandatory Documents</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./standardMacro.php">Standard Macro</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./#">Auto SLA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./reportColor.php">Report Color Code</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./reportConfig.php">Report Configuration Master</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./#">Insufficient Emial Triggers</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="navbar-item">
            <a href="#user" class="nav-link" data-toggle="collapse"><i class="material-icons">account_circle</i>
              <p>User</p>
            </a>
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
            <a href="#settings" class="nav-link" data-toggle="collapse"><i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
            <div class="collapse" id="settings">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./settings1.php">Mandatory Fields Manager</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./settings2.php">Email Trigger Settings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./settings3.php">Servicewise Document</a>
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



    <div class="main-panel mainP">
      <!--toggle button-->
      <div class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
        <input type="checkbox" id="switch" name="theme">
        <label id="toggleButton" for="switch">Toggle</label>
      </div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example" style="padding: 0; margin: 0;">
        <div class="container-fluid">
          <div class="navbar-wrapper" style="height: 70px;">
            <a class="navbar-brand" href="javascript:void(0)" style="color: white;">View Order</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input
                  type="text"
                  value=""
                  class="form-control"
                  placeholder="Search..."
                />
                <button
                  type="submit"
                  class="btn btn-default btn-round btn-just-icon"
                >
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i style="color: white;" class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="color: white;" class="material-icons">notifications</i>
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
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="color: white;" class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                  <div class="ripple-container"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="MyProfile.php">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="API/db_logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <form id="vieworder" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <!--                         
                    <div class="form-group"style="margin-top:12%;">
                    <label class="bmd-label-floating"style="color:white;font-size:15px;">Search By</label>
                    <select class="browser-default custom-select" size="14" type="select"name="searchBy" id="Service"style="color:#202940;margin-top:3%;" onchange="myFunction(event)">
                    <option style="margin-top:3.2%;">First Name Last Name</option>
                    <option style="margin-top:3.2%;">Internal Reference Id</option>
                    <option style="margin-top:3.2%;">Joing Location</option>
                   
                    </select>
                          
                    </div> -->

                        <div class="form-group" style="margin-top:9%;">
                          <label  for="Service" >Search By</label>
                          <select name="Service" id="Service" class="form-control optColor" style="margin-top:3%; color: black;" id="exampleFormControlSelect1" onchange="myFunction(event)">
                            <option value="NULL_OPT" selected="" class=" bg-secondary textlight">---Select Search
                              Criteria---</option>
                            <option value="First_Name_Last_Name" class=" bg-secondary textlight">First Name Last Name
                            </option>
                            <option value="internal_reference_id" class=" bg-secondary textlight">Internal Reference Id
                            </option>
                            <option value="Joing_Location" class=" bg-secondary textlight">Joing Location</option>
                            <option value="Case_Ref_ID" class=" bg-secondary textlight">Case Ref ID</option>
                            <option value="order_creation_date_time" class=" bg-secondary textlight">Order Creation
                              Date</option>
                            <option value="Order_Completion_Date" class=" bg-secondary textlight">Order Completion Date
                            </option>
                            <option value="email_id" class=" bg-secondary textlight">Email ID</option>
                            <option value="Order_Status" class=" bg-secondary textlight">Order Status</option>
                          </select>
                        </div>

                        <div class="form-group search-client" style="margin-top:9%;">
                          <label for="clientName">Client Name</label>
                          <div class="search active">
                            <input name="clientName" id="clientName" type="text" class="form-control input" autocomplete="off" >
                            <div class="client-select"></div>
                          </div>
                          <select style="opacity: 0; pointer-events: none;" name="clientName" id="clientName" class="form-control optColor" style="margin-top:3%;" id="exampleFormControlSelect1" onchange="myFunction(event)">
                            <option value="NULL_OPT" selected="" class=" bg-secondary text-light">---Select Search
                              Criteria---</option>
                          </select>
                        </div>

                      </div>

                      <!--Ist Row Closes Here-->

                      <div class="col-md-4" style="margin-top:2.5%;">

                        <div id="hide">
                          <div class="form-group">
                            <label>Search Criteria</label>
                            <input type="text" name="SearchCriteria" style="display:none;" id="SearchCriteria" class="form-control" placeholder="Enter As Per Search Criteria" >
                          </div>
                        </div>

                        <div class="card" id="DateOne" style="background-color:#1A2035;padding:2%;display:none;">

                          <div class="form-group">
                            <label class="bmd-label-static"></label>
                            <input id="user_id" name="user_id" type="hidden" value="<?php echo $unsa; ?>">
                            <input type="date" name="OrderCreation" id="dateofbirth" class="form-control">
                          </div>
                        </div>


                      </div>

                      <!--2nd Row closes Here-->


                      <div class="col-md-4">

                        <div class="card" id="order" value="" style="background-color:#1A2035;padding:4%;display:none;">
                          <div class="card" id="DateOne" style="background-color:#1A2035;padding:2%;display:none;">

                            <div class="form-group">
                              <label class="bmd-label-static"></label>

                              <input type="date" name="OrderCreation" id="dateofbirth" class="form-control">
                            </div>
                          </div>


                          <div class="form-group" style="margin-top:6%;">
                            <label>Order Status</label>
                            <select name="OrderStatus" onchange="showCustomer()" id="OrderStatus" class="form-control" style="margin-top:3%;" id="exampleFormControlSelect1">

                              <option value="Education" class=" bg-secondary text-light">Education</option>
                              <option value="Criminal" class=" bg-secondary text-light">Criminal</option>
                              <option value="Data Base" class=" bg-secondary text-light">Data Base</option>
                              <option value="Employment" class=" bg-secondary text-light">Employment</option>
                              <option value="Address" class=" bg-secondary text-light">Address</option>
                              <option value="Civil Litigation" class=" bg-secondary text-light">Civil Litigation
                              </option>
                            </select>

                          </div>

                      </div>

                    </div>

                    <!--Third Row- closes Here-->

                </div>
                <!--Main Row Closes Here-->

                <!-- <button type="submit" class="btn btn-primary pull-right" onclick="showCustomer()">Search</button>-->

              </div>
              </form>
            </div>
          </div>
        </div>

        <!--Horizontal Line Part Starts Here-->

        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Order Details</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="table">
                <table class="table table-hover" style="margin-top: 4%;overflow-x: auto; white-space: nowrap;">
                  <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important; ">
                    <th>
                      Sr. No
                    </th>
                    <th>
                      Client Name
                    </th>
                    <th>
                      First Name & last Name
                    </th>
                    <th>
                      Internal Reference Id
                    </th>
                    <th>
                      Email id
                    </th>
                    <th>
                      Assign to
                    </th>
                    <th>
                      Order Creation Date Time
                    </th>
                    <th>
                      Order Completion Date
                    </th>
                    <th>
                      Order status
                    </th>
                    <th>
                      Actions
                    </th>
                  </thead>
                  <tbody id="table-body">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--Table closes Here-->



          <script>
            const x = new Date().getFullYear();
            let date = document.getElementById('date');
            date.innerHTML = '&copy; ' + x + date.innerHTML;
          </script>
        </div>
      </div>
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
  <!--mode change end-->
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
      <script src="vieworder2.js"></script>
      <script>
        function test() { 
          var dob = document.getElementById("dateofbirth");
          console.log(dob.value + "value");
        }

        //this is a sample data




        // thilm is 

        // function showCustomer(){
        // var e = document.getElementById("Service");
        // var strUser = e.options[e.selectedIndex].value;
        // var val2 = document.getElementById("SearchCriteria");
        // var val = val2.value;
        // try{
        // var dob2 = document.getElementById("dateofbirth");var dob = dob2.value;
        // }catch(err) {var dob="";}
        // try{
        // var opt2 = document.getElementById("OrderStatus");var opt = opt2.options[opt2.selectedIndex].value;
        // }catch(err) {var opt="";}
        //       $.post("API/ClientViewtable.php",
        //     {
        //       Service: strUser,
        //       option: val,
        //       dob: dob,
        //       opt: opt
        //     },
        //     function(data,status){
        //         $("#table").html(data);
        //     document.getElementById("table").innerHTML = data;
        //     console.log("r"+data);
        //     //  alert("Data: " + data + "\nStatus: " + status);
        //     });
        // }
      </script>
      <script>
        /*On Select Value Click */

        function myFunction(e) {

          var color = document.getElementById("Service").selectedIndex;
          console.log(color)
          if (color == 0) {


            // document.getElementById("SearchCriteria").value = e. target.value;
            document.getElementById("hide").style.display = "none";
            document.getElementById("SearchCriteria").style.display = "none";
            document.getElementById("DateOne").style.display = "none"
            document.getElementById("order").style.display = "none";

          }
          if (color == 1) {


            // document.getElementById("SearchCriteria").value = e.target.value;  
            document.getElementById("hide").style.display = "block";
            document.getElementById("SearchCriteria").style.display = "block";
            document.getElementById("DateOne").style.display = "none"
            document.getElementById("order").style.display = "none";

          } else if (color == 2) {

            // document.getElementById("SearchCriteria").value = e.target.value; 
            document.getElementById("hide").style.display = "block";
            document.getElementById("SearchCriteria").style.display = "block";
            document.getElementById("DateOne").style.display = "none"
            document.getElementById("order").style.display = "none";
          } else if (color == 3) {

            // document.getElementById("SearchCriteria").value = e.target.value;  
            document.getElementById("hide").style.display = "block";
            document.getElementById("SearchCriteria").style.display = "block";
            document.getElementById("DateOne").style.display = "none"
            document.getElementById("order").style.display = "none";
          } else if (color == 4) {

            // document.getElementById("SearchCriteria").value = e.target.value;
            document.getElementById("hide").style.display = "block";
            document.getElementById("SearchCriteria").style.display = "block";
            document.getElementById("DateOne").style.display = "none"
            document.getElementById("order").style.display = "none";
          } else if (color == 5) {
            // document.getElementById("SearchCriteria").value = e.target.value;  
            document.getElementById("SearchCriteria").style.display = "none";
            document.getElementById("hide").style.display = "none";
            document.getElementById("DateOne").style.display = "block";
            document.getElementById("order").style.display = "none";
          } else if (color == 6) {
            // document.getElementById("SearchCriteria").value = e.target.value;  
            document.getElementById("SearchCriteria").style.display = "none";
            document.getElementById("DateOne").style.display = "block";
            document.getElementById("hide").style.display = "none";
            document.getElementById("order").style.display = "none";
          } else if (color == 7) {

            // document.getElementById("SearchCriteria").value = e.target.value;
            document.getElementById("hide").style.display = "block";
            document.getElementById("SearchCriteria").style.display = "block";
            document.getElementById("DateOne").style.display = "none"
            document.getElementById("order").style.display = "none";

          } else if (color == 8) {
            // document.getElementById("SearchCriteria").value = e.target.value;
            document.getElementById("SearchCriteria").style.display = "none";
            document.getElementById("hide").style.display = "none";
            document.getElementById("order").style.display = "block";
            document.getElementById("DateOne").style.display = "none"

          }


        }

        /*Form Submission */

        //XHR AJAX for form data submit
        const form = document.getElementById("vieworder");
        form.addEventListener("submit", function(e) {
          e.preventDefault();
          let formData = new FormData(document.forms.form);
          let data = {};
          for (let entry of formData.entries()) {
            data[entry[0]] = entry[1];
          }
          //to log the data object on the console
          console.log(JSON.stringify(data));
          let jsonData = JSON.stringify(data);
          //change the /submit url to your requirment to divert it to that file
          xhr.open("POST", "/submit");
          xhr.setRequestHeader("Content-type", "application/json; charset=utf-8");
          xhr.send(jsonData);
        });

        /*On Click of ClientBulkOrder*/

        $(document).ready(function() {
          $('#Client').click(function() {

            $('#card1').toggle("slide");


          });

        });



        $(document).ready(function() {
          $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function(event) {
              // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
              if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                  event.stopPropagation();
                } else if (window.event) {
                  window.event.cancelBubble = true;
                }
              }
            });

            $('.fixed-plugin .active-color span').click(function() {
              $full_page_background = $('.full-page-background');

              $(this).siblings().removeClass('active');
              $(this).addClass('active');

              var new_color = $(this).data('color');

              if ($sidebar.length != 0) {
                $sidebar.attr('data-color', new_color);
              }

              if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
              }

              if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-color', new_color);
              }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
              $(this).siblings().removeClass('active');
              $(this).addClass('active');

              var new_color = $(this).data('background-color');

              if ($sidebar.length != 0) {
                $sidebar.attr('data-background-color', new_color);
              }
            });

            $('.fixed-plugin .img-holder').click(function() {
              $full_page_background = $('.full-page-background');

              $(this).parent('li').siblings().removeClass('active');
              $(this).parent('li').addClass('active');


              var new_image = $(this).find("img").attr('src');

              if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length !=
                0) {
                $sidebar_img_container.fadeOut('fast', function() {
                  $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                  $sidebar_img_container.fadeIn('fast');
                });
              }

              if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length !=
                0) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data(
                  'src');

                $full_page_background.fadeOut('fast', function() {
                  $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                  $full_page_background.fadeIn('fast');
                });
              }

              if ($('.switch-sidebar-image input:checked').length == 0) {
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data(
                  'src');

                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              }

              if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
              }
            });

            $('.switch-sidebar-image input').change(function() {
              $full_page_background = $('.full-page-background');

              $input = $(this);

              if ($input.is(':checked')) {
                if ($sidebar_img_container.length != 0) {
                  $sidebar_img_container.fadeIn('fast');
                  $sidebar.attr('data-image', '#');
                }

                if ($full_page_background.length != 0) {
                  $full_page_background.fadeIn('fast');
                  $full_page.attr('data-image', '#');
                }

                background_image = true;
              } else {
                if ($sidebar_img_container.length != 0) {
                  $sidebar.removeAttr('data-image');
                  $sidebar_img_container.fadeOut('fast');
                }

                if ($full_page_background.length != 0) {
                  $full_page.removeAttr('data-image', '#');
                  $full_page_background.fadeOut('fast');
                }

                background_image = false;
              }
            });

            $('.switch-sidebar-mini input').change(function() {
              $body = $('body');

              $input = $(this);

              if (md.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                md.misc.sidebar_mini_active = false;

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

              } else {

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                setTimeout(function() {
                  $('body').addClass('sidebar-mini');

                  md.misc.sidebar_mini_active = true;
                }, 300);
              }

              // we simulate the window Resize so the charts will get updated in realtime.
              var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
              }, 180);

              // we stop the simulation of Window Resize after the animations are completed
              setTimeout(function() {
                clearInterval(simulateWindowResize);
              }, 1000);

            });
          });
        });

        /*Time Picker */
      </script>
      <script>
        showCustomer();
      </script>
</body>

</html>