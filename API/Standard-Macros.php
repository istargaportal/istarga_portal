<div class="modal" id="standard_macro_modal" >
    <div class="row">
        <div class="col-md-4">
            <br>
        </div>
        <div class="col-md-4">
            <div class="modal-content ">
                <h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-check"></i> Standard Macros</b>
                    <a onclick="close_select_macros()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i> Close</a>
                </h5>
                <label>Select Standard Macro</label>
                <select id="macros_comment" class="chosen-select">
                    <option value="">Select</option>
                    <?php
                    $check='SELECT id, comment FROM standard_macro ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                        echo '<option>'.$row['comment'].'</option>';
                    }
                    ?>
                </select>
                <div class="col-md-12 form_center">
                    <br>
                    <a onclick="select_macros_text()" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Select</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.chosen-select').chosen();
    
    function select_macros()
    {
        $('#standard_macro_modal').css('display', 'block');
    }

    function select_macros_text()
    {
        if($('#macros_comment').val() != "")
        {
            close_select_macros();
            $('#public_notes').val($('#macros_comment').val());
            $('#public_notes').focus();
        }
    }

    function close_select_macros()
    {
        $('#standard_macro_modal').css('display', 'none');
    }

</script>