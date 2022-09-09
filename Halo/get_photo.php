<?php 
	session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("location: /Halo/register/halo.php");
    exit;
}
?>
<?php 
include('mysqli_connect.php');
$operator=$_SESSION["id"];

?>
<!DOCTYPE html>
<html>
<head>
<style>
body, html {
  height: 100%;
  color: <?php echo $bgtext ?>;
  background-color: transparent;
  
 /*     padding: 5px; */
}
  
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("<?php echo "Images/halo.png" ?>");
  /*background-image: url("uploads/night.jpg");*/
  background-repeat: no-repeat;
  background-attachment: fixed;
  /*background: rgba(0, 151, 19, 0.3);*/

  /* Control the height of the image */
  min-height: 640px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: grey;
}

.input-group
  #EDesc {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#EDesc:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
  #Incident {
    background-color:lightgrey;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Incident:focus {
    background-color:lightblue;
    width:500px;
    height:200px;
    font-size:12px;
}
  #Previous {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Previous:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
  #PsychEval {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#PsychEval:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
  #DetoxDetail {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#DetoxDetail:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
  #EmpDetail {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    font-size:12px;
    height:20px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#EmpDetail:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
  #LegalDetail {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#LegalDetail:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
  #Notes {
    background-color:transparent;
    color:black;
    border: black;
    outline:1;
    width:150px;
    height:20px;
    font-size:12px;
    transition:height .5s;
    -webkit-transition:height .5s;
}
#Notes:focus {
    background-color:lightgrey;
    width:250px;
    height:40px;
    font-size:12px;
}
.input-group input
{ background-color: transparent;}

.buttonstep {
  background-color: lightblue;
  border: none;
  color: grey;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}


.buttonstep:hover {
  background-color: blue;
 color: white;
}

.buttonmenu {
  background-color: #C1F0D8;
  border: none;
  color: #0A522D;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}


.buttonmenu:hover {
  background-color: #0A522D;
 color: #C1F0D8;
}

.btn {
  background-color: grey;
  border: none;
  color: blue;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}


.btn:hover {
  background-color: cyan;
 color: grey;
}
.delbtn {
  background-color: orange;
  border: none;
  color: white;
  padding: 1px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}


.delbtn:hover {
  background-color: red;
 color: grey;
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
</style>
<script>
(function titleScroller(text) {
    document.title = text;
    setTimeout(function () {
        titleScroller(text.substr(1) + text.substr(0, 1));
    }, 500);
}(" - HALO - Select to Capture Images - "));
</script>
	<script src="js/jquery.min.js"></script>

 <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">
    </head>

    <body>
<div class="bg-img">
<p>

    <h1>Select Patient to Capture Image</h1><a class="buttonmenu" href="/Jahara/call_Jahara_menu.php" target="_self">Menu</a>
<?php

include("mysqli_connect.php");

?>
<?php $results = mysqli_query($db, "SELECT 
	`ID`,
	`Resident_Number`,
	`FirstName`,
	`LastName`,
    concat('/gallery/Residents/', `FirstName`, '_', left(`LastName`,1), '_', `Resident_Number`, '/') as `imagepath`,
		(select
		`Photo`
	from
		`Photo`
	where
		`Photo`.`Res_ID` = `Enquiry`.`Resident_Number`) as `Image`,
    	(select
		`CFName`
	from
		`Jahara`.`Councillors`
	where
		`Councillors`.`ID` = `Enquiry`.`Enq_Officer`) as `Enq_Officer`
		from
	`Jahara`.`Enquiry`
	where `Jahara`.`Enquiry`.`Resident_Number` is not null
		order by `Enquiry`.`FirstName`, `Enquiry`.`FirstName` asc;"); ?>

<table>
	<thead>
		<tr>
			<th colspan="2">Name</th>
			<th>Officer</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['FirstName']; ?></td>
			<td><?php echo $row['LastName']; ?></td>
			<td><?php echo $row['Enq_Officer']; ?></td>
			<td><img title="Image - <?php echo $row['FirstName'];?>" src="<?php echo $row['imagepath'] . $row['Image'];?>" style="width:25px;height:25px" /></td>
			<td>
				<a href="/enquiry/resphoto.php?edit=<?php echo $row['Resident_Number']; ?>" class="editbtn" >Get Image</a>
			</td>
		</tr>
	<?php } ?>
</table>

</container>
  
  </div>
 </body>

