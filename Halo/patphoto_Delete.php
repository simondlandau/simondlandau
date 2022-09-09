<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.button:hover {
  background-color: #f1f1f1;
}
.buttonhome {
  background-color: blue;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.buttonhome:hover {
  background-color: cyan;
}
</style>
</head>
<body>

<div style='text-align: center; background: green;  
        padding: 10px; font-size: 32px; color: black'> 
Delete
</div>

<a class="buttonhome" href="/Halo/Fac_Apply.php" target="_self">Menu</a>
<a class="button" href="get_photo.php" target="_self">Select Another</a>
<a class="button" href="halo.php?edit=<?php echo $_POST['patid']; ?>" target="_self">Upload Image</a>


</body>
</html>
<?php 
	session_start();
 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: /Halo/register/halo.php");
    exit;
    }
                                $facid = $_SESSION['facid'];
                                $login = $_SESSION['login'];
?>
<?php 
include('mysqli_connect.php');
$operator=$_SESSION["id"];
$patid = $_POST['$patid'];
require('patphoto_config.php');
$filename = $_POST['file_name'];
$resname=$_POST["resname"];
$patid = $_POST['$patid'];

if(isset($_POST) && !empty($_POST['id']))

{
 $filename = $_POST['file_name'];
 unlink('gallery/Patients/'.$resname.'/'.$filename);
      //  header("Location:resphoto.php");
}
{
#		$sql = "DELETE FROM Photo WHERE ID = $_POST['resid']";
$patid = $_POST['patid'];
		$sql = "UPDATE `Halo`.`Patients` SET `Photo` = NULL WHERE (`Pat_ID` = $patid);";

		$mysqli->query($sql);
//		$_SESSION['success'] = 'Image Deleted successfully.';
echo "<br><div style='text-align: center; background: cyan;  
        padding: 0px; font-size: 20px; color: blue'> 
        Deleted Successfully " . $filename ."</div>"; 
		// header("Location: resphoto.php");

//else{
//	$_SESSION['error'] = 'Please Select Image or Write title';
      //  header("Location:resphoto.php");
}


?>
