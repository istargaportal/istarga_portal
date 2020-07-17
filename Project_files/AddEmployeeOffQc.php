<?php
  $page_name = "OF/QC/Vendor";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">ADD OF/QC/Vendor</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <!--First row-->
                    <div class="row" style="margin-top: 1%;">
                      <div class="col-md-2 ">
                        <div class="form-group">
                          <label style="font-size: 13px;" class="bmd-label-floating">Title</label>
                          <select style="margin-top: 2%;" name="Title" id="Title" class="browser-default custom-select" required>
                            <option selected="selected" hidden value="null">Choose..</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input name="Name" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="middleName" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sur Name</label>
                          <input name="surName" type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <!--Second row-->
                    <div class="row" style="margin-top: 1%;">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Date of birth</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <!--Third row-->
                    <div class="row justify-content-between">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Parmanent Address</label>
                          <input name="parmanentAddress" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Temparary Address</label>
                          <input name="temparyAddress" type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <!--Fourth row-->
                    <div class="row justify-content-between" style="margin-top: 1%;">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input name="Country" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input name="State" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input name="City" type="text" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pincode</label>
                          <input name="pincode" type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <!--Fifth row-->
                    <div class="row justify-content-between" style="margin-top: 1%;">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email ID</label>
                          <input name="emailId" type="email" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Name</label>
                          <input name="userName" type="text" class="form-control" />
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input name="password" type="password" class="form-control" />
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password Mail To</label>
                          <input id="passwordMailTo" name="Password Mail To" type="email" class="form-control" required />
                        </div>
                      </div>
                    </div>
                    <!--Sisxth row-->
                    <div class="row justify-content-start" style="margin-top: 1%;">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact Number</label>
                          <input name="contact" type="number" class="form-control" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alternate Contact Number</label>
                          <input name="alternateContact" type="number" class="form-control" />
                        </div>
                      </div>
                    </div>                       
                    <!--Seventh row-->
                    <div class="row justify-content-start" style="margin-top: 1%;">
                      <div class="col-md-3" style="padding-right: 0;">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adhar Number</label>
                          <input name="adharNumber" type="text" class="form-control" />
                        </div>
                      </div>  
                      <div class="col-md-1" style="padding: 0;">
                        <div class="form-group">
                          <input type="file" id="customFile1" name="photo">
                          <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile1">Browse</label>
                        </div>
                      </div>

                      <div class="col-md-3" style="padding-right: 0;">
                        <div class="form-group">
                          <label class="bmd-label-floating">PanNumber</label>
                          <input name="adharNumber" type="text" class="form-control" />
                        </div>
                      </div>  
                      <div class="col-md-1" style="padding: 0;">
                        <div class="form-group">
                          <input type="file" id="customFile2" name="photo">
                          <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile2">Browse</label>
                        </div>
                      </div>

                      <div class="col-md-3" style="padding-right: 0;">
                        <div class="form-group">
                          <label class="bmd-label-floating">Your Photo</label>
                          <input name="adharNumber" type="text" class="form-control" />
                        </div>
                      </div>  
                      <div class="col-md-1" style="padding: 0;">
                        <div class="form-group">
                          <input type="file" id="customFile3" name="photo">
                          <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile3">Browse</label>
                        </div>
                      </div>           
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="col-md-4">
                        <img style="display: none;" id="myImg1" src="#" alt="Adhar Image" height=100 width=200>
                      </div>     
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-4">
                        <img  style="display: none;" id="myImg2" src="#" alt="Pan Image" height=100 width=200>
                      </div>     
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-4">
                        <img style="display: none;" id="myImg3" src="#" alt="Image" height=100 width=200>
                      </div>     
                    </div>
                  </div>
                  


                <!--Bank Details-->
                <div class="container-fluid">
                  <div class="row" style="margin-top: 3%;">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 style="color: white !important;" class="card-title">Bank Details</h4>
                        </div>
                        <div class="card-body">
                          <form id="ajax">
                            <!--First row-->
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label  class="bmd-label-floating">Bank Name</label>
                                  <input name="bankName" type="text" class="form-control" />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Account Number</label>
                                  <input name="accountNumber" type="text" class="form-control" />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">IFSC Code</label>
                                  <input name="ifsc" type="text" class="form-control" />
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!--Position Details-->
                    <div class="container-fluid" >
                      <div class="row" style="margin-top: 3%;">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header card-header-primary">
                              <h4 style="color: white !important;" class="card-title">Position</h4>
                            </div>
                            <div class="card-body">
                              <form id="ajax">
                                <!--First row-->
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label style="font-size: 13px;" class="bmd-label-floating">Groups</label>
                                      <select style="margin-top: 2%;" name="Groups" class="browser-default custom-select" required>
                                        <option selected="selected" hidden value="null">Choose..</option>
                                        <option value=0>OF</option>
                                        <option value=1>QC</option>
                                        <option value=2>Vendor</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label style="font-size: 13px;" class="bmd-label-floating">Status</label>
                                      <select style="margin-top: 2%;" name="Status" class="browser-default custom-select">
                                        <option selected="selected" hidden value="null">Choose..</option>
                                        <option value=1>Active</option>
                                        <option value=0>Inactive</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Date of Joining</label>
                                      <input type="dateOfjoining" name="dateofbirth" id="dateofbirth" class="form-control" />
                                    </div>
                                  </div>
                                </div>
                                <div class="row justify-content-end" style="margin-top:5%; margin-right:1%">

                                  <button type="submit" class="btn btn-primary pull-left" style="margin-left:4%;">Save</button>
                                  <div class="clearfix"></div>

                                  <button type="submit" class="btn btn-primary pull-left" style="margin-left:2%;">Ok</button>
                                  <div class="clearfix"></div>

                                  <button type="submit" class="btn btn-primary pull-left" style="margin-left:2%;">Cancel</button>
                                  <div class="clearfix"></div>

                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!--First row all closed-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


<script>
  window.addEventListener('load', function() {
    let file1, file2, file3;
    file1=document.querySelector('input[id="customFile1"]');
    file2=document.querySelector('input[id="customFile2"]');
    file3=document.querySelector('input[id="customFile3"]');
  
  
    file1.addEventListener('change', function() {
      if (this.files && this.files[0]) {
          let img=document.querySelector('#myImg1');  // $('img')[0]
          img.style.display="block"
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          img.onload = imageIsLoaded;
        }
      });
      file2.addEventListener('change', function() {
      if (this.files && this.files[0]) {
          let img = document.querySelector('#myImg2');  // $('img')[0]
          img.style.display="block"
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          img.onload = imageIsLoaded;
        }
      });
      file3.addEventListener('change', function() {
      if (this.files && this.files[0]) {
          let img = document.querySelector('#myImg3');  // $('img')[0]
          img.style.display="block"
          img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          img.onload = imageIsLoaded;
        }
      });
});


function imageIsLoaded() { 
  alert(this.src);  // blob url
  // update width and height ...
}
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
    <script src="data.js"></script>
</body>

</html>