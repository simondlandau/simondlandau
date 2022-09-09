<?php
define('DB_SERVER','192.168.0.27');
define('DB_USER','itmedia');
define('DB_PASS' ,'send@O8streperous');
define('DB_NAME', 'Jahara');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

