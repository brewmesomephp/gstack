<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
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

					<!-- start:main content -->
		<div class="main-content">
				        	 
				
                
                
                
                    <ul class="timeline"  style="background-color:#fff;">
                        <?php include_once "check_percentage.php"; ?>
                <!-- start:experience-->
					        <li id="id-resume">
                                <form class="col-lg-12 contact" style="float:left;">	
					        	<div class="timeline-badge default"><i class="fa fa-envelope"></i></div>
					        	<h1 class="timeline-head">RESUME</h1>
                                <h5>
								<a href="php_profile_ajax.php">Profile</a> /
								<a href="organizations_ajax.php">Organizations</a> /
								<a href="portfolio_ajax.php">Portfolio</a> /
								<a href="skill_ajax.php">Skills</a> /
								<a href="awards_ajax.php">Awards</a> /
                                <a href="xp_ajax.php">Experience</a> /
                                <a href="edu_ajax.php">Education </a>
                            </h5>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel work-experience" id="xp">
					          		<h1>Add Experience</h1>
                                    <div class="hr-left"></div>
						          	<div class="work-experience">
						          		<h3>Web Designer: Blizzard Entertainment</h3>
						          		<small><i class="fa fa-calendar"></i> 2010 - 2014, London, England</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
                                    
                                    <div class="hr-left"></div>
						          	<div class="work-experience">
						          		<h3>PHP Developer: GamerStack.io</h3>
						          		<small><i class="fa fa-calendar"></i> 2008 - 2010, Paris, France</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6">
					          					<div class="col-md-12 ">
					          						<input name="company_name" class="form-control input-lg" placeholder="Company Name..."> 
					          					</div>
					          					<div class="col-md-12 ">
					          						<input name="job_title" class="form-control input-lg" placeholder="Job Title...">
					          					</div>
					          					<div class="col-md-10 ">
					          						<input name="location" class="form-control input-lg" placeholder="Location..." >
					          					</div>
                                                <div class="col-sm-2 ">
                                                    <label for="remote">Remote</label>
                                                    <input type="checkbox" class="form-control" id="remote" name="remote">
                                              </div>
					          				</div>
					          				<div class="col-md-6">
					          					<div class="">
					          						<textarea name="description" class="form-control input-lg" rows="7" placeholder="Description..."></textarea>
					          					</div>
					          				</div>
					          			</div>
                                        
                                        
                                            <div class="col-md-2 ">
                                                
                                       <label for="date">Start Date</label>
                                               
                                                <select class="form-control" name="start_month">
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                  <option>6</option>
                                                  <option>7</option>
                                                  <option>8</option>
                                                  <option>9</option>
                                                  <option>10</option>
                                                  <option>11</option>
                                                  <option>12</option>
                                                </select>
                                        </div>
                                        <div class="col-md-2 ">
                                       <label for="date"></label>
                                                <input class=" form-control" id="start_year" name="start_year">
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2 ">
                                                <label for="end_month">Left Date</label>
                                                <select class="form-control" name="end_month">
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                  <option>6</option>
                                                  <option>7</option>
                                                  <option>8</option>
                                                  <option>9</option>
                                                  <option>10</option>
                                                  <option>11</option>
                                                  <option>12</option>
                                                </select>
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       <label for="date"></label>
                                                <input class=" form-control" id="end_year" name="end_year">
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       <label for="date">Still Here</label>
                                               <input type="checkbox" class=" form-control" id="current" name="current">
                                        </div>
                                        
                                
					          		</form>
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit">SEND</button>
                            
					          	</div>
                    </li>
            <?php
include_once "functions.php";
bug_report();
?>
            
            
                        
                    
            </div>
        	
	</div>
    
    <div id="skill_div" ><p></p></div>
 
    
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
//for xp          
 $(function() {
//twitter bootstrap script
	$("button#submit").click(function(){
		   	$.ajax({
    		   	type: "POST",
			url: "process_xp.php",
			data: $('form.contact').serialize(),
        		success: function(msg){
                    
                        
 	          		  $("#xp").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});

//for education
$(function() {
//twitter bootstrap script
	$("button#submit_edu").click(function(){
		   	$.ajax({
    		   	type: "POST",
			url: "process_xp.php",
			data: $('form.education').serialize(),
        		success: function(msg){
                    
                        
 	          		  $("#edu").html(msg)
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
			url: "process_xp.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
 	          		  $("#xp").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });
            
            
$(document).on("click",".end",function(e){
 var end_id = this.id;
    //alert ($(this).parent().parent().children().attr('class'));
    var end_month = $('#end_month'+end_id).val();
    var end_year = $('#end_year'+end_id).val();
    if (end_year == '')
        end_month='';
     //alert(xp_num);
     $.ajax({
    		   	type: "POST",
			url: "process_xp.php",
			data: {
             'end':end_id,
             'end_month':end_month,
             'end_year':end_year
                
            },
        		success: function(msg){
                    if (msg == "fail_year")
                        alert ("Please enter a valid year");
                        return;
                    
                        
 	          		  $("#xp").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });  
            
            
            
            
            
            
    $(document).ready(function() {
    $('#xp').load('process_xp.php');
    return false;
});
             
            
            
$( document ).ajaxComplete(function() {
  $( "#skill_div" ).append( "Triggered ajaxComplete handler." );
    jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
})
            
            
            
            
</script>
</body>
</html>