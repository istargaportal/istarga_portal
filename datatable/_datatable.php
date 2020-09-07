<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<!-- <script type="text/javascript" src="../datatable/datatables.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="../datatable/buttons.dataTables.min.css"> -->
<script type="text/javascript">
  function load_datatable()
  {
    $('#datatable_tbl').DataTable( {
      "dom": 'lBfrtip',
      "buttons": [
      {
        extend: 'collection',
        text: 'Export',
        buttons: [
        {
          extend: 'copy',
          title: document.title,
          orientation: 'landscape',
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        },
        {
          extend: 'excel',
          title: document.title,
          orientation: 'landscape',
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        },
        {
          extend: 'print',
          title: document.title,
          orientation: 'landscape',
          defaultStyle: {
            alignment: 'center',
          },
          exportOptions: {
            columns: "thead th:not(.noExport)"
          }
        }
        ]
      }
      ],    
      "lengthMenu": [[10, 50, 100, 1000, -1], [10, 50, 100, 1000, "All"]],
    } );
  }

  function export_to_excel() 
  {
    $('#datatable_tbl_filter').remove();
    $('#datatable_tbl_length').remove();
    $('#datatable_tbl_paginate').remove();
    $('#datatable_tbl_info').remove();
    $('.noExport').remove();
    var tbl_data = "<style> td, tr, th, table{ vertical-align:middle;} table {border: 1px solid gray;}th {border: 1px solid gray;padding: 5px;background-color:grey;color: white;}td {border: 1px solid gray;padding: 5px;}</style><table>"+$('#datatable_tbl').html()+"</table>";
    // var url = 'data:application/vnd.ms-excel,' + encodeURIComponent($('#data_table').html());
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tbl_data));
    // window.open('data:application/vnd.ms-excel,'+ encodeURIComponent($('#data_table').html()+';filename=exportData.excel;');
    // location.href = url
    location.reload();
    return false
  }

  function export_to_print()
  {
    var printContents = document.getElementById("data_table").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    $('.noExport').remove();
    $('#datatable_tbl_filter').css('display', 'none');
    $('#datatable_tbl_length').css('display', 'none');
    $('#datatable_tbl_paginate').css('display', 'none');
    window.print();
    location.reload();
  }

  $('#data_table').after('<a class="btn btn-success export_excel btn-sm" onclick="export_to_excel()"><i class="fa fa-download"></i> Export To Excel</a> <a class="btn btn-danger export_print btn-sm" onclick="export_to_print()"><i class="fa fa-print"></i> Print</a>');

  function isAlpha(a){var e=(a=a||window.event).which?a.which:a.keyCode;return!(e>31&&(e<65||e>90)&&(e<97||e>122)&&e>32)}function isNumber(a){var e=(a=a||window.event).which?a.which:a.keyCode;return!(e>31&&(e<48||e>57))}$(".form-control").change(function(){var a="";$(".form-control").each(function(){""==(a=$(this).val())?$(this).removeClass("has_data"):"0"==a?$(this).removeClass("has_data"):"Select"==a?$(this).removeClass("has_data"):$(this).addClass("has_data")})}),$('input[type="email"]').attr("pattern","[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,3}$"),$("input").on("keypress",function(a){32===a.which&&0===a.target.selectionStart&&a.preventDefault()}),$("textarea").on("keypress",function(a){32===a.which&&0===a.target.selectionStart&&a.preventDefault(),13===a.which&&0===a.target.selectionStart&&a.preventDefault()}),$("input").on("focusout",function(a){var e=$(this).val().trim();""==(e=e.replace(/ +(?= )/g,""))?$(this).val(""):$(this).val(e)}),$("textarea").on("focusout",function(a){var e=$(this).val().trim();""==(e=e.replace(/ +(?= )/g,""))?$(this).val(""):$(this).val(e)}),$("input[type='email']").on("focusout",function(a){return $("#error_email").remove(),/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val())||""==$(this).val().trim()?($(".btn-warning").removeClass("disabled"),$(".btn-primary").removeClass("disabled"),!0):($(this).focus(),$(this).after('<span class="btn btn-danger text_normal btn-xs" id="error_email"><i class="fa fa-exclamation-triangle"></i> Invalid Email ID!</span>'),$(".btn-warning").addClass("disabled"),$(".btn-primary").addClass("disabled"),!1)}),$(".mobile_number").on("focusout",function(a){$("#error_mobile_number").remove();return $(this).val().match(/^[0]?[789]\d{9}$/)||""==$(this).val().trim()?($(".btn-warning").removeClass("disabled"),$(".btn-primary").removeClass("disabled"),!0):($(this).focus(),$(this).after('<span class="btn btn-danger text_normal btn-xs" id="error_mobile_number"><i class="fa fa-exclamation-triangle"></i> Invalid Mobile Number!</span>'),$(".btn-warning").addClass("disabled"),$(".btn-primary").addClass("disabled"),!1)}),$(".mobile_tel").on("focusout",function(a){$("#error_mobile_number").remove();var e=$(this).val().length,t=parseInt($(this).val()||0);return e>=7&&e<=12&&t>0||0==e?($(".btn-warning").removeClass("disabled"),$(".btn-primary").removeClass("disabled"),!0):($(this).focus(),$(this).after('<span class="btn btn-danger text_normal btn-xs" id="error_mobile_number"><i class="fa fa-exclamation-triangle"></i> Invalid Mobile Number!</span>'),$(".btn-warning").addClass("disabled"),$(".btn-primary").addClass("disabled"),!1)}),$(".no_space").on("keypress",function(a){if(32==a.which)return!1}),$(document).keyup(function(a){"Escape"===a.key&&$(".modal").each(function(){"none"!=$(this).css("display")&&(1==confirm("Do you want to close this form?")&&$(this).css("display","none"))})}),$(".Number").on("input",function(a){var e;e=a.keyCode?a.keyCode:a.which,0==a.shiftKey&&(46==e||8==e||37==e||39==e||e>=48&&e<=57)||a.preventDefault(),$(".Number").each(function(){var a=$(this).val().replace(/[^0-9\.]/g,"");$(this).val(a)})});

