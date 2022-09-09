<?php 
	session_start();

 //Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login"]) || $_SESSION["user"] !== true){
    header("location: /Halo/register/halo.php");
    exit;
    }
?>
<?php 
include('mysqli_connect.php');
$operator=$_SESSION["id"];
$patid=$_GET["edit"];

?>
<?php

$sql="SELECT Pat_ID, FirstName, LastName, concat(FirstName, '_', left(LastName,1), '_', Pat_ID) as PatName from Halo.Patient where Pat_ID = $patid";
		$photo = mysqli_query($db,$sql);

		if (count($photo) == 1 ) {
			$n = mysqli_fetch_array($photo);
			$FirstName = $n['FirstName'];
			$LastName = $n['LastName'];
			$ResName = $n['PatName'];
			$delid = $n['$patid'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.image.css">
     <link rel="stylesheet" href="js/fancybox/jquery.fancybox.min.css" media="screen">
     <script src="js/jquery.min.image.js"></script>
    <script src="js/fancybox.min.js"></script> 
   <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">

    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
.button {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.button:hover {
  background-color: #f1f1f1;
}
.buttonhome {
  background-color: blue;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.buttonhome:hover {
  background-color: cyan;
}
    </style>
<script>
(function titleScroller(text) {
    document.title = text;
    setTimeout(function () {
        titleScroller(text.substr(1) + text.substr(0, 1));
    }, 500);
}(" - Halo - Images - "));
</script>
	<script src="js/jquery.min.js"></script>
</head>
<body>


<div class="container">

<div style='text-align: center; background: cyan;  
        padding: 10px; font-size: 32px; color: blue'> 
<?php echo "Hi " . $_SESSION['login'] . ". Please take my picture, <i>(don't forget my name)</i>." ?>
</div>

<!--	<script src="/audiojs/audio.min.js"></script>
	<script>
	  audiojs.events.ready(function() {
	    var as = audiojs.createAll();
  	});
</script> 
<div style='text-align: left; background: silver;  
        padding: 1px; font-size: 14px; color: white'> 
Great Southern Land - IceHouse
</div>
<div style="width: 100%; margin: 0 auto;"><audio src="music/Great_Southern_Land" autoplay></div> -->
<a class="buttonhome" href="/Halo/Fac_Apply.php" target="_self">Select Another</a>
<!-- <a class="button" href="admin.php" target="_self">Select Galleries</a> -->

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


        <div class="row">
            <div class="col-md-6">
                <strong>Patient Name:</strong>
                <input type="text" name="FirstName" required class="form-control" placeholder="Title">
                <strong>2nd/owner Name:</strong>
                <input type="text" name="LastName" required class="form-control" placeholder="2nd/owner">
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


    </form> 


    <div class="row">
    <div class='list-group gallery'>


            <?php

            $sql = "SELECT * FROM Halo.Patients where Pat_ID = $patid";

            $images = $db->query($sql);


            while($image = $images->fetch_assoc()){


            ?>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="gallery/Patients/<?php echo $ResName . '/' .$image['Photo'] ?>">
                        <img class="img-responsive" alt="" src="gallery/Patients/<?php echo $ResName . '/' .$image['Photo'] ?>" />
<!--                        <img class="img-responsive" alt="" src="../Enqadd/dd3/images/<?php echo $image['Photo'] ?>" /> -->
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['FirstName'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="patphoto_Delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $image['ID'] ?>">
                    <input type="hidden" name="patid" value="<?php echo $patid ?>">
                    <input type="hidden" name="firstname" value="<?php echo $FirstName ?>">
                    <input type="hidden" name="lastname" value="<?php echo $LastName ?>">
		    <input type='hidden' name='file_name' value="<?php echo $image['Photo'] ?>">
                  <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon"></i>❎</button>
<!--                  <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-search"></i></button> -->
                    </form>
                </div> <!-- col-6 / end -->
            <?php } ?>


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>

