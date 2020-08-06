<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
      name="viewport"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
    <!-- Material Kit CSS -->
    <link
      href="../assets/css/material-dashboard.css?v=2.1.0"
      rel="stylesheet"
    />
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
        <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Admin Dashboard
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="javascript:void(0)">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item active">
              <a
                href="#client"
                class="nav-link text-muted"
                data-toggle="collapse"
                >Client</a
              >
              <div class="collapse" id="client">
                <ul class="list-unstyled nav" style="margin-left: 5%;">
                  <li class="nav-item">
                    <a
                      class="nav-link text-muted"
                      name
                      href="/client_Side_Files/addClient.html"
                      >Add Client</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Assign Service</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Modify Service</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Create Package</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Auto SLA</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-muted">Master</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-muted">Report</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-muted">Task</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-muted">User</a>
            </li>
            <!-- your sidebar here -->
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav
          class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
        >
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">
                    <i class="material-icons">notifications</i>
                    <p class="d-lg-none d-md-block">
                      Notifications
                    </p>
                  </a>
                </li>
                <!-- your navbar here -->
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
    <!--   Core JS Files   -->
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
  </body>
</html>
