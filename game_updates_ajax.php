<?php

if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
}
$gameid = $_GET['gameid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GamerStack - Networking for the Game Industry</title>
	<meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">

	<!-- start:main -->
	<div class="container" id="main" >
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-11 col-xs-15">
				<div id="content">
					<!-- start:navbar -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation">
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<?php
                                include "navbar.php";
                                navbar($userid, $account);
                            ?>
							<ul class="nav navbar-nav navbar-right">
								<li class="page-scroll"><a href="#id-work">
									<i class="fa fa-angle-double-down"></i>
								</a></li>
							</ul>
						</div>
					</nav>
					<!-- end:navbar -->        
            
            
    <!-- model content -->	
	
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                          <?php include_once "check_percentage.php"; ?>
            	
                <!-- start:game_updates -->
					        <li id="id-resume">
                                <form class="col-lg-12 game_updates" style="float:left;">
					        	<div class="timeline-badge default"><i class="fa fa-briefcase"></i></div>
					        	<h1 class="timeline-head">game_updates</h1>
                                    <h5><a href='game_profile_ajax.php?gameid=<?= $gameid?>'>Edit Game Profile</a> /
                                <a href='game_updates_ajax.php?gameid=<?= $gameid?>'>Edit Game Updates</a> /
                                <a href='screenshots_game_ajax.php?gameid=<?= $gameid ?>'>Edit Game Gallery</a> /
                                    <a href='game_listings.php'>Back to Listings</a></h5>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel game_updates" id="game_updates">
					          		<h1>Add game_updates</h1>
                                    <div class="hr-left"></div>
						          	<div class="work-experience">
						          		<h3>Honors</h3>
						          		<small><i class="fa fa-calendar"></i> 2010 - 2014, London, England</small>
						          		<p>Got the honors. non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
                                    
                                    <div class="hr-left"></div>
						          	<div class="work-experience">
						          		<h3>Best Person</h3>
						          		<small><i class="fa fa-calendar"></i> 2008 - 2010, Paris, France</small>
						          		<p>I'm the best person alive. Excepteur sint occaecat cupidatat non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6">
					          					<div class="col-md-12 ">
					          						<input name="title" class="form-control input-lg" placeholder="Update Title..."> 
					          					</div>
					          					<div class="col-md-12 ">
					          						
					          					</div>
                                                <div class="col-md-12 ">
					          					</div>
                                                <div class="col-sm-2 ">
                                                    
                                                    
                                              </div>
					          				</div>
					          				<div class="col-md-6">
					          					<div class="">
					          						<textarea name="description" class="form-control input-lg" rows="7" placeholder="Description..."></textarea>
					          					</div>
					          				</div>
					          			</div>
                                        
                                        
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                    
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       
                                               
                                        </div>
                                        
                                
					          		</form>
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_game_updates">SUBMIT</button>
                            
					          	</div>
					        </li>

                    <?php
include_once "functions.php";
bug_report();
?>
            </div>
        	
	</div>
    
    <div id="game_updates_div" ><p></p></div>
 
    
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


//for game_updates
$(function() {
//twitter bootstrap script
	$("button#submit_game_updates").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_game_updates.php?gameid=<?= $gameid?>",
			data: $('form.game_updates').serialize(),
        		success: function(msg){
                    
                        
 	          		  $("#game_updates").html(msg);
                    //clear form.
                    $( '.game_updates' ).each(function(){
                            this.reset();
                        });
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
          
            
 $(document).on("click",".remove",function(e){
 var skill_number = this.id;
     
     $.ajax({
    		   	type: "GET",
			url: "process_game_updates.php?gameid=<?= $gameid?> ",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#game_updates").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#game_updates').load('process_game_updates.php?gameid=<?= $gameid?> ');
    return false;
});
             
            

            
            
            
            
</script>
</body>
</html>