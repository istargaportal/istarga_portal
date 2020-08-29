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
        extract($_POST);

        if($load_condition == "load_all_clients")
        {
            $client_id = $_POST['client_id'];
            echo '<br><table id="datatable_tbl" class="table table-hover" >
                    <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
                    <th>Case Reference</th>
                    <th>Is a Rush Order</th>
                    <th>Client</th>
                    <th>Applicant Name</th>
                    <th>Order Creation</th>
                    <th>Order Completion Date</th>
                    <th>Service</th>
                    <th>Assign To</th>
                    <th>Status</th>
                    <th>Unlock</th>
                    <th class="noExport">Actions</th>
                    </thead>';
                    if($client_id != 0)
                    {
                        $sql_condition = " WHERE o.client_id = '$client_id' "; 
                    }
                    if(@$default_client_id != "0")
                    {
                        $default_client_id = base64_decode($default_client_id);
                        $sql_condition = " WHERE o.client_id = '$default_client_id' "; 
                    }
                    $query="SELECT o.*, c.Client_Name, s.service_name, os.order_status FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id  ".@$sql_condition;
                    $result=$this->conn->query($query);
                    if($result->num_rows>0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            if($row['is_rush'] == "1") { $row['is_rush'] = "Yes"; } else { $row['is_rush'] = "No"; }

                            $order_status = $row['order_status'];
                            $user_name = "";
                            if($row["assign_to"] == 0) { $row["assign_to"] = "-"; }
                            else
                            {
                                $query_1="SELECT first_name, last_name FROM user_master WHERE user_id = '".$row['assign_to']."' ";
                                $result_1=$this->conn->query($query_1);
                                if($result_1->num_rows>0)
                                {
                                    if($row_1 = $result_1->fetch_assoc())
                                    {
                                        $user_name = $row_1['first_name'].' '.$row_1['last_name'];
                                    }
                                }
                            }

                            if($row["lock_status"] == 0)
                            {
                                $lock_status = "<a title='Unlocked' class='btn btn-default btn-sm'><i class='fa fa-unlock' style='color:#54b058 !important;'></i></a>";
                            }
                            else
                            {
                                $lock_status = "<a title='Unlock' class='btn btn-default btn-sm'><i class='fa fa-lock' style='color:#eb1e2f !important;'></i></a>";
                            }

                            echo '
                            <tr>
                            <td class="tablehead1">'.$row["case_reference_no"].'</td>
                            <td class="tablehead1">'.$row['is_rush'].'</td>
                            <td class="tablehead1 form_left">'.$row['Client_Name'].'</td>
                            <td class="tablehead1 form_left">'.$row["first_name"].' '.$row["last_name"].' </td>
                            <td class="tablehead1">'.$row["order_creation_date_time"].'</td>
                            <td class="tablehead1">'.$row["order_completion_date"].'</td>
                            <td class="tablehead1">'.$row["service_name"].'</td>
                            <td class="tablehead1">'.$user_name.'</td>

                            <td class="tablehead1">'.$order_status.'</td>
                            <td class="tablehead1">'.$lock_status.'</td>
                            <td class="noExport">
                                <a onclick="view_order_details('.$row['order_id'].')" class="btn btn-default btn-round btn-sm "><i class="material-icons icon">visibility</i> View</a>
                            </td>
                            </tr>
                            ';
                        }
                    }
                    echo '</table>';
        }
        
        if($load_condition == "all_client_list")
        {
            if(@$client_select == "1" || @$client_select == "2")
            {
                echo '<select style="margin-top:5%" class="browser-default chosen-select custom-select" name="client_id" id="client_id" onchange="getAllClientData()" required>';
            }
            if(@$default_client_id != "0" && @$client_select != "1")
            {
                $default_client_id = base64_decode($default_client_id);
                $client_condition = " id = ".@$default_client_id;
            }
            else
            {
                $client_condition = " is_block = '0' ";
            }
            $query="SELECT id, Client_Name FROM client WHERE ".@$client_condition." ORDER BY Client_Name ";
            $result=$this->conn->query($query);
            if($result->num_rows>0)
            {
                if(@$default_client_id == "0") { echo '<option value="">All</option>'; }
                if(@$client_select == "1"){ echo '<option value="">Default</option>'; }
                while($row = $result->fetch_assoc())
                {
                    echo '<option value="'.$row['id'].'">'.$row['Client_Name'].'</option>';
                }
            }
            else
            {
                echo '<option>No Clients Available</option>';
            }
            if(@$client_select == "1" || @$client_select == "2")
            {
                echo '</select>';
            }
        }
    }
}

$basic_details=new States($db);
$basic_details->get_package();