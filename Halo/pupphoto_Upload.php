<?php 
	session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: /Halo/register/halo.php");
    exit;
    }
?>
<?php 
include('mysqli_connect.php');
$operator=$_SESSION["id"];
$login=$_SESSION["login"];
$firstname=$_POST["FirstName"];
$lastname=$_POST["LastName"];
$patname=$_POST["FirstName"] . $_POST["LastName"];
include('patphoto_config.php');
if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['FirstName'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = $_POST['FirstName'].".".$ext;
	$tmp = $_FILES['image']['tmp_name'];

		$sqla = "INSERT IGNORE INTO 
`Halo`.`Patients` (`A_Date`, `FirstName`, `LastName`, `Fac_Name`, `Photo`, `Created`) 
VALUES 
(curdate(), '$firstname', '$lastname', '$login', '$image_name', curdate())
ON DUPLICATE KEY UPDATE `Photo`='$image_name';";
		mysqli_query($db, $sqla); 

echo "sqla " . $sqla;?></br><?php

		$sqlb = "INSERT IGNORE INTO 
`Halo`.`Patients` (`A_Date`, `FirstName`, `LastName`, `Fac_Name`, `Photo`, `Created`) 
VALUES 
(curdate(), '$firstname', '$lastname', '$login', '$image_name', curdate())
ON DUPLICATE KEY UPDATE `Fac_Name`='$login';";
		mysqli_query($db, $sqlb); 
echo "sqlb " . $sqlb;?></br>
<?php
$program3="mkdir ./gallery/Patients/";
	$str3=$program3 . $patname;

//    echo $InFile . "</br>";
  //  echo $str3 . "</br>";
    $Result=exec($str3, $output, $return);
    
//    echo $str3 . "</br>";
  //  echo $return . "</br>";

	if(move_uploaded_file($tmp, './gallery/Patients/'.$patname.'/'.$image_name)){

$program="chmod 777 ./gallery/Patients/".$patname."/";
    $str=$program . $image_name;
    
//    echo $InFile . "</br>";
  //  echo $str . "</br>";
    $Result=exec($str, $output, $return);
    
//    echo $output . "</br>";
  //  echo $return . "</br>";
    
$program2="/bin/bash ./gallery/Patients/scale_crop.sh ./gallery/Patients/".$patname."/";
	$str2=$program2 . $image_name;

//    echo $InFile . "</br>";
  //  echo $str2 . "</br>";
    $Result=exec($str2, $output, $return);
    
//    echo $output . "</br>";
  //  echo $return . "</br>";

		$_SESSION['success'] = 'Image Uploaded successfully.';
?></br><?php
		 header("location: Fac_Apply.php?function=display");
	}else{
		$_SESSION['error'] = 'image uploading failed';
echo $sql;?></br><?php
		 header("location: Fac_Apply.php?function=display");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
echo $sql;?></br><?php
	 header("location: Fac_Apply.php?function=display");
}


?>
