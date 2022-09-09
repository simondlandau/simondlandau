<?php 
	session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 //Check if the user is logged in, if not then redirect him to login page
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
		$_SESSION['rowid'] = $ID;
		$update = true;
	}
?>
	<?php			
$sql="SELECT 
	`Status`,
	DATE(`A_Date`) as `A_Date`,
	DATE(`D_Date`) as `D_Date`,
	`FirstName` as `Title`,
	`LastName`,
	`Fac_Name`,
	`Treatment_Type`,
	`Admission_Comment`,
	`Discharge_Comment`,
	`Created`,
	`Photo`,
    concat('gallery/Patients/',`FirstName`,`LastName`,'/',`Photo`) as `Image`
FROM 
	`Halo`.`Patients`
WHERE
	`Pat_ID` = $ID;"; 
		$logby = mysqli_query($db,$sql);
	$n = mysqli_fetch_array($logby);
	$Status = $n['Status'];
	$A_Date = $n['A_Date'];
	$D_Date = $n['D_Date'];
	$Title = $n['Title'];
	$LastName = $n['LastName'];
	$Fac_Name = $n['Fac_Name'];
	$Treatment_Type = $n['Treatment_Type'];
	$Admission_Comment = $n['Admission_Comment'];
	$Discharge_Comment = $n['Discharge_Comment'];
	$Created = $n['Created'];
	$Photo = $n['Photo'];
	$Image = $n['Image'];

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/fontawesome5/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script defer src="/fontawesome5/js/all.js"></script> <!-- load fontawesome 5 script -->
<link rel="stylesheet" href="./css/bootstrap.min.css">
<!--  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> --> 
<!--<link rel="stylesheet" href="/menucss/menu.css" type='text/css' />-->
<link rel="stylesheet" href="/menucss/imagename.css" type='text/css' />

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
      background-image: url(<?php echo $Image; ?>);
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
      @media (min-width: 1024px) {
.body {  max-width: 1024px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right:10px;}
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .Age select {
      width: calc(50% - 8px);
      }
footer {
  width:100%;
  background-color:lightgrey;
  min-height:25px;    
}
.column {
  width:30%;
  background-color:lightgrey;
  height:65px;
  float:left;
  margin:0 10px;
}
#footer-content {
    background:#CCB76C;
  font-size: 10pt;
  height:10px;
    padding: 1em 0;
    text-align: center;
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
  padding: 5px 5px;
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
.menubtn {
  background-color: lightblue;
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

.menubtn:hover {
  background-color: grey;
 color: blue;
}
  #Status {
    background-color:#F5F5F5;
    color:black;
    outline:2px double #FF6A6A;
    width:250px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Status:focus {
    background-color:#DCE3E9;
       outline: 2px double #0090D2;
    width:250px;
    height:20px;
    font-size:12px;
}

  #A_Date {
    background-color:grey;
    color:white;
    outline:2px double #FF6A6A;
    width:125px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#A_Date:focus {
    background-color:grey;
       outline: 2px double #0090D2;
    width:125;
    height:20px;
    font-size:12px;
}
  #D_Date {
    background-color:#F5F5F5;
    color:black;
    outline:2px double #FF6A6A;
    width:125px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#D_Date:focus {
    background-color:#DCE3E9;
       outline: 2px double #0090D2;
    width:125;
    height:20px;
    font-size:12px;
}
  #Fac_Name {
    background-color:#F5F5F5;
    color:black;
    outline:2px double #FF6A6A;
    width:250px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Fac_Name:focus {
    background-color:#DCE3E9;
       outline: 2px double #0090D2;
    width:250px;
    height:20px;
    font-size:12px;
}
  #Treatment_Type {
    background-color:#F5F5F5;
    color:black;
    outline:2px double #FF6A6A;
    width:250px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Treatment_Type:focus {
    background-color:#DCE3E9;
       outline: 2px double #0090D2;
    width:250px;
    height:40px;
    font-size:12px;
}
  #Adm_Comment {
    background-color:#F5F5F5;
    color:black;
    outline:2px double #FF6A6A;
    width:250px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Adm_Comment:focus {
    background-color:#DCE3E9;
       outline: 2px double #0090D2;
    width:250px;
    height:40px;
    font-size:12px;
}
  #Dis_Comment {
    background-color:#F5F5F5;
    color:black;
    outline:2px double #FF6A6A;
    width:250px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Dis_Comment:focus {
    background-color:#DCE3E9;
       outline: 2px double #0090D2;
    width:250px;
    height:40px;
    font-size:12px;
}
  #Created {
    background-color:grey;
    color:white;
    outline:2px double #FF6A6A;
    width:125px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Created:focus {
    background-color:grey;
       outline: 2px double #0090D2;
    width:125;
    height:20px;
    font-size:12px;
}

    </style>
<script>
(function titleScroller(text) {
    document.title = text;
    setTimeout(function () {
        titleScroller(text.substr(1) + text.substr(0, 1));
    }, 500);
}(" - HALO Data Entry - "));
</script>
	<script src="./js/jquery.min.enq.js"></script>
<!--<script src="/Jahara/js/jquery-3.2.1.slim.min.js"></script> -->
<script src=".js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

 <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">
</head>

<body>
    <div class="testbox">
<form id="DataForm" action="dataentryserver.php" class="form" method="POST">

