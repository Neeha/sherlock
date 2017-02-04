// handle kurukshetra login
$("#login_form").submit(function(e) { 
    $('.progress_loader').show();
    $('.login_submit').hide();
    var flag = returnCheckForLogin();
    if(flag)
    {
        $.ajax
        ({ 
            url: 'login.php',
            data: $("#login_form").serialize(),
            type: 'post',
            dataType: "json",
            success: function(result)
            {
                if(result == 1)
                {
                    Materialize.toast('Login Successful 😁', 1000);
                    window.location="createjoin.php";
                }
                else
                {
                    Materialize.toast('Login Failed 😯', 1000);
                }
                
                $('.progress_loader').hide();
                $('.login_submit').show();
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
                $('.progress_loader').hide();
                $('.login_submit').show(); 
            }
        });

    }
    else
    {
        Materialize.toast('Enter Valid Credentials 😕', 1000);
        $('.progress_loader').hide();
        $('.login_submit').show(); 
    }
    e.preventDefault();
});


// handle kurukshetra login
$("#login_sherlock_form").submit(function(e) { 
    $('.progress_loader').show();
    $('.login_sherlock_submit').hide();
    var flag = returnCheckForLogin();
    if(flag)
    {
        $.ajax
        ({ 
            url: 'login_sherlock.php',
            data: $("#login_sherlock_form").serialize(),
            type: 'post',
            dataType: "json",
            success: function(result)
            {
                if(result == 1)
                {
                    Materialize.toast('Login Successful 😁', 1000);
                    window.location="GamePlay.php";
                }
                else
                {
                    Materialize.toast('Login Failed 😯', 1000);
                }
                
                $('.progress_loader').hide();
                $('.login_sherlock_submit').show();
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
                $('.progress_loader').hide();
                $('.login_sherlock_submit').show(); 
            }
        });

    }
    else
    {
        Materialize.toast('Enter Valid Credentials 😕', 1000);
        $('.progress_loader').hide();
        $('.login_submit').show(); 
    }
    e.preventDefault();
});
// registeration - create team
$("#createteam_form").submit(function(e) { 
    $('.progress_loader').show();
    $('.create_submit').hide();
    var flag = returnCheckRegister();
    if(flag)
    {
        $.ajax
        ({ 
            url: 'checkKRegistration.php',
            data: $("#createteam_form").serialize(),
            type: 'post',
            dataType: "json",            
            success: function(result)
            {
                if(result == 1)
                {
                $.ajax
                ({ 
                    url: 'registerteam.php',
                    data: $("#createteam_form").serialize(),
                    type: 'post',
                    dataType: "json",            
                    success: function(result)
                    {
                        if(result == 1)
                        {
                            Materialize.toast('Login Successful 😁', 1000);
                            window.location="loginSherlock.php";
                        }
                        else if(result == 2)
                        {
                            Materialize.toast('Email id already registered 😯 ', 1000);
                        }
                        else if(result == 3)
                        {
                            Materialize.toast('Team Name exists 😯', 1000);
                        }
                        else if(result == 4)
                        {
                            Materialize.toast('Email id already registered 😯 ', 1000);
                        }

                        $('.progress_loader').hide();
                        $('.create_submit').show();

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
                        $('.progress_loader').hide();
                        $('.create_submit').show(); 
                    }
                });
                }
                else if(result == 0)
                {
                    Materialize.toast('You have not registered for k!', 1000);
                }
            },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
            $('.progress_loader').hide();
            $('.create_submit').show(); 
        }
    });

    }
    else
    {
        Materialize.toast('Enter Valid Credentials 😕', 1000);
        $('.progress_loader').hide();
        $('.create_submit').show(); 
    }
    e.preventDefault();
});

