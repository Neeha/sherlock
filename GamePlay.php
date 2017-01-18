<?php 
//require 'getQuestions.php';
if (!isset($_SESSION['user']))
{

	if (true)
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="shortcut icon" href="img/favicon.ico">
			<title>Cerebra K'17</title>
			<!--Import Google Icon Font-->
			<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<!--Import materialize.css-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

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
				
			</style>
			
		</head>

		<body style="overflow-x: hidden;">
			<nav class="top-nav teal darken-2" style="height: 80px">
				<div class="nav-wrapper">
					<a href="//kurukshetra.org.in" class="left"><img class="responsive-img" src="img/k_logo.png" style="width: 200px"></a>
					<a class="brand-logo right" href="logout.php" style="padding-top: 10px" >
						<i class="large material-icons">power_settings_new</i>
					</a>    

				</div>
			</nav>

			<main>
				<div class="container" style="padding-top: 20px">
					<div class="row">
						<div class="row" style="padding-top:20px;">
							<ul class="tabs" >
								<li class="tab col s12 m6"><a class="active" href="#game" style="font-size:18px" >Game Play</a></li>
								<li class="tab col s12 m6"><a href="#lb" style="font-size:18px" onclick="getLeaderboard();">Leaderboard</a></li>

							</ul>

							<div id="game" class="col s12" align="center" style="padding-top: 40px">

								<ul class="pagination">
									<li class="active"><a href="#!">1</a></li>
									<li class="waves-effect"><a href="#!">2</a></li>
									<li class="waves-effect"><a href="#!">3</a></li>
									<li class="waves-effect"><a href="#!">4</a></li>
									<li class="waves-effect"><a href="#!">5</a></li>
								</ul>


								<div class="current-user">
									<h4 class="left-align col s12 m6">Hey Role(Name)</h4>

									<h4 class="left-align col s12 m6">Level number</h4>
									<div class="images">
										<div class="carousel carousel-slider">
											<a class="carousel-item" href="#two!"><img src="https://cdn.pbrd.co/images/nvVunFCnC.jpg"></a>
											<a class="carousel-item" href="#three!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
											<a class="carousel-item" href="#four!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
										</div>
									</div>
									<div class="answer form">
										<form class="col s12">
											<div class="row">
												<div class="input-field col s12 m8">
													<i class="material-icons prefix">lightbulb_outline</i>
													<input id="answer" name="answer" placeholder="answer" type="text" class="validate">
												</div>
												<div class="input-field col s6 m2">

													<button class="btn btn-floating waves-effect waves-light" type="submit" name="action">
														<i class="material-icons">done</i>
													</button>
												</div>
												<div class="input-field col s6 m2">

													<button class="btn btn-floating waves-effect waves-light" name="clue">
														<i class="material-icons">more_vert</i>
													</button>
												</div>
												<div class="progress_loader" id="answer_loader" style="display:none;"></div>


											</div>
										</form>
									</div>
								</div>
								<div class="teammate" style="padding-top: 200px">
									<h4 class="left-align col s12 m6">Hey Role(Name)</h4>

									<h4 class="left-align col s12 m6">Level number</h4>						
									<div class="images">
										<div class="carousel carousel-slider">
											<a class="carousel-item" href="#two!"><img src="https://cdn.pbrd.co/images/nvVunFCnC.jpg"></a>
											<a class="carousel-item" href="#three!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
											<a class="carousel-item" href="#four!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
										</div>
									</div>
								</div>
							</div>
							<div id="lb" class="col s12" align="center" style="padding-top: 40px">
								<div class="progress_loader" id="lbloader" style="display:none;">Loading...</div>
								<div id="leaderboard"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

	<script type="text/javascript" src="js/utils.js"></script>


	<script type="text/javascript" src="js/register.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('.carousel.carousel-slider').carousel({full_width: true});
			$('.carousel.carousel-slider').css('height','50vw');
		});
	</script>



</body>

</html>
<?php
}
else
{
	switch ($_SESSION['user']['state']) {
		case 5:
		header("Location: Summary.php");
		break;

		case 0:
		header("Location: practice.php");
		break;
	}
}
}
else
{
	header("Location: index.php");

}
?>
