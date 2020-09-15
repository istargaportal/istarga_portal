<?php
session_start();
if(!isset($_SESSION['email']))
{
	echo '
	<script>
	window.location.href="index.php";
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
if(@$page_name_compare == "attendance master")
{
  $calendar_active = "active";
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

  <?php
    include 'comman_style.php';
  ?>
  <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    $("input").each(function () {
      $(this).attr("autocomplete", "off");
    })
  }, false);

    $("input").each(function () {
      $(this).attr("autocomplete", "off");
    })
  </script>
</head>
<body class="dark-edition">
	<div id="print_result"></div>
  <div id='modal_loading' class='modal' style=" background-color: rgba(255,255,255,.9); border:none !important; z-index: 999999999!important;">
    <div class='modal-content row' style="width: 100% !important;margin-top:-40px;background: transparent !important; box-shadow: none !important; border:none !important; ">
      <div class="col-md-12 form_center" >
        <br><br>
        <br><br>
        <br><br>
        <img style="width: 200px;" src="assets/images/loading.gif" />
      </div>
    </div>
  </div>
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
  <!-- <li class="nav-item <?php echo @$report_config_active; ?>">
    <a class="nav-link" name href="./Report-Config.php"><i class="material-icons icon">launch</i> Report Configuration Master</a>
  </li> -->
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
<li class="nav-item <?php echo @$calendar_active; ?>">
  <a class="nav-link" href="./Attendance-Master.php"><i class="fa fa-calendar"></i> Attendance Master</a>
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
                <li class="nav-item dropdown">
                  <a class="nav-link" style="text-transform: none;">
                    Admin<br> <b><i style="font-size: 11pt !important" class="fa fa-envelope"></i> <?php echo @$_SESSION['email']; ?></b>
                  </a>
                </li>
            <!-- <li class="nav-item dropdown">
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
         </li> -->
         <li class="nav-item dropdown">
          <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i style="color: white;" class="material-icons">person</i>
           <p class="d-lg-none d-md-block">
            Account
          </p>
          <div class="ripple-container"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
         <!-- <a class="dropdown-item" href="#">Profile</a> -->
         <a onclick="change_password()" class="dropdown-item" href="#">Settings</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="API/db_logout.php">Log out</a>
       </div>
     </li>
   </ul>
 </div>
</div>
</nav>

<?php
  $admin_status = 1;
  include 'Change-Password-Functions.php';
?>