<?php

require_once "../../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class States
{

    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function get_package()
    {
        $jsondata=file_get_contents("php://input");
        $data=json_decode($jsondata,true);
        extract($_POST);
            session_start();
            $client_id = $_SESSION['uid'];

            echo '<table id="datatable_tbl" class="table table-hover" >
                    <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
                      <th>Case Ref. No.</th>
                      <th>Internal<br>Reference ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Joining Location</th>
                      <th>Package</th>
                      <th>Order Creation</th>
                      <th>Order status</th>
                      <th>Order Completion Date</th>
                      <th class="noExport">Reports</th>
                    </thead>';
            $query="SELECT * FROM `order_master` WHERE client_id = '$client_id' ";
            if(@$first_name != ""){ $query.=" AND first_name LIKE '$first_name%' "; }
            if(@$last_name != ""){ $query.=" AND last_name LIKE '$last_name%' "; }
            if(@$order_status != ""){ $query.=" AND order_status = '$order_status' "; }
            if(@$internal_reference_id != ""){ $query.=" AND internal_reference_id = '$internal_reference_id' "; }
            if(@$joining_location != ""){ $query.=" AND joining_location = '$joining_location' "; }
            if(@$case_reference_no != ""){ $query.=" AND case_reference_no = '$case_reference_no' "; }
            if(@$order_creation_date_time != ""){ $query.=" AND order_creation_date_time = '$order_creation_date_time' "; }
            if(@$order_completion_date != ""){ $query.=" AND order_completion_date = '$order_completion_date' "; }
            if(@$email_id != ""){ $query.=" AND email_id = '$email_id' "; }
            $query.=" ORDER BY order_id DESC ";
            $result=$this->conn->query($query);
            if($result->num_rows>0)
            {
              while($row = $result->fetch_assoc())
              {
                  $order_status = $row['order_status'];

                  $selected_packages = "";
                  $query_1="SELECT p.package_name FROM order_service_details os INNER JOIN package_list p ON p.id = os.package_id WHERE os.order_id = '".$row['order_id']."' ";
                  $result_1=$this->conn->query($query_1);
                  if($result_1->num_rows>0)
                  {
                    while($row_1 = $result_1->fetch_assoc())
                    {
                      $selected_packages.= $package_name."<br>"; 
                    }
                  }
                  $row["order_creation_date_time"] = date('d-m-Y', strtotime($row["order_creation_date_time"]));
                  if($row["order_completion_date"] != "")
                  {
                    $row["order_completion_date"] = date('d-m-Y', strtotime($row["order_completion_date"]));
                  }
                  if($row['order_status'] == "Verified")
                  {
                    $download_button = "<a target='_blank' href='../API/Print-Background-Verification-Report.php?order_id=".$row['order_id']."&default_report_color_id=0&download=true' class='btn btn-success btn-sm'> <i class='fa fa-download'></i> Download</a>";
                  }
                  else
                  {
                    $download_button = "<a class='btn btn-default disabled_btn btn-sm'> <i class='fa fa-download'></i> Download</a>";
                  }
                  echo '
                  <tr>
                      <td class="tablehead1"><a onclick="view_order_details('.$row["order_id"].')"  class="btn_link">'.$row["case_reference_no"].'</a></td>
                      <td class="tablehead1 form_left">'.$row["internal_reference_id"].'</td>
                      <td class="tablehead1 form_left">'.$row["first_name"].'</td>
                      <td class="tablehead1 form_left">'.$row["last_name"].' </td>
                      <td class="tablehead1 form_left">'.$row["joining_location"].' </td>
                      <td class="tablehead1 form_left">'.$selected_packages.'</td>
                      <td class="tablehead1">'.$row["order_creation_date_time"].'</td>
                      <td class="tablehead1">'.$order_status.'</td>
                      <td class="tablehead1">'.$row["order_completion_date"].'</td>
                      <td class="noExport">
                        '.$download_button.'
                        <ul style="list-style: none; padding:0;margin:0;">
                          <li class="nav-item dropdown">
                            <a
                              class="btn btn-default btn-sm"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i  class="material-icons icon">tune</i>
                              <div class="ripple-container"></div
                            ></a>
                            <div
                              class="dropdown-menu dropdown-menu-left"
                              aria-labelledby="navbarDropdownProfile" 
                            >
                              <a onclick="view_order_details('.$row["order_id"].')" class="dropdown-item" > View</a>
                              <a onclick="delete_order('.$row["order_id"].')" class="dropdown-item delete1" id="">Delete</a>
                              <a target="_blank" href="../system-applicant/My-Application.php?encrypted_key='.base64_encode($row["order_id"]).')" class="dropdown-item delete1" >Process Order</a>

                            </div>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  ';
              }
            }
          echo '</table>';
    }
}
$basic_details=new States($db);
$basic_details->get_package();