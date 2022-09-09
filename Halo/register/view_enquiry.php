<?php
session_start();
include'admin/dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:index.php');
  } else{
$Cont1_EMail = $_SESSION['login'];
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$_GET['id']=="";
unset($_GET['id']);
$msg=mysqli_query($con,"UPDATE `Jahara`.`Enquiry` SET `Keep` = '3' WHERE (`ID` = $adminid);");
if($msg)
{
$_GET['id']=="";
unset($_GET['id']);
echo "<script>alert('Enquiry removed');</script>";
//header:('location:view_enquiry.php');
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
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
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/fontawesome/css/all.css" rel="stylesheet" />
	 <link href="admin/assets/css/style.css" rel="stylesheet">
    <link href="admin/assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Jahara Treatment Centre - Enquiries</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="sub-menu">
                      <a href="/enquiry/apply_register.php?edit=<?php echo $_SESSION['id']?>" >
<!--                          <i class="fa fa-users"></i> -->
                          <span><font size="4" style="font-size: 12pt" ><b><i> 🆕 New Enquiry</font></b></i>
                      </a>
                  </li>
                  <li class="mt">
                      <a href="logout.php">
                         <i class="fa fa-directions"></i>
                          <span>Logout</span>
                      </a>
                  </li>

              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Enquiries</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All <?php echo $Cont1_EMail;?>'s Enquiries </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> File No.</th>
                                  <th class="hidden-phone"> Contact</th>
                                  <th> Number</th>
                                  <th> First Name</th>
                                  <th> LastName</th>
                                  <th> Enquiry Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select 
	`ID`,
    date_format(`EDate`, '%d-%M-%Y') as `EDate`,
		(select
			`ID_Res_ID`
		from
			`ID_Res_ID`
		where
			`ID_Res_ID`.`Enq_ID` = `Enquiry`.`ID`) as `ID_Res_ID`,
	`FirstName` as `FirstName`,
    `LastName` as `LastName`,
	(select
		`Cont1_Name`
	from
		`Contact_Information`
	where
		`Contact_Information`.`Enq_ID` = `Enquiry`.`ID`) as `Cont1_Name`,
	(select
		`Cont1_MNumber`
	from
		`Contact_Information`
	where
		`Contact_Information`.`Enq_ID` = `Enquiry`.`ID`) as `Cont1_MNumber`

from 
    `Enquiry`
where 
	`Enquiry`.`Keep` = 1
and 
isnull(`Enquiry`.`Resident_Number`)
and
	(select
		`Cont1_EMail`
	from
		`Contact_Information`
	where
		`Contact_Information`.`Enq_ID` = `Enquiry`.`ID`) = '$Cont1_EMail';");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $row['ID_Res_ID'];?></td>
                                  <td><?php echo $row['Cont1_Name'];?></td>
                                  <td><?php echo $row['Cont1_MNumber'];?></td>
                                  <td><?php echo $row['FirstName'];?></td>
                                  <td><?php echo $row['LastName'];?></td>  <td><?php echo $row['EDate'];?></td>
                                  <td>
                                     
                                     <a href="../enquiry/apply_web.php?edit=<?php echo $row['ID'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pen-nib"></i></button></a>
                                     <a href="view_enquiry.php?id=<?php echo $row['ID'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to remove this Enquiry');"><i class="fa fa-trash-alt "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="admin/assets/js/jquery.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="admin/assets/js/common-scripts.js"></script>
//  <script>
  //    $(function(){
    //      $('select.styled').customSelect();
      //});

  //</script>

  </body>
</html>
<?php } ?>
