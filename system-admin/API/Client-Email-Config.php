<?php

require_once "../../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class country
{
    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function update_details()
    {
        $json=file_get_contents("php://input");
        $data=json_decode($json,true);
        extract($_POST);
        
            if(@$client_select == "1")
            {
                echo '<select style="margin-top:5%" class="browser-default chosen-select custom-select" name="ClientName" id="ClientName" onchange="T3();" required>
                    <option value="" >Choose...</option>';
            }
            if(@$load_condition != "list_all_clients")
            {
                echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
                      <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                        <th>
                          Sr. No
                        </th>
                        <th> 
                          Client Details
                        </th>
                        <th>
                          To Email Id
                        </th>
                        <th>
                          CC Email Id
                        </th>
                        <th>
                          BCC Email Id
                        </th>
                      </thead>
                    ';
            }
            else
            {
                echo '<option value="">Choose...</option>';
            }
            $check='SELECT * FROM client WHERE user_status="1" ORDER BY id DESC';
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                $i=1;
                while($row = $result->fetch_assoc())
                {
                    $country[$i]['Id']=$row['id'];
                    $country[$i]['Company']=$row['Company'];
                    $country[$i]['User_name']=$row['User_name'];
                    $country[$i]['first_name']=$row['first_name'];
                    $country[$i]['Last_name']=$row['Last_name'];
                    $country[$i]['Client_Name']=$row['Client_Name'];
                    $country[$i]['Address']=$row['Address'];
                    $country[$i]['postal_code']=$row['postal_code'];
                    $country[$i]['about_me']=$row['about_me'];
                    $country[$i]['password']=$row['password'];
                    $country[$i]['Client_Code']=$row['Client_Code'];
                    $country[$i]['Client_SPOC']=$row['Client_SPOC'];
                    $country[$i]['country']=$row['country'];
                    $country[$i]['State']=$row['State'];
                    $country[$i]['city']=$row['city'];
                    $country[$i]['Zip_Code']=$row['Zip_Code'];
                    $country[$i]['email']=$row['email'];
                    $country[$i]['App_Response_Time']=$row['App_Response_Time'];
                    $country[$i]['Inv_Address']=$row['Inv_Address'];
                    $country[$i]['Inv_Bank']=$row['Inv_Bank'];
                    $country[$i]['Inv_Code']=$row['Inv_Code'];
                    $country[$i]['Contact_Applicant']=$row['Contact_Applicant'];
                    $country[$i]['Is_Bulk_Upload']=$row['Is_Bulk_Upload'];
                    $country[$i]['DOB']=$row['DOB'];
                    $country[$i]['Live_DateDate']=$row['Live_DateDate'];
                    $country[$i]['Currency']=$row['Currency'];
                    $country[$i]['Internal_Reference_ID']=$row['Internal_Reference_ID'];
                    $country[$i]['Email_ID']=$row['Email_ID'];
                    $country[$i]['user_status']=$row['user_status'];
                    $country[$i]['is_block']=$row['is_block'];
                    if($row['is_block'] == 0)
                    {
                        $block_unblock_btn = '<a class="dropdown-item block" onclick="block_unblock_click('.$row['id'].',1)" id="'.$row["id"].'">Block</a>';
                        $block_btn = "";
                    }
                    else
                    {
                        $block_unblock_btn = '<a class="dropdown-item block" onclick="block_unblock_click('.$row['id'].',0)" id="'.$row["id"].'">Unblock</a>';
                        $block_btn = "<a style='background:#eb1e2f !important;' class='btn btn-danger btn-xs'> <span class='material-icons'>remove_circle_outline</span> Blocked</a>";
                    }
                    echo '
                    <tr>
                        <td class="tablehead1">'.$i.'</td>
                        <td class="tablehead1 form_left"><b>'.$row["Client_Code"].'</b> - '.$row["Client_Name"].'</td>
                        <td class="tablehead1 form_left">
                            <div class="btn-group">
                                <a class="btn btn-default btn-xs font_normal">mahesh@gmail.com</a>
                                <a class="btn btn-warning btn-xs font_normal"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs font_normal"><i class="fa fa-minus-circle"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-default btn-xs font_normal">abc@xyz.com</a>
                                <a class="btn btn-warning btn-xs font_normal"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs font_normal"><i class="fa fa-minus-circle"></i></a>
                            </div>
                            <a class="btn pull-right btn-primary btn-xs font_normal"><i class="fa fa-plus"></i> Add</a>    
                        </td>
                        <td class="tablehead1">
                            <a class="btn pull-right btn-primary btn-xs font_normal"><i class="fa fa-plus"></i> Add</a>
                        </td>
                        <td class="tablehead1">
                            <a class="btn pull-right btn-primary btn-xs font_normal"><i class="fa fa-plus"></i> Add</a>
                        </td>
                    </tr>
                    ';
                    
                    $i++;
                }
            }
            else
            {
                echo "0 results";
            }
            if(@$load_condition != "list_all_clients")
            {
                echo '</table>';
            }
            if(@$client_select == "1")
            {
                echo '</select>';
            }
    }
}
$basic_details=new country($db);
$basic_details->update_details();

?>