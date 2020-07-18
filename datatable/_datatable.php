<script type="text/javascript" src="../datatable/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="../datatable/buttons.dataTables.min.css">
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/f3e99a6c02/integration/bootstrap/3/dataTables.bootstrap.js"></script>
 -->
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
</script>
<style type="text/css">
  select.form-control:not([size]):not([multiple]){
    color: #000 !important;
  }
  .dt-buttons{
    position: absolute !important;
    right: 45%;
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
  #datatable_tbl_info, #datatable_tbl_filter{
    width: 50%;
    float: left;
  }
  #datatable_tbl_length{
    width: 50%;
    float: right;
    text-align: right;
  }
  .paginate_button{
    background-color: #eee;
    border:solid #346bd6 1px;
    padding: 6px 10px;
    cursor: pointer;
    background-color: #346bd6;
    color: #fff;
    font-weight: bold;
    border-radius: 5px;
    margin-right: 3px;
  }
  .current{
    background-color: #fff;
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

</style>