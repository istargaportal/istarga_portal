<?php

if(@$admin_status == "1")
{
  $firstname_p = "Admin";
}

?>
<div class="modal" id="two_step_auth">
  <div class="row">
    <div class="col-md-4"><br></div>
    <div class="col-md-4">
      <div class="">
        <br><br>
        <div class="modal-content row">
          <h4 style="margin: 4px 0; border-bottom: solid 1px #000; " id="process_title" class="card-title"><i class="fa fa-cogs" aria-hidden="true"></i> 2-Step Verification</h4>
          <div class="">
            <h5 style="margin: 10px 0;">Hello, <?php echo $firstname_p ?></h5>
            <label class="material_checkbox">
              <input type="checkbox" id="two_step_auth_check" value="1" />
              <span class="checkmark"></span>
              Turn On
            </label>
            <br> <br>
            <br>
            <h5>Email ID</h5>
            <input type="email" id="email_id_two_step" class="form-control" />
            <br>
            <a href="javascript:change_current_two_step()" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Update</a>
            <a href="javascript:cancel_two_step_modal()" class="btn btn-default btn-sm"><i class="fa fa-close"></i> Cancel</a>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function two_steps_auth()
  {
    $('#two_step_auth').css('display', 'block');
  }

  function change_current_two_step()
  {
    let current_two_step = $('#current_two_step').val().trim();
    let new_two_step = $('#new_two_step').val().trim();
    let confirm_two_step = $('#confirm_two_step').val().trim();

    if(current_two_step == "")
    {
      alert("Please enter Current two_step!");
      $('#current_two_step').focus();
    }
    else if(new_two_step == "")
    {
      alert("Please enter New two_step!");
      $('#new_two_step').focus();
    }
    else if(confirm_two_step == "")
    {
      alert("Please enter Confirm two_step!");
      $('#confirm_two_step').focus();
    }
    else if(new_two_step != confirm_two_step)
    {
      alert('Please check New and Confirm two_step!');
    }
    else
    {
      let admin_status = '<?php echo @$admin_status; ?>';
      let action = "two_steps_auth";
      $.ajax({
        type:'POST',
        <?php 
          if(@$admin_status == "1")
          {
            echo "url:'Action-Change-two_step-Functions.php',";
          }
          else
          {
            echo "url:'../Action-Change-two_step-Functions.php',";
          }
        ?>
        data:{action, current_two_step, new_two_step, admin_status},
        success:function(html) {
          $('#print_result').html(html);
        }
      });
    }
  }

  function cancel_two_step_modal()
  {
    $('#two_step_auth').css('display', 'none');
    $('#current_two_step').val('');
    $('#new_two_step').val('');
    $('#confirm_two_step').val('');
  }

</script>