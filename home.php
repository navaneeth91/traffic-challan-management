<?php
   session_start();
   if(!isset($_SESSION['pid'])){
     header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">

	<title>Homepage</title>
	<link rel="icon" href="img/policelogo.png" type="image/png">
	<link rel="shortcut icon" href="img/policelogo.png" type="img/x-icon">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
 </head>

<body>
<nav class="main-nav-outer" id="test">
		<!--main-nav-start-->
		<div class="container">
			<ul class="main-nav">
				<li><a href="#header">Home</a></li>
				<li><a href="login/client.php">Challan</a></li>
				<li class="small-logo"><a href="#header"><img src="img/policelogo.png" height="70" width="70" alt=""></a></li>
				<li><a href="challanreport.php"> Challan Report</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>
	<!--main-nav-end-->
	<header class="header" id="header">
		<!--header-start-->
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src="img/policelogo.png" alt=""></a>
			</figure>
			<h2 style="color: white;"><b>TELANGANA POLICE</b></h2>
			<h1 class="animated fadeInDown delay-07s">WELCOME TO TELANGAN TRAFFIC CONTROL</h1>
			<ul class="we-create animated fadeInUp delay-1s">
				<li><h2 class="text-info">Welcome :<?php echo $_SESSION['pname']; ?> </h2> </li>
			</ul>
			<a class="link animated fadeInUp delay-1s servicelink" href="login/client.php">Challan</a>
			<a class="link animated fadeInUp delay-1s servicelink" href="login/logout.php">Log out</a>
		</div>
	</header>
	<!--header-end-->
</section>
	<!--main-section alabaster-end-->
	<?php include 'footer.php';?>
 </body>

</html>
