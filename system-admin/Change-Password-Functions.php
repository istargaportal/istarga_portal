<?php

if(@$admin_status == "1")
{
  $first_name = "Admin";
}
else
{
  require_once "../../config/config.php";

  $get_connection=new connectdb;
  $db=$get_connection->connect();

  $check = "SELECT u.first_name FROM user_master u WHERE u.user_id = '$user_id' ";
  $resul = mysqli_query($db,$check); 
  if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
    $first_name = $row['first_name'];
  }
}

?>
<div class="modal" id="setting_tab">
  <div class="row">
    <div class="col-md-4"><br></div>
    <div class="col-md-4">
      <div class="">
        <br><br>
        <div class="modal-content row">
          <h4 style="margin: 4px 0; border-bottom: solid 1px #000; " id="process_title" class="card-title"><i class="fa fa-cogs" aria-hidden="true"></i> Change Password</h4>
          <div class="">
            <h5 style="margin: 10px 0;">Hello, <?php echo $first_name ?></h5>
            <label>Current Password</label>
            <input type="password" id="current_password" maxlength="20" class="form-control" />

            <label>New Password</label>
            <input type="password" id="new_password" maxlength="20" class="form-control" />
            <h6>Confirm Password</h6>
            <input type="password" id="confirm_password" maxlength="20" class="form-control" />

            <br>
            <a href="javascript:change_current_password()" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Change</a>
            <a href="javascript:cancel_password_modal()" class="btn btn-default btn-sm"><i class="fa fa-close"></i> Cancel</a>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function change_password()
  {
    $('#setting_tab').css('display', 'block');
  }

  function change_current_password()
  {
    let current_password = $('#current_password').val().trim();
    let new_password = $('#new_password').val().trim();
    let confirm_password = $('#confirm_password').val().trim();

    if(current_password == "")
    {
      alert("Please enter Current Password!");
      $('#current_password').focus();
    }
    else if(new_password == "")
    {
      alert("Please enter New Password!");
      $('#new_password').focus();
    }
    else if(confirm_password == "")
    {
      alert("Please enter Confirm Password!");
      $('#confirm_password').focus();
    }
    else if(new_password != confirm_password)
    {
      alert('Please check New and Confirm password!');
    }
    else
    {
      let admin_status = '<?php echo @$admin_status; ?>';
      let action = "change_password";
      $.ajax({
        type:'POST',
        <?php 
          if(@$admin_status == "1")
          {
            echo "url:'Action-Change-Password-Functions.php',";
          }
          else
          {
            echo "url:'../Action-Change-Password-Functions.php',";
          }
        ?>
        data:{action, current_password, new_password, admin_status},
        success:function(html) {
          $('#print_result').html(html);
        }
      });
    }
  }

  function cancel_password_modal()
  {
    $('#setting_tab').css('display', 'none');
    $('#current_password').val('');
    $('#new_password').val('');
    $('#confirm_password').val('');
  }

</script>