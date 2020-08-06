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
    Searched Order
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
.upload-btn{
  border:2px solid #DFDFDF !important;
  color:black !important;
  background-color:#FDFDFD !important;
  margin-left:70%;
  width: 30%;
  padding: 10px !important;
      }
 .dropbtn{
  text-align: left;
  font-size: 14px;
  background-color: white !important;
  color:  rgba(0, 0, 0, 0.705) !important;
  border: 1px solid rgba(128, 128, 128, 0.473) !important;
  text-transform: inherit;
}
.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}
#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}
#myInput:focus {outline: 3px solid #ddd;}
.dropdown {
  z-index:100;
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown a:hover {background-color: #ddd;}
.show {display: block;}
.list i{
 padding: 5px 10px 5px 10px;
cursor: pointer;
}

.list button{
  border: 1px solid rgba(128, 128, 128, 0.527);
  margin: 5px 10px 5px 10px;
  border-radius: 2px;
  font-size: 13px;
}
#fileTable tr td{
  padding: 0;
}
hr{
  background-color: rgba(128, 128, 128, 0.164) !important;
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
              <a class="nav-link" href="./OrderSearch.php">
                <p>Order Search</p></a
              >
            <li class="navbar-item active">
              <a class="nav-link" href="./SearchedOrder.php">
                <p>View Order</p></a>
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
                <div class="card" style="width: 100% !important;">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Application Data</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajax">
                            <!--First Row-->
                            <div class="row justify-content-between" style="text-align:left; margin-top: 2%;">
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Case Reference No :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>hget-123453433</label>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Applicant First Name:</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>vishwas</label>
                                </div>
                            </div>
                            <!--First Row ends-->
                            <!--Second Row starts-->
                            <div class="row justify-content-between" style="text-align:left; margin-top: 1%;">
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Applicant Mid Name :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>shan</label>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Applicant Last Name:</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>raj</label>
                                </div>
                            </div>
                            <!--Second Row ends-->
                            <!--Third Row starts-->
                            <div class="row justify-content-between" style="text-align:left; margin-top: 1%;">
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Client Name :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>Shan</label>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Package Name :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>RajShekar</label>
                                </div>
                            </div>
                            <!--Third Row ends-->
                            <!--fourth Row starts-->
                            <div class="row justify-content-between" style="text-align:left; margin-top: 1%;">
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Rush Check :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>Yes</label>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Original OCD :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>04/15/2019</label>
                                </div>
                            </div>
                            <!--fourth Row ends-->
                            <!--Fifth Row starts-->
                            <div class="row justify-content-between" style="text-align:left; margin-top: 1%;">
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Order Closure Date :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>23/04/2019</label>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label style="font-style:oblique;">Order Expected Date :</label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>23/4/1994</label>
                                </div>
                            </div>
                            <!--Fifth Row ends-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row" style="margin-top: 1%;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Criminal Court :</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajax">
                            <!--Button starts-->
                            <div class="row justify-content-center" style="margin-right: 0.5%;">
                                <button type="button" id="hidedbtn" class="btn btn-primary">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                </button>
                            </div>
                            <!--Button ends-->
                            <!--first Row stats-->
                            <div class="row " style="margin-top: 3%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label
                                            style="margin-left: 5%; font-family:monospace;font-size: 1.2rem; font-weight: bold;">Verified</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style=" font-family: monospace;font-size: 1.1rem;font-weight: bold; "
                                            class="hidediv">Provided</label>
                                    </div>
                                </div>
                            </div>
                            <!--firsth Row ends-->
                            <!--second row-->
                            <div class="row" style="margin-top: 2%; margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating " style="font-size: 14px;">Location</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="locality-dropdown" name="locality-dropdown"
                                            onchange="getpackage(this.value)" style="color:#202940;" required>
                                            <option value="">India</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="margin-top:7px;" class="hidediv">India</label>
                                    </div>
                                </div>
                            </div>
                            <!--second row-->
                            <!--Third Row-->
                            <div class="row " style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label label">Service Name</label>
                                        <input name="" id="serviceNameID" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="serviceName" style="margin-top:7px;" class="hidediv">Crimina Court</label>
                                    </div>
                                </div>
                            </div>
                            <!--Third row end-->
                            <!--Fourth Row-->
                            <div class="row " style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label label">Alias Name</label>
                                        <input name="" id="aliasNameID" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="aliasName" style="margin-top:7px;" class="hidediv">Shan</label>
                                    </div>
                                </div>
                            </div>
                            <!--Fourth row end-->
                            <!--fifth row-->
                            <div class="row " style="margin-top: 1%;margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input value="" id="dobID" name="" type="date" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="dob" style="margin-top:7px;" class="hidediv">05/07/1993</label>
                                    </div>
                                </div>
                            </div>
                            <!--fifth row-->
                            <!--sixth row-->
                            <div class="row " style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Father's Name</label>
                                        <input id="fathersNameId" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="fathersName" style="margin-top:7px;" class="hidediv">12345</label>
                                    </div>
                                </div>
                            </div>
                            <!--sixth row ends-->
                            <!--Seventh row-->
                            <div class="row " style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Mother's Maiden Name</label>
                                        <input id="mothersNameId" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="mothersMaidenName" style="margin-top:7px;"
                                            class="hidediv">shreeja</label>
                                    </div>
                                </div>
                            </div>
                            <!--Seventh row ends-->
                            <!--eigth row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Stay Period From</label>
                                        <input id="stayPeriodFromID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="stayPeriodFrom" style="margin-top:7px;" class="hidediv">23/2/2018</label>
                                    </div>
                                </div>
                            </div>
                            <!--eigth row ends-->
                            <!--ninth row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Stay Period To</label>
                                        <input id="stayPeriodToID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="stayPeriodTo" style="margin-top:7px;" class="hidediv">23/2/2019</label>
                                    </div>
                                </div>
                            </div>
                            <!--ninth row ends-->
                            <!--tenth row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Address Line 1</label>
                                        <input id="adressLine1ID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="addressLine1" style="margin-top:7px;" class="hidediv">Bangalore</label>
                                    </div>
                                </div>
                            </div>
                            <!--tenth row ends-->
                            <!--eleventh row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Address Line 2</label>
                                        <input id="adressLine2ID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="addressLine2" style="margin-top:7px;" class="hidediv">Mysore</label>
                                    </div>
                                </div>
                            </div>
                            <!--eleventh row ends-->
                            <!--Twelth row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">City</label>
                                        <input id="cityID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="city" style="margin-top:7px;" class="hidediv">Bangalore</label>
                                    </div>
                                </div>
                            </div>
                            <!--Twelth row ends-->
                            <!--Thirteen row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">State</label>
                                        <input id="stateID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="state" style="margin-top:7px;" class="hidediv">Karnataka</label>
                                    </div>
                                </div>
                            </div>
                            <!--Thirteen row ends-->
                            <!--fourteen row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Country</label>
                                        <input id="countryID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="country" style="margin-top:7px;" class="hidediv">India</label>
                                    </div>
                                </div>
                            </div>
                            <!--fourteen row ends-->
                            <!--fifteen row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Zip Code</label>
                                        <input id="zipcodeID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="zipcode" style="margin-top:7px;" class="hidediv">234543</label>
                                    </div>
                                </div>
                            </div>
                            <!--fifteen row ends-->
                            <!--sixteen row-->
                            <div class="row" style="margin-left: .5%;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating label">Source Name</label>
                                        <input id="sourceNameID" name="" type="text" class="form-control input">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="sourceName" style="margin-top:7px;" class="hidediv">Ecourt</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--sixteen row ends-->
                            <!--Seventeen row -->
                            <div class="row justify-content-between" style="margin-left:0%;margin-top:4%;">
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Currency</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="">Rupees</option>
                                            <option value="">Dollar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Additional Fees</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="">Rupees</option>
                                            <option value="">Dollar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Verification
                                            Method</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="">Call</option>
                                            <option value="">Email</option>
                                            <option value="">FAX</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Seventeen row ends-->
                            <!--eighteen row starts-->
                            <div class="row" style="margin-left: 1%;margin-top: 3%;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Verified Detail</label>
                                        <input name="" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Verified Comment</label>
                                        <input name="" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <!--eighteen row ends-->
                            <!--ninteen row start-->
                            <div class="row justify-content-between" style="margin-left:0%;margin-top:4%;">
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Time zone</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="">Rupees</option>
                                            <option value="">Dollar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Queue</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="">Rupees</option>
                                            <option value="">Dollar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Category</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="">Call</option>
                                            <option value="">Email</option>
                                            <option value="">FAX</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--ninteen row ends-->
                            <!--twenty row start-->
                            <div class="row justify-content-between" style="margin-left:0%;margin-top:4%;">
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 13px;">Vendor Name</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 1.5%;">
                                    <div class="form-group" style="padding-bottom: 0%; ">
                                        <label style="font-size: 14px;">Vendor Intiation Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 1.5%;">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label style="font-size: 14px;">Vendor Target Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 1.5%;">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label style="font-size: 14px;">Vendor Closed Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 1.5%;">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label style="font-size: 14px;">Vendor Ammount</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--twenty row ends-->
                            <!--twentyOne row starts-->
                            <div class="row justify-content-between" style="margin-left:0%;margin-top:4%;">
                                <div class="col-md-4">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label class="bmd-label-floating" style="font-size: 14px;">Status</label>
                                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select"
                                            id="dropdownMenu" name="locality-dropdown" required>
                                            <option>--Select--</option>
                                            <option value="op1">Pending</option>
                                            <option value="op2">Re-Assinged</option>
                                            <option value="op3">Fresh</option>
                                            <option value="op4">Review</option>
                                            <option value="op5">Unable To Verify</option>
                                            <option value="op6">Insuffiency</option>
                                            <option value="op7">Incomplete</option>
                                            <option value="op8">Cancelled</option>
                                            <option value="op9">Case Dropped</option>
                                            <option value="op10">Unable To Verify</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="padding-bottom: 0%;">
                                        <label style="font-size: 14px;">Closed Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size: 14px;">Vendor additional Comment</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--twentyOne row ends-->
                            <hr style="margin-top: 4%;">
                            <!--Container start-->
                            <div class="container" id="Status" style="display: none; margin-top: 2%;">
                                <div class="row justify-content-between" style=" margin-top: 0%;margin-left:1%;">
                                    <div class="col-md-5" style="margin-top: 3%;">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="rush-order" data-name="Rush Order"
                                                    type="checkbox" value="">
                                                Check InCase Of data/document Insufficiency
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-right: 5%;">
                                        <div class="form-group">
                                            <div class="dropdown">
                                                <label for="">Insufficient Status</label>
                                                <button style="width: 120%;" type="button" onclick="myFunction()"
                                                    class="btn btn-primary dropbtn">Insufficient Status</button>
                                                <div id="myDropdown" class="dropdown-content" style="height: 200px;">
                                                    <input type="text" placeholder="Search.." id="myInput"
                                                        onkeyup="filterFunction()">
                                                    <ul style="list-style: none;">
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">First Name
                                                                    <input class="form-check-input Checking" name=""
                                                                        type="checkbox" value="Address Package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">Middle Name
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Criminal package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">Last Name
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Education">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">Mother's Name
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="SSN">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">Address Line
                                                                    1
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Combo Package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">City
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Combo Package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">State
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Combo Package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">PinCode
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Combo Package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-check">
                                                                <label class="form-check-label"
                                                                    style="margin-bottom:14px !important;">Others
                                                                    <input class="form-check-input Checking" name="DOB"
                                                                        type="checkbox" value="Combo Package">
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="color: black !important; margin-left: 1%;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Remarks</label>
                                            <input name="" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end" style="margin-right: 1%; margin-top: 2%;">
                                    <button style="border: 1px solid rgba(128, 128, 128, 0.61);" type="button"
                                        class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button style="border: 1px solid rgba(128, 128, 128, 0.61);margin-left: 1%;"
                                        type="button" id="ignore" class="btn btn-primary">
                                        Ignore
                                    </button>
                                </div>
                                <hr>
                            </div>
                            <!--Container Closed-->
                            <div class="row justify-content-end" style="margin-right: 1%;">
                                <div id="Continue" class="btn btn-primary">Continue</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <!--case Details-->
    <div class="container-fluid"  id="CMV" style="display: none;">
        <div class="row" style="margin-top: 1%;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Criminal / Criminal Court</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajax">
                            <!--first row-->
                            <div class="row" style="margin-left:1%;margin-top:1%;">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">DOB</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fathers Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mothers Maiden Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--first row-->
                            <!--Second row-->
                            <div class="row" style="margin-left:1%;margin-top:1%;">
                        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Stay Duration From</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Stay Duration To</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--Second row-->
                            <!--Third row-->
                            <div class="row" style="margin-left:1%;margin-top:1%;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">State</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--Third row-->
                            <!--Fourth row-->
                            <div class="row" style="margin-left:1%;margin-top:1%;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Zip Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--Fourth row-->
                            <div class="row justify-content-md-end justify-content-sm-end"
                                style="margin-top:2%; margin-right: 2%; margin-bottom:2%">
                                <button type="button" class="btn btn-primary pull-left Service" style="margin-left:4%; ">Submit</button>
                                <div class="clearfix"></div>
                                <button type="button" class="btn btn-primary pull-left Service" style="margin-left: 3%;">Cancel</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--case details ends-->

    <!--Note and documents-->
    <div class="container-fluid" id="ClientNote" style="display: none; margin: 0; margin-top: 0%;">
        <div class="row" style="margin-top: 1%;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Note</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajax">
                            <!--First row-->
                            <div class="row" style="margin-left:0%;margin-top:4%;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Public Note</label>
                                        <textarea class="form-control" name="" id="" cols="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Private Note</label>
                                        <textarea class="form-control" name="" id="" cols="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--First row-->
                            <!--second row-->
                            <div class="row" style="margin-left: 1%;">
                                <a style="color: purple; margin-left: 1%;cursor: pointer;">Remove</a>
                            </div>
                            <div class="row justify-content-end" style="margin-right: 1%;">
                                <button style="margin-right: 1%;" id="viewbtn1" type="button" class="btn btn-primary">View</button>
                                <button style="margin-right: 32%;" type="button" class="btn btn-primary">Add</button>
                                <button style="margin-right: 1%;"  id="viewbtn2" type="button" class="btn btn-primary">View</button>
                                <button type="button" class="btn btn-primary">Add</button>
                            </div>
                            </div>
                            <!--second row-->
                            <!--View Notification-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-info alert-with-icon" id="view1" data-notify="container" style="margin-left: 2%; display: none;">
                                        <i class="material-icons" data-notify="icon">message</i>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">     
                                        </button>
                                        <span data-notify="message">You have only these many documents. i have included all the 
                                            documents whatever i have. please allow me some time to get more documents
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-info alert-with-icon" id="view2" data-notify="container" style="margin-right: 2%; display: none;">
                                        <i class="material-icons" data-notify="icon">message</i>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                        <span data-notify="message">i am handeling this case. don't assign this caseto anyone
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--Eta Note start-->
                            <div class="card-header card-header-primary" style="margin-top: 4%;">
                                <h4 style="color: white;" id="cardh" class="card-title">ETA Note</h4>
                            </div>
                            <div class="card-body">
                                <!--First row-->
                                <div class="row" style="margin-left:0%;margin-top:2%;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ETA Date</label>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--First row-->
                                <!--second row-->
                                <div class="row justify-content-end" style="margin-left:0%;margin-top:0%;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ETA Note</label>
                                            <textarea class="form-control" name="" id="" cols="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Client Note</label>
                                            <textarea class="form-control" name="" id="" cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--second row-->
                                <!--third row-->
                                <div class="row justify-content-end">
                                    <button type="button" class="btn btn-primary" style="margin-right: 1%;">Add ETA Note</button>
                                </div>
                                <!--third row-->
                            </div>
                            <!--Eta Note Stop-->
                            <!--Upload Documents-->
                            <div class="card-header card-header-primary" style="margin-top:3%;">
                                <h4 class="card-title" style="color:white;">Upload Documents</h4>
                            </div>
                            <!--first row-->
                            <div class="row" style="margin-left:1%;margin-top:2%;">
                                <div class="col-md-4">
                                    <h5 class="docUpload">Upload Document Here</h5>
                                    <!--inside first-->
                                    <div class="row" style="margin-left:1%;">
                                        <p class="docUpload" style="margin-top:2.7%;">Document 1</p>
                                        <div class="form-group" style="margin-left:2%;">
                                            <label class="docUpload border" for="exampleFormControlFile1"
                                                style="border: 1px solid white; cursor: pointer ;padding:3px;">Upload File</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="document 1"
                                                data-name="document 1">
                                        </div>
                                    </div>
                                    <!--inside first-->
                                    <div class="row" style="margin-left:1%;">
                                        <p class="docUpload" style="margin-top:2.7%;">Choose File</p>
                                        <div class="form-group" style="margin-left:2%;">
                                            <label class="docUpload border" for="exampleFormControlFile2"
                                                style="border: 1px solid white;padding:3px; cursor: pointer;">Upload File</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile2" name="document 2"
                                                data-name="document 2">
                                        </div>
                                    </div>
                                </div>
                                <!--File Format Part of Upload Document Starts Here-->
                                <div class="col-md-4">
                                    <h5 class="docUpload">File Formats</h5>
                                    <div class="row docUpload" style="margin-left:2%;margin-top:2%;">
                                        <i class="fa fa-file-word-o" style="font-size:40px; color: tomato;"></i>
                                        <i class="fa fa-file-excel-o " style="font-size:40px;margin-left:2%;color: green"></i>
                                        <i class="fa fa-file-powerpoint-o " style="font-size:40px;margin-left:2%;color: brown"></i>
                                    </div>                        
                                    <div class="row" style="margin-left:2%;margin-top:5%;">
                                        <i class="fa fa-file-pdf-o docUpload" style="color: orange !important; font-size:40px;"></i>
                                    </div>
                                </div>
                                <!--File Format part Closes Here-->
                                <!--Document List View Starts Here-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect5" style="color:white;margin-top:1%;">
                                            <h5 class="docUpload">Document List View</h5>
                                        </label>
                                        <select multiple name="document_list_view" data-name="Document List View" class="form-control docUpload"
                                            id="exampleFormControlSelect5" style="height:30%;margin-bottom:4%; ">
                                            <option style="margin-top:5%;">Document 1.xls</option>
                                            <option style="margin-top:3%;">Document 2.png</option>
                                            <option style="margin-top:3%;">Document 3.docs</option>
                                            <option style="margin-top:3%;">Document 4.rtf</option>
                                            <option style="margin-top:3%">Document 5.pdf</option>
                                        </select>
                                    </div>
                                </div>
                                <!--Document List View part Closes Here-->
                            </div>
                            <!--first row ends-->
                            <!--Documents View Part row-->
                            <div class="row" style="margin-left: 2%;margin-top: 1%;">
                                <button type="button" id="viewDocuments" class="btn btn-info">View Documents</button>
                            </div>
                            <div id="hideView" style="display: none;">
                                <!--Table Starts Here-->
                                <div class="table-responsive" id="table">
                                    <table class="table table-hover" style="margin-top: 2%; width: 50%; margin-left: 2%;">
                                        <thead class="text-primary" style="background-color: #253266 !important; font-size: 13px">
                                            <th style="font-size: 13px">
                                                FileName
                                            </th>
                                            <th style="font-size: 13px">
                                                Download
                                            </th>
                                            <th style="font-size: 13px">
                                                View To Vendor
                                            </th>
                                        </thead>
                                        <tbody id="fileTable">
                                            <tr>
                                                <td class="tablehead1">APP-Ab023.pdf</td>
                                                <td class="tablehead1">
                                                    <p>Download</p>
                                                </td>
                                                <td class="tablehead1">
                                                    <div class="form-check" style="margin-top: 20%;">
                                                        <label class="form-check-label" style="margin-bottom:14px !important;">
                                                            <input class="form-check-input " id="" name="" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tablehead1">APP-Ab023.pdf</td>
                                                <td class="tablehead1">
                                                    <p>Download</p>
                                                </td>
                                                <td class="tablehead1">
                                                    <div class="form-check" style="margin-top: 20%;">
                                                        <label class="form-check-label" style="margin-bottom:14px !important;">
                                                            <input class="form-check-input " id="" name="" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--Table closes Here-->
                                <div style="margin-left: 23%;">
                                    <button id="" type="button" class="btn btn-primary " style="margin-left:1%;">Upload</button>
                                    <button id="" type="button" class="btn btn-primary " style="margin-left:1%;">Download ZIP</button>
                                </div>
                            </div>
                            <!--Documents View row ends-->
                            <!--Main Button-->
                            <div class="row justify-content-end" style="margin-right:2% ; margin-top:3%; margin-bottom:2%">
                                <button id="ok" type="submit" class="btn btn-primary pull-left" style="margin-left:2%;">Ok</button>
                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary pull-left" style="margin-left:2%;">Cancel</button>
                                <div class="clearfix"></div>
                            </div>
                            <!--Main Button-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--Note and documents-->
<!--Content Closed-->
</div>
<!--Content Closed-->






<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("li");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

</script>

<script>
    let seviceName = document.querySelector("#serviceNameID")
    let aliasName = document.querySelector("#aliasNameID")
    let dob = document.querySelector("#dobID")
    let fathersName = document.querySelector("#fathersNameId")
    let mothersMaidenName = document.querySelector("#mothersNameId")
    let stayPeriodFrom = document.querySelector("#stayPeriodFromID")
    let stayPeriodTo = document.querySelector("#stayPeriodToID")
    let addressLine1 = document.querySelector("#adressLine1ID")
    let addressLine2 = document.querySelector("#adressLine2ID")
    let city = document.querySelector("#cityID")
    let state = document.querySelector("#stateID")
    let country = document.querySelector("#countryID")
    let zipcode = document.querySelector("#zipcodeID")
    let sourceName = document.querySelector("#sourceNameID")

    let btn = document.querySelector("#hidedbtn");
    $(".input").hide();
    btn.addEventListener("click", function () {
        $(".hidediv").fadeToggle("slow");
        $(".input").fadeIn("slow")
        seviceName.value = $("#serviceName").text()
        aliasName.value = $("#aliasName").text()
        dob.value = $("#dob").text()
        fathersName.value = $("#fathersName").text()
        mothersMaidenName.value = $("#mothersMaidenName").text()
        stayPeriodFrom.value = $("#stayPeriodFrom").text()
        stayPeriodTo.value = $("#stayPeriodTo").text()
        addressLine1.value = $("#addressLine1").text()
        addressLine2.value = $("#addressLine2").text()
        city.value = $("#city").text()
        state.value = $("#state").text()
        country.value = $("#country").text()
        zipcode.value = $("#zipcode").text()
        sourceName.value = $("#sourceName").text()
    })


    $(document).ready(function () {
        $("#hidedbtn").click(function () {

            $(".label").removeClass("bmd-label-floating");
        })
        //status
        $("#dropdownMenu").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue === "op6") {
                    $("#Status").slideDown("slow")
                } else {
                    $("#Status").slideUp("slow")
                }
            });
            $("#ignore").click(function () {
                $("#Status").slideUp("slow")
            })
        })
        //Continue
        $("#Continue").click(function () {
            $("#CMV").slideDown("slow");
        })

        //Service btn
        $(".Service").click(function () {
            $("#ClientNote").slideDown("slow")
        })

        //View Documents section.
        $("#viewDocuments").click(function () {
            $("#hideView").slideToggle();
        })
        //View Notes.
        $("#viewbtn1").click(function(){
            $("#view1").slideToggle()
        })
        $("#viewbtn2").click(function(){
            $("#view2").slideToggle()
        })
    })
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
<script src="data.js"></script>
</body>

</html>