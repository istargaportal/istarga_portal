<?php

require_once "../config/config.php";

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
                    <th style="width:15px;">Sr.No.</th>
                    <th>Client</th>
                    <th>Applicant Name</th>
                    <th>Internal Ref. ID</th>
                    <th>Email id</th>
                    <th>Order Creation</th>
                    <th>Order Completion Date</th>
                    <th>Order status</th>
                    <th>Actions</th>
                    </thead>';
                    if($client_id != 0)
                    {
                        $sql_condition = " WHERE o.client_id = '$client_id' "; 
                    }
                    if(@$default_client_id != 0)
                    {
                        $sql_condition = " WHERE o.client_id = '$default_client_id' "; 
                    }
                    $query="SELECT o.*, c.Client_Name FROM `order` o INNER JOIN client c ON c.id = o.client_id ".@$sql_condition;
                    $result=$this->conn->query($query);
                    if($result->num_rows>0)
                    {
                        $i=0; $inc = 0;
                        while($row = $result->fetch_assoc())
                        {
                            $inc++;
                            $country[$i]['id']=$row['id'];
                            $country[$i]['first_Name']=$row['first_Name'];
                            $country[$i]['middle_Name']=$row['middle_Name'];
                            $country[$i]['last_Name']=$row['last_Name'];
                            $country[$i]['alias_first_name']=$row['alias_first_name'];
                            $country[$i]['alias_middle_name']=$row['alias_middle_name'];
                            $country[$i]['alias_last_name']=$row['alias_last_name'];
                            $country[$i]['email_id']=$row['email_id'];
                            $country[$i]['internal_reference_id']=$row['internal_reference_id'];
                            $country[$i]['joining_location']=$row['joining_location'];
                            $country[$i]['Joining_date']=$row['Joining_date'];
                            $country[$i]['LOB']=$row['LOB'];
                            $country[$i]['Additional_Comment']=$row['Additional_Comment'];
                            $country[$i]['package_country_id']=$row['package_country_id'];
                            $country[$i]['Package_id']=$row['Package_id'];
                            $country[$i]['service_country_id']=$row['service_country_id'];
                            $country[$i]['Service_type_id']=$row['Service_type_id'];
                            $country[$i]['service_id']=$row['service_id'];
                            $country[$i]['Source_name']=$row['Source_name'];
                            $country[$i]['no_of_documents_uploaded']=$row['no_of_documents_uploaded'];
                            $country[$i]['Order_Completion_Date']=$row['Order_Completion_Date'];
                            $country[$i]['Order_Status']=$row['Order_Status'];
                            $country[$i]['Reports']=$row['Reports'];
                            $country[$i]['generated_reference_id']=$row['generated_reference_id'];
                            $country[$i]['client_id']=$row['client_id'];
                            $i++;
                            $Order_Status = "";
                            if($row["Order_Status"] == 0) { $Order_Status = "Pending"; }
                            if($row["Order_Status"] == 1) { $Order_Status = "Started"; }
                            if($row["Order_Status"] == 2) { $Order_Status = "Completed"; }
                            echo '
                            <tr>
                            <td class="tablehead1">
                            '.$inc.'
                            </td>
                            <td class="tablehead1 form_left">
                            '.$row["Client_Name"].'
                            </td>
                            <td class="tablehead1 form_left">
                            '.$row["first_Name"].' '.$row["last_Name"].' 
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
                            '.$row["Order_Completion_Date"].'
                            </td>
                            <td class="tablehead1">
                            '.$Order_Status.'
                            </td>
                            <td>
                            <a class="btn btn-default btn-round btn-sm "><i class="material-icons icon">visibility</i> View</a>
                            </td>
                            </tr>
                            ';
                        }
                    }
                    echo '</table>';
        }
        
        if($load_condition == "all_client_list")
        {
            if(@$client_select == "1")
            {
                echo '<select style="margin-top:5%" class="browser-default chosen-select custom-select" name="client_id" id="client_id" required>';
            }
            if(@$default_client_id != "0" && @$client_select != "1")
            {
                $client_condition = " AND id = ".@$default_client_id;
            }
            $query="SELECT id, Client_Name FROM client WHERE is_block = '0' ".@$client_condition." ORDER BY Client_Name ";
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
            if(@$client_select == "1")
            {
                echo '</select>';
            }
        }
    }
}

$basic_details=new States($db);
$basic_details->get_package();