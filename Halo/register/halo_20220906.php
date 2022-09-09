<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('dbconnection.php');
//Code for Registration 

// Code for login 
if(isset($_POST['login']))
{
$username=$_POST['uname'];
$password=$_POST['password'];
$_SESSION['login']=$_POST['uname'];
$_SESSION['patid']=$password;
$_SESSION['user']=true;
$sql="SELECT * FROM Facilitators WHERE FirstName='$username' and password='$password';"; 
		$logby = mysqli_query($con,$sql);
			$n = mysqli_fetch_array($logby);
			$regname = $n['FirstName'];
			$regcontact = $n['password'];

$ret= mysqli_query($con,"SELECT * FROM Facilitators WHERE FirstName='$username' and password='$password';");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['uname'];
$_SESSION['id']=$num['ID'];


 header("location:/Halo/factest.php");
exit();
}
else {
echo "<script>alert('Invalid username or password');</script>";
$extra="welcome.php";
header("location:$extra");
exit();
}
}

//Code for Forgot Password


?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="HALO,Sign up Forms,Registration Forms,"./>
<style>
@font-face {

   font-family: 'myIndie' ;
   src: url('/enquiry/fonts/Indie_Flower/IndieFlower-Regular.ttf') format('truetype');

}
</style>
<script>
(function titleScroller(text) {
    document.title = text;
    setTimeout(function () {
        titleScroller(text.substr(1) + text.substr(0, 1));
    }, 500);
}(" - HALO Application - "));
</script>
 <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
		<h7>Please Login to Manage Camps.</h7>
		<h1>HALO Patients</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
<!--			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span></li> -->
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
<!--				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Forgot Password</span></li> -->
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="login" action="" method="post">
								<input type="text" class="uname" name="uname" value="" placeholder="Enter your First Name"  ><a href="#" class=" icon email"></a>

								<input type="password" value="" name="password" placeholder="Enter your File No."><a href="#" class=" icon lock"></a>

								<div class="p-container">
								
									<div class="submit two">
									<input type="submit" name="login" value="Log In" >
									</div>
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		

</body>
</html>
