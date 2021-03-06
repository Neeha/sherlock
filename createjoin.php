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
   <nav class="top-nav teal darken-2" style="height: 120px">
    <div class="nav-wrapper">
      <a href="//kurukshetra.org.in" class="brand-logo"><img class="responsive-img" src="img/k_logo.png" style="width: 220px"></a>
      <a href="#" class="brand-logo right hide-on-med-and-down" style="padding-top: 30px"><img class="responsive-img" src="img/ceg.png" style="width: 200px"></a>

    </div>
  </nav>
  <div class="container" style="margin-top: 5vh; margin-bottom: 10vh; min-width: 200px">
    <div class="section">
      <div class="row">

        <ul class="tabs" >
          <li class="tab col s12 l6"><a class="active" href="#createteam" style="font-size:18px">Create Team</a></li>
          <li class="tab col s12 l6"><a href="#jointeam" style="font-size:18px">Join Team</a></li>

        </ul>  

        <!-- create team -->
        <div id="createteam" class="col s12 m6 push-m3 l6 push-l3" style="padding-top: 20px;">
         <div class="card grey lighten-4">
          <div class="card-content">
            <center><span class="card-title grey-text text-darken-3"><b>Create Team</b></span></center>
            <form id="createteam_form" method="post" >
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">person outline</i>
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
                  <input id="icon_telephone password" type="password" class="validate" name="password" onkeyup="validatepass(this)" required>
                  <label for="icon_telephone">Password (min 8 characters)</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">group</i>
                  <input id="icon_telephone teamname" type="text" class="validate" name="teamname" required>
                  <label for="icon_telephone">Team Name</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input id="icon_telephone password" type="password" class="validate" name="teampassword" onkeyup="validatepass(this)" required>
                  <label for="icon_telephone">Team Password (min 8 characters)</label>
                </div>
                <div class="input-field col s12">
                  <label>Choose your role:</label><br/><br/>
                  <input name="role" value="1" type="radio" id="sherlock" checked />
                  <label for="sherlock">Sherlock</label>
                  <input name="role" value="0" type="radio" id="watson" />
                  <label for="watson">Watson</label>
                </div>                
              </div>
              <br/>
              <div class="progress_loader" style="display:none;"></div>
              <center>
                <button class="btn waves-effect waves-light create_submit" type="submit" name="action" style="margin-bottom: 10px;">
                  CREATE
                </button>
              </center>            
            </form>

          </div>  
          <center>
              <button class="btn waves-effect waves-light" type="submit" onclick="window.location.href='/sherlock/loginSherlock.php'"; name="action" style="margin-bottom: 10px;">
                ALREADY HAVE A TEAM? LOGIN TO PLAY
              </button>
            </center>                            
        </div>
      </div>

      <!-- Join team -->
      <div id="jointeam" class="col s12 m6 push-m3 l6 push-l3" style="padding-top: 20px;">
       <div class="card grey lighten-4">
        <div class="card-content">
          <center><span class="card-title grey-text text-darken-3"><b>Join Team</b></span></center>
          <form id="jointeam_form" >
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">person outline</i>
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
                <label for="icon_telephone">Password (min 8 characters)</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">group</i>
                <input id="icon_prefix team" type="text" class="validate" name="teamname" required>
                <label for="icon_prefix">Team Name</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_telephone password" type="password" class="validate" name="teampassword" onblur="validatepass(this)" required>
                <label for="icon_telephone">Team Password (min 8 characters)</label>
              </div>
            </div>
            <div class="progress_loader" style="display:none;"></div>
            <center>
              <button class="btn waves-effect waves-light join_submit" type="submit" name="action" style="margin-bottom: 10px;">
                JOIN
              </button>
            </center>            
          </form>            
        </div>
        <center>
              <button class="btn waves-effect waves-light" type="submit" onclick="window.location.href='/sherlock/loginSherlock.php'"; name="action" style="margin-bottom: 10px;">
                ALREADY HAVE A TEAM? LOGIN TO PLAY
              </button>
            </center>                     
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
