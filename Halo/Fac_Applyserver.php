
<?php 
	session_start();
 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: register/halo.php");
    exit;
    }
?>
<?php 
include('mysqli_connect.php');
	// initialize variables
                                $patid = $_SESSION['patid'];
                                $login = $_SESSION['login'];
                                
$sql="INSERT INTO Halo.Patients
(Fac_Name, Created)
VALUES
('$login', curdate());";
 
//		mysqli_query($db, $sql);
		echo $sql . "<br>";
		echo "<b> used" . $login . "</b>"; 
		
$sqlpat="select
	max(`Pat_ID`) as `newpatid`
from
	`Halo`.`Patients`;";

 $result = mysqli_query($db,$sqlpat);

if (count($result) == 1 ) {
			$n = mysqli_fetch_array($result);
			$newpatid = $n['newpatid'];
	}

		echo $sqlpat . "<br>";
		echo "<b> patid = " . $newpatid . "</b>"; 

//  $botToken="bot1851450590:AAHSOVhydiqa0-a9BbOomOoYXLfrAY8nEWQ";
//  $website="https://api.telegram.org/".$botToken;
//  $chatId=-1001451579017;  //** ===>>>Group ID !!!**
//  $chatId=1458739809;  //** ===>>>My ID!!!**
//  $params=[
//      'chat_id'=>$chatId, 
//      'text'=>  " 📚 Step Work Module " . $Title . " has been //requested by " . $login . " on " . $reqdate,
// ];
//  $ch = curl_init($website . '/sendMessage');
//  curl_setopt($ch, CURLOPT_HEADER, false);
//  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//  curl_setopt($ch, CURLOPT_POST, 1);
//  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
//  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//  $result = curl_exec($ch);
//  curl_close($ch);


		header('location: pupphoto.php?edit=' . $newpatid);

?>
