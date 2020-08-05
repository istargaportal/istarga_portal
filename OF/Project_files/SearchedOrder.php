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
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
        name="viewport" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3aaaecc22c.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Switching modes-->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .upload-btn {
            border: 2px solid #DFDFDF !important;
            color: black !important;
            background-color: #FDFDFD !important;
            margin-left: 70%;
            width: 30%;
            padding: 10px !important;
        }

        .dropbtn {
            text-align: left;
            font-size: 14px;
            background-color: white !important;
            color: rgba(0, 0, 0, 0.705) !important;
            border: 1px solid rgba(128, 128, 128, 0.473) !important;
            text-transform: inherit;
        }

        .dropbtn:hover,
        .dropbtn:focus {
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

        #myInput:focus {
            outline: 3px solid #ddd;
        }

        .dropdown {
            z-index: 100;
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

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }

        .list i {
            padding: 5px 10px 5px 10px;
            cursor: pointer;
        }

        .list button {
            border: 1px solid rgba(128, 128, 128, 0.527);
            margin: 5px 10px 5px 10px;
            border-radius: 2px;
            font-size: 13px;
        }

        #fileTable tr td {
            padding: 0;
        }

        hr {
            background-color: rgba(128, 128, 128, 0.164) !important;
        }

        .mainContent p {
            text-align: left;
            padding: 0;
            margin: 0;
            border: 0;
        }

        .mainContent .row {
            margin-top: 3%;
            margin-left: .5%;
        }

        .mainContent label {
            margin-top: 2%;
        }

        .alert {
            padding-bottom: 0;
            margin-left: 2%;
            margin-bottom: 4px;
        }

        .NotificationFooter {
            margin-top: 5%;
            margin-bottom: 2%;
        }

        .NotificationFooter .dateN {
            font-size: 12px;
            text-shadow: none;
        }

        .NotificationFooter .removeN {
            color: orangered !important;
            font-size: 12px;
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
          <li class="nav-item active">
            <a class="nav-link" href="./OrderSearch.php">
              <p>Search Order</p>
            </a>
          <li class="navbar-item">
            <a class="nav-link" href="./markAttendence.php">
              <p>Mark Attendence</p>
            </a>
          </li>
          <li class="navbar-item">
            <a class="nav-link" href="./MyProfile.php">
              <p>My Profile</p>
            </a>
          </li>
        </ul>
      </div>
      <!--Side Bar End-->
        </div>
        <div class="main-panel">
            <!--toggle button-->
            <div class="toggle-container"
                style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
                <input type="checkbox" id="switch" name="theme">
                <label id="toggleButton" for="switch">Toggle</label>
            </div>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example"
                style="padding: 0; margin: 0;">
                <div class="container-fluid">
                    <div class="navbar-wrapper" style="height: 70px;">
                        <a class="navbar-brand" href="javascript:void(0)" style="color: white;">Searched Order</a>
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
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">
                                    <i style="color: white;" class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <div class="row justify-content-between"
                                            style="text-align:left; margin-top: 2%;">
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
                                        <div class="row justify-content-between"
                                            style="text-align:left; margin-top: 1%;">
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
                                        <div class="row justify-content-between"
                                            style="text-align:left; margin-top: 1%;">
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
                                        <div class="row justify-content-between"
                                            style="text-align:left; margin-top: 1%;">
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
                                        <div class="row justify-content-between"
                                            style="text-align:left; margin-top: 1%;">
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
                                            <button type="button" id="moveBtn" class="btn btn-primary">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <!--Button ends-->


                                        <div class="mainContent">
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="mothersMaidenName">Date Of
                                                            Birth</label>
                                                        <input type="date" class="form-control input"
                                                            id="mothersMaidenName">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="mothersMaidenNameID">08/07/2019</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="fathersName"
                                                            class="bmd-label-floating">Father's Name</label>
                                                        <input type="text" class="form-control input" id="fathersName">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="fathersNameID">RajShekar</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="mothersMaidenName"
                                                            class="bmd-label-floating">Mother's Maiden Name</label>
                                                        <input type="text" class="form-control input"
                                                            id="mothersMaidenName">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="mothersMaidenNameID">Parimala</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="stayDurationFrom"
                                                            class="bmd-label-floating">Stay Duration From</label>
                                                        <input type="text" class="form-control input"
                                                            id="stayDurationFrom">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="stayDurationFromID">02/09/2017</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="stayDurationTo"
                                                            class="bmd-label-floating">Stay Duration To</label>
                                                        <input type="text" class="form-control input"
                                                            id="stayDurationTo">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="stayDurationToID">20/09/2018</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="Address"
                                                            class="bmd-label-floating">Address</label>
                                                        <input type="text" class="form-control input" id="Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="AddressID">b-4,jp nagar, bangalore</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="city"
                                                            class="bmd-label-floating">City</label>
                                                        <input type="text" class="form-control input" id="city">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="cityID">Bangalore</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="state"
                                                            class="bmd-label-floating">State</label>
                                                        <input type="text" class="form-control input" id="state">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="stateID">Karnataka</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="country"
                                                            class="bmd-label-floating">Country</label>
                                                        <input type="text" class="form-control input" id="country">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="value" id="countryID">India</label>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="labels" for="zipCode"
                                                            class="bmd-label-floating">Zip Code</label>
                                                        <input type="text" class="form-control input" id="zipCode">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label   class="value" id="zipCodeID">096245</label>
                                                </div>
                                            </div>
                                        </div>





                                        <!--Verified Details-->
                                        <div class="card" style="margin-top: 5%;">
                                            <div class="card-header card-header-primary">
                                                <h4 style="color: white;" class="card-title">Verified Details :</h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="ajax">
                                                    <!--First row starts-->
                                                    <div class="row" style="margin-left: 1%;margin-top: 3%;">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Verifie Detail</label>
                                                                <input name="" type="text" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Verified
                                                                    Comment</label>
                                                                <input name="" type="text" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--First row ends-->
                                                    <!--Second row -->
                                                    <div class="row justify-content-start"
                                                        style="margin-left:0%;margin-top:4%;">
                                                        <div class="col-md-4">
                                                            <div class="form-group" style="padding-bottom: 0%;">
                                                                <label style="font-size: 13px;">Currency</label>
                                                                <select style="margin-top: 2%;"
                                                                    class="browser-default custom-select" type="select"
                                                                    id="" name="locality-dropdown" required>
                                                                    <option>--Select--</option>
                                                                    <option value="">Rupees</option>
                                                                    <option value="">Dollar</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group" style="padding-bottom: 0%;">
                                                                <label class="bmd-label-floating"
                                                                    style="font-size: 13px;">Additional Fees</label>
                                                                <input name="" type="number" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Second row ends-->
                                                    <!--Third row starts-->
                                                    <div class="row justify-content-start"
                                                        style="margin-left:0%;margin-top:4%;">
                                                        <div class="col-md-4">
                                                            <div class="form-group" style="padding-bottom: 0%;">
                                                                <label style="font-size: 14px;">Status</label>
                                                                <select style="margin-top: 2%;"
                                                                    class="browser-default custom-select" type="select"
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
                                                        <div class="col-md-4">
                                                            <div class="form-group" style="padding-bottom: 0%;">
                                                                <label style="font-size: 13px;">Closed Date</label>
                                                                <input name="" type="date" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Third row ends-->
                                                    <!--Container start-->
                                                    <div class="container" id="Status"
                                                        style="display: none; margin-top: 2%;">
                                                        <div class="row justify-content-between"
                                                            style=" margin-top: 0%;margin-left:1%;">
                                                            <div class="col-md-5" style="margin-top: 3%;">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input"
                                                                            name="rush-order" data-name="Rush Order"
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
                                                                        <button style="width: 120%;" type="button"
                                                                            onclick="myFunction()"
                                                                            class="btn btn-primary dropbtn">Insufficient
                                                                            Status</button>
                                                                        <div id="myDropdown" class="dropdown-content"
                                                                            style="height: 200px;">
                                                                            <input type="text" placeholder="Search.."
                                                                                id="myInput" onkeyup="filterFunction()">
                                                                            <ul style="list-style: none;">
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">First
                                                                                            Name
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="" type="checkbox"
                                                                                                value="Address Package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">Middle
                                                                                            Name
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Criminal package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">Last
                                                                                            Name
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Education">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">Mother's
                                                                                            Name
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="SSN">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">Address
                                                                                            Line
                                                                                            1
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Combo Package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">City
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Combo Package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">State
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Combo Package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">PinCode
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Combo Package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
                                                                                            </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label"
                                                                                            style="margin-bottom:14px !important;">Others
                                                                                            <input
                                                                                                class="form-check-input Checking"
                                                                                                name="DOB"
                                                                                                type="checkbox"
                                                                                                value="Combo Package">
                                                                                            <span
                                                                                                class="form-check-sign">
                                                                                                <span
                                                                                                    class="check"></span>
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
                                                        <div class="row"
                                                            style="color: black !important; margin-left: 1%;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Remarks</label>
                                                                    <input name="" type="text" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-end"
                                                            style="margin-right: 1%; margin-top: 2%;">
                                                            <button style="border: 1px solid rgba(128, 128, 128, 0.61);"
                                                                type="button" class="btn btn-primary">
                                                                Submit
                                                            </button>
                                                            <button
                                                                style="border: 1px solid rgba(128, 128, 128, 0.61);margin-left: 1%;"
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
                                        <!--Verified Details ends-->

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--case Details-->
                <div class="container-fluid" id="CMV" style="display: none;">
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
                                            <button type="button" class="btn btn-primary pull-left Service"
                                                style="margin-left:4%; ">Submit</button>
                                            <div class="clearfix"></div>
                                            <button type="button" class="btn btn-primary pull-left Service"
                                                style="margin-left: 3%;">Cancel</button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--case details ends-->






                <!--Public Notes And Private Notes-->
                <div class="container-fluid" id="ClientNote" style="display: none; margin: 0; margin-top: 0%;">
                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Public And Private Notes</h4>
                                </div>
                                <div class="card-body">
                                    <form id="ajax">
                                        <!--First row-->
                                        <div class="row" style="margin-left:0%;margin-top:4%;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Public Note</label>
                                                    <textarea class="form-control docUpload" name="" id="" cols="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Private Note</label>
                                                    <textarea class="form-control docUpload" name="" id="" cols="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--First row-->
                                        <!--second row-->
                                        <div class="row justify-content-end" style="margin-right: 1%;">
                                            <button style="margin-right: 1%;" id="viewbtn1" type="button"
                                                class="btn btn-primary btn-sm">View</button>
                                            <button style="margin-right: 37%;" type="button"
                                                class="btn btn-primary btn-sm">Add</button>
                                            <button style="margin-right: 1%;" id="viewbtn2" type="button"
                                                class="btn btn-primary btn-sm">View</button>
                                            <button type="button" class="btn btn-primary btn-sm">Add</button>
                                        </div>
                                </div>
                                <!--second row-->
                                <!--View Notification-->
                                <!--View Notification-->
                                <div class="row" style="margin-right: 1%; margin-left: 1%;">
                                    <div class="col-md-6">
                                        <div class="card " id="messageContainer1" style="display: none;">
                                            <div class="card-header">
                                                <div class="message_header">
                                                    <p class="docUpload" style="color: white; margin: 0;font-size: 14px;font-weight:400 ;">Note History</p>
                                                </div>
                                            </div>
                                            <div class="card-body"
                                                style="height: 250px;overflow-y: auto; margin-bottom: 10%;">
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">i have included all the
                                                            documents whatever i have. please allow me some time to get
                                                            more
                                                            documents
                                                        </span>
                                                        <div class="NotificationFooter" style="margin-bottom: 0;">
                                                            <a class="removeN" href="#">Remove</a>
                                                            <a class="dateN" style="float: right;">24/08/2019 02:24</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">i have included all the
                                                            documents whatever i have. please allow me some time to get
                                                            more
                                                            documents
                                                        </span>
                                                        <div class="NotificationFooter" style="margin-bottom: 0;">
                                                            <a class="removeN" href="#">Remove</a>
                                                            <a class="dateN" style="float: right;">24/08/2019 02:24</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">i have included all the
                                                            documents whatever i have. please allow me some time to get
                                                            more
                                                            documents
                                                        </span>
                                                        <div class="NotificationFooter" style="margin-bottom: 0;">
                                                            <a class="removeN" href="#">Remove</a>
                                                            <a class="dateN" style="float: right;">24/08/2019 02:24</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card" id="messageContainer2" style="display: none">
                                            <div class="card-header">
                                                <div class="message_header">
                                                    <p class="docUpload" style="color: white; margin: 0;font-size: 14px;font-weight:400 ;">Note History</p>
                                                </div>
                                            </div>
                                            <div class="card-body"
                                                style="height: 250px; overflow-y: auto;margin-bottom: 10%;">
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">i have included all the
                                                            documents whatever i have. please allow me some time to get
                                                            more
                                                            documents
                                                        </span>
                                                        <div class="NotificationFooter" style="margin-bottom: 0;">
                                                            <a class="removeN" href="#">Remove</a>
                                                            <a class="dateN" style="float: right;">24/08/2019 02:24</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">i have included all the
                                                            documents whatever i have. please allow me some time to get
                                                            more
                                                            documents
                                                        </span>
                                                        <div class="NotificationFooter" style="margin-bottom: 0;">
                                                            <a class="removeN" href="#">Remove</a>
                                                            <a class="dateN" style="float: right;">24/08/2019 02:24</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">i have included all the
                                                            documents whatever i have. please allow me some time to get
                                                            more
                                                            documents
                                                        </span>
                                                        <div class="NotificationFooter" style="margin-bottom: 0;">
                                                            <a class="removeN" href="#">Remove</a>
                                                            <a class="dateN" style="float: right;">24/08/2019 02:24</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--View Notification-->
                                <div class="row justify-content-start">
                                    <div class="col-md-6" style="margin-top: 4%;">
                                        <button style="margin-left: 4%;" id="viewbtn3" type="button"
                                            class="btn btn-primary">Re-Assignment Logs</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Additional Comments</label>
                                                    <textarea class="form-control docUpload" name="" id="" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button style="float: right;margin-right: 6%;" type="button"
                                                    class="btn btn-primary btn-sm">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-start" style="margin-left: 1%;margin-right: 1%;">
                                    <div class="col-md-6">
                                        <div class="card" id="messageContainer3" style="display: none; margin-top: 1%;">
                                            <div class="card-header">
                                                <div class="message_header">
                                                    <p class="docUpload" style="color: white; margin: 0;font-size: 14px;font-weight:400 ;">Re_Assignments Logs</p>
                                                </div>
                                            </div>
                                            <div class="card-body"
                                                style="height: 200px; overflow-y: auto;margin-bottom: 10%;">
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">
                                                            <span>16th July 2020 QC: Kindly change dob as per
                                                                mail</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">
                                                            16th July 2020 QC:park order, information Incomplete
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">
                                                            <span>16th July 2020 QC: Kindly change dob as per
                                                                mail</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="messageList">
                                                    <div class="alert alert-info alert-with-icon"
                                                        data-notify="container">
                                                        <i class="material-icons" data-notify="icon">message</i>
                                                        <span data-notify="message">
                                                            <span>16th July 2020 QC: Kindly change dob as per
                                                                mail</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Public Notes And Private Notes Ends-->
                                <!--Eta Note start-->
                                <div class="card-header card-header-primary" style="margin-top: 4%;">
                                    <h4 style="color: white;" id="cardh" class="card-title">ETA Notes</h4>
                                </div>
                                <div class="card-body">
                                    <!--First row-->
                                    <div class="row justify-content-between" style="margin-left:0%;margin-top:2%;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">ETA Note</label>
                                                <textarea class="form-control docUpload" name="" id="" rows="4"></textarea>
                                            </div>
                                            <div class="row" style="margin-top: 2%;">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ETA Date</label>
                                                        <input type="date" class="form-control" name="" id=""></input>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-left: 70%; margin-top: 2%;">
                                                    <div class="col-md-2" style="padding-right:0%;">
                                                        <button type="button" class="btn btn-primary btn-sm">Add ETA
                                                            Note</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card" id="messageContainer4" style="margin-top: 0;">
                                                <div class="card-header">
                                                    <div class="message_header">
                                                        <p class="docUpload" style="color: white; margin: 0;font-size: 14px;font-weight:400 ;">ETA Notes History</p>
                                                    </div>
                                                </div>
                                                <div class="card-body"
                                                    style="height: 170px; overflow-y: auto;margin-bottom: 10%;">
                                                    <div class="messageList">
                                                        <div class="alert alert-info alert-with-icon"
                                                            data-notify="container">
                                                            <i class="material-icons" data-notify="icon">message</i>
                                                            <span data-notify="message">
                                                                <span>16th July 2020 03:30 pm <br>
                                                                    PRTM45454 says: to be followed on 5th march about
                                                                    case
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="messageList">
                                                        <div class="alert alert-info alert-with-icon"
                                                            data-notify="container">
                                                            <i class="material-icons" data-notify="icon">message</i>
                                                            <span>16th July 2020 03:30 pm <br>
                                                                PRTM45454 says: update on 17th april about case
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end" style="margin-right: 1%;">
                                       <div id="notesBtnContinue" class="btn btn-primary">Continue</div>
                                    </div>
                                </div>
                                <!--Eta Note Stop-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid" id="clientNote" style=" margin: 0; margin-top: 0%; display: none;">
                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Attach Documents</h4>
                                </div>
                                <div class="card-body">
                                    <form id="ajax">

                                        <!--first row-->
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 1%;">
                                                <div class="docHeader" style="margin-left: 4%;">
                                                    <h5 class="docUpload">Multiple File Upload <span
                                                            style="font-size: 14px;">(doc, docx, jpeg, bmp, gif,jpg,
                                                            png)</span></h5>
                                                </div>
                                                 <!--innerr row started-->
                                                <div class="row" style="margin-left: 2%;margin-top: 6%;">
                                                    <div class="col-md-5">
                                                        <div class="form-group"
                                                            style="margin-left:2%;padding-bottom: 0;">
                                                            <label class="docUpload border" id="ChoosenLabel" for="ChoosenFile">Choos File <i class="fa fa-file" aria-hidden="true"></i> </label>
                                                            <input type="file" class="form-control-file"
                                                                id="ChoosenFile" name="document1"
                                                                data-max-file-size="3MB" data-max-files="3"
                                                                data-name="document1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> 
                                                        <div class="form-group">
                                                            <button style="padding:8px 12px;"
                                                                class=" btn btn-primary">Upload File</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--innerr row completed-->
                                            </div>
                                            <div class="col-md-5" style="margin-top: 1%; margin-left: 8%">
                                                 <!--First row starts-->
                                                <div class="form-group" style="padding-bottom: 0%;">
                                                    <label style="font-size: 12px;">Select Vendor</label>
                                                    <select style="margin-top: 2%;"
                                                        class="browser-default custom-select" type="select"
                                                        id="dropdownMenu" name="locality-dropdown" required>
                                                        <option>--Select--</option>
                                                        <option value="op1">Pending</option>
                                                    </select>
                                                </div>
                                                <div class="row justify-content-end" style="margin-top: 2%; margin-right: 0.8%;">
                                                    <button style="padding:8px 12px;"
                                                    class=" btn btn-primary">Assign To Vendor</button>                                                
                                                </div>
                                               <!--third row ends-->
                                            </div>
                                        </div>
                                        <!--first row-->
                                        <hr style="color: grey;">
                                        <!--Second row starts-->
                                        <div class="row" style="margin-left: 1%; margin-right: 1%;">
                                            <div class="col-md-6">
                                                <!--Card Starts-->
                                                <div class="card" id="messageContainer6">
                                                    <div class="card-header">
                                                        <p style="margin-bottom: 0;color: white;">Documents View</p>
                                                    </div>

                                                    <div class="scroll" style="height: 220px; overflow-y: auto;">
                                                        <div class="card-body" id="anexureBody" style="margin-left: 3%;">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover">
                                                                    <thead
                                                                        style="background-color: #253266 !important; font-size: 13px">
                                                                        <th style="font-size: 13px">FileName</th>
                                                                        <th style="font-size: 13px"> Download</th>
                                                                        <th style="font-size: 13px">View To Vendor</th>
                                                                    </thead>
                                                                    <tbody id="OrderTabel" >
                                                                        <tr>
                                                                            <td class="tablehead1">APP-Ab023.pdf</td>
                                                                            <td class="tablehead1">Download</td>
                                                                            <td class="tablehead1">
                                                                                <div class="form-check"
                                                                                    style="margin-top: 20%;">
                                                                                    <label class="form-check-label"
                                                                                        style="margin-bottom:14px !important;">
                                                                                        <input class="form-check-input "
                                                                                            id="" name=""
                                                                                            type="checkbox" value="">
                                                                                        <span class="form-check-sign">
                                                                                            <span class="check"></span>
                                                                                        </span>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tablehead1">APP-Ab023.pdf</td>
                                                                            <td class="tablehead1">Download</td>
                                                                            <td class="tablehead1">
                                                                                <div class="form-check"
                                                                                    style="margin-top: 20%;">
                                                                                    <label class="form-check-label"
                                                                                        style="margin-bottom:14px !important;">
                                                                                        <input class="form-check-input "
                                                                                            id="" name=""
                                                                                            type="checkbox" value="">
                                                                                        <span class="form-check-sign">
                                                                                            <span class="check"></span>
                                                                                        </span>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tablehead1">APP-Ab023.pdf</td>
                                                                            <td class="tablehead1">Download</td>
                                                                            <td class="tablehead1">
                                                                                <div class="form-check"
                                                                                    style="margin-top: 20%;">
                                                                                    <label class="form-check-label"
                                                                                        style="margin-bottom:14px !important;">
                                                                                        <input class="form-check-input "
                                                                                            id="" name=""
                                                                                            type="checkbox" value="">
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
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button id="" type="button" class=" btn-outline-primary"
                                                            style="margin-left: 72%; cursor: pointer;">Download
                                                            ZIP</button>
                                                    </div>
                                                </div>
                                                <!--Card Starts ends-->
                                            </div>
                                            <div class="col-md-6">
                                                <!--anexure start-->
                                                <div class="card" id="messageContainer5">
                                                    <div class="card-header">
                                                        <p style="color: white;">Annexure</p>
                                                    </div>
                                                    <div class="scroll" style="height: 200px; overflow-y: auto;">
                                                        <div class="card-body" id="anexureBody"
                                                            style="margin-left: 3%;margin-right: 3%;">
                                                            <div class="row">
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-word-o"
                                                                        style="font-size:40px;color: #34A853;"></i>
                                                                    <p>Passport</p>
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-excel-o"
                                                                        style="font-size:40px;color: #4E68FF;"></i>
                                                                    <p>ID Proof.xml</p>
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-image-o" aria-hidden="true"
                                                                        style=" font-size:40px;color: #F98007;"></i>
                                                                    <p>Phot.jpg</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-pdf-o docUpload"
                                                                        style=" font-size:40px; color:#D6312D !important;"></i>
                                                                    <p>ID - pdf</p>
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-powerpoint-o "
                                                                        style="font-size:40px;color: #8C379F !important;"></i>
                                                                    <p>Id-Proof</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-pdf-o docUpload"
                                                                        style=" font-size:40px; color:#D6312D !important;"></i>
                                                                    <p>Id.png</p>
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;">
                                                                    <i class="fa fa-file-powerpoint-o "
                                                                        style="font-size:40px;color: #8C379F !important;"></i>
                                                                    <p>adhar.png</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button id="" type="button" class=" btn-outline-primary"
                                                            style="margin-left: 72%;cursor: pointer;">Download
                                                            ZIP</button>
                                                    </div>
                                                </div>
                                                <!--anexure ends-->
                                            </div>
                                        </div>
                                        <!--Second row ends-->
                                        <div class="row justify-content-end" style="margin-top: 3%; margin-bottom: 5%;">
                                            <button style="margin-right: 1%;" class="btn btn-primary">Save</button>
                                            <button style="margin-right: 1%;" class="btn btn-primary">Break</button>
                                            <button style="margin-right: 3%;" class="btn btn-primary">Back</button>
                                        </div>
                                    </form>
                                </div>
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

            //move values to left side.
            let btn = document.querySelector("#moveBtn");
            let input = document.querySelectorAll(".input");
            let value = document.querySelectorAll(".value");
            let labels = document.querySelectorAll(".labels")
            let length = input.length;

            window.onload = () => {
                input.forEach(ele => {
                    ele.style.display = "none";
                })
            }

            btn.addEventListener("click", () => {
                for (let i = 0; i < length; i++) {
                    labels[i].style.marginTop = "0"
                    input[i].style.display = "block"
                    let newValue = value[i].textContent;
                    labels[i].classList.remove("bmd-label-floating")
                    input[i].value = newValue;
                }
            })

        </script>

        <script>

            $(document).ready(function () {
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
                //view Notifications.
                $("#viewbtn1").click(function () {
                    $("#messageContainer1").slideToggle();
                })
                $("#viewbtn2").click(function () {
                    $("#messageContainer2").slideToggle();
                })
                //reassignment logs
                $("#viewbtn3").click(function () {
                    $("#messageContainer3").slideToggle();
                })
                //Notes part
                $("#notesBtnContinue").click(function(){
                    $("#clientNote").slideDown();
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