<?php
session_start();
if(isset($_SESSION['uname']) && isset($_SESSION['password']))
{
  $unsa=$_SESSION['uid'];
}
else
{   
  header("location:index.php?msg=invalid");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
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
  <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">
<!-- <style>
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 70px 25px;
  width: 100%;
  background: #202940;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 12.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}

</style> -->

<style type="text/css">
  .container_checkbox {
    display: block;
    position: relative;
    float: left;
    padding: 3px 10px;
    padding-left: 35px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background: #fff;
    border:solid 1px #aaa;
    border-radius: 40px;
    margin-right: 4px;
  }

  /* Hide the browser's default radio button */
  .container_checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 6px;
    left: 6px;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
  }

  /* On mouse-over, add a grey background color */
  .container_checkbox:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .container_checkbox input:checked ~ .checkmark {
    background-color: #2196F3;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .container_checkbox input:checked ~ .checkmark:after {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .container_checkbox .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }
  /*# sourceMappingURL=login.css.map */

  [type="date"] {
    background: url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png) 97% 50% no-repeat;
  }

  [type="date"]::-webkit-inner-spin-button {
    display: none;
  }

  [type="date"]::-webkit-calendar-picker-indicator {
    opacity: 100;
  }

  .table {
    overflow-x: auto;
    white-space: nowrap;
  }

  .bg-secondary {
    background-color: white !important;
    color: black !important;
  }
  select{
    padding: 4px !important;
    height: 35px !important;
  }
</style>  
</head>

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
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($page_name == "Dashboard") { echo $active; } ?>">
            <a class="nav-link" href="Dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($page_name == "View Order") { echo $active; } ?>">
            <a class="nav-link" href="ClientViewOrder.php">
              <i class="material-icons">content_paste</i>
              <p>View Orders</p>
            </a>
          </li>
          <li class="nav-item <?php if($page_name == "Create Order") { echo $active; } ?>">
            <a class="nav-link" href="CreateOrder.php">
              <i class="material-icons">content_paste</i>
              <p>Create Order</p>
            </a>
          </li>
          <li class="nav-item <?php if($page_name == "Bulk Order") { echo $active; } ?>">
            <a class="nav-link" href="ClientBulkOrder.php">
              <i class="material-icons">library_books</i>
              <p>Bulk Orders</p>
            </a>
          </li>
          <li class="nav-item <?php if($page_name == "Reports") { echo $active; } ?>">
            <a class="nav-link" href="reports.php">
              <i class="material-icons">bubble_chart</i>
              <p>Reports</p>
            </a>
          </li>
          <li class="nav-item <?php if($page_name == "My Profile") { echo $active; } ?>">
            <a class="nav-link" href="MyProfile.php">
              <i class="material-icons">person</i>
              <p>My Profile</p>
            </a>
          </li>

          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="upgrade.php">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
              </li> -->
            </ul>
          </div>
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
              <div class="navbar-wrapper" style="height: 50px;">
                <a class="navbar-brand" href="javascript:void(0)" style="color: white;"><?php echo @$page_name; ?></a>
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