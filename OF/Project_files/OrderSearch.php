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
    Order Search 1
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

  <!--Switching modes-->
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    select option {
      color: black !important;
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
    <div class="main-panel mainP">
      <!--toggle button-->
      <div class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
        <input type="checkbox" id="switch" name="theme">
        <label id="toggleButton" for="switch">Toggle</label>
      </div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example"
        style="padding: 0; margin: 0;">
        <div class="container-fluid">
          <div class="navbar-wrapper" style="height: 70px;">
            <a class="navbar-brand" href="javascript:void(0)" style="color: white;">Search Order</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
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
                <a class="nav-link" href="javascript:void(0)">
                  <i style="color: white;" class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
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
                  <h4 class="card-title">Manual Search</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <!--First Row-->
                    <div class="row" style="margin-top: 1%;">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label style="font-size:13px" class="bmd-label-floating">Search By</label>
                          <select style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                            <option value="caseNumber" style="color: black;">Choose....</option>
                            <option value="firstLastName" style="color: black;">First Name Last Name</option>
                            <option value="REF_ID" style="color: black;">Internal Reference ID</option>
                            <option value="CR_ID" style="color: black;">Case Refarence ID</option>
                            <option value="joiningLocation" style="color: black;">Joining Location</option>
                            <option value="orderCreationDate" style="color: black;">Order Creation Date</option>
                            <option value="orderCompletionDate" style="color: black;">Order Completion DAte</option>
                            <option value="emailID" style="color: black;">Email ID</option>
                            <option value="orderStatus" style="color: black;">Order Status</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="">Please Fill Selected Detail</label>
                          <input name="Joining Location" type="text" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-end" style="margin-top:2%;margin-right:2%; margin-bottom:1%">
                      <button type="submit" class="btn btn-primary pull-left" style="margin-left:4%; ">Search</button>
                      <div class="clearfix"></div>
                    </div>
                  </form>
                </div>


                <!--Table starts here-->
                <div class="col-md-12">
                  <div class="card card-plain">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title mt-0"> Order Details</h4>
                    </div>
                    <div class="card-body" style="white-space: nowrap;overflow-x: auto;">
                      <div class="table-responsive" id="table">
                        <table class="table table-hover" style="margin-top: 4%; overflow-x: auto; white-space: nowrap;">
                          <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                            <th>
                              Case Ref No
                            </th>
                            <th>
                              Is Rush Order
                            </th>
                            <th>
                              Applicant Name
                            </th>
                            <th>
                              Order Creation Date
                            </th>
                            <th>
                              Expexted Closure Date
                            </th>
                            <th>
                              Service
                            </th>
                            <th>
                              Status
                            </th>
                            <th>
                              Category
                            </th>
                            <th>
                              Queue
                            </th>
                            <th>
                              OF Closure DAte
                            </th>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="tablehead1">
                                <a href="SearchedOrder.php" style="color: #7D49A8;">12343535377</a>
                              </td>
                              <td class="tablehead1">
                                No
                              </td>
                              <td class="tablehead1">
                                Albert
                              </td class="tablehead1">
                              <td class=" tablehead1">
                                21/3/2019
                              </td>
                              <td class="tablehead1">
                                06/5/2019
                              </td>
                              <td class="tablehead1">
                                Criminal
                              </td>
                              <td class="tablehead1">
                                In Progress
                              </td>
                              <td class="tablehead1">
                                Insufficier
                              </td>
                              <td class="tablehead1">
                                In Progress
                              </td>
                              <td class="tablehead1">
                                18/05/2020
                              </td>
                            </tr>
                            <tr>
                              <td class="tablehead1">
                                <a href="SearchedOrder.php" style="color: #7D49A8;">78464667746</a>
                              </td>
                              <td class="tablehead1">
                                No
                              </td>
                              <td class="tablehead1">
                                jhon
                              </td class="tablehead1">
                              <td class=" tablehead1">
                                21/3/2019
                              </td>
                              <td class="tablehead1">
                                06/5/2019
                              </td>
                              <td class="tablehead1">
                                Criminal
                              </td>
                              <td class="tablehead1">
                                In Progress
                              </td>
                              <td class="tablehead1">
                                Insufficier
                              </td>
                              <td class="tablehead1">
                                Completed
                              </td>
                              <td class="tablehead1">
                                23/05/2019
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!--Table closes Here-->
                  <!--Dropdown Starts here-->
                  <div class="col-md-12">
                    <div class="card card-plain">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Process Order</h4>
                      </div>
                      <div class="card-body">
                        
                        
                        <div class="row" style="margin-top: 2%;">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label style="font-size:13px" class="bmd-label-floating">Country</label>
                              <select style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                                <option value="" style="color: black;">Select Location</option>
                                <option value="India" style="color: black;">India</option>
                                <option value="Germany" style="color: black;">Germany</option>
                                <option value="USA" style="color: black;">USA</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label style="font-size:13px" class="bmd-label-floating">Service Type</label>
                              <select style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                                <option value="" style="color: black;">Select Service Type</option>
                                <option value="India" style="color: black;">First</option>
                                <option value="Germany" style="color: black;">Second</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label style="font-size:13px" class="bmd-label-floating">Status</label>
                              <select style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                                <option value="" style="color: black;">Select status Type</option>
                                <option value="India" style="color: black;">Completed</option>
                                <option value="Germany" style="color: black;">Pending</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3" style="margin-top: 1.5%;">
                            <button class="btn-outline-secondary" style="width:80%;padding: 4px;cursor: pointer;">Download</button>
                            <i style="font-size: 25px;color: #4788F4;" class="fa fa-upload" aria-hidden="true"></i>
                          </div>
                       </div>
                       <!-- <div class="row" style="margin-top: 2%;">
                         <div class="col-md-6">
                           <div class="row">
                             <div class="col-md-3" style="padding-right:0px;">
                              <div class="form-group">
                                <label class="docUpload border" for="exampleFormControlFile2"
                                style="border: 1px solid white;padding:3px; cursor: pointer; padding-right: 4px;">Upload File
                                <i class="fa fa-upload" aria-hidden="true"></i>
                              </label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile2" name="document 2"
                                 data-name="document 2">
                              </div>   

                             </div>
                             <div class="col-md-3" style="padding-left: 0;">
                              <button class="btn-sm btn-outline-secondary" style="margin-left: 2%; cursor: pointer;">Download</button>
                             </div>
                           </div>
                         </div>
                       </div> -->
                       <div class="row justify-content-end" style="margin-right: 2%;margin-top: 4%;">
                         <button class="btn btn-primary">Start Processing</button>
                       </div>
                    
                      </div>
                    </div>
                  </div>
                  <!--Dropdown ends here-->
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <!--mode change end-->
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
</body>

</html>