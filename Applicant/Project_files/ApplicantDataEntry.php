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
        new Applicant Data
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

    <!--Switching modes-->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .upload-btn {
            font-size: 13;
            color: white !important;
            margin-left: 45%;
            width: 7%;
            padding: 10px !important;
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
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a style="color: white;" class="navbar-brand" href="javascript:void(0)">Applicant Date Entry</a>
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
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
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
                                    <h4 style=" color: white;" class="card-title">Personal Details</h4>
                                </div>
                                <div class="card-body" style="margin-top: 2%;">
                                    <form id="ajax">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">First Name</label>
                                                    <input placeholder="" type="text" class="form-control" name=""
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Middle Name</label>
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Last Name</label>
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: 1%;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Alias First Name</label>
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Alias Midddle Name</label>
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Alias Last Name</label>
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: 1%;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size: 12px;">Date Of Birth</label>
                                                    <input type="date" name="" id="" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Mother's Maiden Name</label>
                                                    <input name="" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end"
                                            style="margin-top: 4%; margin-bottom: 2%; margin-right: 2%;">
                                            <button id="continue1" class="btn btn-primary">Continue</button>
                                        </div>
                                    </form>
                                </div>
                                <!--Card body close-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid" id="hidediv1" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 style=" color: white;" class="card-title">Address Details</h4>
                                </div>
                                <div class="card-body" style="margin-top: 2%;">
                                    <form id="ajax">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size: 12px;">Choose if you use any Alias
                                                        Name</label>
                                                    <select style="margin-top: 3%;"
                                                        class="browser-default custom-select" type="select"
                                                        id="locality-dropdown" name="locality-dropdown" required>
                                                        <option value="">--Select Name--</option>
                                                        <option value="">Ravi Shenkar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:4%;">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Stay Duration :</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label style="font-size: 12px;">Start Date Of Recidency</label>
                                                    <input name="" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label style="font-size: 12px;">End Date Of Recidency</label>
                                                    <input name="" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between" style="margin-top: 1%;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Address1" class="bmd-label-floating">Address Line
                                                        1</label>
                                                    <textarea class="form-control" id="Address1" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Address2" class="bmd-label-floating">Address Line
                                                        2</label>
                                                    <textarea class="form-control" id="Address2" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row " style="margin-top: 4%;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size: 14px;"
                                                        class="bmd-label-floating">Country</label>
                                                    <select style=" margin-top: 2%;"
                                                        class="browser-default custom-select" type="select"
                                                        id="locality-dropdown" name="locality-dropdown" required>
                                                        <option value="">--Select Name--</option>
                                                        <option value="">India</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size: 14px;"
                                                        class="bmd-label-floating">State</label>
                                                    <select style=" margin-top: 2%;"
                                                        class="browser-default custom-select" type="select"
                                                        id="locality-dropdown" name="locality-dropdown" required>
                                                        <option value="">--Select Name--</option>
                                                        <option value="">Karnataka</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size: 14px;"
                                                        class="bmd-label-floating">City</label>
                                                    <select style=" margin-top: 2%;"
                                                        class="browser-default custom-select" type="select"
                                                        id="locality-dropdown" name="locality-dropdown" required>
                                                        <option value="">--Select Name--</option>
                                                        <option value="">Bangalore</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end"
                                            style="margin-top: 4%; margin-bottom: 2%; margin-right: 2%;">
                                            <button id="continue2" class="btn btn-primary">Continue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid" id="hidediv2" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 style=" color: white;" class="card-title">Upload Documents</h4>
                                </div>
                                <div class="card-body" style="margin-top: 2%;">
                                    <form id="ajax">
                                        <!--first row starts-->
                                        <div class="row justify-content-between">
                                            <div class="col-md-5">
                                                <div class="card" id="AppCard">
                                                    <div class="card-body">
                                                        <!--Inside card-->
                                                        <div class="card" id="boxBorder">
                                                            <div class="card-body" style="padding: 5px;">
                                                                <h4 class="docUpload"
                                                                    style="font-size: 15.5px;font-weight: 700;letter-spacing: 0.5px;">
                                                                    Service Type Name :</h4>
                                                                <p class="docUpload" style="font-size: 12px; margin-bottom: 0;">Address
                                                                    Verification</p>
                                                            </div>
                                                        </div>
                                                        <!--Inside card-->
                                                        <!--Inside card-->
                                                        <div class="card" id="boxBorder">
                                                            <div class="card-body" style="padding: 5px;">
                                                                <h4 class="docUpload"
                                                                    style="font-size: 15.5px;font-weight: 700;letter-spacing: 0.5px;">
                                                                    Country Name :</h4>
                                                                <p class="docUpload" style="margin-bottom: 0;">India</p>
                                                            </div>
                                                        </div>
                                                        <!--Inside card-->
                                                        <!--Inside card-->
                                                        <div class="card" id="boxBorder">
                                                            <div class="card-body" style="padding: 5px;">
                                                                <h4 class="docUpload"
                                                                    style="font-size: 15.5px;font-weight: 700;letter-spacing: 0.5px;">
                                                                    Mandatory Documents :</h4>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect5"
                                                                        style="color:white;">
                                                                        <h5 class="docUpload"></h5>
                                                                    </label>
                                                                    <select multiple name="document_list_view"
                                                                        data-name="Document List View"
                                                                        class="form-control docUpload"
                                                                        id="exampleFormControlSelect5"
                                                                        style="height:30%;margin-bottom:4%; ">
                                                                        <option class="docUpload" style="margin-top:0%;">Document 1.xls
                                                                        </option>
                                                                        <option class="docUpload" style="margin-top:3%;">Document 2.png
                                                                        </option>
                                                                        <option class="docUpload" style="margin-top:3%;">Document 3.docs
                                                                        </option>
                                                                        <option class="docUpload" style="margin-top:3%;">Document 4.rtf
                                                                        </option>
                                                                        <option class="docUpload" style="margin-top:3%">Document 5.pdf
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Inside card-->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-top: 3%;padding-left: 7%;">
                                                <h5 class="blackcolor docUpload">Multiple File Upload (jpeg, jpg, png,
                                                    bmp, pif, tif)</h5>
                                                <div class="row">
                                                    <div class="col-md-6" style="padding: 0; margin-top: 1%;">
                                                        <div class="form-group" style="margin-left:13%;">
                                                            <label class="blackcolor border"for="file"style="border: 1px solid white; cursor: pointer ;padding:10px 30px 10px 30px;">Choose File</label>
                                                            <input type="file" class="form-control-file" id="file">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button style="background-color: #2196f3 !important;" class="btn btn-primary">Upload</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 25%; margin-left: 4%;">
                                                    <div class="col-md-11">
                                                        <div class="form-check">
                                                            <label class="form-check-label"> I don't have any Documents
                                                                to upload
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--first row Ends-->
                                        <div class="row justify-content-end" style="margin-bottom: 2%;">
                                           <div class="col-md-2">
                                               <button class="btn btn-primary">Submit</button>
                                           </div>
                                        </div>






































                                        <!-- <div class="row justify-content-start"
                                    style="margin-left: 1%; margin-right: 1%; margin-top: 3%; 
                                    border: 1px solid rgba(128, 128, 128, 0.199); padding-top: 20px;">
                                    <div class="col-md-4">
                                        <div class="form-group docUpload">
                                            <h5 class="docUpload">Service Type Name</h5>
                                             <p>Address Verification</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 docUpload">
                                        <div class="form-group">
                                            <h5 class="docUpload">Country</h5>
                                            <p>India </p>                                    
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect5" style="color:white;margin-top:1%;">
                                                <h5 class="docUpload">Document List View</h5>
                                            </label>
                                            <select multiple name="document_list_view" data-name="Document List View"
                                                class="form-control docUpload" id="exampleFormControlSelect5"
                                                style="height:30%;margin-bottom:4%; ">
                                                <option style="margin-top:5%;">Document 1.xls</option>
                                                <option style="margin-top:3%;">Document 2.png</option>
                                                <option style="margin-top:3%;">Document 3.docs</option>
                                                <option style="margin-top:3%;">Document 4.rtf</option>
                                                <option style="margin-top:3%">Document 5.pdf</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="row" style="margin-left:1%;margin-top:6%;">
                                    <div class="col-md-4">
                                        <h5 class="blackcolor docUpload">Upload Document Here</h5>
                                        <div class="row" style="margin-left:1%;">
                                            <p class="blackcolor docUpload" style="margin-top:2.7%;">Document 1</p>
                                            <div class="form-group" style="margin-left:2%;">
                                                <label class="blackcolor border" for="exampleFormControlFile1"
                                                    style="border: 1px solid white; cursor: pointer ;padding:3px;">Upload
                                                    File</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left:1%;">
                                            <p class="docUpload" style="margin-top:2.7%;">Choose File</p>
                                            <div class="form-group" style="margin-left:2%;">
                                                <label class="blackcolor border" for="exampleFormControlFile1"
                                                    style="border: 1px solid white;padding:3px; cursor: pointer;">Upload
                                                    File</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="blackcolor docUpload">File Formats</h5>
                                        <div class="row blackcolor" style="margin-left:2%;margin-top:2%;">
                                            <i class="fa fa-file-word-o blackcolor" style="font-size:40px; color: green;"></i>
                                            <i class="fa fa-file-excel-o blackcolor"
                                                style="font-size:40px;margin-left:2%; color: crimson;"></i>
                                            <i class="fa fa-file-powerpoint-o blackcolor"
                                                style="font-size:40px;margin-left:2%; color: purple;"></i>
                                        </div>
                                        <div class="row" style="margin-left:2%;margin-top:5%;">
                                            <i class="fa fa-file-pdf-o blackcolor"
                                                style="font-size:40px; color: orangered;"></i>
                                        </div>
                                        <div class="row" style="margin-left:2%;margin-top:5%;">
                                            <button class="btn btn-primary" style="margin-left: 15%; 
                                            padding:10px; font-size: 12px;">Upload</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 5%;">
                                        <div class="form-check">
                                            <label class="form-check-label"> I don't have any Documents to upload
                                              <input class="form-check-input" type="checkbox" value="">
                                              <span class="form-check-sign">
                                                <span class="check"></span>
                                              </span>
                                            </label>
                                          </div>  
                                    </div>
                                </div>
                                <div class="row justify-content-end"
                                    style="margin-top: 2%; margin-bottom: 1%; margin-right: 2%;">
                                    <button id="continue3" class="btn btn-primary">Submit</button>
                                </div>        -->






                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Content closed-->
            </div>
            <!--Content closed-->





            <script>
                let div = document.querySelector(".togglediv");
                let btn = document.getElementById("previewbtn");
                let btn2 = document.getElementById("cancel")
                div.style.display = "none"

                btn.addEventListener("click", () => {
                    if (div.style.display === "block") {
                        div.style.display = "none"
                    }
                    else {
                        div.style.display = "block";
                    }
                })

                btn2.addEventListener("click", () => {
                    div.style.display = "none"
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
        $(document).ready(function () {
            $("#continue1").click(function () {
                $("#hidediv1").slideDown();
            })

            $("#continue2").click(function () {
                $("#hidediv2").slideDown();
            })
        })
    </script>

    <script>
        var checkbox = document.querySelector('input[name=theme]');

        checkbox.addEventListener('change', function () {
            if (this.checked) {
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