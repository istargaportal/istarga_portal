<?php
$page_name = "View Order";
include 'Header.php';
?>
<input type="hidden" name="Service" id="Service" class="form-control" id="exampleFormControlSelect1" onchange="myFunction(event)" />
<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Order Details</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1">
              <label>Client</label>
            </div>
            <div class="col-md-3">
              <input type="hidden" id="default_client_id" value="<?php echo @$_GET['id']; ?>">
              <select class="browser-default custom-select" onchange="getAllClientData()" id="client_id"></select>
            </div>
          </div>
          <div class="table-responsive">
            <div id='table'></div>
          </div>
        </div>
      </div>
    </div>
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
  <script src="vieworder.js"></script>

  <?php
  include '../datatable/_datatable.php';
  ?>
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
  <script>
    function test() {
      var dob = document.getElementById("dateofbirth");
      console.log(dob.value + "value");
    }

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

/*Time Picker */
</script>
<script>
  showCustomer();
</script>
</body>

</html>
