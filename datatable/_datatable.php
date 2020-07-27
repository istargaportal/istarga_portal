<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<!-- <script type="text/javascript" src="../datatable/datatables.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="../datatable/buttons.dataTables.min.css">
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
    var url = 'data:application/vnd.ms-excel,' + encodeURIComponent($('#datatable_tbl').html())
    location.href = url
    return false
  }

  $('#data_table').before('<a class="btn btn-success export_btn btn-sm" onclick="export_to_excel()"><i class="fa fa-file-excel"></i> Export To Excel</a>');

</script>
<style type="text/css">
  #data_table{
    position: relative;
  }
  .export_btn{
    position: absolute;
    bottom: 0;
    z-index: 99999999 !important;
    left: 20%;
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
</style>