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
								<li class="tab col s12 l4"><a class="active" href="#game" style="font-size:18px" >Game Play</a></li>
								<li class="tab col s12 l4"><a href="#lb" style="font-size:18px" onclick="getLeaderboard();">Leaderboard</a></li>
								<li class="tab col s12 l4"><a href="#htp" style="font-size:18px">Instructions</a></li>

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
									<h4 class="left-align">Current Role</h4>
									<div class="images">
										<div class="carousel carousel-slider">
											<a class="carousel-item" href="#one!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
											<a class="carousel-item" href="#two!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
											<a class="carousel-item" href="#three!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
											<a class="carousel-item" href="#four!"><img src="http://www.nhsborders.scot.nhs.uk/CropUp/desktop/media/16268/small-preview-1.jpg"></a>
										</div>
									</div>
									<div class="answer form">
										<form class="col s12">
											<div class="row">
												<div class="input-field col s12 m8">
													<i class="material-icons prefix">account_circle</i>
													<input id="answer" name="answer" type="text" class="validate">
												</div>
												<div class="input-field col s12 m2">

													<button class="btn btn-floating waves-effect waves-light" type="submit" name="action">
														<i class="material-icons">done</i>
													</button>
												</div>
												<div class="input-field col s12 m2">

													<button class="btn btn-floating waves-effect waves-light" name="clue">
														<i class="material-icons">done</i>
													</button>
												</div>
												<div class="progress_loader" id="loader" style="display:none;">Loading...</div>


											</div>
										</form>
									</div>
								</div>
								<div class="teammate">
									<h4 class="left-align">Team Role</h4>
									<div class="images">
										<div class="carousel carousel-slider">
											<a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"></a>
											<a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2"></a>
											<a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3"></a>
											<a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4"></a>
										</div>
									</div>
								</div>
							</div>
							<div id="lb" class="col s12" align="center" style="padding-top: 40px">
								<div class="progress_loader" id="lbloader" style="display:none;">Loading...</div>
								<div id="leaderboard"></div>
							</div>
							<div id="htp" style="padding-top: 40px">
								<ul style="line-height: 25px; list-style-type: circle;">
									<li>1.	The event has two rounds: Qualifier and the Final Round</li>
									<li>2.	Qualifier round has 10 questions and no time limit.</li>
									<li>3.	The participant has to solve all the questions in the qualifier round to appear for the Final Round.</li>
									<li>4.	The final round consists of Four Sets with 10 questions per set.</li>
									<li>5.	Each set will appear after every 15 minutes.</li>
									<li>6.	The faster the questions are solved, more the bonus points.</li>
									<li>7.	The participants can switch between sets in the final round.</li>
									<li>8.	Enter the numerical values for answers without space, without unit.</li>
									<li>9.	The winners will be declared post the event and will be intimated by the organisers soon after.</li>
								</ul>
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
		$('.carousel.carousel-slider').carousel({full_width: true});

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
