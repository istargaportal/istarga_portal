<?php

require_once "../config/config.php";

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
        if(isset($data['id']))
        {
            $checbk='SELECT * FROM client WHERE user_status="1" and id="'.$data['id'].'" ORDER BY Id DESC';
            $result1=$this->conn->query($checbk);
            if($result1->num_rows>0)
            {
                $reed=$result1->fetch_assoc();
                $country['Id']=$reed['id'];
                $country['Company']=$reed['Company'];
                $country['User_name']=$reed['User_name'];
                $country['first_name']=$reed['first_name'];
                $country['Last_name']=$reed['Last_name'];
                $country['Client_Name']=$reed['Client_Name'];
                $country['Address']=$reed['Address'];
                $country['postal_code']=$reed['postal_code'];
                $country['about_me']=$reed['about_me'];
                $country['password']=$reed['password'];
                $country['Client_Code']=$reed['Client_Code'];
                $country['Client_SPOC']=$reed['Client_SPOC'];
                $country['country']=$reed['country'];
                $country['State']=$reed['State'];
                $country['city']=$reed['city'];
                $country['Zip_Code']=$reed['Zip_Code'];
                $country['email']=$reed['email'];
                $country['App_Response_Time']=$reed['App_Response_Time'];
                $country['Inv_Address']=$reed['Inv_Address'];
                $country['Inv_Bank']=$reed['Inv_Bank'];
                $country['Inv_Code']=$reed['Inv_Code'];
                $country['Contact_Applicant']=$reed['Contact_Applicant'];
                $country['Is_Bulk_Upload']=$reed['Is_Bulk_Upload'];
                $country['DOB']=$reed['DOB'];
                $country['Live_DateDate']=$reed['Live_DateDate'];
                $country['Currency']=$reed['Currency'];
                $country['Internal_Reference_ID']=$reed['Internal_Reference_ID'];
                $country['Email_ID']=$reed['Email_ID'];
                $country['user_status']=$reed['user_status'];
                $country['is_block']=$reed['is_block'];
            }
            else
            {
                echo "No client Found";
            }
        }
        else
        {
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
                          Client Name
                        </th>
                        <th>
                          Client Code
                        </th>
                        <th>
                          Client SPOC
                        </th>
                        <th>
                          Go Live Date
                        </th>
                        <th class="noExport">
                          Actions
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

                    if(@$load_condition != "list_all_clients")
                    {
                        echo '
                        <tr>
                            <td>'.$i.'</td>
                            <td>'.$row["Client_Name"].'</td>
                            <td>'.$row["Client_Code"].'</td>
                            <td>'.$row["Client_SPOC"].'</td>
                            <td>'.$row["Live_DateDate"].'</td>
                            <td class="text-primary tablehead1">
                            '.@$block_btn.'
                              <ul class="list_none" style="padding:0;" >
                                <li class="nav-item dropdown">
                                  <a
                                    class="btn btn-sm btn-default"
                                    href="javascript:;"
                                    id="navbarDropdownProfile"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                  >
                                    <i  class="material-icons icon">tune</i>
                                    <p class="d-lg-none d-md-block">
                                      Account
                                    </p>
                                    <div class="ripple-container"></div
                                  ></a>
                                  <div
                                    class="dropdown-menu dropdown-menu-left"
                                    aria-labelledby="navbarDropdownProfile" 
                                  >
                                    <a class="dropdown-item view-order" href="#" id="'.base64_encode($row["id"]).'">View Order</a>
                                    <a class="dropdown-item edit1" href="addClient.php?id='.$row["id"].'">View / Edit</a>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a
                                      id="'.$row["id"].'"
                                      data-internal-reference-id="'.$row["Internal_Reference_ID"].'"
                                      class="dropdown-item add-bank-details1"
                                      href="./bankDetails.php?id='.$row["id"].'"
                                      >Add bank details</a
                                    >
                                    <div class="dropdown-divider"></div>
                                    '.$block_unblock_btn.'
                                  </div>
                                </li>
                              </ul>
                            </td>
                        </tr>
                        ';
                        // <a class="dropdown-item soft-delete1" href="#" id="'.$row["id"].'">Soft Delete</a>
                        // <a class="dropdown-item hard-delete1" href="#" id="'.$row["id"].'"edit_client_id>Hard Delete</a>
                    }
                    else
                    {
                        $selected = "";
                        if($edit_client_id == $row['id'])
                        {
                            $selected = "selected";
                        }
                        echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['Client_Name'].'</option>';
                        // echo json_encode($country);
                    }
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
}
$basic_details=new country($db);
$basic_details->update_details();

?>