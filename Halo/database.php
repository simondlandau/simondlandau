<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "itmedia";
$password = "send@AWS";
$dbname = "Halo";

	$dbConn = new mysqli($servername, $username, $password, $dbname, 3306) or die('MySQL connect failed. ' . mysqli_connect_error());
	
	function dbQuery($sql) {
		global $dbConn;
		$result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
		return $result;
	}
	
	function dbAffectedRows() {
		global $dbConn;
		return mysqli_affected_rows($dbConn);
	}
	
	function dbFetchArray($result, $resultType = MYSQLI_NUM) {
		return mysqli_fetch_array($result, $resultType);
	}
	
	function dbFetchAssoc($result) {
		return mysqli_fetch_assoc($result);
	}
	
	function dbFetchRow($result) {
		return mysqli_fetch_row($result);
	}
	
	function dbFreeResult($result) {
		return mysqli_free_result($result);
	}
	
	function dbNumRows($result) {
		return mysqli_num_rows($result);
	}
	
	function dbNumFields($result) {
		return mysqli_num_fields($result);
	}
	
	function dbInsertId() {
		global $dbConn;
		return mysqli_insert_id($dbConn);
	}

	function closeConn() {
		global $dbConn;
		mysqli_close($dbConn);
	}
	
/*
* End of file database.php
*/
