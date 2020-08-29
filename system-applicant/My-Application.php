<?php
session_start();
require_once "../config/config.php";
require_once '../config/comman_js.php';

if(!isset($_SESSION['order_id']))
{
  echo '
  <script>
  window.location.href = "Index.php";
  </script>
  ';
}
$order_id = $_SESSION['order_id'];
$get_connection = new connectdb;
$db = $get_connection->connect();

$check="SELECT order_id, first_name, middle_name, last_name, alias_first_name, alias_middle_name, alias_last_name, email_id, internal_reference_id, joining_location, joining_date, additional_comments, client_id, is_rush, insufficiency_contact, username, password, order_status, order_creation_date_time FROM order_master WHERE order_id   ='".$order_id."'";
$resul = mysqli_query($db,$check); 
if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
  $order_id = $row['order_id'];
  $first_name = $row['first_name'];
  $middle_name = $row['middle_name'];
  $last_name = $row['last_name'];
  $alias_first_name = $row['alias_first_name'];
  $alias_middle_name = $row['alias_middle_name'];
  $alias_last_name = $row['alias_last_name'];
  $email_id = $row['email_id'];
  $internal_reference_id = $row['internal_reference_id'];
  $joining_location = $row['joining_location'];
  $joining_date = $row['joining_date'];
  $additional_comments = $row['additional_comments'];
  $client_id = $row['client_id'];
  $is_rush = $row['is_rush'];
  $insufficiency_contact = $row['insufficiency_contact'];
  $username = $row['username'];
  $password = $row['password'];
  $order_status = $row['order_status'];
}