// registeration - join team
$("#jointeam_form").submit(function(e) { 
    $('.progress_loader').show();
    $('.join_submit').hide();
    var flag = returnCheckRegister();
    if(flag)
    {
        $.ajax
        ({ 
            url: 'checkKRegistration.php',
            data: $("#jointeam_form").serialize(),
            type: 'post',
            dataType: "json",            
            success: function(result)
            {
                if(result == 1)
                {
                   $.ajax
        ({ 
            url: 'jointeam.php',
            data: $("#jointeam_form").serialize(),
            type: 'post',
            dataType: "json",
            success: function(result)
            {
                if(result == 1)
                {
                    Materialize.toast('Login Successful 😁', 1000);
                    window.location="loginSherlock.php";
                }
                else if(result == 2)
                {
                    Materialize.toast('Email id already registered for event 😯', 1000);
                }
                else if(result == 3)
                {
                    Materialize.toast('Login Failed 😯', 1000);
                }
                else if(result == 4)
                {
                    Materialize.toast('Team already occupied 😯', 1000);
                }
                
                $('.progress_loader').hide();
                $('.join_submit').show();
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
                $('.progress_loader').hide();
                $('.join_submit').show(); 
            }
        });
               }
               else if(result == 0)
               {
                Materialize.toast('You have not registered for k!', 1000);

            }


            $('.progress_loader').hide();
            $('.create_submit').show();

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
            $('.progress_loader').hide();
            $('.create_submit').show(); 
        }
    });


    }
    else
    {
        Materialize.toast('Enter Valid Credentials 😕', 1000);
        $('.progress_loader').hide();
        $('.join_submit').show(); 
    }
    e.preventDefault();
});

