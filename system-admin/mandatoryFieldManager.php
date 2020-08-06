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
   Settings
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

   <!--Switching modes-->
   <link rel="stylesheet" href="assets/css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <style>
       .hidediv{
           display: none;
       }
   </style>
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
                <li class="nav-item">
                  <a class="nav-link" href="./vieworder.php">View Order</a>
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
                <li class="nav-item">
                  <a class="nav-link" href="./vieworder.php">View Order</a>
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
              <p>Settings </p>
            </a>
            <div class="collapse" id="settings">
              <ul class="list-unstyled nav">
                <li class="nav-item">
                  <a class="nav-link" name href="./mandatoryFieldManager.php">Mandatory Fiends Manager</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./EmailTrigger.php">Email Trigger Settings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./ServiceWiseDocument.php">Service Wise Documents</a>
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
 <div  class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
  <input type="checkbox" id="switch" name="theme">
  <label id="toggleButton" for="switch">Toggle</label>
</div>
      <!-- Navbar -->
      <nav  style="padding: 0; margin: 0;" class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper" style="height: 70px;" >
            <a class="navbar-brand" href="javascript:void(0)" style="color: white;">Settings</a>
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
                <input type="text" value="" class="form-control" placeholder="Search..." />
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
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
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your
                    email</a>
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
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Mandatory Fields Manager</h4>
                </div>
                <div class="card-body">
                <form id="ajax">
                    
    
    
                 <!--indian Address Verification-->
                   <div class="container-fluid hidediv" id="div1" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Indian Address Verification :</h4>
                        </div>
                    </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <labe style="color: black;">DOB</labe>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Father's Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
    
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Stay Duration From</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration To</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
    
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
    
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
    
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Pin Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Phone Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
    
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Relation Of Respondent With the Candidate</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                 </div>  
    
                   <!--Educational Verification-->
                   <div class="container-fluid hidediv" id="div2" style="margin-top: 2%;" >
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Educational Verification :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">University</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">College</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Degree</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Specialization</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Register No</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">GPA/Marks Obtained</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Year Of Passing</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Graduate</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Start Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">End Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Conatct Name</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Contact No</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">City</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">State</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Country</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Pin Code</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Date Of Attendence</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Regular/Part Time</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
    
                 <!--Employment Verification-->
                 <div class="container-fluid hidediv" id="div3" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Employment Verification :</h4>
                        </div>
                    </div>
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Employee Name</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Employee ID</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Current Employment</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Contact Current Employer</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Employment Duration From</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Employment Duration To</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Last Designation</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Reason For Leaving</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Last Drawn Salary</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Address</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">City</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">State</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Country</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Pin Code</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Reporting Manager Name</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Reporting Manager Contact NO</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Reporting Manager Email ID</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">HR Name</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Reporting Manager Email ID</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">HR Name</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">HR Contact Number</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">HR Email ID</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Can We Ignore This Employee For Verification</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Are You Still Working With This Employer</p>
                        </div>
                        <div class="col-md-1">
                           <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Is It Contractual Employment</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">Remark</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="row ">
                        <div class="col-md-5">
                         <p style="color: black;">Eligible For Hire</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-5">
                          <p style="color: black;">EXIT COMPLETED</p>
                        </div>
                        <div class="col-md-1">
                          <div class="form-check" >
                            <label class="form-check-label"  style="margin-bottom:14px !important;">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
    
              <!--Global Database Check-->
              <div class="container-fluid hidediv" id="div4" style="margin-top: 2%;">
                <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                    <div class="col-md-6">
                        <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Global Database Check :</h4>
                    </div>
                </div>
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Dob</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">Father's Name</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Address</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">City</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">State</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">Country</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Zip Code</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                 </div>
               </div>
           </div>
    
             <!--Indian Id Check-->
             <div class="container-fluid hidediv" id="div5" style="margin-top: 2%;">
                <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                    <div class="col-md-6">
                        <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Indian Id Check :</h4>
                    </div>
                </div>
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">Dob</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="color: black;">Name Of The ID</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">ID Number</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         </div>
                  
    
          <!--Indian MRV Check-->
          <div class="container-fluid hidediv" id="div6" style="margin-top: 2%;">
            <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                <div class="col-md-6">
                    <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                        Indian MRV Check :</h4>
                </div>
            </div>
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Dob</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">Driving License Number</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">License Issued Date</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">Expiration Date</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Address</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">City</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">State</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">Country</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Zip Code</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">License Status</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Conviction And Discharge</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


           <!--Indian Credit Check-->
           <div class="container-fluid hidediv" id="div7" style="margin-top: 2%;">
            <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                <div class="col-md-6">
                    <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                        Indian Credit Check :</h4>
                </div>
            </div>
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Financial Check</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">DOB</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Remarks</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">Mother's Maiden Name</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Address</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">City</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">State</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <p style="color: black;">Country</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row ">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-md-5">
                   <p style="color: black;">Zip Code</p>
                  </div>
                  <div class="col-md-1">
                    <div class="form-check" >
                      <label class="form-check-label"  style="margin-bottom:14px !important;">
                        <input class="form-check-input" type="checkbox" value="" checked>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
            <!--Civil Litigation-->
            <div class="container-fluid hidediv" id="div8" style="margin-top: 2%;">
                <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                    <div class="col-md-6">
                        <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Civil Litigation :</h4>
                    </div>
                </div>
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">Dob</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="color: black;">Father's Name</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">Mother's Maiden Name</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="color: black;">Stay Duration From</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">Stay Duration To</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="color: black;">Address</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">City</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="color: black;">State</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="row ">
                <div class="col-md-6">
                  <div class="row ">
                    <div class="col-md-5">
                     <p style="color: black;">Country</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="color: black;">Zip Code</p>
                    </div>
                    <div class="col-md-1">
                      <div class="form-check" >
                        <label class="form-check-label"  style="margin-bottom:14px !important;">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  


              <!--Criminal Court-->
              <div class="container-fluid hidediv" id="div9" style="margin-top: 2%;">
                <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                    <div class="col-md-6">
                        <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Criminal/Criminal Court :</h4>
                    </div>
                </div>
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Dob</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">Father's Name</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Mother's Maiden Name</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">Stay Duration From</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Stay Duration To</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">Address</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                          <label class="form-check-label"  style="margin-bottom:14px !important;">
                            <input class="form-check-input" type="checkbox" value="" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">City</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                         </div>
                       </div>
                    </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">State</p>
                      </div>
                      <div class="col-md-1">
                        <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                         </div>
                       </div>
                    </div>
                  </div>
                <div class="row ">
                  <div class="col-md-6">
                    <div class="row ">
                      <div class="col-md-5">
                       <p style="color: black;">Country</p>
                       </div>
                          <div class="col-md-1">
                           <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                         </div>
                       </div>
                    </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <p style="color: black;">Zip Code</p>
                      </div>
                      <div class="col-md-1">
                       <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                </div>  

                <!--DirectorShip-->
                <div class="container-fluid hidediv" id="div10" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                DirectorShip :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Dob</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Company Name</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Company Address</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Directorship No</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Date Appointed</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">date Resigned</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">City</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">State</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Country</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Zip Code</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  


                   <!--Drug Test-->
                <div class="container-fluid hidediv" id="div11" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Drug Test :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Location</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Contact Number</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Email ID</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
                   

                   <!--Financial Service Authority-->
                <div class="container-fluid hidediv" id="div12" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Financial Service Authority :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Location</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">LOB</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">FSA Registration Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">License Number</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Company Name</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                
                <!--Indian Gap Analysis-->
                <div class="container-fluid hidediv" id="div13" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Indian Gap Analysis :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Was There Gap Between Educational Qualification</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">From Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">To Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Reason</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Was There Gap Between Employment</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">From Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">To Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Reason</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Was There Gap Between Education and Employment</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">From Date</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">To Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reason</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>  



                   <!--National Criminal Record Locator-->
                <div class="container-fluid hidediv" id="div14" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                National Criminal Record Locator :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Location</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">DOB</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">SSN</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  

                  
                   <!--Open Media-->
                <div class="container-fluid hidediv" id="div15" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Open Media :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">DOB</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Father's Name</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Contact Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                 <!--Professional License-->
                <div class="container-fluid hidediv" id="div16" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Professional License :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Location</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Governing Board/Licensing Body</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">License Type</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">License/Registration Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Original Issuance Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Date Of Expiration</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Diciplinary Action</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div> 

                        <div class="row ">
                            <div class="col-md-6">
                              <div class="row ">
                                <div class="col-md-5">
                                 <p style="color: black;">City</p>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-check" >
                                    <label class="form-check-label"  style="margin-bottom:14px !important;">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-5">
                                  <p style="color: black;">State</p>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-check" >
                                    <label class="form-check-label"  style="margin-bottom:14px !important;">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                        </div>

                       <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>                        
                    </div>
                 </div>  

                 <!--Reference Check-->
                 <div class="container-fluid hidediv" id="div17" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                Reference Check :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Location</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">Reference Name</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Employer Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Employment Duration</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Candidate Designation</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reference/Supervisor's Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Relationship Status</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Duties And Responsibilities</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 

                        <div class="row ">
                            <div class="col-md-6">
                              <div class="row ">
                                <div class="col-md-5">
                                 <p style="color: black;">Strength And Achievement</p>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-check" >
                                    <label class="form-check-label"  style="margin-bottom:14px !important;">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-5">
                                  <p style="color: black;">Area Of Improvement</p>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-check" >
                                    <label class="form-check-label"  style="margin-bottom:14px !important;">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                       </div>

                       <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Communication Skill Rating</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Job Performance Rating</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>                        
                   </div>
                </div>  

                 <!--SSN-->
                 <div class="container-fluid hidediv" id="div18" style="margin-top: 2%;">
                    <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                            <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                                SSN :</h4>
                        </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="row ">
                          <div class="col-md-5">
                           <p style="color: black;">Location</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <p style="color: black;">SSN</p>
                          </div>
                          <div class="col-md-1">
                            <div class="form-check" >
                              <label class="form-check-label"  style="margin-bottom:14px !important;">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Year Of Issue</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                             <p style="color: black;">Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check" >
                                <label class="form-check-label"  style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>                   
                 </div>  
                 <div class="row"style="margin-left:0%;margin-top:2%;" >
                    <div class="col-md-10">
                      <div class="form-group"  style="padding-bottom: 0%;">
                        <!-- <label class="bmd-label-floating" style="font-size: 14px;">Selected Service</label> -->
                          <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="dropdownMenu" name="locality-dropdown" onchange="getpackage(this.value)"
                            style="color:#202940;" required>
                            <option value="op1">India Address Verification</option>
                            <option value="op2">Educational Verification</option>
                            <option value="op3">Emploment Verification</option>
                            <option value="op4">Global Database Check</option>
                            <option value="op5">Indian ID Check</option>
                            <option value="op6">Indian MRV Check</option>
                            <option value="op7">Indian Credit Check</option>
                            <option value="op8">Civil Litigation</option>
                            <option value="op9">Criminal/Criminal Court</option>
                            <option value="op10">Directorship</option>
                            <option value="op11">Drug Test</option>
                            <option value="op12">Financial Service Authority</option>
                            <option value="op13">Indian Gap Analysis</option>
                            <option value="op14">National Crime Record Locator</option>
                            <option value="op15">Open Media</option>
                            <option value="op16">Professional License</option>
                            <option value="op17">Reference Check</option>
                           <option value="op18">SSN</option>                            
                          </select>
                       </div>
                     </div>
                    </div> 
                    <div class="row justify-content-end" style="margin-top: 4%;">
                      <div class="col-md-2">
                        <button id="add-client" type="submit" class="btn btn-primary" style="margin-right: 1%;">
                          Submit
                        </button>
                      </div>
                    </div>              
                  </form>
                </div>
             </div>
           </div>      
        </div>
      </div>
   </div>

   
 <script>
