<?php
  $page_name = "Assign Service";
  include 'Header.php';
?>
      <div class="content" id="wapud">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Assign Service</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label for="Client Name" style="margin-left: 4%;">Client Name</label>
                        <!-- code change -->
                        <select style="margin-top:5%" class="browser-default custom-select" name="ClientName" id="ClientName" class="form-control" onchange="T3();" required;>
                          <option class="bg-secondary text-light">Choose...</option>

                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="Country" style="margin-left: 4%;">Country</label>
                        <select style="margin-top:5%" class="browser-default custom-select" id="locality-dropdown" name="locality-dropdown" onchange="getpackage(this.value)" class="form-control" required>
                          <option >Choose...</option>
                        </select>
                      </div>
                    </div>

                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label for="Service Type" style="margin-left: 4%;">Service Type</label>
                        <select style="margin-top:5%" id="select_service_type" class="browser-default custom-select" name="select_service_type" onchange="getservice(this.value)" class="form-control" required>
                          <option class='bg-secondary ' default not selected>Choose...</option>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="Service Name" style="margin-left: 4%;">Service Name</label>
                        <select style="margin-top:5%" id="select_service_name" class="browser-default custom-select" name="select_service_name" onchange="getservicename(this.value)" class="form-control" required>
                          <option class='bg-secondary text-light' default not selected>Choose...</option>

                        </select>
                      </div>
                    </div>
                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label for="Price" style="margin-left: 4%;margin-top: 4%;">Price</label>
                        <input name="Price" type="number" id="Price" class="form-control mt-4" min="0" placeholder="" />
                      </div>
                      <div class="form-group col-md-4"> 
                        <label for="currency" style="margin-left: 4%;">Currency</label>
                        <select style="margin-top:5%" id="currency" class="browser-default custom-select" name="currency" onchange="getservicename(this.value)" class="form-control" required>
                          <option class='bg-secondary text-light' default not selected>Choose...</option>
                        </select>
                      </div>
                    </div>
                    <div class="row justify-content-start"> 

                      <div class="form-group col-md-4">
                        <label for="SLA" style="margin-left: 4%;margin-top: 4%;">SLA</label>
                        <input name="SLA" id="SLA" type="text" class="form-control mt-4" placeholder="" />
                      </div>
                    </div>

                    <hr />
                    <div class="row justify-content-end" style="margin-right: 1%;">
                      <button type="submit" id="assignSubmit" class="btn btn-primary mx-2">
                        Add
                      </button>

                      <button type="button" onclick="formReset()" class="btn btn-primary">
                        Reset
                      </button>
                    </div>


                    <!--table starts-->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 style="color: white;" class="card-title">Assign Services</h4>
                          </div>
                          <table class="table table-hover" style="margin-top: 4%;">
                            <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                              <th>
                                Sr
                              </th>
                              <th>
                                Client Name
                              </th>

                              <th>
                                Country
                              </th>
                              <th>
                                Service Type
                              </th>
                              <th>
                                Service Name
                              </th>
                              <th>
                                Price
                              </th>
                              <th>
                                SLA
                              </th>
                              <th>
                                Edit
                              </th>
                              <th>
                                Delete
                              </th>
                            </thead>
                            <!--Problem occuring here-->
                            <tbody id="table">

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- table end -->
                </div>
              </div>
            </div>
 
            <!-- Modal -->
<div class="add-service-modal">
  <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Service Assigned Successfully</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" id="modal-ok-btn" data-dismiss="modal" class="btn btn-primary">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="delete-modal">
  <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#deleteModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="modal-ok-btn">Yes</button>
        </div>
      </div>
    </div>
  </div>
</div> 

            <script src="assignService.js"></script>
            <script>
              window.onload = T2;
            </script>

            <script>
              const x = new Date().getFullYear();
              let date = document.getElementById("date");
              date.innerHTML = "&copy; " + x + date.innerHTML;
            </script>
          </div>
        </div>
        <!--   Core JS Files   -->
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
        <script src="js/createorder12.js"></script>
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

          //XHR AJAX for form data submit
          // const form = document.getElementById("ajax");
          // form.addEventListener("submit", function(e) {
          //   e.preventDefault();
          //   const xhr = new XMLHttpRequest();
          //   let formData = new FormData(form);
          //   let data = {};
          //   for (let entry of formData.entries()) {
          //     data[entry[0]] = entry[1];
          //   }
          //   //to log the data object on the console
          //   console.log(JSON.stringify(data));
          //   let jsonData = JSON.stringify(data);
          //   // change the /submit url to your requirment to divert it to that file
          //   xhr.open("POST", "./API/assignService.php");
          //   xhr.setRequestHeader("Content-type", "application/json; charset=utf-8");
          //   xhr.send(jsonData);
          // });
        </script>
</body>

</html>