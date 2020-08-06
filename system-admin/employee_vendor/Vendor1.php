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
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Order Search
    </title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
    />
    <!-- CSS Files -->
    <link
      href="../assets/css/material-dashboard.css?v=2.1.0"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/3aaaecc22c.js"
      crossorigin="anonymous"
    ></script>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"
    />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

     <!--Switching modes-->
     <link rel="stylesheet" href="../assets/css/style.css">
     <style>
       select option{
         color: black !important;
       } 
     </style>

  </head>

  <body class="dark-edition">
    <div class="wrapper">
      <div
        class="sidebar"
        data-color="purple"
        data-background-color="black"
        data-image="../assets/img/sidebar-2.jpg"
      >
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"> <a class="navbar-brand" href="#">
      <img src="../assets/img/logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
      </a></div>
        <!--Side Bar-->
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="./Vendor1.php">
                <p>Order Search</p></a
              >
            <li class="navbar-item">
              <a class="nav-link" href="./Vendor2.php">
                <p>View Order</p></a>
            </li>
          </ul>
        </div>
      <!--Side Bar End-->
    </div>
    <div class="main-panel mainP">
       <!--toggle button-->
 <div  class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
  <input type="checkbox" id="switch" name="theme">
  <label id="toggleButton" for="switch">Toggle</label>
</div>
      <!-- Navbar -->
      <nav
        class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
        id="navigation-example"
        style="padding: 0; margin: 0;"
      >
          <div class="container-fluid">
            <div class="navbar-wrapper"style="height: 70px;" >
              <a class="navbar-brand" href="javascript:void(0)" style="color: white;">Search</a>
            </div>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            aria-controls="navigation-index"
            aria-expanded="false"
            aria-label="Toggle navigation"
            data-target="#navigation-example"
          >
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
                <a
                  class="nav-link"
                  href="javscript:void(0)"
                  id="navbarDropdownMenuLink"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i style="color: white;" class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <a class="dropdown-item" href="javascript:void(0)"
                    >Mike John responded to your email</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    >You have 5 new tasks</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    >You're now friend with Andrew</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    >Another Notification</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    >Another One</a
                  >
                </div>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i style="color: white;" class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              <div class="ripple-container"></div></a>
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
                    <h4 class="card-title">Order Search</h4></div> 
                     <div class="card-body">
                       <form id="ajax">    

                     <!--first row-->
                     <div class="row justify-content-around" style="margin-top: 1%;">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                         <label class="bmd-label-floating">Case Ref No</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                      <!--Second row-->
                      <div class="row justify-content-around" style="margin-top: 1%;">   
                        <div class="col-md-5">
                          <div class="form-group">
                             <label style="font-size: 12px;">Intiation Date</label>
                             <input
                               type="date"
                               name="dateofbirth"
                               id="dateofbirth"
                               class="form-control"
                             />
                           </div>
                         </div>   
                         <div class="col-md-5">
                          <div class="form-group">
                            <label style="font-size:13px" class="bmd-label-floating">Status</label>
                            <select style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                              <option selected="selected" hidden value="null">Choose..</option>
                              <option value=0>Empty</option>
                              <option value=1>Empty</option>
                              <option value=2>Empty</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!--Third Row-->
                      <div class="row justify-content-around" style="margin-top: 1%;">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label style="font-size:13px" class="bmd-label-floating">Service Name</label>
                            <select  style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                              <option selected="selected" hidden value="null">Choose..</option>
                              <option value=0>Empty</option>
                              <option value=1>Empty</option>
                              <option value=2>Empty</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label style="font-size:13px" class="bmd-label-floating">Open/Closed Checks</label>
                            <select  style="margin-top:2%" name="Groups" class="browser-default custom-select" required>
                              <option selected="selected" hidden value="null">Choose..</option>
                              <option value=0>Empty</option>
                              <option value=1>Empty</option>
                              <option value=2>Empty</option>
                            </select>
                          </div>
                        </div>
                      </div>                
                     <div class="row justify-content-end"style="margin-top:2%;margin-right:2%; margin-bottom:1%">
                         <button type="submit" class="btn btn-primary pull-left"style="margin-left:4%; ">Search</button>
                         <div class="clearfix"></div>
                         <button type="submit" class="btn btn-primary pull-left" style="margin-left: 3%;">Reset</button>
                         <div class="clearfix"></div>
                         <button type="submit" class="btn btn-primary pull-left" style="margin-left: 3%;">Export</button>
                         <div class="clearfix"></div>     
                    </div>
                 </form> 
                 <!--Table div Starts-->
                <div class="col-md-12">
                   <div class="row">
                     <div class="card">
                     <div class="card-header card-header-primary" style="margin-top: 4%;">
                          <h4 style="color: white;" class="card-title">Order Search Details</h4></div> 
                       <div class="card-body">
                     
                     <!-- table -->        
                    <table class="table table-hover" style="margin-top: 1%;">
                      <thead class="text-primary " style="background-color: rgba(15, 13, 13, 0.829) !important;">
                        <th>
                          Case Ref No
                        </th>
                        <th>
                          Application Name
                        </th>
                        <th>
                          Vendor Initiation Date 
                        </th>
                        <th>
                          Expected Closure Date
                        </th>
                        <th>
                          Service Name 
                        </th>
                        <th>
                          Status 
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="tablehead1">
                            <a href="Vendor2.php" style="color: purple;">56454776648</a>
                          </td>
                          <td class="tablehead1">
                            Kumaraswamy
                          </td>
                          <td class="tablehead1">
                            23/3/2016
                          </td>
                          <td class="tablehead1">
                           2/4/2018
                          </td>
                          <td class="tablehead1">
                            Indian Criminal court
                          </td>
                          <td class="tablehead1">
                           pending
                        </tr>
                        <tr>
                          <td class="tablehead1">
                            <a href="Vendor2.php" style="color: purple;">56454776648</a>
                          </td>
                          <td class="tablehead1">
                            yadiurappa
                          </td>
                          <td class="tablehead1">
                            23/6/2016
                          </td>
                          <td class="tablehead1">
                            2/9/2018
                          </td >
                          <td class="tablehead1">
                            Indian Criminal court
                          </td>
                          <td class="tablehead1">
                            pending
                          </td>
                        </tr>
                      </tbody>
                    </table>
                 </div>                             
                </div>
              </div>
              <!-- table end -->
                              
                  </div>         
                </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>




    </script>
    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById("date");
        date.innerHTML = "&copy; " + x + date.innerHTML;
      </script>
    </div>
  </div>
   <!--mode changing-->
   <script>
    let darkmode=localStorage.getItem("darkmode");
    const darkmodetoggle=document.querySelector('input[name=theme]');

    const enabledarkmode=()=>{
    document.documentElement.setAttribute('data-theme', 'dark')
    localStorage.setItem("darkmode","enabled");
    }


  const disabledarkmode=()=>{
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkmode",null);
  }


   if(darkmode==="enabled"){
     enabledarkmode();
   }


   darkmodetoggle.addEventListener("change", ()=>{
     darkmode=localStorage.getItem("darkmode");
     if(darkmode !== "enabled"){
        trans()
       enabledarkmode();
     }else{
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
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="data.js"></script>
  </body>
</html>
                               