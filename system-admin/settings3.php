<?php
$page_name = "Service Document Settings";
include 'Header.php';
include 'API/dropdown.css'
?>
<style>
  .dropbtn{
    text-align: left;
    font-size: 14px;
    background-color: white !important;
    color:  rgba(0, 0, 0, 0.705) !important;
    border: 1px solid rgba(128, 128, 128, 0.473) !important;
    text-transform: inherit;
  }

  .dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
  }

  #myInput {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
  }

  #myInput:focus {outline: 3px solid #ddd;}

  .dropdown {
    z-index:100;
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown a:hover {background-color: #ddd;}

  .show {display: block;}

  .list i{
   padding: 5px 10px 5px 10px;
   cursor: pointer;
 }

 .list button{
  border: 1px solid rgba(128, 128, 128, 0.527);
  margin: 5px 10px 5px 10px;
  border-radius: 2px;
  font-size: 13px;


}
</style>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Servicewise Document Settings</h4>
          </div>
          <div class="card-body">
            <form id="ajax">
              <div class="row justify-content-around">
                <div class="form-group col-md-5">
                  <select style="margin-top: 1.5%; margin-top: 8%;" class="browser-default custom-select" type="select" id="" name="first" style="color:#202940;" required>
                    <option value="Select Services">Select Services</option>
                    <option value="India Address Verification">India Address Verification</option>
                  </select>
                </div>
                <div class="form-group col-md-5">

                  <div class="dropdown">
                   <label for="">Package Name</label>
                   <button style="width: 120%;" type="button" onclick="myFunction()" class="btn btn-primary dropbtn">Package Name</button>
                   <div id="myDropdown" class="dropdown-content" style="height: 200px;">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <ul style="list-style: none;">
                     <li> <div class="form-check">
                      <label class="form-check-label" style="margin-bottom:14px !important;">Address Package
                        <input class="form-check-input Checking" name=""  type="checkbox" value="Address Package" >
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </li>
                  <li> <div class="form-check">
                    <label class="form-check-label" style="margin-bottom:14px !important;">Criminal package
                      <input class="form-check-input Checking" name="DOB" type="checkbox" value="Criminal package" >
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </li>
                <li> <div class="form-check">
                  <label class="form-check-label" style="margin-bottom:14px !important;">Education
                    <input class="form-check-input Checking" name="DOB" type="checkbox" value="Education" >
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </li>
              <li> <div class="form-check">
                <label class="form-check-label" style="margin-bottom:14px !important;">SSN
                  <input class="form-check-input Checking" name="DOB" type="checkbox" value="SSN" >
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            </li>
            <li> <div class="form-check">
              <label class="form-check-label" style="margin-bottom:14px !important;">Combo Package
                <input class="form-check-input Checking" name="DOB" type="checkbox" value="Combo Package" >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </li>
        </ul>  
      </div>
    </div>
  </div>
</div>
<div class="form-group shadow-textarea" style="margin-top:6% !important; margin-bottom: 2%;width: 90%; margin: auto;">
  <label for="Email">Preview</label><br>
  <div id="previewDiv" style="width: 100%; height: 140px; border: 1px solid rgba(128, 128, 128, 0.671); border-radius: 5px; ">
    <div class="list" style="padding: 10px;">
      <button class="btnClose">Adhar Card<i class="fa fa-times" aria-hidden="true"></i>                        </i>                        </button>
      <button class="btnClose">Pan Card<i class="fa fa-times" aria-hidden="true"></i>                        </i>                        </button>
      <button class="btnClose">10th marks card<i class="fa fa-times" aria-hidden="true"></i>                        </i>                        </button>
    </div>
  </div>
</div>

<div class="row justify-content-end" style="margin-right: 5%;margin-top: 1%;">
  <button type="submit" class="btn btn-primary mx-2">
    Okay
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
    <table class="table table-hover" style="margin-top: 1%; text-align: center;">
      <thead class="text-primary thead-dark">
        <th>Sr.No</th>
        <th>Services</th>
        <th>Documents List</th>
        <th></th>
      </thead>
      <tbody id="table-body">
        <tr>
          <td class="AllTds">1</td>
          <td class="AllTds">
            <p>Indian Address Verification</p>
          </td>
          <td class="AllTds">Light Bill, Pan Card, Adhar Card</td>

          <td class="text-primary">
            <button style="margin-left: 10%;" id="btn1" type="button" class="btn btn-primary btn-sm togglebtn AllTds ">
              <i class="fa fa-trash AllTds" aria-hidden="true"></i>
            </button>
          </tr>
          <tr>
            <td class="AllTds"></td>
            <td class="AllTds"></td>
            <td class="AllTds"></td>
            <td class="text-primary">
              <button style="margin-left: 10%;" type="button" id="btn2" class="btn btn-primary btn-sm togglebtn AllTds">
                <i class="fa fa-trash AllTds" aria-hidden="true"></i>
              </button>
            </tr>
            <tr>
              <td class="AllTds"></td>
              <td class="AllTds"></td>
              <td class="AllTds"></td>
              <td class="text-primary">
                <button type="button" style="margin-left: 10%;" id="btn3" class="btn btn-primary btn-sm togglebtn AllTds">
                  <i class="fa fa-trash AllTds" aria-hidden="true"></i>
                </button>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-primary">
                  <button type="button" style="margin-left: 10%;" id="btn4" class="btn btn-primary btn-sm togglebtn AllTds">
                    <i class="fa fa-trash AllTds" aria-hidden="true"></i>
                  </button>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- table end -->


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


    // var items=document.getElementsByClassName("Checking")
    // var selectedlist=[];
    //  for(var i=0; i<items.length; i++)       
    // {
    //     if(items[i].checked==true) {
    //        selectedlist.push(items[i].value)
    //     }                
    //  }


    // for(var j=0; j<selectedlist.length; j++){



    //  let btn=document.createElement("button")
    //  let text=document.createTextNode(selectedlist[j]); 
    //  btn.appendChild(text)
    //  btn.className="btnClose"


    //  let icon=document.createElement("i")
    //  icon.className="fa fa-times"
    //  icon.setAttribute("aria-hidden",true)
    
    // $(".list").append(btn)
    

    //  btn.appendChild(icon)


    //  console.log(btn)
    // }










  </script>





  <!--mode changing-->
  <script>
    $(".btnClose").click(function(e){
     $(this).hide();
     
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