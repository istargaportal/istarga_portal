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

            session_start();
            $client_id = $_SESSION['uid'];

            echo '<table id="datatable_tbl" class="table table-hover" >
                    <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
                      <th>SR.NO.</th>
                      <th>Applicant Name</th>
                      <th>Internal Reference ID</th>
                      <th>Email ID</th>
                      <th>Order Creation</th>
                      <th>Order Completion Date</th>
                      <th>Order status</th>
                      <th class="noExport">Actions</th>
                    </thead>';
            $query="SELECT * FROM `order_master` WHERE client_id = '$client_id' ORDER BY order_id DESC ";
            $result=$this->conn->query($query);
            if($result->num_rows>0)
            {
                $i=0;
                while($row = $result->fetch_assoc())
                {
                    $i++;
                    $order_status = $row['order_status'];
                    echo '
                    <tr>
                        <td class="tablehead1">
                          '.$i.'
                        </td>
                        <td class="tablehead1">
                          '.$row["first_name"].' '.$row["last_name"].' 
                        </td>
                        <td class="tablehead1">
                          '.$row["internal_reference_id"].'
                        </td>
                        <td class="tablehead1">
                          '.$row["email_id"].'
                        </td>
                        <td class="tablehead1">
                          '.$row["order_creation_date_time"].'
                        </td>
                        <td class="tablehead1">
                          '.$row["order_completion_date"].'
                        </td>
                        <td class="tablehead1">
                          '.$order_status.'
                        </td>
                        <td class="noExport">
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
                              </div>
                            </li>
                          </ul>
                        </td>
                      </tr>
                    ';
                }
             
            echo '</table>';
        }
    }
}
$basic_details=new States($db);
$basic_details->get_package();