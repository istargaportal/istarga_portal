<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST["action"]=='delete')
{
  $email_trigger_id   = $delete_email_trigger_id  ;

  $sql = "DELETE FROM email_trigger_settings WHERE email_trigger_id   = '$email_trigger_id  ' ";
  $result = mysqli_query($db,$sql);
}

if($_POST["action"]=='save')
{  
  $email_body = addslashes($email_body);
  $sql = "INSERT INTO email_trigger_settings(email_body, standard_macro_id) VALUES ('$email_body', '$standard_macro_id')";
  $result = mysqli_query($db,$sql);
  echo "inserted"; 
}

if($_POST["action"]=='update')
{  
  $email_body = addslashes($email_body);
  $sql = "UPDATE email_trigger_settings SET email_body = '$email_body', standard_macro_id = '$standard_macro_id' WHERE email_trigger_id  = '$email_trigger_id ' ";
  $result = mysqli_query($db,$sql);
  echo "updated"; 
}

if($_POST['action']=='display')
{
 echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
 <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
 <th width="10">SR.NO.</th>
 <th>Email Text</th>
 <th>Edit</th>
 <th>Delete</th>
 </thead>
 ';
 $sr = 0;
 $sq="SELECT email_trigger_id , email_body FROM email_trigger_settings ORDER BY email_trigger_id   DESC ";
 $resul = mysqli_query($db,$sq); 
 while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
 {
  $sr++;
  echo '
  <tr>
    <td>'.$sr.'</td>
    <td class="form_left tablehead1">
      <span id="email_body_lbl_'.$row["email_trigger_id "].'">'.$row["email_body"].'</span>
      <textarea class="custom-select" style="display:none;" id="email_body_txt_'.$row["email_trigger_id "].'">'.$row["email_body"].'</textarea>
    </td>
    <td class="tablehead1">
      <a id="update_btn_'.$row["email_trigger_id "].'" style="display:none" onclick="update_eta_macro('.$row["email_trigger_id "].')" class="btn btn-success btn-round btn-xs"><i class="fa fa-save"></i> Save</a>
      <a id="edit_btn_'.$row["email_trigger_id "].'" onclick="edit_eta_macro('.$row["email_trigger_id "].')" class="btn btn-warning btn-round btn-xs"><i class="fa fa-pencil"></i> Edit</a>
    </td>
    <td class="tablehead1"><a onclick="delete_eta_macro('.$row["email_trigger_id "].')" class="btn btn-danger btn-round btn-xs"><i class="fa fa-remove"></i> Delete</a></td>
  </tr>
  ';
}
echo '</table>';
}

?>