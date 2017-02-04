<?php 
include 'getQuestions.php';
//session_start();
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
					<div class="row">
						<div class="row" style="padding-top:20px;">
							<ul class="tabs" >
								<li class="tab col s12 m4"><a class="active" href="#game" style="font-size:18px">Game Play</a></li>
								<li class="tab col s12 m4"><a href="#lb" style="font-size:18px" onclick="getLeaderboard();">Leaderboard</a></li>
								<li class="tab col s12 m4"><a href="#ann" style="font-size:18px">Announcements</a></li>
							</ul>

							<div id="game" class="col s12" align="center" style="padding-top: 40px">

								<ul class="pagination">
								<?php 
									$j = 0; $count =  0;
									for($i=1;$i<$user_state['currentUserLevel'] ; $i++) 
									{ 
								?>	
									<li class="waves-effect"><a onclick="getState(<?php echo $i ?>);"><?php echo $i ?></a></li>
								<?php
								}
								?>
								<li class="active"><a href="#!"><?php echo $user_state['currentUserLevel'] ?></a></li>
								</ul>


								<div class="current-user">
								<?php 
								$role='';
								if($user_state['currentUserRole'])
									$role = 'Sherlock';
								else
									$role = 'Watson';
								?>
									<h4 class="left-align col s12 m6">Hey <?php echo $role ?> (<?php echo $user_state['currentUserName']; ?>)</h4>

									<h4 class="left-align col s12 m6">Current Level: <?php echo $user_state['currentUserLevel']?></h4>
									<!-- <div class="anna-univ-location">
									</div> -->
									<!-- <div>
										<input type="text" id="col"/>
    <br/>
        <a onclick="getColor('#4818c0')" ><img style="width:50px;height:50px;background-color: #4818c0"/></a>
        <a onclick="getColor('#007878')" ><img style="width:50px;height:50px;background-color: #007878"/></a>
        <a onclick="getColor('#ffff00')" ><img style="width:50px;height:50px;background-color: #ffff00"/></a>
        <a onclick="getColor('#78ff00')" ><img style="width:50px;height:50px;background-color: #78ff00"/></a>
        <a onclick="getColor('#300030')" ><img style="width:50px;height:50px;background-color: #300030"/></a>
        <a onclick="getColor('#000000')" ><img style="width:50px;height:50px;background-color: #000000"/></a>
        <a onclick="getColor('#780078')" ><img style="width:50px;height:50px;background-color: #780078"/></a>
        <a onclick="getColor('#0000ff')" ><img style="width:50px;height:50px;background-color: #0000ff"/></a>
        <a onclick="getColor('#ff0000')" ><img style="width:50px;height:50px;background-color: #ff0000"/></a>
        <a onclick="getColor('#ff7800')" ><img style="width:50px;height:50px;background-color: #ff7800"/></a>
									</div> -->

										<div class="images">
											<div class="carousel carousel-slider first" data-indicators="true">	
												<?php 
												$j = 0; $count =  0;
												for($i=0;$i<sizeof($user_state['currentUserUrls']) ; $i++) { ?>	

												<a class="carousel-item" href="#<?php echo $i ?>"><img src="<?php echo $user_state['currentUserUrls'][$i] ?> "></a>
												<?php
												}
												?>
											</div>										
										</div>

										<?php
											$level = $user_state['currentUserLevel'];
											$len = sizeof($user_state['currentUserUrls']);
											if($level == 1)
											{
										?>
											<a href="<?php echo $user_state['currentUserUrls'][$len-1] ?>" style="text-align: left;font-size: 20px;" download>Click here to download the puzzle</a>	
										<?php							
										}
										?>
										
									<div>
									<div class="row">
										<form id="answer_form" method="post">
											
												<div class="input-field col s12 m8">
													<i class="material-icons prefix">lightbulb_outline</i>
													<input id="answer_<?php echo $_SESSION['user']['access_token'] ?>" name="answer" placeholder="answer" type="text" class="validate">
												</div>
												<div class="input-field col s6 m2">

													<button id="<?php echo $_SESSION['user']['access_token'] ?>" class="btn btn-floating waves-effect waves-light" onclick="submitAnswer(this);" type="submit" name="action">
														<i class="material-icons">done</i>
													</button>
												</div>
												<div class="progress_loader" id="loader_<?php echo $_SESSION['user']['access_token'] ?>" style="display:none;"></div>
											
										</form>
										<div class="input-field col s6 m2">
											<button id="howtoplay" class="btn btn-floating waves-effect waves-light" name="clue">
												<i class="material-icons">more_vert</i>
											</button>
										</div>
										</div>
										<div id="playdesc" style="display: none;">
											<h5><?php echo $user_state['currentUserHint']; ?></h5>
												</div>
									</div>
								</div>
								<div class="teammate" style="padding-top: 20px">
							<?php 
							$role='';
							if($team_state['otherUserRole'])
								$role = 'Sherlock';
							else
								$role = 'Watson';
							?>
							<h4 class="left-align col s12 m6"><?php echo $role ?></h4>
							<br/>

								<div class="images">
									<div class="carousel carousel-slider second" data-indicators="true">
										<?php 
										$j = 0; $count =  0;
										for($i=0;$i<sizeof($team_state['otherUserUrls']) ; $i++) { ?>	

										<a class="carousel-item" href="#two!"><img src="<?php echo $team_state['otherUserUrls'][$i] ?> "></a>
										<?php
									}
									?>											
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
	</main>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

	<script type="text/javascript" src="js/utils.js"></script>

	<script type="text/javascript">
    $(window).load(function() {
        var main = document.createElement('div');
        var f = document.createElement('iframe');
        f.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.3888654732154!2d80.23317031390987!3d13.010890790830125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52679e8ab07191%3A0xd034864eb4cef07a!2sAnna+University+-+College+Of+Engineering!5e0!3m2!1sen!2sus!4v1480493857269'; 
        f.width = 600; 
        f.height = 300;
        main.append(f);
        $('.anna-univ-location').append(main);
    });

    function getColor(block)
    {
            document.getElementById("col").value = document.getElementById("col").value+block;    
    }
</script>
	<script type="text/javascript" src="js/register.js"></script>
<!-- 	<script type="text/javascript">
		$('.carousel').carousel('indicators',true);
	</script> -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.carousel.carousel-slider.first').carousel({full_width: true});
			$('.carousel.carousel-slider.first').css('height','100vh');
			//$('.carousel.carousel-slider').carousel({indicators:true});
			$('.carousel.carousel-slider.second').carousel({full_width: true});
			$('.carousel.carousel-slider.second').css('height','100vh');
		});
		function first_next()
		{
			$('.carousel.carousel-slider.first').carousel('next');
		}
		function first_prev()
		{
			$('.carousel.carousel-slider.first').carousel('next');
		}
		function second_next()
		{
			$('.carousel.carousel-slider.second').carousel('next');
		}
		function second_prev()
		{
			$('.carousel.carousel-slider.second').carousel('next');
		}
	</script>
	<script type="text/javascript">
		$( "#howtoplay" ).click(function() {
			$('#playdesc').toggle();
			preventDefault();
});
	</script>

<script>
!function() {
  var t;
  if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0, 
  t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
  t.factory = function(e) {
    return function() {
      var n;
      return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
    };
  }, t.methods.forEach(function(e) {
    t[e] = t.factory(e);
  }), t.load = function(t) {
    var e, n, o, i;
    e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"), 
    o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js", 
    n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
  });
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('5vyi6i54ey22');
</script>
<!-- End of Async Drift Code -->



</body>

</html>
<?php
}
else
{
	header("Location: index.php");
}
?>
