<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    View Order
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/3aaaecc22c.js" crossorigin="anonymous"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--Switching modes-->
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
       .upload-btn{
        border:2px solid #DFDFDF !important;
        color:black !important;
        background-color:#FDFDFD !important; 
        margin-left:70%;
        width: 30%;
        padding: 10px !important;
      }
  </style>
</head>

<body class="dark-edition">
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"> <a class="navbar-brand" href="#">
          <img src="../assets/img/logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
        </a></div>
      <!--Side Bar-->
      <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="./Vendor1.php">
                <p>Order Search</p></a
              >
            <li class="navbar-item">
              <a class="nav-link" href="./Vendor2.php">
                <p>View Order</p></a>
            </li>
          </ul>
        </div>
      <!--Side Bar End-->
  </div>
    <div class="main-panel">
      <!--toggle button-->
      <div class="toggle-container" style="margin-bottom: 10%; position: fixed;z-index: 100; top: 8.5%; right: 0;">
        <input type="checkbox" id="switch" name="theme">
        <label id="toggleButton" for="switch">Toggle</label>
      </div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example" style="padding: 0; margin: 0;">
        <div class="container-fluid">
          <div class="navbar-wrapper" style="height: 70px;">
            <a class="navbar-brand" href="javascript:void(0)" style="color: white;">View Order</a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input
                  type="text"
                  value=""
                  class="form-control"
                  placeholder="Search..."
                />
                <button
                  type="submit"
                  class="btn btn-default btn-round btn-just-icon"
                >
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i style="color: white;" class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="color: white;" class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="color: white;" class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                  <div class="ripple-container"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="MyProfile.php">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="API/db_logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
               
  <!--Bank Details-->
  <div class="container-fluid" >
    <div class="row" style="margin-top: 3%;">
      <div class="col-md-12">
        <div class="card" style="width: 100% !important;">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Application Data</h4>
          </div>
          <div class="card-body">
            <form id="ajax" >
                 <!--First Row-->
                 <div class="row justify-content-between" style="text-align:left;">
                    <div class="col-md-2 col-sm-3">
                        <label style="font-style:oblique;">Applicant Name :</label>
                     </div>
                     <div class="col-md-2 col-sm-2">
                        <label>hget-12345</label>
                     </div>
  
                     <div class="col-md-2 col-sm-3">
                        <label style="font-style:oblique;">Case Refarence No :</label>
                     </div>
                     <div class="col-md-2 col-sm-2">
                        <label>sandip</label>
                      </div>
                      <div class="col-md-2 col-sm-3">
                        <label style="font-style:oblique;">Service Name :</label>
                      </div>
                      <div class="col-md-2 col-sm-2">
                        <label>raj</label>
                      </div>     
                   </div>
                    <!--second Row-->
                    <div class="row justify-content-between" style="text-align:left; margin-top: 1%;" >
                        <div class="col-md-2 col-sm-3">
                            <label style="font-style:oblique;">Status :</label>
                         </div>
                         <div class="col-md-2 col-sm-2">
                            <label>hget-12345</label>
                         </div>
      
                         <div class="col-md-2 col-sm-3">
                            <label style="font-style:oblique;">Initiation Date :</label>
                         </div>
                         <div class="col-md-2 col-sm-2">
                            <label>23/4/2018</label>
                          </div>
                          <div class="col-md-2 col-sm-3">
                            <label style="font-style:oblique;">Closure Date :</label>
                          </div>
                          <div class="col-md-2 col-sm-2">
                            <label>23/4/2019</label>
                          </div>     
                       </div>
                    <!--Third row-->
                    <div class="row justify-content-start" style="margin-top: 1%;">
                        <div class="col-md-2 col-sm-3">
                           <label style="font-style:oblique;">Maiden Name :</label>
                        </div>
                        <div class="col-md-2 col-sm-2">
                           <label>Mamatha</label>
                         </div>
                       </div>        
                    </form>
                  </div>
               </div>
            </div>
            <!--case Details-->
                <div class="container-fluid">
                  <div class="row" style="margin-top: 1%;">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">Criminal Case :</h4>
                        </div>
                        <div class="card-body">
                          <form id="ajax">
                            <!--Button-->
                             <div class="row justify-content-end" style="margin-right: 0.5%;">                   
                               <button type="button" id="hidedbtn" class="btn btn-primary">
                                    Provided Details
                                </button>
                             </div>
                             <!--Button ends here-->


                         <div class="row" style="text-align: center; font-weight:bold;">
                            <div class="col-md-5">
                                <label style="font-family:monospace;font-size: 1.2rem; font-weight: bold;">Verified</label>
                           </div>
                           <div class="col-md-5" style="text-align:inherit !important;;">
                                <label style="margin-left: 5%; font-family: monospace;font-size: 1.1rem;font-weight: bold; " class="hidediv">Provided</label> 
                             </div>
                         </div>
                         <!--first row-->
                         <div class="row " style="margin-top: 2%;">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label>Date Of Birth</label>
                                 <input name="" type="date" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">5/7/1993</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--first row ends-->
                          <!--Second row-->
                          <div class="row ">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">SSN Code</label>
                                 <input name="" type="text" class="form-control ">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">12345</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--Second row ends-->
                          <!--Third row-->
                          <div class="row ">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Father's Name</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">Yediyurappa</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--Third row ends-->
                          <!--Fourth row-->
                          <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Stay Period From</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">23/2/2018</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--Fourth row ends-->
                          <!--Fifth row-->
                          <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Stay Period To</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">23/2/2019</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--Fifth row ends-->
                          <!--sixth row-->
                          <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Address Line 1</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">Bangalore</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--sixth row ends-->
                          <!--seventh row-->
                          <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Address Line 2</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">Mysore</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--seventh row ends-->
                         <!--Eight row-->
                         <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">City</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">Bangalore</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--Eight row ends-->
                         <!--ninth row-->
                         <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">State</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">Karnataka</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--ninth row ends-->
                         <!--tenth row-->
                         <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Country</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">India</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--tenth row ends-->
                         <!--eleventh row-->
                         <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                 <label class="bmd-label-floating">Zip Code</label>
                                 <input name="" type="text" class="form-control">
                               </div>
                             </div>
                             <div class="col-md-2">
                                                         
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label style="margin-top:7px;" class="hidediv">234543</label>
                                  </div>    
                              </div>
                           </div>                      
                         <!--eleventh row ends-->
                         <br>
                         <!--twelth row starts-->
                         <div class="row"style="margin-top:3%;" >
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Verified Details</label>
                                <input name="" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-8" > 
                              <div class="form-group">
                                <label class="bmd-label-floating">Verified Comments</label>
                                <input name="" type="text" class="form-control">                        
                              </div>
                            </div>
                         </div>
                          <!--twelth row ends-->
                          <!--Thirteen row starts-->
                          <div class="row"style="margin-top:1%;" >
                            <div class="col-md-4" > 
                                <div class="form-group">
                                    <label style="font-size: 13px;" class="bmd-label-floating">Status</label>
                                    <select style="margin-top: 2%;"  name="Groups" class="browser-default custom-select" required>
                                      <option selected="selected" hidden value="null">Choose..</option>
                                      <option value=0>Pending</option>
                                      <option value=1>Pending</option>
                                      <option value=2>Pending</option>
                                    </select>
                                  </div>
                                </div>
                              <div style="margin-top: 1%; margin-bottom: 2%;" class="col-md-4" > 
                                <div class="form-group">
                                  <label >Closed Date</label>
                                  <input type="date" class="form-control">                        
                                </div>
                              </div>
                          </div>
                           <!--Thirteen row ends-->
            
                            <!--Client Note start-->
                            <div class="card-header card-header-primary" style="width: 98%; margin-left:0%; margin-top: 3%;">
                              <h4 style="color: white;" class="card-title">Client Note</h4>
                            </div>
                            <div class="card-body">
                              <form id="ajax">
                                <div class="row"style="margin-left:0%;margin-top:0%;" >
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Public Note</label>
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6" > 
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Private Note</label>
                                        <input type="text" class="form-control">                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row justify-content-end">
                                    <div class="col-md-6">
                                      <button type="button" class="btn btn-primary upload-btn"style="width:50px;padding:10px;margin-left:88%;">Add</button>
                                    </div>
                                    <div class="col-md-6">
                                      <button type="button" class="btn btn-primary upload-btn"style="width:50px;padding:10px;margin-left:85%">Add</button>
                                    </div>
                                  </div>
                                  <div class="row justify-content-end" style="margin-top: 2%; margin-right: 1%;">
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                              </form>
                           </div>
                       <!--Client Note ends-->
                        <!--Eta Note start-->
                        <div class="card-header card-header-primary" style="width: 98%; margin-left: 0%; margin-top: 3%;">
                            <h4 style="color: white;" class="card-title">ETA Note</h4>
                          </div>
                          <div class="card-body">
                            <form id="ajax">
                                <div class="row"style="margin-left:0%;margin-top:0%;" >
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>ETA Date</label>
                                        <input type="date" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row justify-content-end" style="margin-left:0%;margin-top:0%;" >
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">ETA Note</label>
                                          <input name="" type="text" class="form-control">                                                    
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="bmd-label-floating">Additional Comment....</label>
                                          <input name="" type="text" class="form-control">                                                    
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row justify-content-end">
                                    <button type="button" class="btn btn-primary" style="margin-right: 1%;">Add ETA Note</button>
                                  </div>           
                             </form>
                          </div>
                     <!--Eta Note Stop-->
                      <!--Document Refreance start-->
                      <div class="card-header card-header-primary" style="width: 98%; margin-left: 0%; margin-top: 3%;">
                        <h4 style="color: white;" class="card-title">Document Refeence</h4>
                      </div>
                      <div class="card-body">
                        <form id="ajax">
                            <div class="row" style="margin-top:4%;margin-left: 0%;">
                                <div class="col-md-2">
                                    <label for="" style="margin-top: 12%; margin-left:3%;">Upload File</label>
                                </div>
                                <div class="col-md-1.5">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1" style="padding:3px;margin-right: 10px; border-radius: 2px; cursor: pointer;" class="border blackcolor">Choose File <i style="margin-left: 2px;" class="fa fa-file" aria-hidden="true"></i></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        <label for="exampleFormControlFile1" style="padding:3px; border-radius: 2px; cursor: pointer;" class="border blackcolor">Download Format <i style="margin-left: 2px;" class="fa fa-download" aria-hidden="true"></i></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">                  
                                    </div> 
                                    <button type="button" class="btn btn-primary upload-btn">Upload</button>
                                </div>
                            </div>    
                           </div>
                           <div class="row justify-content-end" style="margin-right: 1%;">
                              <button type="button" class="btn btn-primary">Submit</button>
                           </div>
                        </form>
                     </div>
                 <!--Document Refreance ends-->       
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
$(".hidediv").hide();
$(document).ready(function(){
  $("#hidedbtn").click(function(){
    $(".hidediv").fadeToggle("slow");
  })
})



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
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="data.js"></script>
</body>

</html>