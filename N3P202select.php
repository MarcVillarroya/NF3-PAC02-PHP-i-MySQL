<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'carsite') or die(mysqli_error($db));

// select the movie titles and their genre after 1990
$query = 'select car_id, car_name, car_year, car_brand, cartype_label, carconfig_label
from car, cartype, carconfig 
where (car_type=cartype_id) and (car_configuration=carconfig_id)';
      
      
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// show the results
while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	echo $car_id . ' - ' . $car_name . ' - ' .  $car_year . ' - ' . $car_brand . ' - ' .$cartype_label . ' - ' . $carconfig_label . '</br>';
}
?>
