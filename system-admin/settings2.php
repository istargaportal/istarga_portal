<?php
  $page_name = "Email Trigger Settings";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Email Trigger Settings</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row justify-content-around">
                      <div class="form-group col-md-5">
                        <select style="margin-top: 1.5%; margin-top: 2%;" class="browser-default custom-select" type="select" id="" name="first" style="color:#202940;" required>
                          <option value="select case">Select Case</option>
                          <option value="Insuffiency">Insuffiency</option>
                        </select>
                      </div>
                      <div class="form-group col-md-5">
                        <select style="margin-top: 1.5%; margin-top: 2%;" class="browser-default custom-select" type="select" id="" name="second" style="color:#202940;" required>
                          <option value="First Name">First Name</option>
                          <option value="Middle Name">Middle Name</option>
                          <option value="Last Name">Last Name</option>
                          <option value="Mother's Name">Mother's Name</option>
                          <option value="Address Line 1">Address Line 1</option>
                          <option value="Address Line 2">Address Line 2</option>
                          <option value="City">City</option>
                          <option value="State">State</option>
                          <option value="Pin Code">Pin Code</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group shadow-textarea" style="margin-top:6% !important; margin-bottom: 2%;width: 90%; margin: auto;">
                      <label for="Email">Email Content</label><br>
                      <textarea class="form-control textedArea z-depth-1" id="Email" rows="12" placeholder="Write something here..."></textarea>
                    </div>

                    <div class="row justify-content-end" style="margin-right: 5%;margin-top: 1%;">
                      <button type="submit" class="btn btn-primary mx-2">
                        Save
                      </button>

                      <button type="button" class="btn btn-primary">
                        Cancel
                      </button>
                    </div>
                  </form>
                </div>
                <!-- table -->
                <div class="col-md-11" style="margin: auto;">
                  <div class="row">
                    <table class="table table-hover" style="margin-top: 1%;">
                      <thead class="text-primary thead-dark">
                        <th>Sr.No</th>
                        <th>Case</th>
                        <th>Case Name</th>
                        <th>Content</th>
                      </thead>
                      <tbody id="table-body">
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-primary">
                            <button style="margin-left: 10%;" id="btn1" type="button" class="btn btn-primary btn-sm togglebtn ">
                              View
                            </button>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-primary">
                            <button style="margin-left: 10%;" type="button" id="btn2" class="btn btn-primary btn-sm togglebtn">
                              View
                            </button>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-primary">
                            <button type="button" style="margin-left: 10%;" id="btn3" class="btn btn-primary btn-sm togglebtn">
                              View
                            </button>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-primary">
                            <button type="button" style="margin-left: 10%;" id="btn4" class="btn btn-primary btn-sm togglebtn">
                              View
                            </button>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- table end -->
                <!--New Div-->
                <div class="hidediv">
                  <div class="row innerdivs">
                    <div class="col-md-1.2" style="padding-right:0">
                      <button style="margin-right:10px;" type="button" id="inbtn1" class="btn btn-primary btn-sm inbtn1"> Save</button>
                    </div>
                    <div class="col-md-1.2">
                      <button style="margin-right:10px;" type="button" id="inbtn1" class="btn btn-primary btn-sm inbtn1"> Okay</button>
                    </div>
                    <div class="col-md-1.2">
                      <button type="button" id="inbtn1" class="btn btn-primary btn-sm inbtn1 cancelbtn"> Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--New Div End-->
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
  $(".cancelbtn").click(function(){
    $(".hidediv").hide();
  })



    $(".hidediv").hide()
    $(function() {
      $(".togglebtn").click(function() {
        $(".hidediv").fadeToggle("slow");
      })
    })



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
  <script src="settings2.js"></script>
  <script type="text/javascript" src="data2.js"></script>
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
      fetch('./API/createPackage.php', {
        method: 'post',
        body: JSON.stringify(data)
      }).then(function(res) {
        //console.log(res.text());
        formReset();
      }).catch(err => {
        //console.log(err);
        return err;
      })
      event.preventDefault();
    });
    $.ajax;
  </script>
</body>

</html>