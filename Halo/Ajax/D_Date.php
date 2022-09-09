<?php 
	session_start();
$rowid = $_SESSION['rowid'];


$mysqli = new mysqli("localhost","itmedia","send@AWS","Halo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$D_Date = $mysqli -> real_escape_string($_GET['content']);

   $sql = "UPDATE `Halo`.`Patients` SET `D_Date` = " . ($D_Date==NULL ? "NULL" : "'$D_Date'") . " where `Pat_ID` = $rowid;";

if (!$mysqli -> query($sql)) {
  printf("%d Row inserted.\n", $mysqli->affected_rows);
}

$mysqli -> close();
?>

