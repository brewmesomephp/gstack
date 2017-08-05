<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
}
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
		<div class="main-content">
				        	 
				
                
                
                
                    <ul class="timeline"  style="background-color:#fff;">
                        <?php include_once "check_percentage.php"; ?>
                <!-- start:experience-->
					        <li id="id-resume">
                                <form class="col-lg-12 contact" style="float:left;">	
					        	<div class="timeline-badge default"><i class="fa fa-envelope"></i></div>
					        	<h1 class="timeline-head">JOBS</h1>
                                <h5>
								<a href="php_company_profile_ajax.php">Profile</a> /
								<a href="company_achievements_ajax.php">Achievements</a> /
								<a href="company_portfolio_ajax.php">Portfolio</a> /
								<a href="jobs_ajax.php">Jobs</a> 
                            </h5>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel work-experience" id="jobs">
					          		
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6">
					          					<div class="col-md-12 ">
					          						<input name="title" class="form-control input-lg" placeholder="Job Title..."> 
					          					</div>
					          					<div class="col-md-10 ">
					          						<input name="location" class="form-control input-lg" placeholder="Location...">
					          					</div>
                                                <div class="col-sm-2 ">
                                                    <label for="remote">Remote</label>
                                                    <input type="checkbox" class="form-control" id="remote" name="remote">
                                              </div>
					          					<div class="col-md-10 ">
					          						<input name="compensation" class="form-control input-lg" placeholder="Compensation..." >
					          					</div>
                                                <div class="col-sm-2 ">
                                                    <label for="volunteer">Volunteer</label>
                                                    <input type="checkbox" class="form-control" id="volunteer" name="volunteer">
                                              </div>
					          				</div>
					          				<div class="col-md-6">
					          					<div class="">
					          						<textarea name="description" class="form-control input-lg" rows="7" placeholder="Short Description (Displayed on Profile)..."></textarea>
					          					</div>
					          				</div>
                                            <div class="col-md-12">
					          					<div class="">
					          						<textarea name="description2" class="form-control input-lg" rows="7" placeholder="Full Description..."></textarea>
					          					</div>
					          				</div>
					          			</div>
                                        
                                        
                                            <div class="col-md-2 ">
                                                
                                       <label for="date">Start Date</label>
                                                <select class="form-control" name="start_day" placeholder="Day">
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
                                                  <option>13</option>
                                                  <option>14</option>
                                                  <option>15</option>
                                                  <option>16</option>
                                                  <option>17</option>
                                                  <option>18</option>
                                                  <option>19</option>
                                                  <option>20</option>
                                                  <option>21</option>
                                                  <option>22</option>
                                                  <option>23</option>
                                                  <option>24</option>
                                                  <option>25</option>
                                                  <option>26</option>
                                                  <option>27</option>
                                                  <option>28</option>
                                                  <option>29</option>
                                                  <option>30</option>
                                                  <option>31</option>
                                                </select>
                                        </div>
                                    <div class="col-md-2">
                                    <label for="month">Month</label>
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
                                       <label for="year">Year</label>
                                                <input class=" form-control" id="start_year" name="start_year">
                                        </div>
                                        <div class="col-md-2">
                                    <label for="date">Permanent</label>
                                               <input type="checkbox" class=" form-control" id="permanent" name="permanent"></div>
                                        <div class="col-md-2 ">
                                            <!--
                                                <label for="end_month">End Date</label>
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
                                            -->
                                        </div>
                                        <div class="col-md-2 ">
                                            <!--
                                       <label for="date"></label>
                                                <input class=" form-control" id="end_year" name="end_year">
                                            -->
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       
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
//for jobs          
 $(function() {
//twitter bootstrap script
	$("button#submit").click(function(){
		   	$.ajax({
    		   	type: "POST",
			url: "process_jobs.php",
			data: $('form.contact').serialize(),
        		success: function(msg){
                    
                        
 	          		  $("#jobs").html(msg)
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
			url: "process_edu.php",
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
			url: "process_jobs.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#jobs").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#jobs').load('process_jobs.php');
    return false;
});
             
            
            
$( document ).ajaxComplete(function() {
//  $( "#skill_div" ).append( "Triggered ajaxComplete handler." );
    jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
})
            
            
            
            
</script>
</body>
</html>