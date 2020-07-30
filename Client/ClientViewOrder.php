<?php
$page_name = "View Order";
include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div hidden="" class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <form id="vieworder" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <!--                         
                    <div class="form-group"style="margin-top:12%;">
                    <label class="bmd-label-floating"style="color:white;font-size:15px;">Search By</label>
                    <select class="browser-default custom-select" size="14" type="select"name="searchBy" id="Service"style="color:#202940;margin-top:3%;" onchange="myFunction(event)">
                    <option style="margin-top:3.2%;">First Name Last Name</option>
                    <option style="margin-top:3.2%;">Internal Reference Id</option>
                    <option style="margin-top:3.2%;">Joing Location</option>
                   
                    </select>
                          
                    </div> -->

                        <div class="form-group" style="margin-top:9%;">
                          <label for="Service ">Search By</label>
                          <select name="Service" id="Service" id="optionColor" class="form-control selection"
                            style="margin-top:3%;" id="exampleFormControlSelect1" onchange="myFunction(event)">
                            <option value="NULL_OPT" selected="" class=" bg-secondary text-light">---Select Search
                              Criteria---</option>
                            <option value="First_Name_Last_Name" class=" bg-secondary text-light">First Name Last Name
                            </option>
                            <option value="internal_reference_id" class=" bg-secondary text-light">Internal Reference Id
                            </option>
                            <option value="Joing_Location" class=" bg-secondary text-light">Joing Location</option>
                            <option value="Case_Ref_ID" class=" bg-secondary text-light">Case Ref ID</option>
                            <option value="order_creation_date_time" class=" bg-secondary text-light">Order Creation
                              Date</option>
                            <option value="Order_Completion_Date" class=" bg-secondary text-light">Order Completion Date
                            </option>
                            <option value="email_id" class=" bg-secondary text-light">Email ID</option>
                            <option value="Order_Status" class=" bg-secondary text-light">Order Status</option>
                          </select>
                          
                        </div>


                      </div>

                      <!--Ist Row Closes Here-->

                      <div class="col-md-4" style="margin-top:2.5%;">

                        <div id="hide">
                          <div class="form-group ">
                            <label>Search Criteria</label>
                            <input type="text" name="SearchCriteria" style="display:none;" id="SearchCriteria"
                              class="form-control" placeholder="Enter As Per Search Criteria" onkeyup="showCustomer()">
                          </div>
                        </div>

                        <div class="card" id="DateOne" style="background-color:#1A2035;padding:2%;display:none;">

                          <div class="form-group">
                            <label class="bmd-label-static"></label>
                            <input id="user_id" name="user_id" type="hidden" value="<?php echo $unsa;?>">
                            <input onchange="showCustomer();" type="date" name="OrderCreation" id="dateofbirth"
                              class="form-control">
                          </div>
                        </div>


                      </div>

                      <!--2nd Row closes Here-->


                      <div class="col-md-4">

                        <div class="card" id="order" value="" style="background-color:#1A2035;padding:4%;display:none;">

                          <div class="form-group" style="margin-top:6%;">
                            <label>Order Status</label>
                            <select name="OrderStatus" onchange="showCustomer()" id="OrderStatus" class="form-control"
                              style="margin-top:3%;" id="exampleFormControlSelect1">

                              <option value="Education" class=" bg-secondary text-light">Education</option>
                              <option value="Criminal" class=" bg-secondary text-light">Criminal</option>
                              <option value="Data Base" class=" bg-secondary text-light">Data Base</option>
                              <option value="Employment" class=" bg-secondary text-light">Employment</option>
                              <option value="Address" class=" bg-secondary text-light">Address</option>
                              <option value="Civil Litigation" class=" bg-secondary text-light">Civil Litigation
                              </option>
                            </select>

                          </div>

                        </div>

                      </div>

                      <!--Third Row- closes Here-->

                    </div>
                    <!--Main Row Closes Here-->

                    <!-- <button type="submit" class="btn btn-primary pull-right" onclick="showCustomer()">Search</button>-->

                </div>
                </form>
              </div>
            </div>
          </div>

          <!--Horizontal Line Part Starts Here-->

          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> Order Details</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="overflow-y: hidden;">
                  <div id='data_table'></div>
                </div>
              </div>
            </div>
            <!--Table closes Here-->



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
        <li class="header-title">Want more components?</li>
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
        <!-- Chartist JS -->
        <script src="assets/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="ClientViewOrder.js"></script>
        <?php
          include '../datatable/_datatable.php';
        ?>
        <!-- <script>
          let p = 0
          for (let i = 0; i < 1000000000; i++) {
            p += i
            
          }
        </script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
        
        <script>
          console.log("frame")
          function test() {
            var dob = document.getElementById("dateofbirth");
            console.log(dob.value + "value");
          }

          //this is a sample data




          // thilm is 

          // function showCustomer(){
          // var e = document.getElementById("Service");
          // var strUser = e.options[e.selectedIndex].value;
          // var val2 = document.getElementById("SearchCriteria");
          // var val = val2.value;
          // try{
          // var dob2 = document.getElementById("dateofbirth");var dob = dob2.value;
          // }catch(err) {var dob="";}
          // try{
          // var opt2 = document.getElementById("OrderStatus");var opt = opt2.options[opt2.selectedIndex].value;
          // }catch(err) {var opt="";}
          //       $.post("API/ClientViewtable.php",
          //     {
          //       Service: strUser,
          //       option: val,
          //       dob: dob,
          //       opt: opt
          //     },
          //     function(data,status){
          //         $("#table").html(data);
          //     document.getElementById("table").innerHTML = data;
          //     console.log("r"+data);
          //     //  alert("Data: " + data + "\nStatus: " + status);
          //     });
          // }
        </script>
        <script>
          /*On Select Value Click */

          function myFunction(e) {

            var color = document.getElementById("Service").selectedIndex;
            console.log(color)
            if (color == 0) {


              // document.getElementById("SearchCriteria").value = e. target.value;
              document.getElementById("hide").style.display = "none";
              document.getElementById("SearchCriteria").style.display = "none";
              document.getElementById("DateOne").style.display = "none"
              document.getElementById("order").style.display = "none";

            }
            if (color == 1) { 


              // document.getElementById("SearchCriteria").value = e.target.value;  
              document.getElementById("hide").style.display = "block";
              document.getElementById("SearchCriteria").style.display = "block";
              document.getElementById("DateOne").style.display = "none"
              document.getElementById("order").style.display = "none";

            } else if (color == 2) {

              // document.getElementById("SearchCriteria").value = e.target.value; 
              document.getElementById("hide").style.display = "block";
              document.getElementById("SearchCriteria").style.display = "block";
              document.getElementById("DateOne").style.display = "none"
              document.getElementById("order").style.display = "none";
            } else if (color == 3) {

              // document.getElementById("SearchCriteria").value = e.target.value;  
              document.getElementById("hide").style.display = "block";
              document.getElementById("SearchCriteria").style.display = "block";
              document.getElementById("DateOne").style.display = "none"
              document.getElementById("order").style.display = "none";
            } else if (color == 4) {

              // document.getElementById("SearchCriteria").value = e.target.value;
              document.getElementById("hide").style.display = "block";
              document.getElementById("SearchCriteria").style.display = "block";
              document.getElementById("DateOne").style.display = "none"
              document.getElementById("order").style.display = "none";
            } else if (color == 5) {
              // document.getElementById("SearchCriteria").value = e.target.value;  
              document.getElementById("SearchCriteria").style.display = "none";
              document.getElementById("hide").style.display = "none";
              document.getElementById("DateOne").style.display = "block";
              document.getElementById("order").style.display = "none";
            } else if (color == 6) {
              // document.getElementById("SearchCriteria").value = e.target.value;  
              document.getElementById("SearchCriteria").style.display = "none";
              document.getElementById("DateOne").style.display = "block";
              document.getElementById("hide").style.display = "none";
              document.getElementById("order").style.display = "none";
            } else if (color == 7) {

              // document.getElementById("SearchCriteria").value = e.target.value;
              document.getElementById("hide").style.display = "block";
              document.getElementById("SearchCriteria").style.display = "block";
              document.getElementById("DateOne").style.display = "none"
              document.getElementById("order").style.display = "none";

            } else if (color == 8) {
              // document.getElementById("SearchCriteria").value = e.target.value;
              document.getElementById("SearchCriteria").style.display = "none";
              document.getElementById("hide").style.display = "none";
              document.getElementById("order").style.display = "block";
              document.getElementById("DateOne").style.display = "none"

            }


          }

          /*Form Submission */

          //XHR AJAX for form data submit
          const form = document.getElementById("vieworder");
          form.addEventListener("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(document.forms.form);
            let data = {};
            for (let entry of formData.entries()) {
              data[entry[0]] = entry[1];
            }
            //to log the data object on the console
            console.log(JSON.stringify(data));
            let jsonData = JSON.stringify(data);
            //change the /submit url to your requirment to divert it to that file
            xhr.open("POST", "/submit");
            xhr.setRequestHeader("Content-type", "application/json; charset=utf-8");
            xhr.send(jsonData);
          });

          /*On Click of ClientBulkOrder*/

          $(document).ready(function () {
            $('#Client').click(function () {

              $('#card1').toggle("slide");


            });

          });



          $(document).ready(function () {
            $().ready(function () {
              $sidebar = $('.sidebar');

              $sidebar_img_container = $sidebar.find('.sidebar-background');

              $full_page = $('.full-page');

              $sidebar_responsive = $('body > .navbar-collapse');

              window_width = $(window).width();

              $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                  if (event.stopPropagation) {
                    event.stopPropagation();
                  } else if (window.event) {
                    window.event.cancelBubble = true;
                  }
                }
              });

              $('.fixed-plugin .active-color span').click(function () {
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

              $('.fixed-plugin .background-color .badge').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                  $sidebar.attr('data-background-color', new_color);
                }
              });

              $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length !=
                  0) {
                  $sidebar_img_container.fadeOut('fast', function () {
                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $sidebar_img_container.fadeIn('fast');
                  });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length !=
                  0) {
                  var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data(
                    'src');

                  $full_page_background.fadeOut('fast', function () {
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    $full_page_background.fadeIn('fast');
                  });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                  var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                  var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data(
                    'src');

                  $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                  $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                  $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
              });

              $('.switch-sidebar-image input').change(function () {
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

              $('.switch-sidebar-mini input').change(function () {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                  $('body').removeClass('sidebar-mini');
                  md.misc.sidebar_mini_active = false;

                  $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                  $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                  setTimeout(function () {
                    $('body').addClass('sidebar-mini');

                    md.misc.sidebar_mini_active = true;
                  }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                  window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                  clearInterval(simulateWindowResize);
                }, 1000);

              });
            });
          });
        </script>
        <script>
          showCustomer();
        </script>
</body>

</html>