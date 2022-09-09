<?php 
	session_start();
include('mysqli_connect.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: register/halo.php");
    exit;
    }
?>
<?php
     $function = $_GET["function"];
     $medical_id = $_GET["id"];
     $patid = $_GET["patid"];
     if ($function == "delete") {
          $sql = "delete from `Medication` where `ID` = $medical_id";
          mysqli_query($db, $sql);
       header('Location: Medication.php?edit=' . $patid);
// echo $sql;
     }

?>
