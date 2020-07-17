<?php
  $page_name = "Modify Service";
  include 'Header.php';
  include 'API/dropdown.css'
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Service</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label for="Service Type" class="bmd-label-floating" style="margin-left: 4%;">Service
                          Type</label>
                        <select style=" margin-top: 1%;" id="select_service_type" name="service_type_id" class="browser-default custom-select" required>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="Service" style="margin-left: 4%;">Service</label>
                        <input type="text" class="form-control" name="service_name" placeholder="" required />
                      </div>

                      <div class="form-group col-md-4">
                        <label for="Service Type" style="margin-left: 4%;">Document name</label>

                        <div class="multiple-select-dd">
                          <input type="text" placeholder="Search Documents..." class="search-field">
                          <div class="selected">
                            Choose Documents
                          </div>
                          <div class="select custom-scroll" >

                          </div>
                        </div>

                        <select style="margin-top:5%; opacity: 0; pointer-events: none;" id="document-name" class="browser-default custom-select" name="document-name" class="form-control" required multiple>
                          <option class='bg-secondary text-light' default not selected>Choose...</option>
                        </select>
                        <!-- <input type="text" list="cars" multiple/>
                        <datalist id="cars" >
                          <option>Volvo</option>
                          <option>Saab</option>
                          <option>Mercedes</option>
                          <option>Audi</option>
                        </datalist> -->
                      </div>
                    </div>
                    <div class="row justify-content-start" style=" margin-left:0%;padding-top:30">
                      <div class="form-check col-md-4">
                        <!-- <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="isWeb" id="isWeb" value=1 />
                          Is Web Service
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label> -->
                        <!-- <div class="dropdown" style="margin-top: 2%;">
                          <label for="">Documents List</label>
                           <button style="width: 120%;" type="button" onclick="myFunction()" class="btn btn-primary dropbtn">Documents List </button>
                             <div id="myDropdown" class="dropdown-content" style="height: 200px;">
                               <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                              <ul style="list-style: none;">
                                <li> <div class="form-check">
                                 <label class="form-check-label" style="margin-bottom:14px !important;">Adhar Card
                                   <input class="form-check-input Checking" name=""  type="checkbox" value="Adhar Card" checked>
                                   <span class="form-check-sign">
                                     <span class="check"></span>
                                   </span>
                                 </label>
                               </div>
                             </li>
                              <li> <div class="form-check">
                               <label class="form-check-label" style="margin-bottom:14px !important;">Pan Card
                                 <input class="form-check-input Checking" name="DOB" type="checkbox" value="Pan Card" checked>
                                 <span class="form-check-sign">
                                   <span class="check"></span>
                                 </span>
                               </label>
                             </div>
                           </li>
                                <li> <div class="form-check">
                                 <label class="form-check-label" style="margin-bottom:14px !important;">10th Marks Card
                                   <input class="form-check-input Checking" name="DOB" type="checkbox" value="10th Marks Card" checked>
                                   <span class="form-check-sign">
                                     <span class="check"></span>
                                   </span>
                                 </label>
                               </div>
                             </li>
                                <li> <div class="form-check">
                                 <label class="form-check-label" style="margin-bottom:14px !important;">PUC Marks Card
                                   <input class="form-check-input Checking" name="DOB" type="checkbox" value="PUC Marks Card" checked>
                                   <span class="form-check-sign">
                                     <span class="check"></span>
                                   </span>
                                 </label>
                               </div>
                             </li>
                                <li> <div class="form-check">
                                 <label class="form-check-label" style="margin-bottom:14px !important;">Degree Marks Card
                                   <input class="form-check-input Checking" name="DOB" type="checkbox" value="Degree Marks Card" checked>
                                   <span class="form-check-sign">
                                     <span class="check"></span>
                                   </span>
                                 </label>
                               </div>
                             </li>
                             </ul>  
                          </div>
                       </div> -->




                      </div>
                    </div>
                   
                   
                   
                    <div class="row justify-content-end">
                      <button type="submit" class="btn btn-primary mx-2" style="margin-right: 3%;">
                        Save
                      </button>

                      <button type="button" class="btn btn-primary" style="margin-right: 3%;">
                        Reset
                      </button>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 style="color:white" class="card-title">Services</h4>
                          </div>
                          <table style="width: 97%; margin-left: 1.5%; margin-top: 2%;" class="table table-hover" style="margin-top: 4%;">
                            <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                              <th>
                                ServiceID
                              </th>

                              <th>
                                Service
                              </th>
                              <th>
                                Service Type
                              </th>
                              <th>
                                Document List
                              </th>
                              <th>
                                Edit
                              </th>
                              <th>
                                Delete
                              </th>
                            </thead>
                            <div class="delete-modal">
                              <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#deleteModal">
                                Launch demo modal
                              </button>
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
                            <tbody id="table">
                              <script src="table.js"></script>
                              <script>
                                popuTable();
                              </script>
                            </tbody>
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

      <!-- <script>
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
       alert(selectedlist);
   </script> -->


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
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
  <script src="service.js"></script>
  <script>
    function formReset() {
      document.getElementById("ajax").reset();
    }
    let servicetype = document.getElementById('select_service_type');
    servicetype.length = 0;

    let defaultservicetype = document.createElement('option');
    defaultservicetype.text = 'Select Service Type';
    defaultservicetype.value = "0";

    servicetype.add(defaultservicetype);
    servicetype.selectedIndex = 0;

    const service = "https://www.bgvhwd.xyz/Project_files/API/servicetypelist.php";
    fetch(service).then(function(response) {
      //console.log(response);
      return response.text();
    }).then(function(text) {
      //console.log(text);

      let stat = JSON.parse(text);
      let option;

      for (let i = 0; i < stat.length; i++) {
        option = document.createElement('option');
        option.text = stat[i].name;
        option.value = stat[i].Id;
        servicetype.add(option);
      }

    }).catch(function(error) {
      console.error(error);
    })


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

    // let form = document.getElementById("ajax");
    // $(form).submit(function(event) {
    //   var formdata = $("form").serializeArray();
    //   if (formdata.length == 2) {
    //     formdata.push({
    //       name: "isWeb",
    //       value: "0"
    //     })
    //   }
    //   //console.log(formdata);
    //   var data = {};
    //   $(formdata).each(function(index, obj) {


    //     data[obj.name] = obj.value;
    //   });

    //   console.log(data);
    //   fetch('./API/addService.php', {
    //     method: 'post',
    //     body: JSON.stringify(data)
    //   }).then(function(res) {
    //     //console.log(res);
    //     alert('data saved success');
    //     popuTable();
    //     formReset();
    //   }).catch(err => {
    //     //console.log(err);
    //     return err;
    //   })
    //   event.preventDefault();
    // });
    // $.ajax;
  </script>
</body>

</html>