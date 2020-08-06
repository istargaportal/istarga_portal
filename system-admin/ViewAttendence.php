<?php
$page_name = "View Attendance";
include 'Header.php';
?>
    <style>
        .ApprovedBtn {
            background-color: white;
            border-radius: 4px;
            background-color: #601A75;
            border: 1px solid #601A75;
            color: white;
            padding: 4px 8px 4px 8px;
            cursor: pointer;
        }
    </style>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 id="viewAttendence" style="font-size: 16px;" class="card-title"></h4>
                                </div>
                                <div class="card-body">
                                    <form id="ajax">
                                        <!--First row-->
                                        <div class="row">
                                            <div class="col-md-2" style="padding-right: 0;">
                                                <label style="margin-top:18px" for="viewType">Search Emploee :</label>
                                            </div>
                                            <div class="col-md-3" style="padding-left: 0;">
                                                <div class="form-group">
                                                    <input type="text" name="" id="" class="form-control">
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
                                        <thead class="text-primary "
                                            style="background-color: rgba(15, 13, 13, 0.856) !important;">
                                            <th>
                                                ID No
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Emp Type
                                            </th>
                                            <th>
                                                Today Status
                                            </th>
                                            <th>
                                                Entry Time
                                            </th>
                                            <th>
                                                Approve Status
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
                                                    QC
                                                </td>
                                                <td class="tablehead1">
                                                    Prseent
                                                </td>
                                                <td class="tablehead1">
                                                    10:54:10 AM
                                                </td>
                                                <td class="tablehead1">
                                                    <button class="ApprovedBtn"><a class="Approve">Approve</a></button>
                                                </td>
                                                <td class="text-primary tablehead1">
                                                    <div class="box">
                                                        <a href="./ViewEacEmp.php"
                                                            class="button btn btn-primary btn-sm">View</a>
                                                    </div>
                                            </tr>
                                            <tr>
                                                <td class="tablehead1">
                                                    2
                                                </td>
                                                <td class="tablehead1">
                                                    Robert
                                                </td>
                                                <td class="tablehead1">
                                                    OF
                                                </td>
                                                <td class="tablehead1">
                                                    Sick Leave
                                                </td>
                                                <td class="tablehead1">
                                                    10:54:10 AM
                                                </td>
                                                <td class="tablehead1">
                                                    <button class="ApprovedBtn"><a class="Approve">Approve</a></button>
                                                </td>
                                                <td class="text-primary tablehead1">
                                                    <div class="box">
                                                        <a href="./ViewEacEmp.php"
                                                            class="button btn btn-primary btn-sm">View</a>
                                                    </div>
                                            </tr>
                                            <tr>
                                                <td class="tablehead1">
                                                    3
                                                </td>
                                                <td class="tablehead1">
                                                    Shan
                                                </td>
                                                <td class="tablehead1">
                                                    OF
                                                </td>
                                                <td class="tablehead1">
                                                    Present
                                                </td>
                                                <td class="tablehead1">
                                                    10:50:10 AM
                                                </td>
                                                <td class="tablehead1">
                                                    <button class="ApprovedBtn"><a class="Approve">Approve</a></button>
                                                </td>
                                                <td class="text-primary tablehead1">
                                                    <div class="box">
                                                        <a href="./ViewEacEmp.php"
                                                            class="button btn btn-primary btn-sm">View</a>
                                                    </div>
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


            <script>
                const today = new Date().toDateString();
                document.getElementById("viewAttendence").innerHTML = today

                console.log(new Date().toLocaleTimeString())
                console.log(new Date().getFullYear())

                //Approve status
                let approved = document.querySelectorAll(".Approve");
                let ApprovedBtn = document.querySelectorAll(".ApprovedBtn");

                approved.forEach((ele) => {
                    ele.addEventListener("click", function (event) {
                        let element = event.currentTarget;
                        if (element.textContent === "Approve") {
                            element.innerText = "Approved"
                            element.style.color = "green"
                        } else if (element.textContent === "Approved") {
                            element.innerText = "Approve"
                            element.style.color = "white"
                        }


                    })
                })



                //  approved.addEventListener("click", ()=>{
                // if(approved.textContent === "Approve"){
                //     approved.innerText="Approved"
                //     ApprovedBtn.style.backgroundColor="green"
                // }else
                // if(approved.textContent === "Approved"){
                //     approved.innerText="Approve"
                //     ApprovedBtn.style.backgroundColor="#601A75"
                // }

                //  })
            </script>

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