$(document).ready(function(){
    $("#dropdownMenu").change(function(){
        $(this).find("option:selected").each(function(){
          var optionValue = $(this).attr("value");
            if(optionValue === "op1"){
                $(".hidediv").hide();
                $("#div1").show()
            }

            if(optionValue === "op2"){
                $(".hidediv").hide();
                $("#div2").show();
            }

            if(optionValue === "op3"){
                $(".hidediv").hide();
                $("#div3").show();
            }
            
            if(optionValue === "op4"){
                $(".hidediv").hide();
                $("#div4").show();
            }

            if(optionValue === "op5"){
                $(".hidediv").hide();
                $("#div5").show();
            }

            if(optionValue === "op6"){
                $(".hidediv").hide();
                $("#div6").show();
            }

            if(optionValue === "op7"){
                $(".hidediv").hide();
                $("#div7").show();
            }

            if(optionValue === "op8"){
                $(".hidediv").hide();
                $("#div8").show();
            }

            if(optionValue === "op9"){
                $(".hidediv").hide();
                $("#div9").show();
            }

            if(optionValue === "op10"){
                $(".hidediv").hide();
                $("#div10").show();
            }

            if(optionValue === "op11"){
                $(".hidediv").hide();
                $("#div11").show();
            }

            if(optionValue === "op12"){
                $(".hidediv").hide();
                $("#div12").show();
            }

            if(optionValue === "op13"){
                $(".hidediv").hide();
                $("#div13").show();
            }

            if(optionValue === "op14"){
                $(".hidediv").hide();
                $("#div14").show();
            }

            if(optionValue === "op15"){
                $(".hidediv").hide();
                $("#div15").show();
            }

            if(optionValue === "op16"){
                $(".hidediv").hide();
                $("#div16").show();
            }

            if(optionValue === "op17"){
                $(".hidediv").hide();
                $("#div17").show();
            }

            if(optionValue === "op18"){
                $(".hidediv").hide();
                $("#div18").show();
            }
         
        });
    }).change();
});











   </script>

      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById("date");
        date.innerHTML = "&copy; " + x + date.innerHTML;
      </script>
    </div>
  </div>
  <!--   Core JS Files   -->
  <!--mode changing-->
  <script>
    let darkmode=localStorage.getItem("darkmode");
    const darkmodetoggle=document.querySelector('input[name=theme]');

    const enabledarkmode=()=>{
    document.documentElement.setAttribute('data-theme', 'dark')
    localStorage.setItem("darkmode","enabled");
    }


  const disabledarkmode=()=>{
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkmode",null);
  }


   if(darkmode==="enabled"){
     enabledarkmode();
   }


   darkmodetoggle.addEventListener("change", ()=>{
     darkmode=localStorage.getItem("darkmode");
     if(darkmode !== "enabled"){
        trans()
       enabledarkmode();
     }else{
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
 
</body>

</html>