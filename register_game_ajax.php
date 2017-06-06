<?php

if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
}
?>
<!DOCTYPE html> 
<!--This file goes with process_register.php-->
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<title>jQuery AJAX form submit using twitter bootstrap modal</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
<script src="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class=" container-fluid">
<h4>Demo Page</h4>
	
	
   
            
            
            
            
            
            
            
    <!-- model content -->	
	<div id="content">
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                    <?php include_once "check_percentage.php"; ?>
                          
            	
                <!-- start:game -->
					        <li id="id-resume">
                                <form class="col-lg-12 game" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">games</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
                                <div class="timeline-panel word-experience" id="form_content">
                                    <div id="alarm"></div>
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6 login-status">
					          					<div class="col-md-12 ">
					          						<input name="title" type="title" style="padding:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Game title..."> 
					          					</div>
                                                <div class="col-sm-6 ">
                                                    <label for="role">Game Genre</label>
                                                <select class="form-control" name="genre">
                                                    <option>Action game</option>
                                                    <option>Action role-playing game</option>
                                                    <option>Action-adventure game</option>
                                                    <option>Adventure game</option>
                                                    <option>Affective videogames</option>
                                                    <option>Alternate reality game</option>
                                                    <option>Art game</option>
                                                    <option>Artillery game</option>
                                                    <option>Beat 'em up</option>
                                                    <option>Bishōjo game</option>
                                                    <option>List of BL games</option>
                                                    <option>Browser game</option>
                                                    <option>Business simulation game</option>
                                                    <option>City-building game</option>
                                                    <option>Collectible card game</option>
                                                    <option>Combat flight simulator</option>
                                                    <option>Construction and management simulation</option>
                                                    <option>Dating sim</option>
                                                    <option>Dungeon crawl</option>
                                                    <option>Escape the room</option>
                                                    <option>Falling-sand game</option>
                                                    <option>Fighting game</option>
                                                    <option>First-person shooter</option>
                                                    <option>God game</option>
                                                    <option>Government simulation game</option>
                                                    <option>Grand Theft Auto clone</option>
                                                    <option>Graphic adventure game</option>
                                                    <option>Hack and slash</option>
                                                    <option>Incremental game</option>
                                                    <option>Interactive movie</option>
                                                    <option>Kart racing game</option>
                                                    <option>Life simulation game</option>
                                                    <option>Light gun shooter</option>
                                                    <option>Massively multiplayer online first-person shooter game</option>
                                                    <option>Massively multiplayer online game</option>
                                                    <option>Massively multiplayer online real-time strategy game</option>
                                                    <option>Massively multiplayer online role-playing game</option>
                                                    <option>Metroidvania</option>
                                                    <option>MUD</option>
                                                    <option>Multiplayer online battle arena</option>
                                                    <option>Music video game</option>
                                                    <option>Non-game</option>
                                                    <option>Nonviolent video game</option>
                                                    <option>Open world</option>
                                                    <option>Otome game</option>
                                                    <option>Persistent browser-based game</option>
                                                    <option>Platform game</option>
                                                    <option>Programming game</option>
                                                    <option>Puzzle video game</option>
                                                    <option>Racing video game</option>
                                                    <option>Real-time strategy</option>
                                                    <option>Real-time tactics</option>
                                                    <option>Rhythm game</option>
                                                    <option>Roguelike</option>
                                                    <option>Role-playing video game</option>
                                                    <option>Shoot 'em up</option>
                                                    <option>Shooter game</option>
                                                    <option>Sim racing</option>
                                                    <option>Simulation video game</option>
                                                    <option>Social simulation game</option>
                                                    <option>Space flight simulator game</option>
                                                    <option>Sports game</option>
                                                    <option>Stealth game</option>
                                                    <option>Strategy video game</option>
                                                    <option>Survival game</option>
                                                    <option>Survival horror</option>
                                                    <option>Tactical role-playing game</option>
                                                    <option>Tactical shooter</option>
                                                    <option>Third-person shooter</option>
                                                    <option>Time management (video game genre)</option>
                                                    <option>Tower defense</option>
                                                    <option>Traditional game</option>
                                                    <option>Turn-based strategy</option>
                                                    <option>Turn-based tactics</option>
                                                    <option>Vehicle simulation game</option>
                                                    <option>List of vehicular combat games</option>
                                                    <option>Vertically scrolling video game</option>
                                                    <option>Visual novel</option>
                                                    <option>Wargame (video games)</option>
                                                </select>
                                                    
                                              </div>
					          				</div>
					          				
                                        
                                
					          		</form>
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_game">SUBMIT</button>
                            
					          	</div>
					        </li>
                            <?php
include_once "functions.php";
bug_report();
?>
                    </div>
            </div>
        	
	</div>
    
    <div id="game_div" ><p></p></div>
 
    
<!-- start:javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/gamerstack.js"></script>
	<script src="js/portfolio.jquery.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.jeditable.js"></script>
	<script src="js/checkmail.js"></script> <!-- end:javascript -->
        
        <?php
include_once "functions.php";
bug_report_js();
?>
        <script>


//for game
$(function() {
//twitter bootstrap script
	$("button#submit_game").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_register_game.php",
			data: $('form.game').serialize(),
        		success: function(msg){
                    
                      if (msg == "fail_pass")
                      {
                          $("#alarm").html("Make sure your passwords match.");
                      }
                      else if(msg == "fail_email")
                      {
                          $("#alarm").html("Email already taken!");
                      }
                      else
                      {
                          
                          $("#form_content").html("<h3>SUCCESS! <a href='game_profile_ajax.php'>Edit this listing!</a></h3>");
                          setTimeout(function () {
                               window.location.href = "game_profile_ajax.php"; //will redirect to your blog page (an ex: blog.html)
                            }, 2000); //will call the function after 2 secs.
                          
                      }
 	          		  //$("#alarm").html(msg);
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
          
            
            
</script>
</body>
</html>