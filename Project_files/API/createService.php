
<?php
 require_once "../config/config.php";
//$con = mysqli_connect("localhost","pesrsxttfd","Demo@123","pesrsxttfd");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
   $SerT=$_POST["ServiceT"];
   $ServiceN=$_POST["servicename"];
   $Date=date('Y-m-d');
   $Sr=0;
   
   if($_POST["Action"]=='delete'){
    $service=$_POST["service"];
    $sql = "DELETE FROM `service_list` WHERE `id`='$service'";  
    $result = mysqli_query($db,$sql);
    echo $sql;
    if($result){echo  "deleted-".$service;}else{echo 'error at'.$service;}
}

 
 if($_POST["Action"]=='Add'){
    $sql1 = "SELECT `id` FROM `service_type` WHERE `name`='$SerT'";
    $result1 = mysqli_query($db,$sql1);
    $r =mysqli_fetch_row($result1);
//    echo var_dump($r);
    //echo $sql1;
   if($ServiceN!=NULL){
    $sql = "INSERT INTO `service_list`(`name`, `service_type_id` , `service_creation_date`) VALUES ('$ServiceN','".$r[0]."','$Date')";
    $result = mysqli_query($db,$sql);
    if($result){echo "inserted";}else{echo "error".mysqli_error();}
    echo $sql;
 }
    
}
else if($_POST["Action"]=='edit'){
    $dbid=$_POST["id"];
    //$Service=$_POST["Client"];
    //$Service_Type=$_POST["Country"];
    $country=$_POST["ServiceT"];
    $Currency=$_POST["ServiceN"];
    $Price=$_POST["Price"];
     $sqg="SELECT id FROM `countries` WHERE name ='$country'";
          $res = mysqli_query($db,$sqg);
           $r =mysqli_fetch_row($res);
     var_dump("sad".$r);
         $s = "UPDATE `service_list` SET `country_id`='" .$r[0]. "',`Currency`='" . $Currency . "',`Price`='" . $Price."' WHERE `id`='$dbid'";                                                    
            $result1 = mysqli_query($db,$s);
             echo $s;  
         if($result1){echo  "Edited-".$dbid;}else{echo 'error at'.$dbid;
        
         }  
    }

else if($_POST["Action"]=='Display'){
    
    if($ServiceN == NULL)
    { 
    $sq="SELECT service_list.id AS id, service_list.name AS name, service_type.name AS stname, service_list.Currency AS Currency, `service_list`.`Price` AS `Price`,`service_list`.`country_id` AS `country` FROM 
    service_list INNER JOIN service_type ON service_type.id=service_list.service_type_id WHERE `service_type`.name='$SerT'";
    /*
    $sq="SELECT service_list.id AS id, service_list.name AS name, service_type.name AS stname, 
    countries.name AS country, service_list.Currency AS Currency, `service_list`.`Price` 
    AS `Price` FROM service_list INNER JOIN service_type ON service_type.id=service_list.service_type_id 
    INNER JOIN countries ON countries.id=service_list.country_id WHERE `service_type`.name='$SerT'";*/
    }
    else
    {
    $sq="SELECT service_list.id AS id, service_list.name AS name, service_type.name AS stname, service_list.Currency AS Currency, `service_list`.`Price` AS `Price`,`service_list`.`country_id` AS `country` FROM 
    service_list INNER JOIN service_type ON service_type.id=service_list.service_type_id WHERE `service_type`.name='$SerT' and `service_list`.name='$ServiceN'";
     /*$sq="SELECT service_list.id AS id, service_list.name AS name, service_type.name AS stname, 
    countries.name AS country, service_list.Currency AS Currency, `service_list`.`Price` 
    AS `Price` FROM service_list INNER JOIN service_type ON service_type.id=service_list.service_type_id 
    INNER JOIN countries ON countries.id=service_list.country_id WHERE `service_list`.name='$ServiceN' and `service_type`.name='$SerT'";
     */
     }
	echo '<!-- '.$sq.' -->';
   $resul = mysqli_query($db,$sq); 
   //echo $sq;            
     while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC)){
        $Sr++;
        echo"<tr id='tr$Sr' scope='row'>";
         $sqg="Select name from countries where id=".$row['country']."";
          $res = mysqli_query($db,$sqg);
           $r =mysqli_fetch_row($res);
            echo "<td>" . $Sr. "</td>";
            echo "<td id='cn'>" . $row['name'] . "</td>";
            echo "<td id='co'>" . $row['stname'] . "</td>";
            echo "<td id='countryl'><select id='locality-dropdown' onchange='getpackage(this.value)'
            class='form-control' required ><option >" . $r[0] . "</option></td>";
            echo "<td id='sn' contenteditable='true' class='text-primary'>" . $row['Currency'] . "</td>";
            echo "<td id='sla' contenteditable='true' class='text-primary'>" . $row['Price']. "</td>"; 
            //echo "'editUpdate(".$Sr.",".$row['Id'].");'";
            echo "<td class='text-primary'> <button id='$Sr' type='button' class='btn btn-primary btn-sm' onclick='editUpdate(".$Sr.",".$row['id'].");'";
            echo "'> Edit </button></td>";  
            echo "<td class='text-primary'> <button type='button' class='btn btn-primary btn-sm' onclick='deleteRow(".$row['id'].");'> Delete </button></td>";    
            echo "<td class='text-primary'> <button type='button' class='btn btn-primary btn-sm' onclick='d1(".$row['id'].");'> Add Documents </button></td>";    
            echo "</tr>";}                          
}   
else
{
    echo "Problem";
}
?>
                              
                                
