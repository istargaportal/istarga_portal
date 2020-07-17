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




session_start();



if(isset($_SESSION['uname']) && isset($_SESSION['password']))
{
   
  // echo "Hiii".$_SESSION['uname']."your password is".$_SESSION['password'];
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
  Client Bulk Order
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
   <!--Switching modes-->
   <link rel="stylesheet" href="assets/css/style.css">


<style>

[type="date"] {
  background: url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;
}
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 100;
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
          <li class="nav-item ">
            <a class="nav-link" href="Dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ClientViewOrder.php">
              <i class="material-icons">content_paste</i>
              <p>View Order</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="CreateOrder.php">
              <i class="material-icons">content_paste</i>
              <p>Create Order</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ClientBulkOrder.php">
              <i class="material-icons">library_books</i>
              <p>Bulk Orders</p>
            </a>
          </li>
            <li class="nav-item ">
            <a class="nav-link" href="reports.php">
              <i class="material-icons">library_books</i>
              <p>Reports</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="MyProfile.php">
              <i class="material-icons">person</i>
              <p>My Profile</p>
            </a>
          </li>
         <!-- <li class="nav-item ">
            <a class="nav-link" href="notifications.php">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>-->
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
 <div  class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
  <input type="checkbox" id="switch" name="theme">
  <label id="toggleButton" for="switch">Toggle</label>
</div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a style="color: white;" class="navbar-brand" href="javascript:void(0)">Bulk Order</a>
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
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                <div class="ripple-container"></div></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./index.php">Log out</a>
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
                <div class="card-body">
                  <form id="ajax">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group"style="margin-top:12%;">

                     <label style="font-size: 13px;" class="bmd-label-floating">Service</label>
                     <select class="browser-default custom-select"type="select" id="Service" name="Service" style="color:#202940;margin-top:3%;">
                     
                     </select>

                     <a href="docs/book1.xlsx" download><button type="button" class="btn btn-primary">Download Sample Template</button></a>

                    <!-- <div class="checkbox checkbox-circle checkbox-red"style="margin-top:1%;margin-left:7%;">
                    <input class="form-check-input" type="radio" name="exampleRadios" onclick="UploadFile()" id="Client" value="options1" unchecked >
                    <label class="form-check-label" for="exampleRadios1">
                    Upload File
                    </label>
                    </div> -->

                    <div class="form-check" style="margin-top:4%">
                      <label class="form-check-label" style="margin-bottom:14px !important;">Click here to Upload File
                        <input class="form-check-input" name="exampleRadios" checked="UploadFile()" id="Client" type="checkbox" value="options1"  >
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                          
                      </div>
                      </div>

                      <div class="col-md-8">

                      <div class="card" id="card1" style="background-color:#1A2035;display:none;">

                      <div class="d-flex flex-row"style="margin-left:10%;justify-content:center;">

                      <div class="form-group">
                      <label class="bmd-label-floating"></label>
                      <input type="date" name="dateofbirth" id="dateofbirth" class="form-control">
                      </div>

                      <div class="form-group"style="margin-left:10%;">
                      <label class="bmd-label-floating"></label>
                      <input type="time" id="appt"class="form-control"style="font-size:20px;">
                      </div>

                      </div>

                        

                      <div class="d-flex flex-row"style="margin-left:10%;justify-content:center;">
                      <div class="form-group">
                      <label class="bmd-label-floating"></label>
                       <input type="date" name="dateofbirth" id="dateofbirth" class="form-control">
                      </div>

                      <div class="form-group"style="margin-left:10%;">
                      <label class="bmd-label-floating"></label>
                      <input type="time" name="dateofbirth" id="dateofbirth12" class="form-control"
                       style="font-size:20px;">
                      </div>

                      </div>

                    <div class="d-flex flex-row"style="justify-content:center;margin-top:1.5%;margin-left:9%;">

                    <p style="margin-top:2%;color:white;">Upload File</p>
                    <div class="form-group"style="margin-left:3%;">
                    <label for="file" style="border: 1px solid white;padding:3px;">Choose File</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <div class="form-group"style="margin-left:3%;">
                    <label for="gteew" style="border: 1px solid white;padding:3px;">Download Format</label>
                    <a href="docs/book1.xlsx" download><button type="button" id="gteew" class="btn btn-primary"style="background-color:#1A2035;margin-top:15%;" hidden>Download Sample Template</button></a>
                     </div>
                    </div>

                    <div class="d-flex flex-row"style="justify-content:center;margin-top:1.5%;margin-left:9%;">

                     <p style="margin-top:2%;color:white;">Upload Document</p>
                    <div class="form-group"style="margin-left:2%;">
                    <label for="file3" style="border: 1px solid white;padding:3px;">Choose File</label>
                    <input type="file" class="form-control-file" id="file3">
                     </div>
                      <i class="fa fa-file-excel-o" style="font-size:40px;margin-left:2%;color:red;"></i>
                    </div>

                     <div class="d-flex justify-content-center"style="margin-top:2%;margin-bottom:2%;margin-left:10%;">
                     <button type="submit" class="btn btn-primary pull right"style="margin-left:2%;">Submit</button>
                    <div class="clearfix"></div>

                     <button type="submit" onclick="sendfile()" class="btn btn-primary"style="margin-left:2%;">Reset</button>
                    <div class="clearfix"></div>

                     <button type="submit" class="btn btn-primary"style="margin-left:2%;">Cancel</button>
                    <div class="clearfix"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </form>
                    </div>

  
        <div class="row" style="margin-top: 4%;">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                 <h4 class="card-title">Log Reports</h4>
             </div>
             <table class="table table-hover " style="margin-top: 2%; width: 96%; margin-left: 2%;">
              <thead class="text-primary "
                         style="background-color: rgba(0, 0, 0, 0.781) !important;">
                        <th>Sr.no</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>File Name</th>
                        <th>From Date/Time</th>
                        <th>To Date/Time</th>
                        <th>No. Of Records</th>
                        <th>Services</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>05/08/19</td>
                          <td>11:20:00</td>
                          <td>Mike</td>
                          <td>12/05/19</td>
                          <td>23/11/19</td>
                          <td>21</td>
                          <td>service 1</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>05/08/19</td>
                          <td>11:20:00</td>
                          <td>John</td>
                          <td>12/05/19</td>
                          <td>23/11/19</td>
                          <td>21</td>
                          <td>service 2</td>
                        </tr>
             
           </tbody>
           </table>
            </div>
          

            </div>
            </div>
           
      <!--<footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right" id="date">
            , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>-->
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <!--<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard-dark" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> 
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.php" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard/tree/dark-edition" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>-->
  <!--   Core JS Files   -->
  <script>
   window.onload=function(){
    $("#Client").attr('checked', false);
   }


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
  <script src="js/formSubmit.js"></script>
  <script>

  /*On Click of ClientBulkOrder*/

   $(document).ready(function() {
   $('#Client').click(function(){

   $('#card1').toggle("slide");


   });

   });



     $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });

    /*Time Picker */

 
  
  </script>
  <script src="js/clientbulkorder.js"></script>
  </body>

</html>