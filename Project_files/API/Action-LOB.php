<?php
require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);
$SerT=@$_POST["ServiceT"];
$ServiceN=@$_POST["service_name"];
$Date=date('Y-m-d');
$Sr=0;

if($_POST["action"]=='delete'){
  $lob_id=$_POST["lob_id"];
  $sql = "DELETE FROM `lob_master` WHERE `lob_id`='$lob_id'";  
  $result = mysqli_query($db,$sql);
  $sql = "DELETE FROM `lob_details` WHERE `lob_id`='$lob_id'";  
  $result = mysqli_query($db,$sql);

  if($result){echo  "deleted";}else{echo 'error at'.$service;}
}

if($_POST["action"]=='add')
{
  $sql = "INSERT INTO lob_master(lob_name) VALUES ('$lob_name')";
  $result = mysqli_query($db,$sql);
  $lob_id = $db->insert_id;
  if(isset($client_id))
  {
    foreach ($client_id as $client_id_s)
    {
      if($client_id_s != "")
      {
        $check="INSERT INTO lob_details (lob_id, client_id) VALUES('$lob_id', '$client_id_s') ";
        $result = mysqli_query($db,$check);
      }
    }
  }
  if($result){echo "inserted";}else{echo "error".mysqli_error();}
}
else if($_POST["action"]=='edit')
{
  $sql = "UPDATE lob_master SET lob_name = '$lob_name' WHERE `lob_id`='$edit_id' ";
  $result = mysqli_query($db,$sql);
  if(isset($client_id))
  {
    $check="DELETE FROM lob_details WHERE lob_id = '$edit_id' ";
    $result = mysqli_query($db,$check);
    foreach ($client_id as $client_id_s)
    {
      if($client_id_s != "")
      {
        $check="INSERT INTO lob_details (lob_id, client_id) VALUES('$edit_id', '$client_id_s') ";
        $result = mysqli_query($db,$check);
      }
    }
  }
  if($result){echo  "updated";}else{echo 'error at'.$dbid;
}  
}

else if($_POST["action"]=='display')
{
  echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
          <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
            <th width="10">SR.NO.</th>
            <th>LOB</th>
            <th>Clients</th>
            <th>Action</th>
          </thead>
        ';
  $sr = 0;
  $sq="SELECT lob_id, lob_name FROM lob_master ORDER BY lob_id ";
  $resul = mysqli_query($db,$sq); 
  while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
    $all_documents = "";
    $check_1='SELECT c.Client_Name FROM lob_details l INNER JOIN client c ON c.id = l.client_id WHERE l.lob_id = '.$row['lob_id'].'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
      $all_documents.="<a class='btn btn-default btn-small'>".$row_1['Client_Name']."</a><br>";
    }

    $sr++;
    echo "<tr>";
      echo "<td>".$sr."</td>";
      echo "<td class='form_left'>".$row['lob_name']."</td>";
      echo "<td class='form_left'>".$all_documents."</td>";
      echo '<td>
                <a href="LOB.php?lob_id='.base64_encode($row["lob_id"]).'" title="Edit LOB" class="btn btn-xs btn-round btn-warning"><i class="material-icons icon">create</i></a>
                <a onclick="delete_lob('.$row["lob_id"].')" title="Delete LOB" class="btn btn-xs btn-round btn-danger"><i class="material-icons icon">delete</i></a>
            </td>';
    echo "</tr>";
  }
  echo '</table>';  
}   

?>