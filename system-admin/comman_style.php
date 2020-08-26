<style type="text/css">
    .tablehead1{
      border:none !important;
      background: transparent !important; 
    }
    b{ font-weight: bold !important; }
    .form_center{ text-align: center; }
    .form_left{ text-align: left; }
    .form_right{ text-align: right; }
    .custom-select{
      margin-top: 0 !important;
    }
    .btn-small{
      font-size: 8pt !important;
      padding: 3px 5px !important;
    }
    .btn-xs{
      font-size: 9pt !important;
      padding: 5px 7px !important;
    }
    .btn-xs .material-icons, .btn-xs .fa{
      font-size: 10pt !important;
    }

    .btn-round{
      border-radius: 100%;
    }
    .btn-danger{
      background:#eb1e2f !important;
    }
    .btn-warning i, .btn-danger i{
      color: #fff !important;
    }
    .btn-warning{
      background:#feaf31 !important;
    }

    .dropdown-item{
      cursor: pointer;
    }
    .btn-success{
      background:#346bd6 !important
    }
    .btn-success i, .btn-primary i{
      color: #fff !important;
    }
    .btn-default i{
      color: #000 !important;
    }

    .btn-default{
      color: #000 !important;
      background:#ccc !important;
    }
    .btn-sm{
      font-size: 10pt !important;
      padding: 7px 10px !important
    }
    .btn-sm .material-icons, .btn-sm .fa{
      font-size: 11pt !important;
    }
    .container_checkbox {
      display: block;
      position: relative;
      float: left;
      padding: 3px 10px;
      padding-left: 35px;
      cursor: pointer;
      font-size: 12pt;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background: #fff;
      border:solid 1px #aaa;
      border-radius: 40px;
      margin-right: 4px;
    }

    .container_checkbox input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    .checkmark {
      position: absolute;
      top: 6px;
      left: 6px;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    .container_checkbox:hover input ~ .checkmark {
      background-color: #ccc;
    }

    .container_checkbox input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    .container_checkbox input:checked ~ .checkmark:after {
      display: block;
    }

    .container_checkbox .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }
    .material_checkbox {
      display: block;
      position: relative;
      padding: 8px 10px;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 12pt;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: solid 1px #000;
      float: left;
      border-radius: 45px;
    }
    .material_checkbox input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    .material_checkbox:hover input ~ .checkmark {
      background-color: #ccc;
    }
    .material_checkbox input:checked ~ .checkmark {
      background-color: #2196F3;
    }
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
    .material_checkbox input:checked ~ .checkmark:after {
      display: block;
    }
    .material_checkbox .checkmark:after {
      left: 8px;
      top: 2px;
      width: 10px;
      height: 15px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    .chosen-container{width:100%!important}.chosen-container-multi .chosen-choices,.chosen-container-single .chosen-single{padding:5px 8px!important;background:linear-gradient(#fff 20%,#f6f6f6 50%,#eee 52%,#f4f4f4 100%)!important}.chosen-container-single .chosen-single div{top:4px!important}.chosen-container .chosen-drop{z-index:9999999!important}
    .chosen-container-single .chosen-single{
      padding: 4px 5px !important;
      height: 35px !important;
    }
    .list_none ul, .list_none li
    {
      list-style: none !important;
    }
    .disabled
    {
      pointer-events:none !important;
      cursor: not-allowed !important;
      filter: blur(0.4px);
      outline: none !important;
      -webkit-user-select: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;            
    }
    
    .disabled_btn
    {
      opacity: 0.6;
      pointer-events:none !important;
      cursor: not-allowed !important;
      filter: blur(0.4px);
      outline: none !important;
      -webkit-user-select: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;            
    }
    
    .dark-edition .table>thead>tr>th, .dark-edition .table>tbody>tr>th, .dark-edition .table>tfoot>tr>th, .dark-edition .table>thead>tr>td, .dark-edition .table>tbody>tr>td, .dark-edition .table>tfoot>tr>td{
      padding: 4px !important;
    }
    .dark-edition .table>thead>tr>td, .dark-edition .table>tbody>tr>td, .dark-edition .table>tfoot>tr>td{
      /*color: #000;*/
    }
    .dark-edition .sidebar[data-background-color="black"] .nav li:not(.active) a, .dark-edition .sidebar[data-background-color="black"] .nav li:not(.active) .dropdown-menu a{
      margin: 0;
    }
    .sidebar .nav{
      margin-top: 0;
    }
    .nav-link .material-icons{
      color: #9094a3 !important;
    }
    .list-unstyled{
      background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));
    }
    .chosen-container-multi .chosen-choices li.search-field{
      width: auto;
      background:transparent;
    }
    .dark-edition .form-control, textarea, input, select
    {
      box-shadow: 0 0 4px #ccc;
    }
    textarea{
      color: #000;
    }

    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 9999999999; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    .modal .row{
      margin: 0 !important;
    }
    .modal-content {
      background-color: #fefefe;
      padding: 1% 2%;
      border: 1px solid #888;
      width: 100%;
      margin: 0;
    }

    .close {
      color: #000;
      float: right;
      font-size: 16pt;
      font-weight: bold;
      float: right;
      padding: 0 4px;
      transition: 0.4s all ease;
    }
    .close .fa{
      color: #000;
    }
    .close:hover,
    .close:focus {
      font-size: 20pt;
    }
    .no_padding{
      padding: 0;
    }
    .modal .tile-stats,.modal-content{-webkit-animation-name:animatetop!important;-webkit-animation-duration:.2s!important;animation-name:animatetop!important;animation-duration:.2s!important}@-webkit-keyframes animatetop{from{transform:scale(0)}to{transform:scale(1)}}@keyframes animatetop{from{transform:scale(0)}to{transform:scale(1)}}
    .fa-star{
      font-size: 8pt !important;
      color: red;
    }
    .font_normal{
      text-transform: none !important;
    }
    .card-title{
      text-transform: uppercase !important;
    }
    .sidebar[data-background-color="black"] .nav .nav-item .nav-link{
      margin: 0 !important;
    }
    .sidebar
    {
      background: linear-gradient(rgba(31,40,62,0.8),rgba(31,40,62,0.8)),url('../assets/img/sidebar-2.jpg')!important;
      background-size: contain!important;
    }
    .btn_danger{
      color: #000 !important;
      background: #fff !important;
      border:solid 1px #eb1e2f !important;
    }
    .btn_link{
      color: #3354d6 !important;
      background: #fff !important;
      border:solid 1px #ccc !important;
      font-weight: bold !important;
    }
    .count_panel
    {
      margin: 2%;
      width: 100%;
      float: left;
      box-shadow: 0 0 10px #aaa;
    }
    .count_heading, .count_value{
      padding: 10px;
      float: left;
      text-align: center;
    }
    .count_heading{
      font-size: 10pt;
      width: 100%;
      color: #000;
      text-transform: uppercase;
      padding-bottom: 0;
    }
    .count_value {
      width: 100%;
    }
    .count_value .count{
      padding: 4px;
      font-size: 20pt;
      font-weight: bold;
    }
    .present_count{
      color: green;
    }
    .absent_count{
      color: red;
    }
    .sick_leave{
      color: orange;
    }
    .casual_leave{
      color: blue;
    }
    .color_div{
      width: 100%;
      float: left;
      margin: 4px 0;
      box-shadow: 0 0 4px #aaa;
    }
    .color_panel{
      width: 30%;
      float: left;
      padding: 5px;
      height: 32px;
    }
    .color_text{
      width: 70%;
      float: left;
      padding: 4px;
      text-align: center;
      color: #000;
      font-weight: bold;
    }
    .main-panel>.content {
      margin-top: 50px;
      padding: 20px 15px;
    }
    .half_attendance{ background: yellow !important; }
    .today_color{ background: pink; }
    .present_color{ background: green; }
    .absent_color{ background: red; }
    .sick_leave_color{ background: orange; }
    .casual_leave_color{ background: blue; }
    .not_present_color{ background: gray; }
    .color_text .fa{
      font-size: 16pt !important;
    }
  </style>