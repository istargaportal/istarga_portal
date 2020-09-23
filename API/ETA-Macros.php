<div class="modal" id="eta_macro_master_modal">
    <div class="row">
        <div class="col-md-4">
            <br>
        </div>
        <div class="col-md-4">
            <div class="modal-content">
                <h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-check"></i> ETA Notes</b>
                    <a onclick="close_select_eta()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i> Close</a>
                </h5>
                <label>Select Standard Macro</label>
                <select id="macros_comment_eta" class="chosen-select">
                    <option value="">Select</option>
                    <?php
                    $check='SELECT comment FROM eta_macro_master ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                        echo '<option>'.$row['comment'].'</option>';
                    }
                    ?>
                </select>
                <div class="col-md-12 form_center">
                    <br>
                    <a onclick="select_eta_text()" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Select</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.chosen-select').chosen();

    function select_eta()
    {
        $('#eta_macro_master_modal').css('display', 'block');
    }

    function select_eta_text()
    {
        close_select_eta();
        $('#eta_notes').val($('#macros_comment_eta').val());
        $('#eta_notes').focus();
    }

    function close_select_eta()
    {
        $('#eta_macro_master_modal').css('display', 'none');
    }
</script>