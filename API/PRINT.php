<?php
$header = '
<div style="height:1004px;" id="page-border">
	<div class="col-md-5">
		<img src="logo.png" style="width:70%;" />
		<h6>ACTIONABLE INSIGHTS YOU TRUST</h6>
	</div>
	<div class="col-md-7">
		<h2 class="right" style="font-size:16pt;">Background Verification Report</h2>
		<h6 class="right" style="color:#000;">CONFIDENTIAL INFORMATION</h6>
	</div>
	<div style="border-bottom:solid 1px #ccc;width:98%; margin:1%;"></div>
	';
$footer = '
	<br>
	<div class="col-md-12 center" style="border-top:solid 1px #ccc;font-size:10pt;padding:4px 0;">
	<br>
		<a href="https://www.istarga.com" target="_blank">www.istarga.com</a> 
	</div>
</div>';

$html = '
<style>
p{
	font-size:12pt;
	color:#000;
}

@page {
	margin: 40px 50px;
}
#page-border{
 padding: 1em;
 border-top:solid 12px #000;
 border-bottom:solid 12px #000;
 border-left:solid 1px #000;
 border-right:solid 1px #000;
 background-color: #FFFFFF ;
}
.underline{
	text-decoration:underline;
}
table{
	width:100%;
	
tr, td, th{
	padding:4px;
	font-size:8pt;
}
th{
}
body, *{
	font-family: Calibri;
}
.col-md-1 {float:left; width: 8.33%;}
.col-md-2 {float:left; width: 16.66%;}
.col-md-3 {float:left; width: 25%;}
.col-md-4 {float:left; width: 33.33%;}
.col-md-5 {float:left; width: 41.66%;}
.col-md-6 {float:left; width: 50%;}
.col-md-7 {float:left; width: 58.33%;}
.col-md-8 {float:left; width: 66.66%;}
.col-md-9 {float:left; width: 75%;}
.col-md-10 {float:left; width: 83.33%;}
.col-md-11 {float:left; width: 91.66%;}
.col-md-12 {float:left; width: 100%;}
.center{ text-align:center; }
.right{ text-align:right; }
.left{ text-align:left; }

.border_left{
	border-left:dotted 2px #000;
}
.border_right{
	border-right:solid 1px #ccc;
}
.border_top{
	border-top:dotted 2px #000;
}
.border_bottom{
	border-bottom:dotted 2px #000;
}
h1, h2, h3, h4, h5, h6{
	margin:0;
	padding:0;
}
h6{
	color:#000;
	font-weight:normal;
	margin-bottom:4px;
	font-size:10pt;
}
.border_verify_status
{
	text-align:center;
	font-weight:bold;
}
.border_background_color
{
	background-color:'.@$color_code.';;
}
.table_services table, .table_services, .table_services tr, .table_services th{
	color:#000;
	border-top:solid #666;
	border-bottom:solid #666;
	border-collapse:collapse;
	padding:10px;
}
.table_services th
{
	border-bottom:solid 1px #666;
}
.table_services td
{
	border-bottom:solid 1px #666;
}
.table_services th{ font-size:11pt;	}
.table_services td{ font-size:14pt; font-weight:bold; padding:15px; }

.input_data_table {
  border-collapse: collapse;
  width: 100%;
}

.input_data_table th, .input_data_table td {
  text-align: left;
  padding: 4px 6px;
  font-size:11pt;
	color: #222;
}

.input_data_table th{
	padding:8px 6px;
}

.input_data_table th, .input_data_table tr, .input_data_table td, .input_data_table
{
	border-top:solid 1px #ccc;
	border-bottom:solid 1px #ccc;
	border-collapse:collapse;
}
// .input_data_table tr:nth-child(odd){background-color: #b1d9f0}

.input_data_table th {
  // background-color: #b1d9f0;
  color: #000;
  font-weight:bold;
}
.border_report_status{
	padding:20px 0;
	border-top:solid 1px #aaa;
	border-bottom:solid 1px #aaa;
}
</style>

'.$header.'
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
'.$footer;



include("mpdf60/mpdf.php");
// $mpdf=new mPDF('c', 'A4-L'); 
$mpdf=new mPDF('c'); 

// $mpdf->SetWatermarkImage('../../images/logo.png');
// $mpdf->showWatermarkImage = true;

$mpdf->mirrorMargins = true;

// $mpdf->SetHTMLHeader("h5>Mahesh</h5>");
// $mpdf->SetHTMLHeader("h5>Mahesh</h5>", 'E');
// $mpdf->SetHTMLFooter("h5>Mahesh</h5>");
// $mpdf->SetHTMLFooter("h5>Mahesh</h5>", 'E');

// $mpdf->SetDisplayMode('fullpage','two');
$mpdf->WriteHTML($html);
$mpdf->Output('Banner.pdf', 'I');
// $mpdf->Output("MAHESH.pdf", "D");
// $mpdf->Output("MAHESH.pdf", "F");

$mpdf=new mPDF('','A4');

?>