<?php
  $page_name = "LOB";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="padding: 1%; margin: 0;">
                  <h4 class="card-title">LOB</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row justify-content-around">
                      <div class="form-group col-md-4">
                        <label style="margin-left: 3%; font-size: 13px;" class="bmd-label-floating">Client Name</label>
                        <select  class="browser-default custom-select" type="select" id="Client Name" name="Id" style="color:#202940; margin-top: 2%;" required>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="LOB" style="margin-left: 4%;">LOB</label>
                        <input type="text" class="form-control" name="lob" placeholder="" required />
                      </div>
                    </div>
                    <div class="row justify-content-around">
                      <div class="form-group col-md-4">
                        <label for="PO" style="margin-left: 4%;">PO</label>
                        <input type="text" class="form-control" name="po" placeholder="" />
                      </div>

                      <div class="form-group col-md-4">
                        <label for="Address" style="margin-left: 4%;">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="" />
                      </div>
                    </div>
                    <div class="row justify-content-around">
                    <div class="form-group col-md-4">
                        <label style="margin-left: 3%;font-size: 13px;" class="bmd-label-floating">Country</label>
                        <select class="browser-default custom-select" type="select" id="country" name="country" style="color:#202940;margin-top: 2%;" required>
                          <option value="0">Select Country</option>
                        </select>
                      </div>              
                      <div class="form-group col-md-4">
                        <label style="margin-left: 3%;font-size: 13px;" class="bmd-label-floating">State</label>
                        <select class="browser-default custom-select" type="select" id="state" name="state" style="color:#202940;margin-top: 2%;" required>
                          <option value="0">Select State</option>
                        </select>
                      </div>
                    </div>
                    <div class="row justify-content-around">
                        <div class="form-group col-md-4">
                        <label style="margin-left: 3%; font-size: 13px;" class="bmd-label-floating">City</label>
                        <select class="browser-default custom-select" type="select" id="city" name="city" style="color:#202940; margin-top: 2%;" required>
                          <option value="0">Select City</option>
                        </select>
                      </div>  
                      <div class="form-group col-md-4">
                        <label for="GST" style="margin-left: 4%;">GST</label>
                        <input type="text" class="form-control" name="gst" placeholder="" />
                      </div>               
                    </div>
                    <div class="row justify-content-around">
                      <div class="form-group col-md-4">
                        <label for="ZipCode" style="margin-left: 4%;">ZipCode</label>
                        <input type="text" class="form-control" name="zipcode" placeholder="" />
                      </div>

                      <div class="form-group col-md-4">
                        <label for="Address" style="margin-left: 4%;">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="" />
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <button type="submit" class="btn btn-primary mx-2" style="margin-right: 3%;">
                        Save
                      </button>

                      <button type="button" class="btn btn-primary" style="margin-right: 3%;" onclick="formReset()">
                        Reset
                      </button>
                    </div>
                  </form>
                </div>
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
  <script src="data2.js"></script>
  <script src="LOB.js"></script>
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

      console.log(data);
      fetch('./API/LOB.php', {
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