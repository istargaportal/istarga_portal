<input type="hidden" id="user_id" value="<?php echo @$user_id; ?>" >
<script type="text/javascript">

  function load_calendar_panel(month, year, user_id)
  {
    $('#modal_loading').css('display', 'block');
    var action = "load_calendar_panel";
    $.ajax({
      type:'GET',
      url:'../API/Calendar/index.php',
      data:{action, month, year, user_id},
      success:function(html) {
        $('#attendance_modal').css('display', 'block');
        $('#modal_loading').css('display', 'none');
        $('#load_calendar_panel').html(html);
      }
    });
  }

  function mark_attendance(selected_date, user_id)
  {
    let action = "mark_attendance";
    $.ajax({
      type:'POST',
      url:'./API/Update-Attendance.php',
      data:{action, selected_date, user_id},
      success:function(html) {
        $('#modal_loading').css('display', 'none');
        $('#print_result').html(html);
      }
    });
  }

  function close_mark_attendance()
  {
    $('#mark_attendance').css('display', 'none');
    $("#selected_date_input").val("");
    close_present_mark();
  }

  function present_mark()
  {
    $('#mark_attendance_panel').css('display', 'block');
    $('#mark_present').addClass('disabled_btn');
    $('#mark_absent').addClass('disabled_btn');
    $('#mark_sick_leave').addClass('disabled_btn');
    $('#mark_casual_leave').addClass('disabled_btn');
  }

  function close_present_mark()
  {
    $('#mark_attendance_panel').css('display', 'none');
    $('#mark_present').removeClass('disabled_btn');
    $('#mark_absent').removeClass('disabled_btn');
    $('#mark_sick_leave').removeClass('disabled_btn');
    $('#mark_casual_leave').removeClass('disabled_btn');
  }

  function mark_absent()
  {
    let user_id = $('#user_id').val();
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date as Absent?")
    if(r == true)
    {
      let action = "absent_mark";
      let selected_date_input = $('#selected_date_input').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input, user_id},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function mark_sick_leave()
  {
    let user_id = $('#user_id').val();
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date as Sick Leave?")
    if(r == true)
    {
      let action = "sick_leave";
      let selected_date_input = $('#selected_date_input').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input, user_id},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function mark_casual_leave()
  {
    let user_id = $('#user_id').val();
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date as Casual Leave?")
    if(r == true)
    {
      let action = "sick_leave";
      let selected_date_input = $('#selected_date_input').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input, user_id},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function update_log_time()
  {
    let user_id = $('#user_id').val();
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date & Log Time - "+ $('#from_time').val() + " - "+ $('#to_time').val() +"?");
    if(r == true)
    {
      let action = "update_log_time";
      let selected_date_input = $('#selected_date_input').val();
      let from_time = $('#from_time').val();
      let to_time = $('#to_time').val();
      if(from_time == "")
      {
        alert("Please select from time!");
        $('#from_time').focus();
      }
      else if(to_time == "")
      {
        alert("Please select to time!");
        $('#to_time').focus();
      }
      else
      {
        $.ajax({
          type:'POST',
          url:'./API/Update-Attendance.php',
          data:{action, selected_date_input, from_time, to_time, user_id},
          success:function(html) {
            $('#modal_loading').css('display', 'none');
            close_mark_attendance();
            $('#print_result').html(html);
           }
        });
      }
    }
  }

  function update_log_out_time()
  {
    let user_id = $('#user_id').val();
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date & Log Out Time - "+ $('#to_time').val() +"?")
    if(r == true)
    {
      let action = "update_log_out_time";
      let selected_date_input = $('#selected_date_input').val();
      let to_time = $('#to_time').val();
      if(to_time == "")
      {
        alert('Please select to time!');
        $('#to_time').focus();
      }
      else
      {
        $.ajax({
          type:'POST',
          url:'./API/Update-Attendance.php',
          data:{action, selected_date_input, to_time, user_id},
          success:function(html) {
            $('#modal_loading').css('display', 'none');
            close_mark_attendance();
            $('#print_result').html(html);
           }
        });
      }
    }
  }

  function accept_reject_attendance(attendance_id, condition, user_id)
  {
    let confirm_message = "";
    if(condition == "1")
    {
      confirm_message = 'Are you sure to Accept this Attendance?';
    }
    else if(condition == "-1")
    {
      confirm_message = 'Are you sure to Reject this Attendance?';
    }
    
    let r = confirm(confirm_message);
    if(r == true)
    {
      let action = 'accept_reject_attendance';
      $('#modal_loading').css('display', 'block');    
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, attendance_id, condition, user_id},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          $('#print_result').html(html);
        }
      });
    }  
  }

  function delete_attendance(attendance_id, month, year, user_id)
  {
    let r = confirm('Are you sure to delete this Attendance?')
    if(r == true)
    {
      let action = 'delete_attendance';
      $('#modal_loading').css('display', 'block');    
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, attendance_id, month, year, user_id},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          $('#print_result').html(html);
        }
      });
    }
  }
</script>