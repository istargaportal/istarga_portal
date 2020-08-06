<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$country = $_POST['country'];
echo '<select multiple="" name="service_id[]" class="chosen-select" required>';
$sq="SELECT s.id, s.service_name FROM service_list s INNER JOIN service_type st ON st.id = s.service_type_id INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cc ON cc.id = s.currency_id WHERE s.country_id = ".@$country." ORDER BY s.id ";
$resul = mysqli_query($db,$sq); 
while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
	echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
}
echo '</select>';
echo '
<script>
  $(".chosen-select").chosen();
</script>
';

?>