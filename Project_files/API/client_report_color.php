<table class="table table-hover">
  <thead class="text-primary " 
  style="background-color: rgba(15, 13, 13, 0.856) !important;" 
  >
    <th>Order Status</th>
    <th>Color Code</th>
    <th>Report Text</th>
  </thead>
  
<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

class country
{
    public function __construct($db)
    {
        $this->conn=$db;
    }
    public function update_details()
    {
        extract($_POST);
        $check='SELECT order_status, color_code, report_text FROM default_report_color ';
        $this->conn->query("SET CHARACTER SET utf8"); 
        $result=$this->conn->query($check);
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
            	$yel_selected = $red_selected = $gre_selected = $amb_selected = $wht_selected = $blu_selected = ""; 
            	if($row["color_code"] == "Yellow"){ $yel_selected = "selected"; }
            	if($row["color_code"] == "Red"){ $red_selected = "selected"; }
            	if($row["color_code"] == "Green"){ $gre_selected = "selected"; }
            	if($row["color_code"] == "Amber"){ $amb_selected = "selected"; }
            	if($row["color_code"] == "White"){ $wht_selected = "selected"; }
            	if($row["color_code"] == "Blue"){ $blu_selected = "selected"; }
            	echo '
            	<tr>
            		<td class="form_left tablehead1">'.$row["order_status"].'</td>
            		<td class="form_left row tablehead1">
            			<div class="col-md-2" style="padding:0;">
            				<div style="padding:16px 14px;  border:solid 1px #aaa; background:'.$row["color_code"].'"> </div>
            			</div>
            			<div class="col-md-10" style="padding:0;">
	            			<select class="browser-default custom-select" name="color_code[]" class="form-control">
	            				<option '.$yel_selected.'>Yellow</option>
	            				<option '.$red_selected.'>Red</option>
	            				<option '.$gre_selected.'>Green</option>
	            				<option '.$amb_selected.'>Amber</option>
	            				<option '.$wht_selected.'>White</option>
	            				<option '.$blu_selected.'>Blue</option>
	            			</select>
            			</div>
        			</td>
            		<td class="form_left tablehead1">'.$row["report_text"].'</td>
            	</tr>
            	';
            }
        }
    }
}
$basic_details=new country($db);
$basic_details->update_details();

?>
</table>