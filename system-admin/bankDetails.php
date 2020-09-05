<?php
  $page_name = "Bank Details";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title"><i class="fa fa-edit"></i> Add Bank Details</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Bank Name <i class="fa fa-star"></i></label>
                          <input name="Name" type="text" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Account No <i class="fa fa-star"></i></label>
                          <input name="Account No" type="number" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Address Line 1 <i class="fa fa-star"></i></label>
                          <input name="Address Line 1" type="text" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Address Line 2</label>
                          <input name="Address Line 2" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">IFSC Code</label>
                          <input name="IFSC Code" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Favour Of</label>
                          <input name="Favour" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Swift Code</label>
                          <input name="Swift Code" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Routing Code</label>
                          <input name="Routing Code" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <br>
                        <button type="submit" class="btn btn-success btn-sm" style="margin-right: 3%;">
                          <i class="material-icons icon">note_add</i> Save
                        </button>

                        <button type="button" class="btn btn-default btn-sm reset" onclick="formReset()" style="margin-right: 3%;">
                          <i class="material-icons icon">refresh</i> Reset
                        </button>
                      </div>
                      <div class="col-md-12">
                        <br>
                        <div id='data_table'>
                          <table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
                            <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                              <th>
                                Company Name
                              </th>
                              <th>
                                Address line 1
                              </th>
                              <th>
                                Address line 2
                              </th>
                              <th>
                                Account No
                              </th>
                              <th>
                                IFSC Code
                              </th>
                              <th>
                                Swift Code
                              </th>
                              <th>
                                Routing No
                              </th>
                              <th>
                                Favour
                              </th>
                              <th>
                                Edit
                              </th>
                              <th>
                                Delete
                              </th>
                            </thead>
                            <tbody id="table-body"></tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
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
                <button type="button" class="btn btn-secondary btn-default btn-sm" data-dismiss="modal">Close</button> &nbsp; &nbsp;
                <button type="button" class="btn btn-primary btn-success btn-sm" id="modal-ok-btn">Yes</button>
              </div>
            </div>
          </div>
        </div>
      </div>

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
                <button type="button" id="modal-ok-btn" data-dismiss="modal" class="btn btn-primary btn-sm btn-default">Close</button>
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
  
  <?php
    include '../datatable/_datatable.php';
  ?>
  
  <script>
    load_datatable();
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
  <!-- <script src="assets/js/core/jquery.min.js"></script> -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <!-- <script src="https://unpkg.com/default-passive-events"></script> -->
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
  <script src="bankDetails.js"></script>
  <script>
    // function formReset() {
    //   document.getElementById("ajax").reset();
    // }
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

    let form = document.getElementById("ajax");
    form.addEventListener(
      "submit",
      function(ev) {
        let oData = new FormData(form);
        for (let pair of oData.entries()) {
          console.log(pair[0] + ", " + pair[1]);
        }
        ev.preventDefault();
      },
      false
    );
  </script>
</body>

</html>