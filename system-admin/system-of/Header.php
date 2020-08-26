<?php
session_start();
if(!isset($_SESSION['username']))
{
	echo '
	<script>
	window.location.href="../Index.php";
	</script>
	';
}
else
{
  $user_id = $_SESSION['user_id'];
}
$page_name_compare = strtolower(@$page_name);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		<?php echo $page_name; ?>
	</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<!-- CSS Files -->

	<link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/3aaaecc22c.js" crossorigin="anonymous"></script>
	<link href="../assets/demo/demo.css" rel="stylesheet" />

	<link rel="stylesheet" href="../assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../../search_select/select_js.js"></script>
  <link rel="stylesheet" href="../../search_select/select_css.css">
  
  <link rel="stylesheet" href="../popup.css">

  <?php
  include '../comman_style.php';
  ?>

</head>
<body class="dark-edition">
  <div id='modal_loading' class='modal' style=" background-color: rgba(255,255,255,.9); border:none !important; z-index: 999999999!important;">
    <div class='modal-content row' style="width: 100% !important;margin-top:-40px;background: transparent !important; box-shadow: none !important; border:none !important; ">
      <div class="col-md-12 form_center" >
        <br><br>
        <br><br>
        <br><br>
        <img style="width: 200px;" src="../assets/images/loading.gif" />
      </div>
    </div>
  </div>
  
  <div id="print_result"></div>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo"> <a class="navbar-brand" href="#">
       <img src="../assets/img/logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
     </a></div>
     <div class="sidebar-wrapper">
       <ul class="nav">
        <li class="nav-item <?php if($page_name_compare == "search order") { echo 'active'; } ?>">
          <a class="nav-link" href="Dashboard.php">
            <i class="fa fa-search"></i>
            <p>Search Order</p>
          </a>
        </li>
        <li class="nav-item <?php if($page_name_compare == "mark attendance") { echo 'active'; } ?>">
          <a class="nav-link" href="Mark-Attendance.php">
            <i class="fa fa-calendar"></i>
            <p>Mark Attendance</p>
          </a>
        </li>
        <li class="nav-item <?php if($page_name_compare == "profile") { echo 'active'; } ?>">
          <a class="nav-link" href="Profile.php">
            <i class="fa fa-user"></i>
            <p>Profile</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
   <!-- Navbar -->
   <link rel="icon" type="image/png" href="assets/img/favicon.png" />

   <!--toggle button-->
   <div class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
    <input type="checkbox" id="switch" name="theme">
    <label id="toggleButton" for="switch">Toggle</label>
  </div>
  <nav style="padding:0; margin:0; border:0" class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example">
    <div class="container-fluid">
     <div class="navbar-wrapper" style="height: 70px;">
      <a class="navbar-brand" href="javascript:void(0)" style="color: white;"><?php echo $page_name; ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
       <li class="nav-item dropdown">
        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i style="color: white;" class="material-icons">person</i>
         <p class="d-lg-none d-md-block">
          Account
        </p>
        <div class="ripple-container"></div>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
       <a class="dropdown-item" href="Profile.php">Profile</a>
       <a class="dropdown-item" onclick="change_password()">Settings</a>
       <div class="dropdown-divider"></div>
       <a class="dropdown-item" href="../API/db_logout.php">Log out</a>
     </div>
   </li>
 </ul>
</div>
</div>
</nav>