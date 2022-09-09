<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'itmedia');
define('DB_PASSWORD', 'send@AWS');
define('DB_NAME', 'Halo');
define('DB_PORT', '3306');
 
/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,DB_PORT);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
