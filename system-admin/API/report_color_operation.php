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
        if($default_report_color != "1")
        {
        	$cmd = "DELETE FROM client_default_report_color WHERE client_id = '$client_id' ";
	        $result=$this->conn->query($cmd);

			$cmd = "UPDATE client SET default_report_color = 1 WHERE id = '$client_id' ";
	        $result=$this->conn->query($cmd);
        	
        	$i = 0;
        	foreach ($default_report_color_id as $default_report_color_id_s)
	     	{
	     		$cmd = "INSERT INTO client_default_report_color (client_id, default_report_color_id, color_code, report_text) VALUES('$client_id', '$default_report_color_id_s', '$color_code[$i]', '$report_text[$i]') ";
		        $result=$this->conn->query($cmd);
	     		$i++;
	     	}
        }
        else
        {
        	$cmd = "DELETE FROM client_default_report_color WHERE client_id = '$client_id' ";
	        $result=$this->conn->query($cmd);

			$cmd = "UPDATE client SET default_report_color = 0 WHERE id = '$client_id' ";
	        $result=$this->conn->query($cmd);
        }
        if($client_id == 0)
        {
        	$i = 0;
        	foreach ($default_report_color_id as $default_report_color_id_s)
	     	{
	     		$cmd = "UPDATE default_report_color SET color_code = '$color_code[$i]', report_text = '$report_text[$i]' WHERE default_report_color_id = '$default_report_color_id_s' ";
		        $result=$this->conn->query($cmd);
	     		$i++;
	     	}
        }
    }
}

$basic_details=new country($db);
$basic_details->update_details();

?>