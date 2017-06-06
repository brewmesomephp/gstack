<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
include_once "functions.php";
if (get_account_type($sess_id))
{
	header( 'Location: php_company_profile_ajax.php' ) ;
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

					<!-- start:main content -->
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                    <?php include_once "check_percentage.php"; ?>
                          
            	
                <!-- start:education -->
					        <li id="id-resume">
                                <form class="col-lg-12 education" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">EDUCATION</h1>
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
					          	<div class="timeline-panel education" id="edu">
					          		<h1>Add Education</h1>
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
					          						<input name="school" class="form-control input-lg" placeholder="School Name..."> 
					          					</div>
					          					<div class="col-md-12 ">
					          						<input name="major" class="form-control input-lg" placeholder="Major...">
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="degree" class="form-control input-lg" placeholder="Degree...">
					          					</div>
					          					<div class="col-md-10 ">
					          						<input name="gpa" class="form-control input-lg" placeholder="GPA..." >
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
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_edu">SEND</button>
                            
					          	</div>
					        </li>
<?php
include_once "functions.php";
bug_report();
?>

                    
            </div>
        	
	</div>
    
    <div id="edu_div" ><p></p></div>
 
    
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


//for education
$(function() {
//twitter bootstrap script
	$("button#submit_edu").click(function(){
		   	$.ajax({
    		   	type: "POST",
			url: "process_edu.php",
			data: $('form.education').serialize(),
        		success: function(msg){
                    if (msg == "fail_year")
                    {
                        alert ("Please enter a valid year");
                        return;
                    }
                        
 	          		  $("#edu").html(msg);
                    //clear form.
                    $( '.education' ).each(function(){
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
			url: "process_edu.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#edu").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#edu').load('process_edu.php');
    return false;
});
             
            

            
            
            
            
</script>
</body>
</html>