<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);
$SerT=@$_POST["ServiceT"];
$ServiceN=@$_POST["service_name"];
$Date=date('Y-m-d');
$Sr=0;

if($_POST["Action"]=='delete'){
  $service_id=$_POST["service_id"];
  $sql = "DELETE FROM `service_list` WHERE `id`='$service_id'";  
  $result = mysqli_query($db,$sql);
  $sql = "DELETE FROM `service_list_documents` WHERE `service_id`='$service_id'";  
  $result = mysqli_query($db,$sql);

  if($result){echo  "deleted";}else{echo 'error at'.$service;}
}

if($_POST["Action"]=='Add')
{
  $sql = "INSERT INTO service_list(service_name, service_type_id, country_id, price, currency_id, is_webservices) VALUES ('$service_name','$service_type_id','$country', '$Price', '$currency', '".@$is_webservices."')";
  $result = mysqli_query($db,$sql);
  $service_id = $db->insert_id;
  if(isset($document_id))
  {
    foreach ($document_id as $document_id_s)
    {
      if($document_id_s != "")
      {
        $check="INSERT INTO service_list_documents (service_id, documentlist_id) VALUES('$service_id', '$document_id_s') ";
        $result = mysqli_query($db,$check);
      }
    }
  }
  if($result){echo "inserted";}else{echo "error".mysqli_error();}
}
else if($_POST["Action"]=='edit'){
  $sql = "UPDATE service_list SET service_name = '$service_name', service_type_id = '$service_type_id', country_id = '$country', price = '$Price', currency_id = '$currency', is_webservices = '".@$is_webservices."' WHERE `id`='$edit_id' ";
  $result = mysqli_query($db,$sql);
  if(isset($document_id))
  {
    $check="DELETE FROM service_list_documents WHERE service_id = '$edit_id' ";
    $result = mysqli_query($db,$check);
    foreach ($document_id as $document_id_s)
    {
      if($document_id_s != "")
      {
        $check="INSERT INTO service_list_documents (service_id, documentlist_id) VALUES('$edit_id', '$document_id_s') ";
        $result = mysqli_query($db,$check);
      }
    }
  }
  if($result){echo  "updated";}else{echo 'error at'.$dbid;
}  
}

else if($_POST["Action"]=='Display')
{
  echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
          <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
            <th width="10">SR.NO.</th>
            <th>Service Name</th>
            <th>Service Type</th>
            <th>WebService</th>
            <th>Documents</th>
            <th>Action</th>
          </thead>
        ';
  $sr = 0;
  $sq="SELECT s.id, s.service_name, st.name AS service_type_name, s.price, s.is_webservices, s.default_id FROM service_list s INNER JOIN service_type st ON st.id = s.service_type_id  ORDER BY s.id DESC ";
  // INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cc ON cc.id = s.currency_id
  // , c.name AS country_name, cc.currency
  $resul = mysqli_query($db,$sq); 
  while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
    $all_documents = "";
    $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id = '.$row['id'].'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
      $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a><br>";
    }
    $is_webservices_label = "NO";
    $is_webservices_checked = "";
    if($row['is_webservices'] == "1")
    {
      $is_webservices_label = "YES";
      $is_webservices_checked = "checked";
    }

    $disabled_btn = "";
    if($row['default_id'] == "1")
    {
      $disabled_btn = "disabled_btn";
    }

    $sr++;
    echo "<tr>";
      echo "<td class='tablehead1'>".$sr."</td>";
      echo "<td class='tablehead1 form_left'>".$row['service_name']."</td>";
      echo "<td class='tablehead1'>".$row['service_type_name']."</td>";
      echo '
      <td class="tablehead1">
        <div class="form-check">
          <label class="form-check-label"> <h4 class="selection" style="margin-top:-16px;"> '.@$is_webservices_label.'</h4> 
              <input class="form-check-input" name="service_id[]" disabled value="'.$row['id'].'" type="checkbox" '.@$is_webservices_checked.' >
              <span class="form-check-sign">
                <span class="check"></span>
              </span>
          </label>
        </div>
      </td>';
      echo "<td class='tablehead1 form_left'>".$all_documents."</td>";
      echo '<td>
                <a href="createService.php?id='.base64_encode($row["id"]).'" title="Edit Service" class="btn btn-xs btn-round btn-warning"><i class="material-icons icon">create</i></a>
                <a onclick="delete_service('.$row["id"].')" title="Delete Service" class="btn '.@$disabled_btn.' btn-xs btn-round btn-danger"><i class="material-icons icon">delete</i></a>
            </td>';
    echo "</tr>";
  }
  echo '</table>';  
}   
else
{
  echo "Problem";
}
?>