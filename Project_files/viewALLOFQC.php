<?php
  $page_name = "View ALL OF/QC";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View ALL OF/QC</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <!--First row-->
                    <div class="row">
                      <div class="col-md-2">
                        <label style="margin-top:18px" for="viewType">Search By</label>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <select name="viewType" class="form-control icon" id="exampleFormControlSelect1">
                            <option style="color:black !important;" value="orderFullfilment" class="text-primary">Order
                              Fulfilment</option>
                            <option style="color:black !important;" value="qualityControl" class="text-primary">Quality
                              Control</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!--First row ends-->
                  </form>
                </div>
                <!--Card Body Close-->
                <!--Tablecard Body-->
                <div class="card-body">
                  <!-- table -->
                  <table class="table table-hover" style="margin-top: 4%;">
                    <thead class="text-primary " style="background-color: rgba(15, 13, 13, 0.856) !important;">
                      <th>
                        Sr.No
                      </th>
                      <th>
                        First Name
                      </th>
                      <th>
                        Last Name
                      </th>
                      <th>
                        Email ID
                      </th>
                      <th>
                        Contact Number
                      </th>
                      <th>
                        Level
                      </th>
                      <th>
      
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tablehead1">
                          1
                        </td>
                        <td class="tablehead1">
                          Vishwas
                        </td>
                        <td class="tablehead1">
                          Shan
                        </td>
                        <td class="tablehead1">
                          abc@xyz.com
                        </td>
                        <td class="tablehead1">
                          648484248
                        </td>
                        <td class="tablehead1">
                          QC
                        </td>
                        <td class="text-primary tablehead1">
                          <div class="box">
                            <a class="button btn btn-primary" href="#popup1">View</a>
                          </div>
                      </tr>
                      <tr>
                        <td class="tablehead1">
                          2
                        </td>
                        <td class="tablehead1">
                          Hooper
                        </td>
                        <td class="tablehead1">
                          Robert
                        </td>
                        <td class="tablehead1">
                          abc@xyz.com
                        </td>
                        <td class="tablehead1">
                          986564648
                        </td class="tablehead1">
                        <td class="tablehead1">
                          OF
                        </td>
                        <td class="text-primary tablehead1">
                          <div class="box">
                            <a class="button btn btn-primary" href="#popup1">View</a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--tabel Card Bod Ends-->
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--pop Up starts-->
      <div id="popup1" class="overlay">
        <div class="popup">
          <a class="close" href="#">&times;</a>  
          <div class="content">      
            <div class="row justify-content-around" style="margin-top: 0%; ">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">First Name :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Vishwas</p>
              </div>           
            </div>
           
            <div class="row justify-content-around" style="margin-top: 3%; ">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Last Name :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Shan</p>
              </div>           
            </div>
         
            <div class="row justify-content-around" style="margin-top: 3%; ">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Sur Name :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">S</p>
              </div>           
            </div>
          
      
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Dob :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">25/5/2016</p>
              </div>           
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Permanent Address :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">house no 18, D block, bannerghatta Road, Bangalore</p>
              </div>
            </div>                     
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Temparary Address :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Mysore</p>
              </div>   
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Country :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">India</p>
              </div>   
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">State:</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Karnataka</p>
              </div>
             
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">City :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Bangalore</p>
              </div>
             
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Email :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">shan@gmail.com</p>
              </div>
             
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Contact :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">9886543453</p>
              </div>
            
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Alternate Contact :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">7264658676</p>
              </div>
            
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Pan Number :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">65g4fg</p>
              </div>
            
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Adhar Name :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">65566</p>
              </div>
              
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Bank Name :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">ICICI</p>
              </div>
             
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Account Number :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">546746676566</p>
              </div>
              
            </div>
            <div class="row justify-content-around" style="margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Position :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Trainie Engineer</p>
              </div>
           
            </div>
            <div class="row justify-content-around" style="margin-bottom:4%; margin-top: 3%;">
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">Date Of Joining :</p>
              </div>
              <div class="col-md-6">
                <p style="padding: 0; margin: 0;">23/3/2019</p>
              </div>          
            </div>
            <div class="row justify-content-end">          
                 <button style="margin-right: 1%;"class="btn btn-default btn-sm">Edit</button>
                 <button style="margin-right: 1%;"class="btn btn-default btn-sm">Save</button>
                 <button style="margin-right: 3%;" class="btn btn-defaul btn-sm">Cancel</button>           
            </div>
          </div>
        </div>
      </div>
      <!--pop up ends-->
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
  <script src="data.js"></script>
</body>

</html>