<!--       <div class="banner">
	</div> -->
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
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDisplay" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Display 🔍 </a>
        <div class="dropdown-menu" aria-labelledby="navbarDisplay">
          <a class="dropdown-item" href="Fac_Apply.php?function=display">Current List <i class="fas fa-columns" style="color:green;"></i></a>
          <a class="dropdown-item" href="Fac_Apply.php?function=displayex">Discharged List  📝 </a>
          </div>
	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarMedical" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Treatment 💊 </a>
        <div class="dropdown-menu" aria-labelledby="navbarMedical">
          <a class="dropdown-item" href="Medication.php?edit=<?php echo $ID; ?>">Medication <i class="fas fa-columns" style="color:green;"></i></a>
          <a class="dropdown-item" href="Fac_Apply.php?function=displayex">Innoculations  📝 </a>
          <a class="dropdown-item" href="Fac_Apply.php?function=displayex">Procedures  🆘 </a>
          </div>
      </li>
<li class="nav-item active"><a class="nav-link text-white active"href="/Halo/register/logout.php">Logout 🏁 </a></li>
    </ul>
  </div>
</nav>
<!-- menu end  -->

<div class='image'><a href="<?php echo $Image;?>"><img title="Image - <?php echo $Title;?>" src="<?php echo $Image;?>" style="width:175px;height:175px"></a></div>
			

        <div class="bannerh">
	<h1> Data Entry</h1>
	</div>
<p>
	<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt" color="lightgreen"><?php echo "<b>Name: </b><i>" . $Title  . "</i><b> Owner: </b><i>" . $LastName .  "<br><b></i><br>Admitted by: </b><i>" . $Fac_Name . "<b></i> On: " . $A_Date . "</font></i>" ?>

	<table>
<td>  <label for="Status"><strong>Status<strong></label></td>
<td><input type="text" id="Status" name="Status" onchange="saveStatus(this);" value="<?php echo $Status; ?>"></td>
<tr></tr>
	<script>
	function saveStatus(object){   
    $.ajax({
        url: '/Halo/Ajax/Status.php',
        data: 'content=' + object.value,
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(response){
            // A response to say if it's updated or not
 //           alert(response);
        }
    });   
}

</script>

<td>  <label for="A_Date"><strong>Admission<strong></label></td>
<td><input type="Date" id="A_Date" name="A_Date" readonly value="<?php echo $A_Date; ?>"></td>
<tr></tr>
<td>  <label for="D_Date"><strong>Discharge<strong></label></td>
<td><input type="Date" id="D_Date" name="D_Date" onchange="saveD_Date(this);" value="<?php echo $D_Date; ?>"></td>
<tr></tr>
	<script>
	function saveD_Date(object){   
    $.ajax({
        url: '/Halo/Ajax/D_Date.php',
        data: 'content=' + object.value,
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(response){
            // A response to say if it's updated or not
 //           alert(response);
        }
    });   
}

</script>

<td>  <label for="Fac_Name"><strong>Facilitator<strong></label></td>
	<script>
	function saveFac_Name(object){   
    $.ajax({
        url: '/Halo/Ajax/Fac_Name.php',
        data: 'content=' + object.value,
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(response){
            // A response to say if it's updated or not
 //           alert(response);
        }
    });   
}

</script>
<td><input type="text" id="Fac_Name" name="Fac_Name" onchange="saveFac_Name(this);" value="<?php echo $Fac_Name; ?>"></td>
<tr></tr>
<td>  <label for="Treatment_Type"><strong>Treatment on Admission<strong></label></td>
<td>  <textarea id="area" name="Treatment_Type" onchange="saveTreatment_Type(this);" value="<?php echo $Treatment_Type ?>"><?php echo $Treatment_Type ?>
</textarea>
</td>
<tr></tr>
	<script>
	function saveTreatment_Type(object){   
    $.ajax({
        url: '/Halo/Ajax/Treatment_Type.php',
        data: 'content=' + object.value,
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(response){
            // A response to say if it's updated or not
 //           alert(response);
        }
    });   
}

</script>

<td>  <label for="Adm_Comment"><strong>Admission Comment<strong></label></td>
<td>  <textarea id="area" name="Adm_Comment" onchange="saveAdm_Comment(this);" value="<?php echo $Admission_Comment ?>"><?php echo $Admission_Comment ?>
</textarea>
</td>
<tr></tr>
	<script>
	function saveAdm_Comment(object){   
    $.ajax({
        url: '/Halo/Ajax/Adm_Comment.php',
        data: 'content=' + object.value,
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(response){
            // A response to say if it's updated or not
 //           alert(response);
        }
    });   
}

</script>

<td>  <label for="Dis_Comment"><strong>Discharge Comment<strong></label></td>
<td>  <textarea id="area" name="Dis_Comment" onchange="saveDis_Comment(this);" value="<?php echo $Discharge_Comment ?>"><?php echo $Discharge_Comment ?>
</textarea>
</td>
<tr></tr>
	<script>
	function saveDis_Comment(object){   
    $.ajax({
        url: '/Halo/Ajax/Dis_Comment.php',
        data: 'content=' + object.value,
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(response){
            // A response to say if it's updated or not
 //           alert(response);
        }
    });   
}

</script>

<td>  <label for="Created"><strong>Created<strong></label></td>
<td><input type="Date" id="Created" name="Created" readonly value="<?php echo $Created; ?>"></td>
<tr></tr>
</table>
<!-- <a class="menubtn" type="button" href="Fac_Apply.php" target="_self">Menu</button></a> -->
            </div>
        </div>

    </form> 
    
  	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
<footer id="footer">
  <div id="footer-content">© 2020-<?php echo date("Y");?> HALO </a> All Rights Reserved.</div></div>
</footer>
	
</body>
</html>

