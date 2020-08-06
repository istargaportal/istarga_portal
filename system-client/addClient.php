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
  <!--------------dfgdf------>
    <meta charset="utf-8" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Add Client
    </title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
    />
    <!-- CSS Files -->
    <link
      href="../assets/css/material-dashboard.css?v=2.1.0"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/3aaaecc22c.js"
      crossorigin="anonymous"
    ></script>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"
    />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
  </head>

  <body class="dark-edition">
    <div class="wrapper">
      <div
        class="sidebar"
        data-color="purple"
        data-background-color="black"
        data-image="../assets/img/sidebar-2.jpg"
      >
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"> <a class="navbar-brand" href="#">
        <img src="../assets/img/logo.png" width="100%" height="100%" style="margin-left: 2%;" alt="">
      </a></div>
        <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="Dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ClientViewOrder.php">
              <i class="material-icons">content_paste</i>
              <p>View Order</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="CreateOrder.php">
              <i class="material-icons">content_paste</i>
              <p>Create Order</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ClientBulkOrder.php">
              <i class="material-icons">library_books</i>
              <p>Bulk Orders</p>
            </a>
          </li>
            <li class="nav-item ">
            <a class="nav-link" href="reports.php">
              <i class="material-icons">library_books</i>
              <p>Reports</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="MyProfile.php">
              <i class="material-icons">person</i>
              <p>My Profile</p>
            </a>
          </li>
         <!-- <li class="nav-item ">
            <a class="nav-link" href="notifications.php">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>-->
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="upgrade.php">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav
          class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
          id="navigation-example"
        >
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="javascript:void(0)">Add Client</a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
              data-target="#navigation-example"
            >
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <form class="navbar-form" method="POST">
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
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    href="javscript:void(0)"
                    id="navbarDropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="navbarDropdownMenuLink"
                  >
                    <a class="dropdown-item" href="javascript:void(0)"
                      >Mike John responded to your email</a
                    >
                    <a class="dropdown-item" href="javascript:void(0)"
                      >You have 5 new tasks</a
                    >
                    <a class="dropdown-item" href="javascript:void(0)"
                      >You're now friend with Andrew</a
                    >
                    <a class="dropdown-item" href="javascript:void(0)"
                      >Another Notification</a
                    >
                    <a class="dropdown-item" href="javascript:void(0)"
                      >Another One</a
                    >
                  </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                <div class="ripple-container"></div></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./index.php">Log out</a>
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
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Client</h4>
                    <p class="card-category">Add Client Details</p>
                  </div>
                  <div class="card-body">
                    <form id="ajax">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Client Name</label
                            >
                            <input
                              name="Client Name"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Client Code</label
                            >
                            <input
                              name="Client Code"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Client SPOC</label
                            >
                            <input
                              name="Client SPOC"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Country</label>
                            <input
                              name="Country"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">State</label>
                            <input
                              name="State"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">City</label>
                            <input
                              name="City"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Zip Code</label>
                            <input
                              name="Zip Code"
                              type="number"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Contact Number</label
                            >
                            <input
                              name="Contact Number"
                              type="number"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Applicant Response Time</label
                            >
                            <input
                              name="Applicant Response Time"
                              type="number"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Invoice Address Details</label
                            >
                            <input
                              name="Invoice Address Details"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Invoice Bank Detail</label
                            >
                            <input
                              name="Invoice Bank Detail"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Invoice Payment Due Days</label
                            >
                            <input
                              name="Invoice Payment Due Days"
                              type="number"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Invoice Code</label
                            >
                            <input
                              name="Invoice Code"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Is GSTIN</label>
                            <input
                              name="Is GSTIN"
                              type="text"
                              class="form-control"
                            />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Email ID</label>
                            <input
                              name="Email ID"
                              type="email"
                              class="form-control"
                            />
                          </div>
                        </div>
                        <!--checkBoxes-->
                        <div class="container" style="margin-top: 2%;">
                          <div class="row">
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is Package"
                                >
                                  Is Package
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Is Package"
                                  id="Is Package"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is Package"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is Canclled Report"
                                >
                                  Is Canclled Report
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Is Canclled Report"
                                  id="Is Canclled Report"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is Canclled Report"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label class="form-check-label" for="Is SEZ">
                                  Is SEZ
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Is SEZ"
                                  id="Is SEZ"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is SEZ"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container" style="margin-top: 2%;">
                          <div class="row">
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Contact Applicant"
                                >
                                  Contact Applicant
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Contact Applicant"
                                  id="Contact Applicant"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Contact Applicant"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is Bulk Upload"
                                >
                                  Is Bulk Upload
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Is Bulk Upload"
                                  id="Is Bulk Upload"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is Bulk Upload"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is Prin Merge"
                                >
                                  Is Prin Merge
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Is Prin Merge"
                                  id="Is Prin Merge"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is Prin Merge"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container" style="margin-top: 2%;">
                          <div class="row">
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is LOB Mapping"
                                >
                                  Is LOB Mapping
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Is LOB Mapping"
                                  id="Is LOB Mapping"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is LOB Mapping"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Contact Applicant + Aggregator Flow"
                                >
                                  Contact Applicant + Aggregator Flow
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Contact Applicant + Aggregator Flow"
                                  id="Contact Applicant + Aggregator Flow"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Contact Applicant + Aggregator Flow"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label class="form-check-label" for="Email ID">
                                  Email ID
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Email ID"
                                  id="Email ID"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Email ID"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container" style="margin-top: 2%;">
                          <div class="row">
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Applicant check List"
                                >
                                  Applicant check List
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Applicant check List"
                                  id="Applicant check List"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Applicant check List"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Internal Reference ID"
                                >
                                  Internal Reference ID
                                </label>
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="Internal Reference ID"
                                  id="Internal Reference ID"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Internal Reference ID"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div></div>
                            </div>
                          </div>
                        </div>
                        <!--checkBoxes-->
                      </div>
                      <div class="row" style="margin-top: 2%;">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="Currency">Currency</label>
                            <select
                              name="currency"
                              class="form-control"
                              id="exampleFormControlSelect1"
                            >
                              <option value="Rupee" class="text-primary"
                                >Rupee</option
                              >
                              <option value="USD" class="text-primary"
                                >USD</option
                              >
                              <option value="Euro" class="text-primary"
                                >Euro</option
                              >
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Date of birth</label>
                            <input
                              type="date"
                              name="dateofbirth"
                              id="dateofbirth"
                              class="form-control"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="row" style="margin-top: 2%;">
                        <button
                          type="submit"
                          class="btn btn-primary pull-right"
                          style="margin-left: 80%;"
                        >
                          Submit
                        </button>
                        <div class="clearfix"></div>
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
    <!--   Core JS Files   -->
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
    <script src="../js/formSubmit.js"></script>
    <script>



      $(document).ready(function () {
        $().ready(function () {
          $sidebar = $(".sidebar");

          $sidebar_img_container = $sidebar.find(".sidebar-background");

          $full_page = $(".full-page");

          $sidebar_responsive = $("body > .navbar-collapse");

          window_width = $(window).width();

          $(".fixed-plugin a").click(function (event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass("switch-trigger")) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $(".fixed-plugin .active-color span").click(function () {
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

          $(".fixed-plugin .background-color .badge").click(function () {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("background-color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-background-color", new_color);
            }
          });

          $(".fixed-plugin .img-holder").click(function () {
            $full_page_background = $(".full-page-background");

            $(this).parent("li").siblings().removeClass("active");
            $(this).parent("li").addClass("active");

            var new_image = $(this).find("img").attr("src");

            if (
              $sidebar_img_container.length != 0 &&
              $(".switch-sidebar-image input:checked").length != 0
            ) {
              $sidebar_img_container.fadeOut("fast", function () {
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

              $full_page_background.fadeOut("fast", function () {
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

          $(".switch-sidebar-image input").change(function () {
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

          $(".switch-sidebar-mini input").change(function () {
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

              setTimeout(function () {
                $("body").addClass("sidebar-mini");

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function () {
              window.dispatchEvent(new Event("resize"));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function () {
              clearInterval(simulateWindowResize);
            }, 1000);
          });
        });
      });

     
    </script>
  </body>
</html>
