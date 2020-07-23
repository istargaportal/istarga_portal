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
        echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
                <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                  <th width="10">Sr.No.</th>
                  <th>Client Name</th>
                  <th>Country</th>
                  <th>Service Type</th>
                  <th>Service Name</th>
                  <th>Price</th>
                  <th>Documents</th>
                  <th>SLA</th>
                  <th>Action</th>
                </thead>
              ';
            $check='SELECT a.id, a.price, a.SLA, c.Client_Name, cm.name, st.name AS Service_type_name, sl.service_name, cr.currency FROM assigned_service a INNER JOIN client c ON c.id = a.client_id INNER JOIN countries cm ON cm.id = a.country_id INNER JOIN countries cr ON cr.id = a.currency INNER JOIN service_type st ON st.id = a.service_type_id INNER JOIN service_list sl ON sl.id = a.service_id ORDER BY a.Id DESC';
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                $inc = 0;
                while($row = $result->fetch_assoc())
                {
                  $all_documents = "";
                  $check_1='SELECT d.document_name FROM assigned_service_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.assigned_service_id = '.$row['id'].'  ';
                  $result_1=$this->conn->query($check_1);
                  if($result_1->num_rows>0)
                  {
                    while($row_1 = $result_1->fetch_assoc())
                    {
                      $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a><br>";
                    }
                  }
                    $inc++;
                    echo '
                    <tr>
                        <td>'.$inc.'</td>
                        <td class="form_left">'.$row['Client_Name'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['Service_type_name'].'</td>
                        <td>'.$row['service_name'].'</td>
                        <td class="form_right">'.$row['price'].' <b>'.$row['currency'].'</b></td>
                        <td class="form_left">'.@$all_documents.'</td>
                        <td>'.$row['SLA'].'</td>
                        <td>
                            <a href="assignService.php?id='.base64_encode($row["id"]).'" title="Edit Assigned Service" class="btn btn-xs btn-round btn-warning"><i class="material-icons icon">create</i></a>
                            <a onclick="delete_assigned_service('.$row["id"].')" title="Delete Assigned Service" class="btn btn-xs btn-round btn-danger"><i class="material-icons icon">delete</i></a>
                        </td>
                    </tr>
                    ';    
                }
                // echo json_encode($country);
            }
            
            echo '</table>';
    }
}
            $basic_details=new country($db);
            $basic_details->update_details();