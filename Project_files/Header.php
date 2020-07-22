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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/demo/demo.css" rel="stylesheet" />

	<!--Switching modes-->
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="popup.css">
    
    <style type="text/css">
        .custom-select{
            margin-top: 0 !important;
        }
        .btn-xs{
            font-size: 9pt;
            padding: 6px 8px;
        }
        .btn-xs .material-icons{
            font-size: 9pt;
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
            padding: 7px 10px !important
        }
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
.chosen-container{width:100%!important}.chosen-container-multi .chosen-choices,.chosen-container-single .chosen-single{padding:5px 8px!important;background:linear-gradient(#fff 20%,#f6f6f6 50%,#eee 52%,#f4f4f4 100%)!important}.chosen-container-single .chosen-single div{top:4px!important}.chosen-container .chosen-drop{z-index:9999999!important}.
    </style>
    <?php
        include '../search_select/select_css.php';
    ?>
</head>
<body class="dark-edition">
	<div id="print_result"></div>
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
    						<a class="nav-link" href="#">Auto SLA </a>
    					</li>
    					<li class="nav-item">
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
    						<a class="nav-link" name href="#">Auto SLA</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" name href="./reportColor.php">Report Color Code</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" name href="./reportConfig.php">Report Configuration Master</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" name href="#">Insufficient Emial Triggers</a>
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