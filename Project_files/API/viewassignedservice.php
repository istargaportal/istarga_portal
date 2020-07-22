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
                  <th width="10">SR.NO</th>
                  <th>Client Name</th>
                  <th>Country</th>
                  <th>Service Type</th>
                  <th>Service Name</th>
                  <th>Price</th>
                  <th>SLA</th>
                  <th>Action</th>
                </thead>
              ';
            $check='SELECT a.id, a.price, a.SLA, c.Client_Name, cm.name, st.name AS Service_type_name, sl.service_name FROM assigned_service a INNER JOIN client c ON c.id = a.client_id INNER JOIN countries cm ON cm.id = a.country_id INNER JOIN service_type st ON st.id = a.service_type_id INNER JOIN service_list sl ON sl.id = a.service_id ORDER BY a.Id DESC';
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                $inc = 0;
                while($row = $result->fetch_assoc())
                {
                    $inc++;
                    echo '
                    <tr>
                        <td>'.$inc.'</td>
                        <td>'.$row['Client_Name'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['Service_type_name'].'</td>
                        <td>'.$row['service_name'].'</td>
                        <td>'.$row['price'].'</td>
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