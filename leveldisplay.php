<?php 
session_start();
if (isset($_SESSION['user']))
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="shortcut icon" href="img/favicon.ico">
		<title>Sherlock K'17</title>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

		<link rel='stylesheet' href="css/progress_loader.css">
		<!--Let browser know website is optimized for mobile-->
		<link href='//fonts.googleapis.com/css?family=Caesar Dressing' rel='stylesheet'>
		<link href='//fonts.googleapis.com/css?family=Merienda One' rel='stylesheet'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style type="text/css">
			::-webkit-input-placeholder { /* WebKit browsers */
				color:    white;
				opacity: 0.2 !important;
			}
			::-webkit-label { /* WebKit browsers */
				color:    red;
				opacity: 0.2 !important;
			}
			.page-footer {
				position:fixed;
				bottom:0;
				width:100%;
				height:60px;   /* Height of the footer */
				background:#6cf;
			}
			.img-div { height:100%; width:100%;}
			img { max-width:100% }
			::-webkit-input-placeholder { /* WebKit, Blink, Edge */
				color:#424242;
			}
			.btn, .btn-floating
			{
				position: absolute; 
				z-index: auto;
			}
			.disabled
			{
				pointer-events:none; 
				opacity:0.6;         
			}
			.btn-floating.btn-large
			{
				width:36px;
				height:36px;
			}
			.btn-floating.btn-large i
			{
				line-height : 16px;
			}
			.blue
			{
				background-color: #2314ac !important;
			}
			:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
				color:#424242;
				opacity:  1;
			}
			::-moz-placeholder { /* Mozilla Firefox 19+ */
				color:#424242;
				opacity:  1;
			}
			:-ms-input-placeholder { /* Internet Explorer 10-11 */
				color: #424242;
			}
			.carousel .indicators .indicator-item
			{
				background-color: green;
			}

		</style>

	</head>

	<body style="overflow-x: hidden;">
		<nav class="top-nav teal darken-2" style="height: 120px">
			<div class="nav-wrapper">
				<a href="//kurukshetra.org.in" class="brand-logo"><img class="responsive-img" src="img/k_logo.png" style="width: 220px"></a>
				<a class="brand-logo right" href="logout.php" style="padding-top: 20px" >
					<i class="large material-icons">power_settings_new</i>
				</a>    
			</div>
		</nav>

		<main>
			<div class="container" style="padding-top: 20px">
			<h4>		<a href="GampPlay.php">Back</a></h4>
				<div class="row">
					<div class="row" style="padding-top:20px;">							
						<div class="col s12" align="center" style="padding-top: 20px">								
							<div class="current-user">
								<div class="images">
									<div class="carousel carousel-slider" data-indicators="true">	
										<?php 
										$j = 0; $count =  0;
										for($i=0;$i<sizeof($_SESSION['asked_state']['currentUserUrls']) ; $i++) { ?>	

										<a class="carousel-item"><img src="<?php echo $_SESSION['asked_state']['currentUserUrls'][$i] ?>"></a>
										<?php
									}
									?>
								</div>										
							</div>																		
						</div>								
					</div>							
				</div>
			</div>

		</div>
	</main>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

	<script type="text/javascript" src="js/utils.js"></script>

	<script type="text/javascript" src="js/register.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.carousel.carousel-slider').carousel({full_width: true});
			$('.carousel.carousel-slider').css('height','100vh');
		});
		</script>



	</body>

	</html>
	<?php
}
else
{
	header("Location: index.php");
}
?>
