<?php
error_reporting(0);
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST["action"]=='add')
{
  $sq="SELECT contact_number, email_id FROM user_master WHERE contact_number = '$contact_number' OR email_id = '$email_id' ";
  $resul = mysqli_query($db,$sq); 
  if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
    echo "already";
  }
  else
  {
    $sql = "INSERT INTO user_master(prefix, first_name, middle_name, last_name, date_of_birth, employee_id,  permanent_address, temporary_address, country_id, state_id, city_id, pincode, email_id, contact_number, alternate_contact, adhar_number, pan_number, passport_number, username, password, password_mail_to, bank_name, account_number, ifsc_code, role_id, status, date_of_join) VALUES ('$prefix', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$employee_id', '$permanent_address', '$temporary_address', '$country_id', '$state_id', '$city_id', '$pincode', '$email_id', '$contact_number', '$alternate_contact', '$adhar_number', '$pan_number', '$passport_number', '$username', '$password', '$password_mail_to', '$bank_name', '$account_number', '$ifsc_code', '$role_id', '$status', '$date_of_join')";
    $result = mysqli_query($db,$sql);
    $user_id = $db->insert_id;
    
    if(isset($_FILES['profile_pic']))
    {
      $file_name = $_FILES['profile_pic']['name'];
      $file_size =$_FILES['profile_pic']['size'];
      $file_tmp =$_FILES['profile_pic']['tmp_name'];
      $file_type=$_FILES['profile_pic']['type'];
      $file_ext=end((explode('.', $file_name)));
      $file_name = "profile_pic_".$user_id.".".$file_ext;

      if(empty($errors)==true)
      {
        if(move_uploaded_file($file_tmp,"../assets/uploads/".$file_name))
        {
          $sql = "UPDATE user_master SET profile_pic = '$file_name' WHERE user_id = '$user_id' ";
          $result = mysqli_query($db,$sql);
        }
      }
    }

    if(isset($_FILES['adhar_file']))
    {
      $file_name = $_FILES['adhar_file']['name'];
      $file_size =$_FILES['adhar_file']['size'];
      $file_tmp =$_FILES['adhar_file']['tmp_name'];
      $file_type=$_FILES['adhar_file']['type'];
      $file_ext=end((explode('.', $file_name)));
      $file_name = "adhar_file_".$user_id.".".$file_ext;

      if(empty($errors)==true)
      {
        if(move_uploaded_file($file_tmp,"../assets/uploads/".$file_name))
        {
          $sql = "UPDATE user_master SET adhar_file = '$file_name' WHERE user_id = '$user_id' ";
          $result = mysqli_query($db,$sql);
        }
      }
    }

    if(isset($_FILES['pan_file']))
    {
      $file_name = $_FILES['pan_file']['name'];
      $file_size =$_FILES['pan_file']['size'];
      $file_tmp =$_FILES['pan_file']['tmp_name'];
      $file_type=$_FILES['pan_file']['type'];
      $file_ext=end((explode('.', $file_name)));
      $file_name = "pan_file_".$user_id.".".$file_ext;

      if(empty($errors)==true)
      {
        if(move_uploaded_file($file_tmp,"../assets/uploads/".$file_name))
        {
          $sql = "UPDATE user_master SET pan_file = '$file_name' WHERE user_id = '$user_id' ";
          $result = mysqli_query($db,$sql);
        }
      }
    }

    if(isset($_FILES['passport_file']))
    {
      $file_name = $_FILES['passport_file']['name'];
      $file_size =$_FILES['passport_file']['size'];
      $file_tmp =$_FILES['passport_file']['tmp_name'];
      $file_type=$_FILES['passport_file']['type'];
      $file_ext=end((explode('.', $file_name)));
      $file_name = "passport_file_".$user_id.".".$file_ext;

      if(empty($errors)==true)
      {
        if(move_uploaded_file($file_tmp,"../assets/uploads/".$file_name))
        {
          $sql = "UPDATE user_master SET passport_file = '$file_name' WHERE user_id = '$user_id' ";
          $result = mysqli_query($db,$sql);
        }
      }
    }
    
    if($result){echo "inserted";}else{echo "error".mysqli_error();}
  }
}

if($_POST['action']=='display')
{
   echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
          <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
            <th width="10">SR.NO.</th>
            <th>Name</th>
            <th>Employee ID</th>
            <th>User Group</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Action</th>
          </thead>
        ';
  $sr = 0;
  $sq="SELECT user_id, first_name, last_name, employee_id, email_id, role_id, contact_number FROM user_master  ";
  $resul = mysqli_query($db,$sq); 
  while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
    $sr++;
    echo '
    <tr>
      <td>'.$sr.'</td>
      <td>'.$row["first_name"].' '.$row["last_name"].'</td>
      <td>'.$row["employee_id"].'</td>
      <td>'.$row["email_id"].'</td>
      <td>'.$row["role_id"].'</td>
      <td>'.$row["contact_number"].'</td>
      <td>
        <ul class="list_none" style="padding:0;" >
          <li class="nav-item dropdown">
            <a class="btn btn-sm btn-default" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i  class="material-icons icon">tune</i> <p class="d-lg-none d-md-block"> Account</p><div class="ripple-container"></div></a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile" >
              <a class="dropdown-item edit1" href="addClient.php?id='.$row["id"].'">View / Edit</a>
              <a class="dropdown-item view-order" href="#" id="'.base64_encode($row["id"]).'">Delete</a>
              '.$block_unblock_btn.'
            </div>
          </li>
        </ul>
      </td>
    </tr>
    ';
  }
  echo '</table>';
}

?>