// validation of answers
function submitAnswer(e) {
    $(e).hide();
    $(document.getElementById('loader_'+e.id)).show();     
    answer = document.getElementById('answer_'+e.id).value;
    $.ajax
    ({ 
        url: 'submit.php',
        data: 'answer=' + answer,
        type: 'post',
        dataType: "json",
        
        success: function(result)
        {
            if(result == 1)
            {
                Materialize.toast('Right Answer! 😎', 1000);
                $(document.getElementById('loader_'+e.id)).hide();
                $(e).hide();
                window.location="GamePlay.php";                
            }
            else if(result == 2)
            {
                Materialize.toast('Wrong answer! 😯', 1000);
                $(document.getElementById('loader_'+e.id)).hide();
                $(e).show();
                window.location="GamePlay.php";                
          
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
            $(document.getElementById('loader_'+e.id)).hide();
            $(e).show();
        }
    });
}

function getLeaderboard()
{
    $('#lbloader').show();
    $('#leaderboard').empty();

    $.ajax
    ({ 
        url: 'leaderboard.php',
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            var divtable = document.createElement('table');
            var thead = document.createElement('thead');
            var tr = document.createElement('tr');
            var th1 = document.createElement('th');
            th1.textContent = "Rank";
            //th1.data-field = "rank";
            var th2 = document.createElement('th');
            th2.textContent = "Team";
           // th1.data-field = "email";
           // var th3 = document.createElement('th');
           // th3.textContent = "Points";
            //th1.data-field = "points";

            tr.append(th1);
            tr.append(th2);
            //tr.append(th3);
            thead.append(tr);
            divtable.append(thead);

            var tbody = document.createElement('tbody');
            for (var i=0 ; i< result.length ;i++)
            {
                var tr1 = document.createElement('tr');
                var td11 = document.createElement('td');
                td11.textContent = i+1;
                var td12 = document.createElement('td');
                td12.textContent = result[i]['teamName'];
                //var td13 = document.createElement('td');
                //td13.textContent = result[i]['teamInfo']['teamPoints'];
                tr1.append(td11);
                tr1.append(td12);
                //tr1.append(td13);
                tbody.append(tr1);
            }
            

            // if(result['your_rank'] > 10)
            // {

            //     tr1 = document.createElement('tr');
            //     tr1.className = "lighten-3 grey";
            //     td11 = document.createElement('td');
            //     td11.textContent = result['your_rank'];
            //     td12 = document.createElement('td');
            //     td12.textContent = "You";
            //     td13 = document.createElement('td');
            //     td13.textContent = result['your_points'];
            //     tr1.append(td11);
            //     tr1.append(td12);
            //     tr1.append(td13);
            //     tbody.append(tr1);
            // }
            divtable.append(tbody);
            $("#leaderboard").append(divtable);
            $('#lbloader').hide();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);

        }
    });
}
function getNextLevel() {
  $.ajax
  ({ 
    url: 'getNextLevel.php',
    type: 'post',
    dataType: 'json',
    success: function(result)
    {

       var outer = document.createElement("li");


       var in1 = document.createElement("div");
       in1.className = "collapsible-header grey lighten-4 z-depth-2";
       in1.style = "padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center";
                    //check
                    in1.textContent = "SET "+result['state'];
                    
                    var in2 = document.createElement('div');
                    in2.className = "collapsible-body z-depth-2";   

                    
                    var in3 = document.createElement('div');
                    in3.className = "row";                    
                    
                    for(var i = 0; i<result['data'].length;i++)
                    {
                        var in4 = document.createElement('div');
                        in4.className = "col s8 offset-s2";
                        var in5 = document.createElement('div');
                        in5.className = "card hoverable grey lighten-4";
                        var in6 = document.createElement('div');
                        in6.className = "card-content";
                        var in7 = document.createElement('div');
                        in7.className = "col s12";
                        in7.style = "font-size:18px; margin-left:5px;";

                        in7.textContent = result['data'][i]['question'];

                        in6.append(in7);

                        var in8 = document.createElement('div');
                        in8.className = "input-field col s11";
                        in8.style = "margin-top:0px; margin-left:15px; color:black;";
                        var in9 = document.createElement('div');
                        in9.className = "col s12 m11";
                        var input = document.createElement('input');    
                        //check below 3 statements
                        input.type = "text";
                        input.placeholder = "Your answer";
                        input.id = "answer_"+result['data'][i]['key'];
                        input.className = "validate";
                        in9.append(input);

                        in8.append(in9);

                        var in10 = document.createElement('div');
                        in10.className = "col s6 m1";
                        var in11 = document.createElement('a');
                        in11.className = "btn-floating btn-large waves-effect waves-light";
                        in11.style = "margin-left:5%; margin-bottom: 1%;background-color:#39a558;"
                        in11.id= result['data'][i]['key'];
                        in11.onclick = function(){submitAnswer(this);}

                        var button1 = document.createElement('i');
                        button1.className = "material-icons";
                        button1.textContent = "done";

                        in11.append(button1);
                        in10.append(in11);

                        var pl1 = document.createElement('div');
                        pl1.className = "progress_loader";
                        pl1.id = 'pl_'+result['data'][i]['key'];
                        alert(pl1.id);
                        pl1.style = "display:none;"
                        pl1.textContent = "Loading...";

                        in10.append(pl1);

                        in8.append(in10);

                        var in12 = document.createElement('div');
                        in12.className = "col s6 m1";


                        in8.append(in12);
                        in6.append(in8);    
                        
                        var in14 = document.createElement('div');
                        in14.className = "row";
                        in6.append(in14);
                        in5.append(in6);
                        in4.append(in5);
                        in3.append(in4); 
                    }

                    in2.append(in3);
                    outer.append(in1);
                    outer.append(in2);


                    document.getElementsByClassName("collapsible popout")[0].append(outer);
                    Materialize.toast('Next Set of Questions are open 🙂', 4000)                     
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                }
            });
} 
function getState(e)
{
   console.log(e);
    $.ajax
    ({ 
        url: 'myState.php',
        data: 'level='+e,
        type: 'post',
        success: function(result)
        {
            alert(result);
            //if(result['currentUser']['currentUserUrls']==1)
            //{
                window.location.href = "leveldisplay.php";     
                           
            // }
            // else if(result['state']==0)
            // {
            //     Materialize.toast('Complete all questions to proceed to next level', 4000);                
            // }            
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error'); 
            console.log(errorThrown);         
            $(document.getElementById('clue_'+e.id)).hide();
            $(e).show();
        }
    });
}