<?php
$page_name = "Standard Macro";
include 'Header.php';
?>
<style type="text/css">
  .custom-select{
    background: transparent;
  }
  .odd, #datatable_tbl_filter, .dataTables_info{
    display: none;
  }
</style>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><i class="fa fa-edit"></i> Add Standard Macro</h4>
          </div>
          <div class="card-body">
            <form id="ajax" method="POST">
              <!-- <div class="row justify-content-between">
                <div class="form-group1 col-md-4">
                  <label for="Service Type" class="bmd-label-floating1" style=" font-size:13px">Service Type</label>
                  <select style="margin-top:1%" name="ServiceType" id="Service Type" class="browser-default custom-select" required>
                  </select>
                </div>

                <div class="form-group1 col-md-4">
                  <label for="Macro" class="bmd-label-floating1" style=" font-size:13px">Macro Type</label>
                  <select  style="margin-top:1%" name="MacroType" id="MacroType" class="browser-default custom-select" required>
                    <option value="">Select</option>
                    <option>Canceled</option>
                    <option>Discrepancy</option>
                    <option>UTV</option>
                    <option>Inconclusive</option>
                    <option>Insufficiency</option>
                    <option>Insufficiency Cleared</option>
                    <option>Insufficiency Verifier</option>
                    <option>Minor Discrepancy</option>
                    <option>Park</option>
                    <option>Pending</option>
                    <option>Re-assigned</option>
                    <option>Verified Clear</option>
                  </select>
                </div>
                <div class="form-group1 col-md-4">
                  <label for="Service" style="">Scenario</label>
                  <input name="Scenario" id="Scenario" type="text" class="form-control" placeholder="" required />
                </div>
              </div> -->
              <div class="row">
                <div class="col-md-8">
                  <label class="bmd-label-floating1" for="Service">Comment</label>
                  <textarea name="Comment" id="Comment" type="text" class="custom-select" placeholder="" required rows="3" ></textarea>
                </div>
                <div class="col-md-4 form_right">
                  <br>
                  <button type="submit" class="btn btn-sm btn-success"><i class="material-icons icon">note_add</i> Save</button>
                  <button type="button" class="btn btn-sm btn-default" onclick="reset()" ><i class="material-icons icon">close</i> Reset</button>
                  <!-- <button type="button" class="btn btn-sm btn-primary" > Search</button> -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div >
                    <br>
                    <div id="data_table">
                      <table id="datatable_tbl" class="table table-hover" >
                       <thead class="text-light" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                        <!-- <th width="150">
                          Scenario
                        </th> -->
                        <th width="60%">
                          Comments
                        </th>
                        <!-- <th>
                          Service Type
                        </th>
                        <th>
                          Macro Type
                        </th> -->
                        <th class="noExport">
                          Edit
                        </th>
                        <th class="noExport">
                          Delete
                        </th>
                      </thead>
                      <tbody id="table">
                        <script src="assets/js/core/jquery.min.js"></script>
                        <script src="assets/js/plugins/xlsx.full.min.js"></script>
                        <script src="assets/js/plugins/FileSaver.min.js"></script>
                        <script src="standardMacro.js"></script>
                        <script>
                          popuTable();
                        </script>
                      </tbody>
                    </table>
                  </div>
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
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<?php
include '../datatable/_datatable.php';
?>
<script type="text/javascript">
  load_datatable();
</script>
<script>
  function reset() {
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
    let form = document.getElementById("ajax");
    $(form).submit(function(event) {
      var formdata = $("form").serializeArray();
      //console.log(formdata);
      var data = {};
      $(formdata).each(function(index, obj) {

        data[obj.name] = obj.value;
      });

      fetch('./API/addStandardMacro.php', {
        method: 'post',
        body: JSON.stringify(data)
      }).then(function(res) {
        popuTable();
        alert('Standard Macro saved Successfully');
        reset();
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