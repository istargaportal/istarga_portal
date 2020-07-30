<?php
$page_name = "ETA Macros";
include 'Header.php';
?>
<style type="text/css">
  .custom-select{
    background: transparent;
  }
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><?php echo @$page_name; ?></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <label>Comment</label>
                <textarea id="comment" class="custom-select"></textarea>
              </div>
              <div class="col-md-4">
                <br><br>
                <a href="javascript:save_eta_macros()" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</a>
                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-history"></i> Reset</a>
                <a href="ETA-Macros.php" class="btn btn-default btn-sm"><i class="fa fa-remove"></i> Cancel</a>
              </div>
              <div class="table-responsive">
                <div id="data_table"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function save_eta_macros()
  {
    var comment = $('#comment').val().trim();
    if(comment == "")
    {
      alert('Please enter comment!');
      $('#comment').focus();
    }
    else
    {
      var action = 'save';
      $.ajax({
        type:'POST',
        data:{action, comment},
        url:'./API/Action-ETA-Macros.php',
        success:function(html){
          alert("ETA Macros added successfully!");
          $('#comment').val('');
          load_eta_macros();
        }
      });
    }
  }

  function delete_eta_macro(eta_macro_id)
  {
    var delete_eta_macro_id = eta_macro_id;
    var r = confirm("Are you sure to delete this ETA Macros?");
    if(r == true)
    {
      var action = 'delete';
      $.ajax({
        type:'POST',
        data:{action, delete_eta_macro_id},
        url:'./API/Action-ETA-Macros.php',
        success:function(html){
          load_eta_macros();
          alert("ETA Macros deleted successfully!");
        }
      });
    }
  }

  function edit_eta_macro(eta_macro_id)
  {
    $('#comment_lbl_'+eta_macro_id).css('display', 'none');
    $('#comment_txt_'+eta_macro_id).css('display', 'block');
    $('#comment_txt_'+eta_macro_id).focus();

    $('#update_btn_'+eta_macro_id).css('display', 'inline-block');
    $('#edit_btn_'+eta_macro_id).css('display', 'none');
  }

  function update_eta_macro(eta_macro_id)
  {
    var comment = $('#comment_txt_'+eta_macro_id).val().trim();
    if(comment == "")
    {
      alert('Please enter comment!')
    }
    else
    {
      var action = 'update';
      $.ajax({
        type:'POST',
        data:{action, comment, eta_macro_id},
        url:'./API/Action-ETA-Macros.php',
        success:function(html){
          alert("ETA Macros updated successfully!");
          $('#comment_txt_'+eta_macro_id).val('');
          load_eta_macros();
        }
      });
    }
  }

  function load_eta_macros()
  {
    var action = 'display';
    $.ajax({
      type:'POST',
      data:{action},
      url:'./API/Action-ETA-Macros.php',
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_eta_macros();
</script>
<script>
  let darkmode = localStorage.getItem("darkmode");
  const darkmodetoggle = document.querySelector('input[name=theme]');

  const enabledarkmode = () => {
    document.documentElement.setAttribute('data-theme', 'dark')
    localStorage.setItem("darkmode", "enabled");
  }

  const disabledarkmode = () => {
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkmode", null);
  }

  if (darkmode === "enabled") {
    enabledarkmode();
  }

  darkmodetoggle.addEventListener("change", () => {
    darkmode = localStorage.getItem("darkmode");
    if (darkmode !== "enabled") {
      trans()
      enabledarkmode();
    } else {
      trans()
      disabledarkmode();
    }
  })

  let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
      document.documentElement.classList.remove('transition');
    }, 1000)
  }
</script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="assets/js/plugins/chartist.min.js"></script>
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<?php
include '../datatable/_datatable.php';
?>
<script type="text/javascript">
  load_datatable();
</script>

</body>
</html>