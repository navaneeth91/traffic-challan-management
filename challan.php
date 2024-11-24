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
	<title>Challan page</title>
	<link rel="icon" href="img/policelogo.png" type="image/png">
	<link rel="shortcut icon" href="img/policelogo.png" type="img/x-icon">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.js"></script>
	<script type="text/javascript" src="js/wow.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/magnific-popup.js"></script>
	<script src="contactform/contactform.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>

 </head>

<body>
	<header class="header" id="header">
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src="img/policelogo.png" alt=""></a>
			</figure>
			<h2 style="color: white;"><b>TELANGANA POLICE</b></h2>
			<div class="container mt-5 mb-5">
				<div class="">
					<div class="row mt-5">
						<div class="col-md-7 bg-info">
							<form method="" id="signup-form" class="signup-form">
								<h2 class="text-center mt-5 text-white">Challan Details</h2>
								<div class="form-group mt-5">
									<label class="mr-5">
										<span><h3 class="text-white">TRIPLE RIDING</h3></span>
									</label>
									<input type="checkbox" class="ctype" name="vname" value="1000" cname='Challan name' />
								</div>
								<div class="form-group mt-4">
									<label class="mr-5">
										<span><h3 class="text-white">WITHOUT HELMET</h3></span>
									</label>
									<input type="checkbox" class="ctype" name="vname" value="100" cname='Challan name' />
								</div>
								<div class="form-group mt-4">
									<label class="mr-5">
										<span><h3 class="text-white">WRONG ROUTE</h3></span>
									</label>
									<input type="checkbox" class="ctype" name="vname" value="1200" cname='Challan name' />
								</div>
								<div class="form-group mt-4">
									<label class="mr-5">
										<span><h3 class="text-white">SIGNAL JUMP</h3></span>
									</label>
									<input type="checkbox" class="ctype" name="vname" value="1000" cname='Challan name' />
								</div>
								<div class="form-group mt-4">
									<label class="mr-5">
										<span><h3 class="text-white">LICENCE</h3></span>
									</label>
									<input type="checkbox" class="ctype" name="vname" value="500" cname='Challan name' />
								</div>
								<div class="form-group mt-5">
									<input type="button" id="vdetail" class="btn submit" value="Submit" />
								</div>
							</form>
						</div>
						<div class="col-md-5">
							<div class="card">
								<div class="card-header bg-info">
									<h3>Challan Cost</h3>
								</div>
								<div class="card-body">
									<h3>Total: <b id="total"></b></h3>
								</div>
								<div class="card-footer bg-info">
									<a href="final.php" class="btn btn-success">
										<h3 class="text-white">Receipt</h3>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="business-talking">
		<div class="container">
			<h2>Don't Drink And Drive</h2>
		</div>
	</section>

	<script>
		$(document).ready(function () {
			$('.ctype').change(function () {
				updateTotal();
			});

			function updateTotal() {
				var total = 0;
				$('.ctype:checked').each(function () {
					total += parseInt($(this).val());
				});
				$('#total').text(total);
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(e) {
			$('#test').scrollToFixed();
			$('.res-nav_click').click(function() {
				$('.main-nav').slideToggle();
				return false;
			});

			$('.Portfolio-box').magnificPopup({
				delegate: 'a',
				type: 'image'
			});
		});
	</script>
	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
	</script>
	<script type="text/javascript">
		$(window).load(function() {
			$('.main-nav li a, .servicelink').bind('click', function(event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 102
				}, 1500, 'easeInOutExpo');
				if ($(window).width() < 768) {
					$('.main-nav').hide();
				}
				event.preventDefault();
			});
		});
	</script>
	<script type="text/javascript">
		$(window).load(function() {
			var $container = $('.portfolioContainer'),
				$body = $('body'),
				colW = 375,
				columns = null;

			$container.isotope({
				resizable: true,
				masonry: {
					columnWidth: colW
				}
			});

			$(window).smartresize(function() {
				var currentColumns = Math.floor(($body.width() - 30) / colW);
				if (currentColumns !== columns) {
					columns = currentColumns;
					$container.width(columns * colW).isotope('reLayout');
				}
			}).smartresize();
			$('.portfolioFilter a').click(function() {
				$('.portfolioFilter .current').removeClass('current');
				$(this).addClass('current');

				var selector = $(this).attr('data-filter');
				$container.isotope({
					filter: selector,
				});
				return false;
			});
		});
	</script>
 </body>
</html>
