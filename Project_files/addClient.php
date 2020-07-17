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
<?php
if(isset($_GET['id']))
{
  $title_form = "Edit Clients";
  $id = $_GET['id'];

  require_once "config/config.php";

  $get_connection=new connectdb;
  $db=$get_connection->connect();

  class country
  {
    public function __construct($db)
    {
      $this->conn=$db;
    }

    public function update_details()
    {
      global $id; global $Client_Name; global $Client_Code; global $country; global $Client_SPOC; global $State; global $city; global $Zip_Code; global $Contact_Number; global $App_Response_Time; global $Inv_Address; global $Inv_Bank; global $Inv_Due_Days; global $Inv_Code; global $Is_GSTIN; global $email; global $Currency; global $DOB; global $password;
      $json=file_get_contents("php://input");
      $data=json_decode($json,true);
      if(isset($id))
      {
        $checbk='SELECT * FROM client WHERE user_status="1" and id="'.$id.'" ORDER BY Id DESC';
        $result1=$this->conn->query($checbk);
        if($result1->num_rows>0)
        {
          $reed=$result1->fetch_assoc();
          $Company=$reed['Company'];
          $User_name=$reed['User_name'];
          $first_name=$reed['first_name'];
          $Last_name=$reed['Last_name'];
          $Client_Name = $reed['Client_Name'];
          $Address=$reed['Address'];
          $postal_code=$reed['postal_code'];
          $about_me=$reed['about_me'];
          $password=$reed['password'];
          $Client_Code=$reed['Client_Code'];
          $Client_SPOC=$reed['Client_SPOC'];
          $country=$reed['country'];
          $State=$reed['State'];
          $city=$reed['city'];
          $Zip_Code=$reed['Zip_Code'];
          $Contact_Number = $reed['Contact_Number'];
          $email=$reed['email'];
          $App_Response_Time=$reed['App_Response_Time'];
          $Inv_Address=$reed['Inv_Address'];
          $Inv_Bank=$reed['Inv_Bank'];
          $Inv_Due_Days = $reed['Inv_Due_Days'];
          $Inv_Code=$reed['Inv_Code'];
          $Is_GSTIN = $reed['Is_GSTIN'];
          $Contact_Applicant=$reed['Contact_Applicant'];
          $Is_Bulk_Upload=$reed['Is_Bulk_Upload'];
          $DOB=$reed['DOB'];
          if($DOB != "0000-00-00")
          {
            $DOB = date('Y-m-d', strtotime($DOB));
          }
          $Live_DateDate=$reed['Live_DateDate'];
          $Currency=$reed['Currency'];
          $Internal_Reference_ID=$reed['Internal_Reference_ID'];
          $Email_ID=$reed['Email_ID'];
          $user_status=$reed['user_status'];
          $is_block=$reed['is_block'];
          $email = $reed['email'];
        }
        else
        {
          echo "No client Found";
        }
      }
    }
  }
  $basic_details=new country($db);
  $basic_details->update_details();
  
}
else
{
  $title_form = "Add Clients";
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
    <?php echo $title_form; ?>
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
          <li class="nav-item">
            <a href="#client" class="nav-link" data-toggle="collapse"><i class="material-icons">person</i>
              <p>Client</p>
            </a>
            <div class="collapse" id="client">
              <ul class="list-unstyled nav">
                <li class="nav-item active">
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
                  <a class="nav-link" href="./#">Auto SLA </a>
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
                  <a class="nav-link" name href="./#">Auto SLA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./reportColor.php">Report Color Code</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./reportConfig.php">Report Configuration Master</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" name href="./#">Insufficient Emial Triggers</a>
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
            <a class="navbar-brand" href="javascript:void(0)" style="color: white;"><?php echo $title_form; ?></a>
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
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary"> 
                    <h4 class="card-title"><?php echo $title_form; ?></h4>
                  </div>
                  <div class="card-body">
                    <form id="ajax" autocomplete="off">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Client Name</label>
                            <input name="Client Name" type="text" class="form-control" required value="<?php echo @$Client_Name; ?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Client Code</label>
                            <input name="Client Code" type="number" class="form-control" required value="<?php echo @$Client_Code; ?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Client SPOC</label>
                            <input name="Client SPOC" type="text" class="form-control" value="<?php echo @$Client_SPOC; ?>" />
                          </div> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="hidden" id="edit_country" value="<?php echo @$country; ?>">
                            <input type="hidden" id="edit_state" value="<?php echo @$State; ?>">
                            <input type="hidden" id="edit_city" value="<?php echo @$city; ?>">
                            <input type="hidden" id="edit_currency" value="<?php echo @$Currency; ?>">
                            <input type="hidden" name="edit_id" value="<?php echo @$id; ?>">

                            <label class="bmd-label-floating" style="font-size: 13px;">Country</label>
                          <!-- <input
                              name="Country"
                              type="text"
                              class="form-control"
                              />-->
                              <select class="browser-default custom-select" type="select" id="locality-dropdown" name="locality-dropdown" onchange="getservice(this.value)" style="color:#202940;" required>

                              </select>

                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"style="font-size: 13px;">State</label>
                          <!-- <input
                              name="State"
                              type="text"
                              class="form-control"
                              />-->
                              <select class="browser-default custom-select" type="select" id="select_state" name="select_state" onchange="getservicename(this.value)" style="color:#202940;">

                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating" style="font-size: 13px;">City</label>
                          <!-- <input
                              name="City"
                              type="text"
                              class="form-control"
                              />-->
                              <select class="browser-default custom-select" type="select" id="select_city" name="select_city" onchange="getdocumentlist(this.value)" style="color:#202940;">

                              </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Zip Code</label>
                              <input name="Zip Code" type="number" min="0" class="form-control" value="<?php echo $Zip_Code; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Contact Number</label>
                              <input name="Contact Number" type="number" min="0" class="form-control" value="<?php echo @$Contact_Number; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Applicant Response Time</label>
                              <input name="Applicant Response Time" type="number" min="0" class="form-control" value="<?php echo @$App_Response_Time; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Invoice Address Details</label>
                              <input name="Invoice Address Details" type="text" class="form-control" value="<?php echo @$Inv_Address; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Invoice Bank Detail</label>
                              <input name="Invoice Bank Detail" type="text" class="form-control" value="<?php echo @$Inv_Bank; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Invoice Payment Due Days</label>
                              <input name="Invoice Payment Due Days" type="number" min="0" class="form-control" value="<?php echo @$Inv_Due_Days; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Invoice Code</label>
                              <input name="Invoice Code" type="text" class="form-control" value="<?php echo @$Inv_Code; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Is GSTIN</label>
                              <input name="Is GSTIN" type="text" class="form-control" value="<?php echo @$Is_GSTIN; ?>" />
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Email ID</label>
                              <input name="Email ID" type="email" class="form-control" autocomplete="off" value="<?php echo @$email; ?>" />
                            </div>
                          </div>
                          <!--checkBoxes-->
                      <!-- <div class="container" style="margin-top: 2%;">
                          <div class="row">
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is Package"
                                >
                                  Is Package
                                </label>
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  name="Is Package"
                                  id="Is Package"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is Package"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label class="form-check-label" for="Email ID">
                                  Email ID
                                </label>
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  name="Email ID radio"
                                  id="Email ID"
                                  value="Yes"checkbox
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Email ID"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is LOB Mapping"
                                >
                                  Is LOB Mapping
                                </label>
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  name="Is LOB Mapping"
                                  id="Is LOB Mapping"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is LOB Mapping"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!--checkBoxes-->
                      </div>
                      <div class="row" style="margin-top: 2%;">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label style="font-size: 13px;" for="Currency" class="bmd-label-floating" style="margin-left: 4%;">Currency</label>
                            <select style="margin-top: 2%;" id="currency" name="currency" class="browser-default custom-select" required>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Date of Registration</label>
                            <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" value="<?php echo @$DOB; ?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="Password" class="bmd-label-floating">Password</label>
                            <div class="input-group">
                              <input name="Password" type="password" class="form-control" autocomplete="off" value="<?php echo @$password; ?>" />
                              <div class="input-group-addon eye">
                                <i class="fas fa-eye-slash"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <?php
                        if(isset($_GET['id']))
                        {
                          echo '<button id="update-client" name="update-client" type="submit" class="btn btn-primary" style="margin-right: 1%;">Update</button>';
                        }
                        else
                        {
                          echo '<button id="add-client" name="add-client" type="submit" class="btn btn-primary" style="margin-right: 1%;">Submit</button>';
                        }
                        ?>
                        <a href="" class="btn btn-primary" style="margin-right: 2%;" onclick="formReset()">
                          Cancel
                        </a>
                      </div>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>


        <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#exampleModal">
          Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client added successfully</h5>
              </div>
              <div class="modal-footer">
                <button type="button" id="modal-ok-btn" data-dismiss="modal" class="btn btn-primary">OK</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal --> 


        <script>
          const x = new Date().getFullYear();
          let date = document.getElementById("date");
          date.innerHTML = "&copy; " + x + date.innerHTML;
        </script>
      </div>
    </div>
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
    <script src="data.js"></script>
    <?php
    if(isset($_GET['id']))
    {
      echo '
      <script>
        getservice('.@$country.');
        getservicename('.@$State.');
      </script>
      ';
    }
    ?>
    
    <script>
      function formReset() {
        document.getElementById("ajax").reset();
      }

      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $(".sidebar");

          $sidebar_img_container = $sidebar.find(".sidebar-background");

          $full_page = $(".full-page");

          $sidebar_responsive = $("body > .navbar-collapse");

          window_width = $(window).width();

          $(".fixed-plugin a").click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

          $(".fixed-plugin .active-color span").click(function() {
            $full_page_background = $(".full-page-background");

            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-color", new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr("filter-color", new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr("data-color", new_color);
            }
          });

          $(".fixed-plugin .background-color .badge").click(function() {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("background-color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-background-color", new_color);
            }
          });

          $(".fixed-plugin .img-holder").click(function() {
            $full_page_background = $(".full-page-background");

            $(this).parent("li").siblings().removeClass("active");
            $(this).parent("li").addClass("active");

            var new_image = $(this).find("img").attr("src");

            if (
              $sidebar_img_container.length != 0 &&
              $(".switch-sidebar-image input:checked").length != 0
              ) {
              $sidebar_img_container.fadeOut("fast", function() {
                $sidebar_img_container.css(
                  "background-image",
                  'url("' + new_image + '")'
                  );
                $sidebar_img_container.fadeIn("fast");
              });
          }

          if (
            $full_page_background.length != 0 &&
            $(".switch-sidebar-image input:checked").length != 0
            ) {
            var new_image_full_page = $(".fixed-plugin li.active .img-holder")
          .find("img")
          .data("src");

          $full_page_background.fadeOut("fast", function() {
            $full_page_background.css(
              "background-image",
              'url("' + new_image_full_page + '")'
              );
            $full_page_background.fadeIn("fast");
          });
        }

        if ($(".switch-sidebar-image input:checked").length == 0) {
          var new_image = $(".fixed-plugin li.active .img-holder")
          .find("img")
          .attr("src");
          var new_image_full_page = $(".fixed-plugin li.active .img-holder")
          .find("img")
          .data("src");

          $sidebar_img_container.css(
            "background-image",
            'url("' + new_image + '")'
            );
          $full_page_background.css(
            "background-image",
            'url("' + new_image_full_page + '")'
            );
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css(
            "background-image",
            'url("' + new_image + '")'
            );
        }
      });

          $(".switch-sidebar-image input").change(function() {
            $full_page_background = $(".full-page-background");

            $input = $(this);

            if ($input.is(":checked")) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn("fast");
                $sidebar.attr("data-image", "#");
              }

              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn("fast");
                $full_page.attr("data-image", "#");
              }

              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr("data-image");
                $sidebar_img_container.fadeOut("fast");
              }

              if ($full_page_background.length != 0) {
                $full_page.removeAttr("data-image", "#");
                $full_page_background.fadeOut("fast");
              }

              background_image = false;
            }
          });

          $(".switch-sidebar-mini input").change(function() {
            $body = $("body");

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
              $("body").removeClass("sidebar-mini");
              md.misc.sidebar_mini_active = false;

              $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
            } else {
              $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
                "destroy"
                );

              setTimeout(function() {
                $("body").addClass("sidebar-mini");

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event("resize"));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
        });
});

$("form").submit(function(event) {
  var formdata = $("form").serializeArray();
  var data = {};
  $(formdata).each(function(index, obj) {
    data[obj.name] = obj.value;
  });
      //console.log(data);
      event.preventDefault();
    });
$.ajax;
</script>
</body>
</html>