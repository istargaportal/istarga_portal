<?php

require_once "../../config/config.php";

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

        $default_report_color = 0;
        if($client_id != "0")
        {
            $check='SELECT default_report_color FROM client WHERE id = '.$client_id.' ';
            $this->conn->query("SET CHARACTER SET utf8"); 
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                if($row = $result->fetch_assoc())
                {
                    $default_report_color = $row["default_report_color"];
                }
            }
        }

        $disabled = "";
        if($client_id == "0")
        {
            $disabled = "";
            echo '
            <script>
                $("#default_report_color_panel").addClass("disabled");
                $("#default_report_color").prop("checked", true);
            </script>
            ';
        }
        else
        {
            if($default_report_color == "0")
            {
                $disabled = "disabled";
                echo '
                <script>
                    $("#default_report_color_panel").removeClass("disabled");
                    $("#default_report_color").prop("checked", true);
                </script>
                ';
            }
            else
            {
                echo '
                <script>
                    $("#default_report_color_panel").removeClass("disabled");
                    $("#default_report_color").prop("checked", false);
                </script>
                ';
                $disabled = "";
            }
        }

        echo '
        <table id="color_table" class="table table-hover '.@$disabled.'">
          <thead class="text-primary " 
          style="background-color: rgba(15, 13, 13, 0.856) !important;" 
          >
            <th style="width: 35%;">Order Status</th>
            <th style="width: 18%;">Color Code</th>
            <th>Report Text</th>
          </thead>
        ';
        if($default_report_color == "1")
        {
            $check = 'SELECT d.default_report_color_id, d.order_status, cd.color_code, cd.report_text FROM default_report_color d INNER JOIN client_default_report_color cd ON cd.default_report_color_id = d.default_report_color_id WHERE cd.client_id = '.$client_id.' ';
        }
        else
        {
            $check = 'SELECT default_report_color_id, order_status, color_code, report_text FROM default_report_color ';
        }
        $this->conn->query("SET CHARACTER SET utf8"); 
        $result=$this->conn->query($check);
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
            	$yel_selected = $red_selected = $gre_selected = $amb_selected = $wht_selected = $blu_selected = ""; 
            	if($row["color_code"] == "Red"){ $red_selected = "selected"; }
            	if($row["color_code"] == "Green"){ $gre_selected = "selected"; }
            	if($row["color_code"] == "Amber"){ $amb_selected = "selected"; }
            	echo '
            	<tr>
            		<input type="hidden" name="default_report_color_id[]" value="'.$row["default_report_color_id"].'" />
            		<td class="form_left tablehead1">'.$row["order_status"].'</td>
            		<td class="form_left row tablehead1">
            			<div class="col-md-2" style="padding:0;">
            				<div id="bg_color_div_'.$row["default_report_color_id"].'" style="padding:16px 14px;  border:solid 1px #aaa;"> </div>
            			</div>
            			<div class="col-md-9" style="padding:0;">
	            			<select id="color_code_'.$row["default_report_color_id"].'" onchange="change_color_selection('.$row["default_report_color_id"].')" class="browser-default custom-select" name="color_code[]">
	            				<option '.$gre_selected.'>Green</option>
	            				<option '.$red_selected.'>Red</option>
	            				<option '.$amb_selected.'>Amber</option>
	            			</select>
                            <script>change_color_selection('.$row["default_report_color_id"].');</script>
            			</div>
        			</td>
            		<td class="form_left tablehead1">
            			<input name="report_text[]" type="text" class="browser-default form-control" value="'.$row["report_text"].'" />
            		</td>
            	</tr>
            	';
            }
        }
        echo '</table>';
    }
}
$basic_details=new country($db);
$basic_details->update_details();

?>