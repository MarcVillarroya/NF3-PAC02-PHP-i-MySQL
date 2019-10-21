<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.'); 
mysqli_select_db($db,'carsite') or die(mysqli_error($db));
$paginas = 4; 
if(isset($_GET["pagina"])) { 
    if ($_GET["pagina"]==1){ 
       header("Location:N3P205paginas.php");
    }else { 
       $pagina = $_GET["pagina"];
    }
}else {
  $pagina=1; 
}
$sql_total = "SELECT car_id, car_name, car_type, car_year, car_brand, car_configuration FROM car"; 
$resultado = mysqli_query($db,$sql_total) or die(mysqli_error($db)); 


$num_filas = "SELECT count(*) FROM car"; 
$resultado =  mysqli_query($db,$num_filas) or die(mysqli_error($db));


$row = mysqli_fetch_array($resultado);
$totalRegistres = $row["count(*)"]; 
$total_paginas= ceil($totalRegistres/$paginas); 

echo "Mostrando la pagina " . $pagina. "de " . $total_paginas . "<br>";
$sql_limit =  "SELECT car_id, car_name, car_type, car_year, car_brand, car_configuration FROM car LIMIT ".($pagina-1)*$paginas." ,$paginas";  
$resultado2 = mysqli_query($db,$sql_limit) or die(mysqli_error($db));

while($registro2 = mysqli_fetch_array($resultado2)) {  
	echo "<br> ID: " . $registro2["car_id"] . "Nombre: " . $registro2["car_name"] . $registro2["car_type"] . $registro2["car_year"] . $registro2["car_brand"] . $registro2["car_configuration"] . "</br>";  
}
for($cont1=1; $cont1<=$total_paginas; $cont1++){ 
    if($cont1 == $pagina)
		echo "" . $cont1 .""; 
	else{
		echo "<a href='?pagina="  . $cont1 . "'>" . $cont1 . "</a>  ";
}
}
















?>
        