if($order_status == "Pending" || $order_status == 'Insufficiency')
{
  $btn_disabled = "";
  $btn_click = 'onclick="save_my_application()"';
}
else
{
  $btn_disabled = "disabled";
  $btn_click = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    My Application
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
  name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">
  <?php
  include '../search_select/select_contorl.php';
  ?>
  <style type="text/css">
    .tablehead1{
      border:none !important;
      background: transparent !important; 
    }
    b{ font-weight: bold !important; }
    .form_center{ text-align: center !important; }
    .form_left{ text-align: left !important; }
    .form_right{ text-align: right !important; }
    .custom-select{
      margin-top: 0 !important;
    }
    .btn-small{
      font-size: 8pt !important;
      padding: 3px 5px !important;
    }
    .btn-xs{
      font-size: 10pt !important;
      padding: 5px 8px !important;
    }
    .btn-xs .material-icons, .fa{
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
      padding: 7px 10px !important
    }
    .btn-sm .material-icons{
      font-size: 11pt;
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
    .sidebar[data-background-color="black"] .nav .nav-item .nav-link,  .dark-edition .sidebar[data-background-color="black"] .nav li:not(.active) a, .dark-edition .sidebar[data-background-color="black"] .nav li:not(.active) .dropdown-menu a{
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
    .container_checkbox {
      display: block;
      position: relative;
      float: left;
      padding: 3px 10px;
      padding-left: 35px;
      cursor: pointer;
      font-size: 15px;
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
      top: 4px;
      left: 4px;
      height: 20px;
      width: 20px;
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
      top: 6px;
      left: 6px;
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
    .col12{
      width: 100%;
      float: left;
    }
    .sidebar[data-background-color="black"] .nav .nav-item .nav-link{
      margin: 0 !important;
    }
    h4 .fa{
      font-size: 16pt !important;
    }
    .card-title{
      text-transform: uppercase;
    }
    .bordered_table table, .bordered_table tr, .bordered_table th, .bordered_table td{
      border: dotted 1px #ccc;
      border-collapse: collapse;
      padding: 4px !important;
    }
    .bordered_table th{
      background: #eee;
    }
    .upload-btn {
      font-size: 13;
      color: white !important;
      margin-left: 45%;
      width: 7%;
      padding: 10px !important;
    }
    .dark-edition .form-control, textarea, input, select
    {
      box-shadow: 0 0 4px #ccc;
    }
    textarea{
      color: #000;
    }
    .btn_down_arrow{
      position: absolute;
      right: 10px;
      padding: 5px 10px;
      font-size: 15pt;
      cursor: pointer;
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
            <a class="nav-link" href="./My-Application.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="toggle-container"
      style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
      <input type="checkbox" id="switch" name="theme" >
      <label id="toggleButton" for="switch">Toggle</label>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a style="color: white;" class="navbar-brand" href="javascript:void(0)">My Application</a>
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
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <p class="d-lg-none d-md-block">
              Account
            </p>
            <div class="ripple-container"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="API/db_logout.php">Log out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content">
    <form id="my_app_panel">

      <input type="hidden" name="order_id" value="<?php echo @$order_id; ?>" />
      <input type="hidden" name="action" value="update_applicant_details" />

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 style=" color: white;" class="card-title"><i class="fa fa-user"></i> Personal Details</h4>
              </div>
              <div class="card-body" style="margin-top: 2%;">
                <div class="row">
                  <div class="col-md-4">
                    <div class="">
                      <label class="bmd-label-floating">First Name <i class="fa fa-star"></i></label>
                      <input type="text" class="form-control" name="first_name" id="first_name" required="" value="<?php echo @$first_name; ?>" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="">
                      <label class="bmd-label-floating">Middle Name <i class="fa fa-star"></i></label>
                      <input name="middle_name" id="middle_name" value="<?php echo @$middle_name; ?>" required type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="">
                      <label class="bmd-label-floating">Last Name <i class="fa fa-star"></i></label>
                      <input name="last_name" id="last_name" value="<?php echo @$last_name; ?>" required type="text" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row" style="margin-top: 1%;">
                  <div class="col-md-4">
                    <div class="">
                      <label class="bmd-label-floating">Alias First Name <i class="fa fa-star"></i></label>
                      <input name="alias_first_name" id="alias_first_name" value="<?php echo @$alias_first_name; ?>" required type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="">
                      <label class="bmd-label-floating">Alias Middle Name <i class="fa fa-star"></i></label>
                      <input name="alias_middle_name" id="alias_middle_name" value="<?php echo @$alias_middle_name; ?>" type="text" required class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="">
                      <label class="bmd-label-floating">Alias Last Name <i class="fa fa-star"></i></label>
                      <input name="alias_last_name" id="alias_last_name" value="<?php echo @$alias_last_name; ?>" type="text" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $print_validations_script = '';
      $check="SELECT os.service_id, s.service_name, os.assign_package_id, os.assign_service_id FROM order_service_details os INNER JOIN service_list s ON s.id = os.service_id WHERE os.order_id   ='".$order_id."'";
      $resul = mysqli_query($db,$check); 
      while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
      {
        $print_validations_script.= '
        let allAreFilled_'.$row["service_id"].' = true;
          document.getElementById("toggle_div_'.$row["service_id"].'").querySelectorAll("[required]").forEach(function(i) {
          if (!allAreFilled_'.$row["service_id"].') return;
          if (!i.value) allAreFilled_'.$row["service_id"].' = false;
          if (i.type === "radio") {
            let radioValueCheck = false;
            document.getElementById("toggle_div_'.$row["service_id"].'").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
              if (r.checked) radioValueCheck = true;
            })
            allAreFilled_'.$row["service_id"].' = radioValueCheck;
          }
        })
        if (!allAreFilled_'.$row["service_id"].' && panel_error == 0) {
          $("#toggle_btn_'.$row["service_id"].'").html(chevron_up);
          $("#toggle_div_'.$row["service_id"].'").show(300);
          $("#panel_msg_'.$row["service_id"].'").css("background", "#d7002d");
          panel_error++;
        }
        else
        {
          $("#panel_msg_'.$row["service_id"].'").css("background", "#54b058");
        }
        ';
        echo '
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary" id="panel_msg_'.$row["service_id"].'">
        <h4 style=" color: white;" class="card-title"><i class="fa fa-edit"></i> '.$row["service_name"].' <a onclick="toggle_click('.$row["service_id"].')" id="toggle_btn_'.$row["service_id"].'" class="btn_down_arrow"><i class="fa fa-chevron-down"></i></a> </h4>
        </div>
        <div id="toggle_div_'.$row["service_id"].'" style="display:none" class="card-body row" style="margin-top: 1%;">
        ';
        $country_id = $state_id = 0;
        $check_1 = "SELECT od.order_details_id, sm.service_field, sm.service_field_text, sm.data_type, sm.is_required, od.service_field_value, od.service_id FROM order_master_details od INNER JOIN service_field_master sm ON sm.service_field_id = od.service_field_id WHERE od.order_id = '".$order_id."' AND od.service_id = '".$row['service_id']."' ";
        $resul_1 = mysqli_query($db,$check_1); 
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
          $is_required = ""; $is_required_star = "";
          if($row_1['is_required'] == 1) { $is_required = "required"; $is_required_star = "<i class='fa fa-star'></i>"; }

          echo '<input type="hidden" name="order_details_id[]" value="'.$row_1["order_details_id"].'" />';
          if($row_1['data_type'] == "date")
          {
            $field_print = '<input type="date" class="form-control" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value"].'" '.@$is_required.' />';
          }
          if($row_1['data_type'] == "short_text")
          {
            $field_print = '<input type="text" class="form-control" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value"].'" '.@$is_required.' />';
          }
          if($row_1['data_type'] == "number")
          {
            $field_print = '<input type="number" class="form-control" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value"].'" '.@$is_required.' />';
          }
          if($row_1['data_type'] == "long_text")
          {
            $field_print = '<textarea type="text" class="custom-select" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" '.@$is_required.' >'.$row_1["service_field_value"].'</textarea>';
          }
          if($row_1['data_type'] == "select")
          {
            $onchange_evt = "";
            if($row_1['service_field'] == "country_id") { $onchange_evt = 'onchange="load_state('.$row_1["service_id"].','.$row_1['order_details_id'].')"'; }
            if($row_1['service_field'] == "state_id") { $onchange_evt = 'onchange="load_city('.$row_1["service_id"].','.$row_1['order_details_id'].')"'; }
            $field_print = '
            <div id="'.strtolower($row_1["service_field"]).'_'.$row_1["service_id"].'_div">
            <select '.$onchange_evt.' class="chosen-select" id="'.$row_1["service_field"].'_'.$row_1['service_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" '.@$is_required.' >';
            if($row_1["service_field"] == "country_id")
            {
              $field_print.='<option value="">Select</option>';
              $check_2 = "SELECT id, name FROM countries ";
              $resul_2 = mysqli_query($db,$check_2); 
              while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
              {
                $selected_option = '';
                if($row_1['service_field_value'] == $row_2['id'])
                {
                  $country_id = $row_2['id'];
                  $selected_option = 'selected';
                }
                $field_print.='<option '.@$selected_option.' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';    
              }
            }
            if($row_1["service_field"] == "state_id" && @$country_id > 0)
            {
              $field_print.='<option value="">Select</option>';
              $check_2 = "SELECT id, name FROM states WHERE country_id = '$country_id' ";
              $resul_2 = mysqli_query($db,$check_2); 
              while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
              {
                $selected_option = '';
                if($row_1['service_field_value'] == $row_2['id'])
                {
                  $state_id = $row_2['id'];
                  $selected_option = 'selected';
                }
                $field_print.='<option '.@$selected_option.' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';    
              }
            }
            if($row_1["service_field"] == "city_id" && @$state_id > 0)
            {
              $field_print.='<option value="">Select</option>';
              $check_2 = "SELECT id, name FROM cities WHERE state_id = '$state_id' ";
              $resul_2 = mysqli_query($db,$check_2); 
              while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
              {
                $selected_option = '';
                if($row_1['service_field_value'] == $row_2['id'])
                {
                  $selected_option = 'selected';
                }
                $field_print.='<option '.@$selected_option.' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';    
              }
            }
            $field_print.='</select></div>';
          }
          
          echo '
          <div class="col-md-4">
          <input type="hidden" id="lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'"  value="Please input '.$row_1["service_field_text"].'" />
          <label style="margin:10px 0;">'.$row_1["service_field_text"].' '.@$is_required_star.'</label>
          '.$field_print.'
          </div>
          ';
        }
        echo '
        </div>
        </div>
        </div>
        </div>
        </div>
        ';
      }
      ?>
    </form>
    <form id="upload_document_form">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary" >
                <h4 class="card-title" style="color:white;"><i class="fa fa-cloud"></i> Upload Documents</h4>
              </div>
              <div class="row" style="margin-left:1%;margin-top:2%;">
                <?php
                echo '
                <h6 class="selection col-md-12">Upload Multiple Documents Here</h6>                                    
                <div class="col-md-4">
                <input type="file" onchange="file_selected_list()" multiple id="document_file" name="document_file[]" class="form-control" />
                </div>
                <div class="col-md-4">
                <a class="btn btn-success btn-sm" onclick="upload_document_file()" id="btn_upload"><i class="fa fa-upload"></i> Upload Files</a>
                </div>
                <div class="col-md-12" id="selectedFiles"></div>
                <hr class="col12" style="margin:8px 0">
                ';  
                ?>
                <div class="row col-md-12">
                  <div class="col-md-8" id="documents_panel"></div>
                  <div class="col-md-4">
                    <h5 class="selection">File Formats</h5>
                    <div class="row selection" style="margin-left:1%;margin-top:2%;">
                      <i class="fa fa-file-image-o" style="font-size:40px !important;margin-left:2%;color: green;"></i>
                      <i class="fa fa-file-word-o" style="font-size:40px !important;margin-left:2%;color: blue;"></i>
                      <i class="fa fa-file-excel-o " style="font-size:40px !important;margin-left:3%;color: green"></i>
                      <i class="fa fa-file-powerpoint-o " style="font-size:40px !important;margin-left:3%;color: orange"></i>
                      <i class="fa fa-file-pdf-o selection" style="color: red !important; margin-left:3%; font-size:40px !important;"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-12"><br></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="container-fluid" id="hidediv2" >
      <div class="row justify-content-end" style="margin-bottom: 2%;">
       <div class="col-md-2">
         <a <?php echo @$btn_click; ?> id="btn_ok" class="btn btn-success <?php echo @$btn_disabled; ?>"><i class="fa fa-save"></i> Submit</a>
       </div>
     </div>
   </div>
 </div>
 <script type="text/javascript">
  $('.chosen-select').chosen();

  function toggle_click(service_id)
  {
    if($('#toggle_div_'+service_id).css('display') == "none")
    {
      $('#toggle_btn_'+service_id).html('<i class="fa fa-chevron-up"></i>');
      $('#toggle_div_'+service_id).show(300);
    }
    else
    {
      $('#toggle_btn_'+service_id).html('<i class="fa fa-chevron-down"></i>');
      $('#toggle_div_'+service_id).hide(300);
    }
  }

  function load_state(service_id, order_details_id)
  {
    var country_id = $('#country_id_'+service_id).val();
    var load_data = 'load_state';
    $.ajax({
      type:'POST',
      url:'./API/Address-Functions.php',
      data:{country_id, load_data, service_id, order_details_id},
      success:function(html){
        let is_require = "";
        if($('#state_id_'+service_id).prop('required') == true)
        {
          is_require = 'true';
        }
        let new_name = $('#state_id_'+service_id).attr("name")
        $('#state_id_'+service_id+'_div').html(html);
        $('#state_id_'+service_id).chosen();
        $('#state_id_'+service_id).prop('required', is_require);
        $('#state_id_'+service_id).attr('name', new_name);
      }
    });
  }

  function load_city(service_id, order_details_id)
  {
    var state_id = $('#state_id_'+service_id).val();
    var load_data = 'load_city';
    $.ajax({
      type:'POST',
      url:'./API/Address-Functions.php',
      data:{state_id, load_data, service_id, order_details_id},
      success:function(html){
        let is_require = "";
        if($('#city_id_'+service_id).prop('required') == true)
        {
          is_require = 'true';
        }
        let new_name = $('#city_id_'+service_id).attr("name")
        $('#city_id_'+service_id+'_div').html(html);
        $('#city_id_'+service_id).chosen();
        $('#city_id_'+service_id).prop('required', is_require);
        $('#city_id_'+service_id).attr('name', new_name);
      }
    });
  }

  function load_attached_documents(order_id)
  {
    var action = 'load_attached_documents';
    $.ajax({
      type:'POST',
      url:'./API/Applicant-Actions.php',
      data:{action, order_id},
      success:function(html){
        $('#documents_panel').html(html);
      }
    });
  }

  load_attached_documents(<?php echo $order_id; ?>);

  function upload_document_file()
  {
    var document_file = $('#document_file').prop('files')[0] || 0;
    if(document_file == "0")
    {
      alert('Please select file!')
      $('#document_file').focus();
    }
    else
    {
      $('#modal_loading').css('display', 'block');
      $('#btn_upload').addClass('disabled');

      var myform = document.getElementById("upload_document_form");
      var fd = new FormData(myform );
      $.ajax({
        url: "./API/Upload-Document.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (html) {
          if(html == "inserted")
          {
            load_attached_documents(<?php echo @$order_id; ?>);
            alert('File Uploaded successfully!');
            $('#document_file').val('');
            $('#btn_upload').removeClass('disabled');
            $('#selectedFiles').html('');
            $('#modal_loading').css('display', 'none');
          }
          else
          {
            alert('Error occurred');
            $('#btn_upload').removeClass('disabled');
          }
        }
      });
    }
  }

  function validate_form_components() {
    $("input, select, textarea").each(function ()
    {
      if($(this).val() != '')
      {
        $(this).prop('readonly', true);
        $(this).addClass('disabled');
      }
    })
  }
  validate_form_components();

  function save_my_application()
  {
    var first_name = $('#first_name').val();
    var alias_first_name = $('#alias_first_name').val();
    if(first_name == "") { alert('Please enter first name'); $('#first_name').focus(); return; exit(); }
    if(alias_first_name == "") { alert('Please enter Alias first name'); $('#alias_first_name').focus(); return; exit(); }

    var middle_name = $('#middle_name').val();
    var alias_middle_name = $('#alias_middle_name').val();
    if(middle_name == "") { alert('Please enter middle name'); $('#middle_name').focus(); return; exit(); }
    if(alias_middle_name == "") { alert('Please enter Alias middle name'); $('#alias_middle_name').focus(); return; exit(); }

    var last_name = $('#last_name').val();
    var alias_last_name = $('#alias_last_name').val();
    if(last_name == "") { alert('Please enter last name'); $('#last_name').focus(); return; exit(); }
    if(alias_last_name == "") { alert('Please enter Alias last name'); $('#alias_last_name').focus(); return; exit(); }

    var panel_error = 0;
    var chevron_up = '<i class="fa fa-chevron-up"></i>';
    <?php echo @$print_validations_script; ?>

    let lbl_focus = ""; let error = 0;
    $("input, select, textarea").each(function ()
    {
      if($(this).prop('required'))
      {
        if($(this).val() == '')
        {
          if(error == 0)
          {
            lbl_focus = $(this).attr('name');
          }
          error++;
          return;
        }
      }
    })

    if(error > 0)
    {
      alert($('#lbl_print_'+lbl_focus).val());
      $('input[name="'+lbl_focus+'"]').focus();
    }
    else
    {
      let r = confirm("Are you sure to Submit your Application?")
      if(r == true)
      {
        $('#btn_ok').addClass('disabled');
        var myform = document.getElementById("my_app_panel");
        var fd = new FormData(myform );
        $.ajax({
          url: "./API/Applicant-Actions.php",
          data: fd,
          cache: false,
          processData: false,
          contentType: false,
          type: 'POST',
          success: function (html) {
            if(html == "updated")
            {
              alert('Application updated successfully!');
              window.location.href = "My-Application.php";
            }
            else
            {
              alert('Error occurred');
              $('#btn_ok').removeClass('disabled');
            }
          }
        });
      }
    }
  }

</script>

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
    }, 400)
  }
</script>

<script>
  $(document).ready(function () {
    $("#continue1").click(function () {
      $("#hidediv1").show();
      window.location = '#hidediv1';
    });

    $("#continue2").click(function () {
      $("#hidediv2").show();
      window.location = '#hidediv2';
    })
  })
</script>

<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<!-- <script src="https://unpkg.com/default-passive-events"></script> -->
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
</body>

</html>