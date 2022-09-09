<?php
session_start();
//if (strlen($_SESSION['id']==0)) {
 // header('location:logout.php');
  //} else{
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<script>
(function titleScroller(text) {
    document.title = text;
    setTimeout(function () {
        titleScroller(text.substr(1) + text.substr(0, 1));
    }, 500);
}(" - HALO Error - "));
</script>
 <link rel="shortcut icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<link rel="icon" href="/Halo/Images/halo.ico" type="image/x-icon">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Error !</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><?php echo $_SESSION['login'];?></a>
                    </li>
                    <li>
                        <a href="resident.php">Retry</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1><font color="red">Error!</font></h1>
            <p><font color="olive"><i><?php echo $_SESSION['login'] . "</i>,  There is an error with your details. ";?><br>
            Please use your First Name as your User Name, and your HALO facilitator File Number as your password.<br><br>
            If you  are unsure of your File Number, please ask Laura.</p>
            <p><a  href="halo.php" class="btn btn-primary btn-sml">Retry </a>
            </p>
        </header>

        <hr>


      


        </div>

        <hr>


    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

