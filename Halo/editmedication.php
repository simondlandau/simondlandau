<?php 
	session_start();

	include('database.php');
include('mysqli_connect.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: register/halo.php");
    exit;
    }
				$function = $_GET['function'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">
</head>
<style>
footer {
  height: 25px; /* the footer's total height */
    background:#CCB76C;
    text-align: center;
    color: blue;
}
  #edited_Details {
    background-color:lightblue;
    color:black;
    border: black;
    outline:1;
    width:900px;
    height:60px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#edited_Details:focus {
    background-color:white;
    color:black;
    width:900px;
    height:60px;
    font-size:12px;
}

  #new_Details {
    background-color:lightblue;
    color:black;
    border: black;
    outline:1;
    width:900px;
    height:60px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#new_Details:focus {
    background-color:white;
    color:black;
    width:900px;
    height:60px;
    font-size:12px;
}

</style>
<?php

?>
<div class="container">
<div class="col-sm-3 head"><div class="float-centre"><img src="/Halo/Images/halo.png" name="Halo_Logo" align="bottom" width="125" height="94" border="0"/>
    
    <a href="Medication.php?edit=<?php echo $_GET['patid']; ?>" target="_self" class="btn btn-info">Reset</a>    <div class="col-sm-12">
 <div class="alert alert-success">Please Enter New Information</div>
</div>
<?php
$function = $_GET["function"];
if ($function == "edit") {
$medical_id = $_GET["id"];
$patid = $_GET["patid"];

$sql="SELECT Fac_Name from Patients where Pat_ID = $patid;"; 
		$logby = mysqli_query($db,$sql);
			$n = mysqli_fetch_array($logby);
			$Fac_Name = $n['Fac_Name'];


echo "<form action='editmedication.php?function=edited' method='POST'>";
echo "<table class='table table-striped table-bordered'>";
$sql = "select 
    `Med_Date`,
    `Medication`,
    `ID`
from 
	`Medication` 
where
	`ID` = $medical_id
order by 
	`Medication`.`Med_Date`;";
$stmt = mysqli_query($db, $sql);
while ($row = mysqli_fetch_row($stmt)) {
$Tdate = date("Y-m-d\TH:i:s", strtotime($row[0]));
echo "<tr>";
echo "  <td>Date</td>";
echo "  <td><input type='datetime-local' name='edited_Date' value='".$Tdate."'/></td>"; // changeable
echo "</tr>";

echo "<tr>";
echo "  <td>Medication</td>";
echo "  <td><input type='textarea' id='edited_Medication' name='edited_Medication' value='".$row[1]."'/></textarea></td>"; // changeable
echo "</tr>";

echo "</tr>";
echo "</table>";

}
echo "</table>";
echo "<input name='medical_id' value='$medical_id' type='hidden'/>";
echo "<input name='patid' value='$patid' type='hidden'/>";
echo "<input name='Update' value='Update' type='submit'/>";
echo "</form>";
}
if ($function == "edited") {
$patid = $_POST["patid"];
$edited_Date = $_POST["edited_Date"];
$edited_Medication = $_POST["edited_Medication"];
$medical_id = $_POST["medical_id"];
$edited_Date = !empty($edited_Date) ? "$edited_Date" : "NULL";
$sql="SELECT Fac_Name from Patients where Pat_ID = $patid;"; 
		$logby = mysqli_query($db,$sql);
			$n = mysqli_fetch_array($logby);
			$Fac_Name = $n['Fac_Name'];
$sql = "update `Medication` set `Med_Date` = '$edited_Date', `Medication` = '$edited_Medication', `Facilitator` = '$Fac_Name' where ID = $medical_id";
echo "last sql " . $sql;
mysqli_query($db, $sql);
 header('Location: Medication.php?edit=' . $patid);
}

if ($function == "new") {
$patid = $_GET["patid"];

echo "<form action='editmedication.php?function=new_done' method='POST'>";
echo "<table class='table table-striped table-bordered'>";
echo "<tr>";
echo "  <td>Medication";
echo "  <td><textarea id='new_Medication' name='new_Medication' value=''/></textarea></td>"; // changeable
echo "</tr>";

echo "</table>";

echo "<input name='patid' value='$patid' type='hidden'/>";
echo "<input name='Save' value='Insert' type='submit'/>";
echo "</form>";
}


if ($function == "new_done") {
$patid = $_POST["patid"];
$new_Medication = $_POST["new_Medication"];
$sql = "insert into `Medication` 
	(`Pat_ID`, 
	`Med_Date`,
	`Medication`, 
	`Facilitator`) 
values 
	($patid, 
	now(),
	'$new_Medication',
    (select
		`Fac_Name`
	from
		`Patients`
	where
		`Patients`.`Pat_ID` = $patid));";
echo $sql;
mysqli_query($db, $sql);
 header('Location: Medication.php?edit=' . $patid);
}


?>
