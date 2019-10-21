<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS carsite';
mysqli_query($db,$query) or die(mysqli_error($db));

//make sure our recently created database is the active one
mysqli_select_db($db,'carsite') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE car(
        car_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        car_name      VARCHAR(255)      NOT NULL, 
        car_type      TINYINT           NOT NULL DEFAULT 0, 
        car_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        car_brand     VARCHAR(255)      NOT NULL, 
        car_configuration   TINYINT           NOT NULL DEFAULT 0,

        PRIMARY KEY (car_id),
        KEY car_type (car_type, car_configuration) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the movietype table
$query = 'CREATE TABLE cartype ( 
        cartype_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        cartype_label VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (cartype_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the people table
$query = 'CREATE TABLE carconfig( 
        carconfig_id         TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
        carconfig_label VARCHAR(100)     NOT NULL, 
        

        PRIMARY KEY (carconfig_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Car database successfully created!';
?>
