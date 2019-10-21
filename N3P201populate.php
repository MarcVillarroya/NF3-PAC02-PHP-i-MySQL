<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'carsite') or die(mysqli_error($db));

// insert data into the movie table
$query = 'INSERT INTO car
        (car_id, car_name, car_type, car_year, car_brand,
        car_configuration)
    VALUES
        (1, "Laferrari", 1, 2016, "Ferrari", 1),
        (2, "Murcielago", 2, 2009, "Lamborghini", 2),
        (3, "LeonFR", 1, 2019, "SEAT", 1),
        (4, "Enzo", 1, 2015, "Ferrari", 2),
        (5, "Huracan", 2, 2019, "Lamborghini", 2),
        (6, "ClioFR", 1, 2007, "SEAT", 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO cartype 
        (cartype_id, cartype_label)
    VALUES 
        (1,"Coupe"),
        (2, "descapotable")';
       
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO carconfig
        (carconfig_id, carconfig_label)
    VALUES
        (1, "Competition"),
        (2, "Exibition")';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>
