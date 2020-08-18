<?php
session_start();
if(!isset($_SESSION['email']))
{
	echo '
	<script>
	window.location.href="Index.php";
	</script>
	';
}
$page_name_compare = strtolower(@$page_name);
$client_collapse = "collapse";
if(@$page_name_compare == "add client" || @$page_name_compare == "edit client")
{
  $client_collapse = "";
  $add_client_active = "active";
}
if(@$page_name_compare == "modify client")
{
  $client_collapse = "";
  $modify_client_active = "active";
}
if(@$page_name_compare == "search order")
{
  $client_collapse = "";
  $search_order_active = "active";
}
if(@$page_name_compare == "assign service")
{
  $client_collapse = "";
  $assign_service_active = "active";
}
if(@$page_name_compare == "lob")
{
  $client_collapse = "";
  $lob_active = "active";
}
if(@$page_name_compare == "assign package")
{
  $client_collapse = "";
  $assign_package_active = "active";
}
$services_collapse = "collapse";
if(@$page_name_compare == "service type")
{
  $services_collapse = "";
  $service_type_active = "active";
}
if(@$page_name_compare == "service")
{
  $services_collapse = "";
  $service_active = "active";
}
if(@$page_name_compare == "package")
{
  $services_collapse = "";
  $package_active = "active";
}
$master_collapse = "collapse";
if(@$page_name_compare == "mandatory documents")
{
  $master_collapse = "";
  $mandatory_doc_active = "active";
}
if(@$page_name_compare == "standard macro")
{
  $master_collapse = "";
  $standard_macro_active = "active";
}
if(@$page_name_compare == "eta macros")
{
  $master_collapse = "";
  $eta_macros_active = "active";
}
if(@$page_name_compare == "report color")
{
  $master_collapse = "";
  $report_color_active = "active";
}
if(@$page_name_compare == "report configuration")
{
  $master_collapse = "";
  $report_config_active = "active";
}
if(@$page_name_compare == "email trigger")
{
  $master_collapse = "";
  $email_trigger_active = "active";
}
$user_collapse = "collapse";
if(@$page_name_compare == "add user")
{
  $user_collapse = "";
  $add_user_active = "active";
}
if(@$page_name_compare == "modify user" || @$page_name_compare == "edit user")
{
  $user_collapse = "";
  $modify_user_active = "active";
}
$settings_collapse = "collapse";
if(@$page_name_compare == "mandatory fields manager")
{
  $settings_collapse = "";
  $mandatory_fields_active = "active";
}

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
	<link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/3aaaecc22c.js" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" /> -->

	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/demo/demo.css" rel="stylesheet" />

	<!--Switching modes-->
	<link rel="stylesheet" href="assets/css/style.css">
  <?php
  include '../search_select/select_contorl.php';
  ?>
  <link rel="stylesheet" href="popup.css">

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
    .disabled_btn
    {
      pointer-events:none !important;
      cursor: not-allowed !important;
      opacity: 0.6 !important;
      filter: blur(0.7px);
      outline: none !important;
      -webkit-user-select: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;            
    }
    
    .disabled
    {
      pointer-events:none !important;
      cursor: not-allowed !important;
      opacity: 0.7 !important;
      filter: blur(0.7px);
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
    .main-panel>.content {
      margin-top: 50px;
      padding: 20px 15px;
    }
  </style>
</head>
<body class="dark-edition">
	<div id="print_result"></div>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <div class="logo"> <a class="navbar-brand" href="#">
       <img src="assets/img/logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
     </a></div>
     <div class="sidebar-wrapper">
       <ul class="nav">
        <li class="nav-item">
         <a class="nav-link" href="./Dashboard.php">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
       <a href="#client" class="nav-link" data-toggle="collapse"><i class="material-icons">person</i>
        <p>Client</p></a>
        <div class="<?php echo @$client_collapse; ?>" id="client">
          <ul class="list-unstyled nav">
           <li class="nav-item <?php echo @$add_client_active; ?>">
            <a class="nav-link" href="./addClient.php"><i class="material-icons icon">launch</i> Add Client</a>
          </li>
          <li class="nav-item <?php echo @$modify_client_active; ?>">
            <a class="nav-link" href="./modifyClient.php"><i class="material-icons icon">launch</i> Modify Client</a>
          </li>
          <li class="nav-item <?php echo @$search_order_active; ?>">
            <a class="nav-link" href="./vieworder.php"><i class="material-icons icon">launch</i> Search Order</a>
          </li>
          <li class="nav-item <?php echo @$assign_service_active; ?>">
            <a class="nav-link" href="./Assign-Service.php"><i class="material-icons icon">launch</i> Assign Services</a>
          </li>
          <li class="nav-item <?php echo @$assign_package_active; ?>">
            <a class="nav-link" href="./Assign-Package.php"><i class="material-icons icon">launch</i> Assign Package</a>
          </li>
          <li class="nav-item <?php echo @$lob_active; ?>">
            <a class="nav-link" href="./LOB.php"><i class="material-icons icon">launch</i> LOB</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="navbar-item">
     <a href="#services" class="nav-link collapse" data-toggle="collapse" >
      <i class="material-icons">supervisor_account</i>
      <p>Services</p>
    </a>
    <div class="<?php echo @$services_collapse; ?>" id="services">
      <ul class="list-unstyled nav">
       <li class="nav-item <?php echo @$service_type_active; ?>">
        <a class="nav-link" name href="./serviceType.php"><i class="material-icons icon">launch</i> Add / Modify Service Type</a>
      </li>
      <li class="nav-item <?php echo @$service_active; ?>">
        <a class="nav-link" href="./createService.php"><i class="material-icons icon">launch</i> Add / Modify Services</a>
      </li>
      <li class="nav-item <?php echo @$package_active; ?>">
        <a class="nav-link" href="./package.php"><i class="material-icons icon">launch</i> Add / Modify Package</a>
      </li>
    </ul>
  </div>
</li>
<li class="navbar-item">
 <a href="#master" class="nav-link" data-toggle="collapse">
  <i class="material-icons">library_books</i>
  <p>Master</p>
</a>

<div class="<?php echo @$master_collapse; ?>" id="master">
  <ul class="list-unstyled nav">
   <li class="nav-item <?php echo @$mandatory_doc_active; ?>">
    <a class="nav-link" name href="./mandatoryDocuments.php"><i class="material-icons icon">launch</i> Mandatory Documents</a>
  </li>
  <li class="nav-item <?php echo @$standard_macro_active; ?>">
    <a class="nav-link" name href="./standardMacro.php"><i class="material-icons icon">launch</i> Standard Macro</a>
  </li>
  <li class="nav-item <?php echo @$eta_macros_active; ?>">
    <a class="nav-link" name href="./ETA-Macros.php"><i class="material-icons icon">launch</i> ETA Macros</a>
  </li>
  <li class="nav-item <?php echo @$report_color_active; ?>">
    <a class="nav-link" name href="./reportColor.php"><i class="material-icons icon">launch</i> Report Color Code</a>
  </li>
  <li class="nav-item <?php echo @$report_config_active; ?>">
    <a class="nav-link" name href="./Report-Config.php"><i class="material-icons icon">launch</i> Report Configuration Master</a>
  </li>
  <li class="nav-item <?php echo @$email_trigger_active; ?>">
    <a class="nav-link" name href="./Email-Triggers.php"><i class="material-icons icon">launch</i> Email Triggers</a>
  </li>
</ul>
</div>
</li>
<li class="navbar-item">
 <a href="#user" class="nav-link" data-toggle="collapse"><i class="material-icons">account_circle</i>
  <p>User</p>
</a>
<div class="<?php echo @$user_collapse; ?>" id="user">
  <ul class="list-unstyled nav">
   <li class="nav-item <?php echo @$add_user_active; ?>">
    <a class="nav-link" name href="./Add-User.php"><i class="material-icons icon">launch</i> Add User</a>
  </li>
  <li class="nav-item <?php echo @$modify_user_active; ?>">
    <a class="nav-link" name href="./Modify-User.php"><i class="material-icons icon">launch</i> Modify User</a>
  </li>
</ul>
</div>
</li>
<li class="navbar-item">
 <a href="#settings" class="nav-link" data-toggle="collapse"><i class="material-icons">settings</i>
  <p>Settings</p>
</a>
<div class="<?php echo @$settings_collapse; ?>" id="settings">
  <ul class="list-unstyled nav">
   <li class="nav-item <?php echo @$mandatory_fields_active; ?>">
    <a class="nav-link" href="./Mandatory-Fields-Manager.php"><i class="material-icons icon">launch</i> Mandatory Fields Manager</a>
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
    <a class="nav-link" name href="./ViewAttendence.php"><i class="material-icons icon">launch</i> View calendar</a>
  </li>
</ul>
</div>
</li>
</ul>
</div>
<!--Side Bar End-->
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
                <a class="nav-link" href="./Dashboard.php">
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
         <a class="dropdown-item" href="API/db_logout.php">Log out</a>
       </div>
     </li>
   </ul>
 </div>
</div>
</nav>
        <!-- End Navbar -->