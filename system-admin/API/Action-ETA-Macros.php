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
  $eta_macro_id  = $delete_eta_macro_id ;

  $sql = "DELETE FROM eta_macro_master WHERE eta_macro_id  = '$eta_macro_id ' ";
  $result = mysqli_query($db,$sql);
}

if($_POST["action"]=='save')
{  
  $comment = addslashes($comment);
  $sql = "INSERT INTO eta_macro_master(comment) VALUES ('$comment')";
  $result = mysqli_query($db,$sql);
  echo "inserted"; 
}

if($_POST["action"]=='update')
{  
  $comment = addslashes($comment);
  $sql = "UPDATE eta_macro_master SET comment = '$comment' WHERE eta_macro_id = '$eta_macro_id' ";
  $result = mysqli_query($db,$sql);
  echo "updated"; 
}

if($_POST['action']=='display')
{
 echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
 <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
 <th width="10">SR.NO.</th>
 <th>Comment</th>
 <th class="noExport">Edit</th>
 <th class="noExport">Delete</th>
 </thead>
 ';
 $sr = 0;
 $sq="SELECT eta_macro_id, comment FROM eta_macro_master ORDER BY eta_macro_id  DESC ";
 $resul = mysqli_query($db,$sq); 
 while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
 {
  $sr++;
  echo '
  <tr>
    <td class="tablehead1">'.$sr.'</td>
    <td class="form_left tablehead1">
      <span id="comment_lbl_'.$row["eta_macro_id"].'">'.$row["comment"].'</span>
      <textarea class="custom-select" style="display:none;" id="comment_txt_'.$row["eta_macro_id"].'">'.$row["comment"].'</textarea>
    </td>
    <td class="tablehead1 noExport">
      <a id="update_btn_'.$row["eta_macro_id"].'" style="display:none" onclick="update_eta_macro('.$row["eta_macro_id"].')" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Save</a>
      <a id="edit_btn_'.$row["eta_macro_id"].'" onclick="edit_eta_macro('.$row["eta_macro_id"].')" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
    </td>
    <td class="tablehead1 noExport"><a onclick="delete_eta_macro('.$row["eta_macro_id"].')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Delete</a></td>
  </tr>
  ';
}
echo '</table>';
}

?>