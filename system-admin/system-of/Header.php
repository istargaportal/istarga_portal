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

  <style type="text/css">
    .tablehead1{
      border:none !important;
      background: transparent !important; 
    }
    b{ font-weight: bold !important; }
    .form_center{ text-align: center; }
    .form_left{ text-align: left; }
    .form_right{ text-align: right; }
    .custom-select{
      margin-top: 0 !important;
    }
    .btn-small{
      font-size: 8pt !important;
      padding: 3px 5px !important;
    }
    .btn-xs{
      font-size: 9pt !important;
      padding: 5px 7px !important;
    }
    .btn-xs .material-icons, .btn-xs .fa{
      font-size: 10pt !important;
    }

    .btn-round{
      border-radius: 100%;
    }
    .btn-danger{
      background:#eb1e2f !important;
    }
    .btn-warning i, .btn-danger i{
      color: #fff !important;
    }
    .btn-warning{
      background:#feaf31 !important;
    }

    .dropdown-item{
      cursor: pointer;
    }
    .btn-success{
      background:#346bd6 !important
    }
    .btn-success i, .btn-primary i{
      color: #fff !important;
    }
    .btn-default i{
      color: #000 !important;
    }

    .btn-default{
      color: #000 !important;
      background:#ccc !important;
    }
    .btn-sm{
      font-size: 10pt !important;
      padding: 7px 10px !important
    }
    .btn-sm .material-icons, .btn-sm .fa{
      font-size: 11pt !important;
    }
    .container_checkbox {
      display: block;
      position: relative;
      float: left;
      padding: 3px 10px;
      padding-left: 35px;
      cursor: pointer;
      font-size: 12pt;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background: #fff;
      border:solid 1px #aaa;
      border-radius: 40px;
      margin-right: 4px;
    }

    .container_checkbox input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    .checkmark {
      position: absolute;
      top: 6px;
      left: 6px;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    .container_checkbox:hover input ~ .checkmark {
      background-color: #ccc;
    }

    .container_checkbox input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    .container_checkbox input:checked ~ .checkmark:after {
      display: block;
    }

    .container_checkbox .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }
    .material_checkbox {
      display: block;
      position: relative;
      padding: 8px 10px;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 12pt;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: solid 1px #000;
      float: left;
      border-radius: 45px;
    }
    .material_checkbox input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    .material_checkbox:hover input ~ .checkmark {
      background-color: #ccc;
    }
    .material_checkbox input:checked ~ .checkmark {
      background-color: #2196F3;
    }
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
    .material_checkbox input:checked ~ .checkmark:after {
      display: block;
    }
    .material_checkbox .checkmark:after {
      left: 8px;
      top: 2px;
      width: 10px;
      height: 15px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    .chosen-container{width:100%!important}.chosen-container-multi .chosen-choices,.chosen-container-single .chosen-single{padding:5px 8px!important;background:linear-gradient(#fff 20%,#f6f6f6 50%,#eee 52%,#f4f4f4 100%)!important}.chosen-container-single .chosen-single div{top:4px!important}.chosen-container .chosen-drop{z-index:9999999!important}
    .chosen-container-single .chosen-single{
      padding: 4px 5px !important;
      height: 35px !important;
    }
    .list_none ul, .list_none li
    {
      list-style: none !important;
    }
    .disabled
    {
      pointer-events:none !important;
      cursor: not-allowed !important;
      filter: blur(0.4px);
      outline: none !important;
      -webkit-user-select: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;            
    }
    
    .disabled_btn
    {
      opacity: 0.6;
      pointer-events:none !important;
      cursor: not-allowed !important;
      filter: blur(0.4px);
      outline: none !important;
      -webkit-user-select: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;            
    }
    
    .dark-edition .table>thead>tr>th, .dark-edition .table>tbody>tr>th, .dark-edition .table>tfoot>tr>th, .dark-edition .table>thead>tr>td, .dark-edition .table>tbody>tr>td, .dark-edition .table>tfoot>tr>td{
      padding: 4px !important;
    }
    .dark-edition .table>thead>tr>td, .dark-edition .table>tbody>tr>td, .dark-edition .table>tfoot>tr>td{
      /*color: #000;*/
    }
    .dark-edition .sidebar[data-background-color="black"] .nav li:not(.active) a, .dark-edition .sidebar[data-background-color="black"] .nav li:not(.active) .dropdown-menu a{
      margin: 0;
    }
    .sidebar .nav{
      margin-top: 0;
    }
    .nav-link .material-icons{
      color: #9094a3 !important;
    }
    .list-unstyled{
      background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
    }
    .chosen-container-multi .chosen-choices li.search-field{
      width: auto;
      background:transparent;
    }
    .dark-edition .form-control, textarea, input, select
    {
      box-shadow: 0 0 4px #ccc;
    }
    textarea{
      color: #000;
    }

    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 9999999999; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    .modal .row{
      margin: 0 !important;
    }
    .modal-content {
      background-color: #fefefe;
      padding: 1% 2%;
      border: 1px solid #888;
      width: 100%;
      margin: 0;
    }

    .close {
      color: #000;
      float: right;
      font-size: 16pt;
      font-weight: bold;
      float: right;
      padding: 0 4px;
      transition: 0.4s all ease;
    }
    .close .fa{
      color: #000;
    }
    .close:hover,
    .close:focus {
      font-size: 20pt;
    }
    .no_padding{
      padding: 0;
    }
    .modal .tile-stats,.modal-content{-webkit-animation-name:animatetop!important;-webkit-animation-duration:.2s!important;animation-name:animatetop!important;animation-duration:.2s!important}@-webkit-keyframes animatetop{from{transform:scale(0)}to{transform:scale(1)}}@keyframes animatetop{from{transform:scale(0)}to{transform:scale(1)}}
    .fa-star{
      font-size: 8pt !important;
      color: red;
    }
    .font_normal{
      text-transform: none !important;
    }
    .card-title{
      text-transform: uppercase !important;
    }
  .sidebar[data-background-color="black"] .nav .nav-item .nav-link{
    margin: 0 !important;
  }
  .sidebar
  {
    background: linear-gradient(rgba(31,40,62,0.8),rgba(31,40,62,0.8)),url('../assets/img/sidebar-2.jpg')!important;
    background-size: contain!important;
  }
  .btn_danger{
      color: #000 !important;
      background: #fff !important;
      border:solid 1px #eb1e2f !important;
  }
  .btn_link{
      color: #3354d6 !important;
      background: #fff !important;
      border:solid 1px #ccc !important;
      font-weight: bold !important;
  }
  </style>
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
          <a class="nav-link" href="#">
            <i class="fa fa-calendar"></i>
            <p>Mark Attendance</p>
          </a>
        </li>
        <li class="nav-item <?php if($page_name_compare == "my profile") { echo 'active'; } ?>">
          <a class="nav-link" href="#">
            <i class="fa fa-user"></i>
            <p>My Profile</p>
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
                <a class="nav-link" href="/client_Side_Files/adminDashboard_sidebar.php">
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
         <a class="dropdown-item" href="#">Profile</a>
         <a class="dropdown-item" href="#">Settings</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="../API/db_logout.php">Log out</a>
       </div>
     </li>
   </ul>
 </div>
</div>
</nav>
        <!-- End Navbar -->