</script>
<style type="text/css">
  @media print {
      /* Hide everything in the body when printing... */
      body.printing * { display: none; }
      /* ...except our special div. */
      body.printing #print-me { display: block; }
  }

  @media screen {
      /* Hide the special layer from the screen. */
      #print-me { display: none; }
  }

  #data_table{
    position: relative;
  }
  .export_excel{
    position: static;
    bottom: 20px;
    z-index: 999999 !important;
    left: 22%;
    font-size: 9pt !important;
    padding: 5px 10px !important;
  }
  .export_print{
    position: static;
    bottom: 20px;
    z-index: 999999 !important;
    left: 38%;
    font-size: 9pt !important;
    padding: 5px 10px !important;
  }
  select.form-control:not([size]):not([multiple]){
    color: #000 !important;
  }
  
  .dataTables_filter, .dataTables_length{
    padding-bottom: 10px;
  }
  .dataTables_filter input{
    padding: 6px 8px;
    border-radius: 40px;
    outline: none;
    border:solid 1px #444;
  }
  .button.dt-button, div.dt-button, a.dt-button{
    background: #346bd6 !important;
    color: #fff !important;
    padding: 4px 12px !important;
    border-radius: 5px;
  }
  .dataTables_length select{ 
    height: 30px !important;
  }
  #datatable_tbl_info, #datatable_tbl_filter {
    width: 50%;
    float: left;
  }
  #datatable_tbl_info, #datatable_tbl_filter label{
    float: left !important;
  }
  #datatable_tbl_length{
    width: 50%;
    float: right;
    text-align: right;
  }
  .paginate_button{
    background-color: #eee !important;
    border:solid #346bd6 1px !important;
    padding: 6px 10px;
    cursor: pointer;
    color: #fff !important;
    font-weight: bold;
    border-radius: 5px;
    margin-right: 3px;
  }
  .current{
    background-color: #fff !important;
    color: #346bd6 !important;
    border:solid #346bd6 1px;
  }
  .disabled{
    opacity: 0.7;
    cursor: not-allowed;
  }
  .sidebar
  {
    background: linear-gradient(rgba(31,40,62,0.8),rgba(31,40,62,0.8)),url(assets/img/sidebar-2.jpg)!important;
    background-size: contain !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover, .disabled{
    background: #eee !important;
    opacity: 0.5;
    cursor: not-allowed !important;
  }
  .card .table tr td, .dark-edition .table>thead>tr>td, .dark-edition .table>tbody>tr>td, .dark-edition .table>tfoot>tr>td, td, table, tbody, tr, #datatable_tbl, .dataTables_wrapper .dataTables_filter input{
    background: transparent !important;
    border:solid 1px #ddd !important;
  }
  tr th, tr, td, th, thead, tbody, table{
    font-size: 9pt !important;
  }
  tr th{
    border:solid 1px #fff !important;
  }
</style>