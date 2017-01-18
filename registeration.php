<?php 
session_start();
if (!isset($_SESSION['user']))
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


    </style>
  </head>

  <body>
   <nav class="top-nav teal darken-2" style="height: 80px">
    <div class="nav-wrapper">
      <a href="//kurukshetra.org.in" class="brand-logo"><img class="responsive-img" src="img/k_logo.png" style="width: 200px"></a>
      <a href="#" class="brand-logo right hide-on-med-and-down" style="padding-top: 20px"><img class="responsive-img" src="img/ceg.png" style="width: 200px"></a>

    </div>
  </nav>
  <div class="container" style="margin-top: 5vh; margin-bottom: 10vh; min-width: 200px">
    <div class="section">
      <div class="row">

        <ul class="tabs" >
          <li class="tab col s12 l6"><a class="active" href="#createteam" style="font-size:18px">Create Team</a></li>
          <li class="tab col s12 l6"><a href="#jointeam" style="font-size:18px" onclick="getLeaderboard();">Join Team</a></li>

        </ul>  

      <!-- create team -->
       <div id="createteam" class="col s12 m6 push-m3 l6 push-l3">
         <div class="card grey lighten-4">
          <div class="card-content">
            <center><span class="card-title grey-text text-darken-3"><b>Create Team</b></span></center>
            <form id="login_form" >
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">supervisor_account</i>
                  <input id="icon_prefix name" type="text" class="validate" name="name" onblur="validatename(this)" required>
                  <label for="icon_prefix">Name</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix email" type="text" class="validate" name="email" onblur="validatemail(this)" required>
                  <label for="icon_prefix">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input id="icon_telephone password" type="password" class="validate" name="password" onblur="validatepass(this)" required>
                  <label for="icon_telephone">Password</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">supervisor_account</i>
                  <input id="icon_telephone teamname" type="text" class="validate" name="teamname" required>
                  <label for="icon_telephone">Team Name</label>
                </div>
                <div class="input-field col s12">
                  <select class="browser-default">
                    <option value="" disabled selected>Choose your role</option>
                    <option value="Sherlock">Sherlock</option>
                    <option value="Watson">Watson</option>
                  </select>
                </div>
              </div>
              <br/>
              <div class="progress_loader" style="display:none;"></div>
              <center>
                <button class="btn waves-effect waves-light login_submit" type="submit" name="action" style="margin-bottom: 10px;">
                  Login
                </button>
              </center>            
            </form>
            <center>
             <a href="http://kurukshetra.org.in/#/register" class="waves-effect waves-light btn" style="margin-bottom: 10px;">Register</a><br/>
             <a href="http://lite.kurukshetra.org.in/#resetpassword" target="_blank" style="margin-bottom: 10px; color:#00796b">Forgot password? Click here to reset</a>
           </center>

         </div>         
       </div>
     </div>

     <!-- Join team -->
       <div id="jointeam" class="col s12 m6 push-m3 l6 push-l3">
         <div class="card grey lighten-4">
          <div class="card-content">
            <center><span class="card-title grey-text text-darken-3"><b>Join Team</b></span></center>
            <form id="login_form" >
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix team" type="text" class="validate" name="team" required>
                  <label for="icon_prefix">Team</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix email" type="text" class="validate" name="email" onblur="validatemail(this)" required>
                  <label for="icon_prefix">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input id="icon_telephone password" type="password" class="validate" name="password" onblur="validatepass(this)" required>
                  <label for="icon_telephone">Password</label>
                </div>

              </div>
              <div class="progress_loader" style="display:none;"></div>
              <center>
                <button class="btn waves-effect waves-light login_submit" type="submit" name="action" style="margin-bottom: 10px;">
                  Login
                </button>
              </center>            
            </form>
            <center>
             <a href="http://kurukshetra.org.in/#/register" class="waves-effect waves-light btn" style="margin-bottom: 10px;">Register</a><br/>
             <a href="http://lite.kurukshetra.org.in/#resetpassword" target="_blank" style="margin-bottom: 10px; color:#00796b">Forgot password? Click here to reset</a>
           </center>

         </div>         
       </div>
     </div>

   </div>
 </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>
<?php
}
else
{
  switch ($_SESSION['user']['state']) {
    case 0:
      # go to practice page
    header("Location: practice.php");
    break;

    case 5:
      # go to summary page
    header("Location: Summary.php");
    break;
    
    default:
      # go to game play
    header("Location: GamePlay.php");
    break;
  }
}
?>