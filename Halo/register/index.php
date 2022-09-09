<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
//	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select ID from Contact_Information where Cont1_EMail='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('This email already exists, please login to view.');</script>";
} else{
// echo "insert into Contact_Information(Cont1_Name,Cont1_EMail,password,Cont1_MNumber) values('$fname','$email','$enc_password','$contact')";
	$msg=mysqli_query($con,"insert into Contact_Information(Cont1_Name,Cont1_EMail,password,Cont1_MNumber) values('$fname','$email','$enc_password','$contact')");

if($msg)
{
	echo "<script>alert('Registered successfully');</script>";
}
}
}

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];

$sql="SELECT * FROM Contact_Information WHERE Cont1_EMail='$useremail' and password='$dec_password';"; 
		$logby = mysqli_query($con,$sql);

		if (count($logby) == 1 ) {
			$n = mysqli_fetch_array($logby);
			$regname = $n['Cont1_Name'];
			$regcontact = $n['Cont1_MNumber'];
	}


$ret= mysqli_query($con,"SELECT * FROM Contact_Information WHERE Cont1_EMail='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['id']=$num['ID'];


echo "password " . $dec_password . " email " . $_SESSION['login'] . " contact " . $regname . " number " . $regcontact . " ID " . $_SESSION['id'];"</br>";
 header("location:/register/view_enquiry.php");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
//header("location:$extra");
exit();
}
}

//Code for Forgot Password

if(isset($_POST['send']))
{
$femail=$_POST['femail'];

$row1=mysqli_query($con,"select Cont1_EMail,password from Contact_Information where Cont1_EMail='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{

$sqls="SELECT 
    MIN(`Cont1_EMail`) as `Cont1_EMail`, `password`, `Cont1_Name`
FROM
    `Contact_Information`
WHERE
not isnull(`password`)
and
    `Cont1_EMail` = '$femail';";

		$send = mysqli_query($con,$sqls);

		if (count($send) == 1 ) {
			$n = mysqli_fetch_array($send);
			$Cont1_Name = $n['Cont1_Name'];
			$Cont1_EMail = $n['Cont1_EMail'];
			$password = $n['password'];
}

	$sqlu="UPDATE send_Reset_pw SET Cont1_Name='$Cont1_Name',  Cont1_EMail='$Cont1_EMail', password='$password' WHERE ID=1";

		mysqli_query($con, $sqlu);

  try {
    $conn = new PDO("mysql:host=localhost;dbname=Jahara", "itmedia", "send@O8streperous");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected to the make database.<br>';

    $sql = "call Jahara.make_Register_reset_pw();";
      $stmt = $conn->prepare($sql);
      $stmt->execute();  
$conn = null;
}
  catch(PDOException $err) {
    echo "ERROR: Unable to connect make: " . $err->getMessage();
  }

  try {
    $conn = new PDO("mysql:host=localhost;dbname=Jahara", "itmedia", "send@O8streperous");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected to the send database.<br>';

    $sql = "CALL send_Reset_pw();";
      $stmt = $conn->prepare($sql);
      $stmt->execute();  
$conn = null;
}
  catch(PDOException $err) {
    echo "ERROR: Unable to connect send: " . $err->getMessage();
  }
echo "check email";
		header('location: /enquiry/register_sent.php?edit='.$NewEnqID);

echo  "<script>alert('Your Password has been sent, please check your email');</script>";
}
else
{
echo "<script>alert('Email not registered with us');</script>";	
}
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Jahara Treatment Centre,Sign up Forms,Registration Forms,"./>
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
}(" - Jahara Application - "));
</script>
 <link rel="shortcut icon" href="/Jahara/Images/jaharaicon.ico" type="image/x-icon">
<link rel="icon" href="/Jahara/Images/jaharaicon.ico" type="image/x-icon">
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
		<h7>Please register & login to complete an online application.</h7>
		<h1>Jahara Treatment Centre</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Forgot Password</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data">
								<p><font size="4" style="font-size: 11pt" >Your Contact Name </font>
								<input type="text" class="text" value=""  name="fname" required >
								<p><font size="4" style="font-size: 11pt" >Email Address</font> 
								<input type="email" class="text" value="" name="email" required>
								<p><font size="4" style="font-size: 11pt" >Password </font>
								<input type="password" value="" name="password" required>
										<p><font size="4" style="font-size: 11pt" >Your Contact No. </font>
								<input type="text" value="" name="contact"  required>
								<div class="sign-up">
									<input type="reset" value="Reset">
									<input type="submit" name="signup"  value="Register" >
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="email" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>

								<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

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
				 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="email" class="text" name="femail" value="" placeholder="Enter your registered email" required  ><a href="#" class=" icon email"></a>
									
										<div class="submit three">
											<input type="submit" name="send" onClick="myFunction()" value="Send Email" >
										</div>
									</form>
									</div>
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>

</body>
</html>
