<?php 
	session_start();
$rowid = $_SESSION['rowid'];


$mysqli = new mysqli("localhost","Admin","newpass","Halo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$Dis_Comment = $mysqli -> real_escape_string($_GET['content']);

   $sql = "UPDATE `Halo`.`Patients` SET `Discharge_Comment` = '$Dis_Comment' where `Pat_ID` = $rowid;";

if (!$mysqli -> query($sql)) {
  printf("%d Row inserted.\n", $mysqli->affected_rows);
}

$mysqli -> close();
?>

