<?php
include('action.php');
if (!isset($_SESSION['pid'])) {
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<title>Challan page</title>
	<link rel="icon" href="img/policelogo.png" type="image/png">
	<link rel="shortcut icon" href="img/policelogo.png" type="img/x-icon">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
 </head>
<body>
	<header class="header" id="header">
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src="img/policelogo.png" alt=""></a>
			</figure>
			<h2 style="color: white;"><b>TELANGANA  POLICE</b></h2>
			<div class="container mt-5 mb-5">
  	     <div class="card">
  	     	<div class="card-header bg-success">
  	     		<h2 class="text-white text-center">Challan Receipt</h2>
  	     	</div>
			   <div class="card-body">
  	     		<div class="row">
  	     			<div class="col-md-4">
  	     			    <div class="card bg-info">
  	     					<div class="card-header"><h3>Violetor Details</h3></div>
  	     					<?php
                            if (isset($_SESSION['uid'])) {
                            	$uid=$_SESSION['uid'];
                            	$pid=$_SESSION['pid'];
                            	$sql="SELECT * FROM u_info WHERE uid='$uid' AND pid='$pid'";
                            	$run=mysqli_query($con,$sql);
                            	$row=mysqli_fetch_array($run);
                            	$name=$row['name'];
                            	$pno=$row['pno'];
                            	$add=$row['adds'];
                            	echo "<div class='card-body'>
  	     					<h3 class='text-white'>Violetor name: $name </h3><br>
  	     					<h3 class='text-white'>Phone NO: $pno </h3><br>
  	     					<h3 class='text-white'>Address: $add</h3><
  	     				 </div>";
                            }
  	     					?>
  	     			    </div>
  	     			</div>	
  	     			<?php
                            if (isset($_SESSION['uid'])) {
                            	$uid=$_SESSION['uid'];
                            	$pid=$_SESSION['pid'];
                            	$sql="SELECT * FROM vehicle_detail WHERE uid='$uid' AND pid='$pid'";
                            	$run=mysqli_query($con,$sql);
                            	$row=mysqli_fetch_array($run);
                            	$vno=$row['vhno'];
                            	$vtype=$row['vtype'];
                            	$ccost=$row['ccost'];
                            	echo "<div class='col-md-4'>
  	     				<div class='card bg-info'>
  	     					<div class='card-header'><h3>Vehicle Details</h3></div>
  	     				<div class='card-body'>
  	     					<h3 class='text-white'>Vehicle No: $vno</h3><br>
  	     					<h3 class='text-white'>vehicle type : $vtype tyers</h3>
  	     				</div>
  	     				</div>
  	     			</div>
  	     			<div class='col-md-4'>
  	     				<div class='card bg-info'>
  	     					<div class='card-header'><h3>Challan Details</h3></div>
  	     				
  	     				<div class='card-body'>
  	     					<h3 class='text-white'>Total Penality:  $ccost</h3><br>
  	     					<a href='print.php' class='btn btn-warning'><h3 class='text-white'> Print</h3></a>
  	     				</div>
  	     			  </div>
  	     		 	</div>";
                       }     	
                         ?>
  	     		</div>
  	     	</div>
          
        </div>
		</div>
	</header>
<?php include  'footer.php' ?>
 </body>
</html>
