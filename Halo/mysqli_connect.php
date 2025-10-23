<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "";
$password = "";
$dbname = "Halo";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname, 3306);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
    
    echo "mysqli ";
}
?>
