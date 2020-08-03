<?php
  $page_name = "Create Package";
  include 'Header.php';
  include 'API/dropdown.css'
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Package</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label style="margin-left: 3%; font-size: 13px;" class="bmd-label-floating">Client Name</label>
                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="Client Name" name="Id" style="color:#202940;" required>
                        </select>
                      </div>

                      <div class="form-group col-md-4" >
                        <label style="margin-left: 3%; font-size: 13px;" class="bmd-label-floating">Country</label>
                        <!-- <input
                              name="Country"
                              type="text"
                              class="form-control"
                            />-->
                        <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="locality-dropdown" name="country_id" style="color:#202940;" onchange="getservice(this.value)" required>
                        </select>
                      </div>                    
                    </div>
                                    
                   
                  <div class="dropdown" style="margin-top: 2%;">
                   <label for="">Package Name</label>
                    <button style="width: 120%;" type="button" onclick="myFunction()" class="btn btn-primary dropbtn">Package Name</button>
                      <div id="myDropdown" class="dropdown-content" style="height: 200px;">
                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                       <ul style="list-style: none;">
                         <li> <div class="form-check">
                          <label class="form-check-label" style="margin-bottom:14px !important;">Address Package
                            <input class="form-check-input Checking" name=""  type="checkbox" value="Address Package" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </li>
                       <li> <div class="form-check">
                        <label class="form-check-label" style="margin-bottom:14px !important;">Criminal package
                          <input class="form-check-input Checking" name="DOB" type="checkbox" value="Criminal package" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </li>
                         <li> <div class="form-check">
                          <label class="form-check-label" style="margin-bottom:14px !important;">Education
                            <input class="form-check-input Checking" name="DOB" type="checkbox" value="Education" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </li>
                         <li> <div class="form-check">
                          <label class="form-check-label" style="margin-bottom:14px !important;">SSN
                            <input class="form-check-input Checking" name="DOB" type="checkbox" value="SSN" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </li>
                         <li> <div class="form-check">
                          <label class="form-check-label" style="margin-bottom:14px !important;">Combo Package
                            <input class="form-check-input Checking" name="DOB" type="checkbox" value="Combo Package" checked>
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </li>
                      </ul>  
                   </div>
                </div>
                   
                    <div class="row justify-content-end" style="margin-top:2%;">
                      <button type="submit" class="btn btn-primary mx-2" style="margin-right: 3%;">
                        Save
                      </button>

                      <button type="button" class="btn btn-primary" style="margin-right: 3%;">
                        Reset
                      </button>
                    </div>
                    <hr />
                  </form>
                </div>

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Package List</h4>
                  </div>
                  <div class="card-body">
                  <table class="table table-hover" style="margin-top: 4%;" >
                     <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                          <th>
                            Client Name
                          </th>
                          <th> 
                            Country
                          </th>
                          <th>
                            Package Name
                          </th>
                          <th>
                           Currency
                          </th>
                          <th>
                            Total Price
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="tablehead1">Combo1</td>
                            <td class="tablehead1">India</td>
                            <td class="tablehead1">Address</td>
                            <td class="tablehead1">Rupees</td>
                            <td class="tablehead1">5000</td>
                          </tr>            
                          <tr>
                            <td class="tablehead1">Combo2</td>
                            <td class="tablehead1">India</td>
                            <td class="tablehead1">Education</td>
                            <td class="tablehead1">Rupees</td>
                            <td class="tablehead1">7000</td>
                          </tr>
                        </tbody>
                      </table>                  
                   </div> 
                 </div>
                <!--Table closed-->        
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        
        function filterFunction() {
          var input, filter, ul, li, a, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          div = document.getElementById("myDropdown");
          a = div.getElementsByTagName("li");
          for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              a[i].style.display = "";
            } else {
              a[i].style.display = "none";
            }
          }
        }

      
    var items=document.getElementsByClassName("Checking")
    var selectedlist=[];
     for(var i=0; i<items.length; i++)       
    {
        if(items[i].type=='checkbox' && items[i].checked==true) {
           selectedlist.push(items[i].value)
        }                
     }
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