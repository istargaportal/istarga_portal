<?php

require_once "../config/config.php";

$get_connection = new connectdb;
$db = $get_connection->connect();

echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
          <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
            <th>SR.NO.</th>
            <th>Packages</th>
            <th>Country</th>
            <th>Services</th>
            <th>Price</th>
            <th>Action</th>
          </thead>
        ';
$i = 0;
$check='SELECT p.id, p.package_name, c.name FROM package_list p INNER JOIN countries c ON c.id = p.country_id ORDER BY p.id ';
$resul = mysqli_query($db,$check); 
while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
    $all_services = ""; $price = 0; $currency = "";
    $check_1='SELECT s.service_name, s.price, cc.currency FROM service_list s INNER JOIN package_list_service p ON p.service_id = s.id INNER JOIN countries cc ON cc.id = s.currency_id WHERE p.package_id = '.$row["id"].' ';
    $resul_1 = mysqli_query($db,$check_1); 
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        $price = $price + $row_1['price'];
        $currency = $row_1['currency'];
        $all_services.="<a class='btn btn-default btn-small'>".$row_1['service_name']."</a><br>";
    }

    $i++;
    echo '
    <tr>
        <td>'.$i.'</td>
        <td class="form_left">'.$row["package_name"].'</td>
        <td>'.$row["name"].'</td>
        <th>'.$all_services.'</td>
        <th class="form_right">'.$price.' '.$currency.'</td>
        <td>
            <a href="package.php?id='.base64_encode($row["id"]).'" title="Edit Package" class="btn btn-xs btn-round btn-warning"><i class="material-icons icon">create</i></a>
            <a onclick="delete_package('.$row["id"].')" title="Delete Package" class="btn btn-xs btn-round btn-danger"><i class="material-icons icon">delete</i></a>
        </td>
    </tr>
    ';
}

echo '</table>';
?>