<?php



$con = mysqli_connect("localhost","root","","bgv");

$filename=explode(".",$_FILES['file']['name']);
$allowed_Extension=array("csv");
$extension=end($filename);

if(in_array($extension,$allowed_Extension))
{
    $filedata=fopen($_FILES['file']['tmp_name'],"r");
    fgetcsv($filedata);
    while($row=fgetcsv($filedata))
    {
        $name=$row[0];
        $email=$row[1];

        $query='INSERT INTO example SET `name`="'.$name.'",`email`="'.$email.'"';
        mysqli_query($con,$query);
    }
}
else
{
    echo "Error2";
}


























/*$getdata=file_get_contents("php://input");
$data=json_decode($getdata,true);


if(isset($data['country_id']))
{
    //echo $data['state_id'];

    $state['id']="1";
    $state['state_code']="101";
    $state['state_name']="option 1";
    $state['phonecode']="10";


    $state['id']="2";
    $state['state_code']="102";
    $state['state_name']="Option 2";
    $state['phonecode']="11";

    $state['id']="3";
    $state['state_code']="103";
    $state['state_name']="option 3";
    $state['phonecode']="12";
    
    echo json_encode($state);
}
else
{
    echo "Not found";
}
*/

//var_dump($_POST);
//echo $_POST['user_id'];
//var_dump($_FILES);
/*if(isset($_FILES["myfiles"]))
{
    foreach($_FILES["myfiles"]["tmp_name"] as $key=>$value){
        $targetpath="uploads/" . basename($_FILES["myfiles"]["name"][$key]);
        move_uploaded_file($value,$targetpath);
    }
}
*/
 //echo $_POST['select-country-service'];
//foreach($getdata as $key=>$val){
  //  echo "$key=>$val \n";  
//}
//print_r($_FILES[$getdata['file']]);
//var_dump($getdata['file']);
//$targetpath="API/";
/*        if(move_uploaded_file($getdata['file'],$targetpath)){
            echo "1";
        }
        else{
            echo "0";
        }
*/
//var_dump($_FILES);  
//var_dump($getdata);
//var_dump($abc);
//var_dump($getdata['file']);
//var_dump($_FILES[$getdata['file']]);
?>