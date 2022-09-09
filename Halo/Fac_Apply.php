<?php 
	session_start();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
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
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/fontawesome5/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- Insert -->
<script defer src="/fontawesome5/js/all.js"></script> <!-- load fontawesome 5 script -->
<link rel="stylesheet" href="./css/bootstrap.min.css">
<!--  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
<!--<link rel="stylesheet" href="/menucss/menu.css" type='text/css' />-->
<link rel="stylesheet" href="/menucss/imagename.css" type='text/css' />
<!-- end insert -->
    <style>
      html, body {
      min-height: 100%;
      }
@font-face {

   font-family: 'myRoboto' ;
   src: url('/enquiry/fonts/Roboto/Roboto-Regular.ttf') format('truetype');

}
@font-face {

   font-family: 'myPacifico' ;
   src: url('/enquiry/fonts/Pacifico/Pacifico-Regular.ttf') format('truetype');

}
@font-face {

   font-family: 'myLobster' ;
   src: url('/enquiry/fonts/Lobster/Lobster-Regular.ttf') format('truetype');

}
@font-face {

   font-family: 'myWindsong' ;
   src: url('/enquiry/fonts/WindSong/WindSong-Regular.ttf') format('truetype');

}
@font-face {

   font-family: 'myIndie' ;
   src: url('/enquiry/fonts/Indie_Flower/IndieFlower-Regular.ttf') format('truetype');

}
@font-face {

   font-family: 'myCaveat' ;
   src: url('/enquiry/fonts/Caveat/Caveat-Regular.ttf') format('truetype');

}
@font-face {

   font-family: 'myPalette' ;
   src: url('/enquiry/fonts/Palette_Mosaic/PaletteMosaic-Regular.ttf') format('truetype');

}
      body, div, form, input, select, textarea, p { 
  max-width: 840px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 5px;
  padding-right:5px;
      outline: none;
      font-family: myRoboto, Arial, sans-serif;
      font-size: 14px;
      color: blue;
      background:#CCB76C;
      line-height: 20px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-family: myRoboto, Arial, sans-serif;
      font-size: 34px;
      color:lightgrey;
      z-index: 2;
      }
      h2 {
      position: absolute;
      margin: 0;
      font-family: myIndie, Arial, sans-serif;
      font-size: 32px;
      color: green;
      z-index: 1;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 50%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #333; 
      }
      .banner {
      position: relative;
      height: 175px;
      width:175px;
      background-image: url("/Halo/Images/halo.png");
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
}
      .banner::after {
      content: "";
      background-color: transparent;
      position: relative;
      width: 25%;
      height: 25%;
      }
      .bannerh {
      position: relative;
      height: 50px;
      background-image: url("/Halo/Images/apply_reg.png");      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .bannerh::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      .bannerall1 {
      position: relative;
      height: 50px;
      background-image: url("/Halo/Images/apply_all1.png");      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .bannerall1::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      .bannerall2 {
      position: relative;
      height: 50px;
      background-image: url("/Halo/Images/apply_all2.png");      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .bannerall2::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea, select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(50% - 10px);
      padding: 5px;
      }
      select {
      width: 25%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(50% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: blue;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #333;
      color: #333;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      input[type=radio], input.other {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 10px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      #radio_5:checked ~ input.other {
      display: block;
      }
      input[type=radio]:checked + label.radio:before {
      border: 2px solid #444;
      background: #444;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 7px;
      left: 5px;
      width: 7px;
      height: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 2px;
      text-align: center;
      }
      button {
      width: 125px;
      padding: 5px;
      border: none;
      border-radius: 5px; 
      color: white;
      background: blue;
      font-size: 14px;
      cursor: pointer;
      }
      button:hover {
      color:blue;
      background: lightblue;
      }
      @media (min-width: 512px) {
.body {  max-width: 512px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 1px;
  padding-right:1px;}
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(10% - 20px);
      }
      .Age select {
      width: calc(10% - 8px);
      }
footer {
  width:300px;
  background-color:lightgrey;
  min-height:25px;    
  margin:0 16px;
    padding: 0 20px; 
}
#footer-content {
    background:lightgrey;
  font-size: 10pt;
  width: 250px;
  height:12px;
    padding: 1px 0;
    text-align: left;
    color: blue;
}
#meta-links {
 width:100%;
 background-color:#75f3a1;
 float:right;   
 height:20px;
}
.editbtn {
  background-color: lightgreen;
  border: none;
  color: blue;
  padding: 1px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.editbtn:hover {
  background-color: grey;
 color: blue;
}
.editbtn {
  background-color: lightgreen;
  border: none;
  color: grey;
  padding: 1px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.editbtn:hover {
  background-color: green;
 color: white;
}
.onlinebtn {
  background-color: black;
  border: none;
  color: yellow;
  padding: 1px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.onlinebtn:hover {
  background-color: yellow;
 color: black;
}
.msg {
	color: #D8000C;
	background-color: #FFBABA;
}
.logresbtn {
  background-color: salmon;
  border: none;
  color: blue;
  padding: 2px 4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.logresbtn:hover {
  background-color: lightblue;
 color: orange;
}
.msg {
	color: #D8000C;
	background-color: #FFBABA;
}
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
	<script src="./js/jquery.min.enq.js"></script>
<script src="./js/jquery-3.2.1.slim.min.js"></script>
<script src=".js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>
		$(function() {
		$("#Module").change(function() {
			  $("#Book").load("getbook.php?module=" + $("#Module").val());
			});


});
	</script>

 <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">
</head>

<body>
    <div class="testbox">
<form action="pupphoto_Upload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>


        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
<!--            <button type="button" class="close" data-dismiss="alert">x</button> -->
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>

<!-- menu start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Halo/Fac_Apply.php"><b>Home </b><span class="sr-only">(current)</span></a>
      </li>
<li class="nav-item active"><a class="nav-link text-white active" href="/Halo/Fac_Apply.php?function=capture">Capture Image 📸 </a></li>
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDisplay" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Display 🔍 </a>
        <div class="dropdown-menu" aria-labelledby="navbarDisplay">
          <a class="dropdown-item" href="Fac_Apply.php?function=display">Current List <i class="fas fa-columns" style="color:green;"></i></a>
          <a class="dropdown-item" href="Fac_Apply.php?function=displayex">Discharged List  📝 </a>
          </div>
      </li>
<li class="nav-item active"><a class="nav-link text-white active"href="/Halo/register/logout.php">Logout 🏁 </a></li>
    </ul>
  </div>
</nav>
<!-- menu end  -->


       <div class="banner">
	</div>
	
        <div class="bannerh">
	<h1> Camp Management</h1>
	</div>
<p><font size="4" style="font-size: 12pt" color="green">
Hi <?php echo $login .". "?>Thank you for managing the Camp database online.</font> 

	<input type="hidden" name="patid" value="<?php echo $resid; ?>">
	<input type="hidden" name="login" value="<?php echo $login; ?>">
	<input type="hidden" name="function" value="<?php echo $function; ?>">
	<p>
<!-- <a class="editbtn" type="button" href="Fac_Apply.php?function=capture" target="_self">Capture Image</button></a>
<a class="onlinebtn" type="button" href="Fac_Apply.php?function=display" target="_self">Display</button></a>
<a class="logresbtn" type="button" href="/Halo/register/logout.php" target="_self">Log out/Reset</button></a></p>
<!-- ***  HEADER END *** -->
<?php
     if ($function == "capture") {
     ?>
    <form action="pupphoto_Upload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">


        <?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>


        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>

Please take my picture, <i>(don't forget my name!)</i>
        <div class="row">
            <div class="col-md-6">
                <strong>Patient Name:</strong>
                <input type="text" name="FirstName" required class="form-control" placeholder="Name"></br>
                <strong>Owner Name:</strong>
                <input type="text" name="LastName" required class="form-control" placeholder="Owner">
            </div>
            <div class="col-md-6">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                    <input type="hidden" name="patid" value="<?php echo $patid ?>">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
<!--one-->
    </form> 
<!--one-->
<!--two-->
</form>
<!--two-->
<?php } ?>
<!-- </div> -->
<?php
     if ($function == "display") {
     ?>

<?php $display = mysqli_query($db, "SELECT 
	`Pat_ID` as `ID`,
	`FirstName` as `Title`,
    concat('gallery/Patients/',`FirstName`,`LastName`,'/',`Photo`) as `Image`
FROM 
	`Halo`.`Patients`
WHERE
	isnull(`D_Date`);");
	?>
<table>
<fieldset>
<a class="fset" >Current Patient List:</a>
	<div class='content'>
	<?php while ($row = mysqli_fetch_array($display)) { ?>
		<div class='photo'>
<div class='image'><a href="<?php echo "Data_Entry.php?edit=" . $row['ID'];?>" ><img title="<?php echo $row['Title'];?>" src="<?php echo $row['Image'];?>" style="width:90px;height:90px"></a></div>
			<div class='photo-name'><?php echo$row['Title'];?></div>
			</div>
	<?php } ?>
	<div></div>
	<?php } ?>
<!--one
	</form>
one-->

  	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php
     if ($function == "displayex") {
     ?>

<?php $display = mysqli_query($db, "SELECT 
	`Pat_ID` as `ID`,
	`FirstName` as `Title`,
    concat('gallery/Patients/',`FirstName`,`LastName`,'/',`Photo`) as `Image`
FROM 
	`Halo`.`Patients`
WHERE
	not isnull(`D_Date`);");
	?>
<table>
<fieldset>
<a class="fset" >Discharged Patient List:</a>
	<div class='content'>
	<?php while ($row = mysqli_fetch_array($display)) { ?>
		<div class='photo'>
<div class='image'><a href="<?php echo "Data_Entry.php?edit=" . $row['ID'];?>" ><img title="<?php echo $row['Title'];?>" src="<?php echo $row['Image'];?>" style="width:90px;height:90px"></a></div>
			<div class='photo-name'><?php echo$row['Title'];?></div>
			</div></div>
	<?php } ?>
	<div></div>
	<?php } ?>
	</form>
  	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
<p></div>
	<?php
	if ($function !== "displayex") : ?>

<footer id="footer">
 <div id="footer-content">© 2020-<?php echo date("Y") . "<b><i> HALO </b></i>";?> All Rights Reserved.</div></footer>
	<?php endif ?>

        </form>
	
</body>
</html>

