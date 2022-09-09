<?php 
	session_start();
echo "Hello " . $_SESSION['login'] . " user " . $_SESSION["user"];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: register/halo.php");
    exit;
    }
                                $patid = $_SESSION['patid'];
                                $login = $_SESSION['login'];
				$function = $_GET['function'];
?>
<?php 
	include('database.php');
include('mysqli_connect.php');
		$update = false;
	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
	}
echo "Hello " . $_SESSION['login'] . " user " . $_SESSION["user"];
?>

