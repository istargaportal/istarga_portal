<?php

$html = '
<style>
p{
	font-size:8pt;
	text-align:justify;
}

@page {
	margin: 15px 30px;
}
#page-border{
 padding: 1em;
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
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
	font-family: "Open Sans",serif;
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

.border_left{
	border-left:dotted 2px #000;
}
.border_right{
	border-right:dotted 2px #000;
}
.border_top{
	border-top:dotted 2px #000;
}
.border_bottom{
	border-bottom:dotted 2px #000;
}
.right{
	padding-right:15px;
}
</style>

<div style="height:924px;" class="border_top" id="page-border">

</div>
';

include("../../mpdf60/mpdf.php");
// $mpdf=new mPDF('c', 'A4-L'); 
$mpdf=new mPDF('c'); 

// $mpdf->addPage("P", "A4");
// $mpdf->SetWatermarkImage('../../images/logo.png');

// $mpdf->showWatermarkImage = true;

$mpdf->mirrorMargins = true;

$mpdf->SetDisplayMode('fullpage','two');

$mpdf->WriteHTML($html);

$mpdf->Output();

$mpdf=new mPDF('','A4');


?>