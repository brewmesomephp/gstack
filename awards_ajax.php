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
                <!-- start:awards -->
					        <li id="id-resume">
                                
                                <form class="col-lg-12 awards" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">AWARDS</h1>
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
					          	<div class="timeline-panel awards" id="awards">
					          		<h1>Add Awards</h1>
                                    <div class="hr-left"></div>
						          	
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6">
					          					<div class="col-md-12 ">
					          						<input name="title" class="form-control input-lg" placeholder="Award Title..."> 
					          					</div>
					          					<div class="col-md-12 ">
					          						<input name="occupation" class="form-control input-lg" placeholder="Occupation...">
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="issuer" class="form-control input-lg" placeholder="Issuer...">
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
                                                
                                       <label for="date">Date</label>
                                               
                                                <select class="form-control" name="month">
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
                                                <input class=" form-control" id="year" name="year" placeholder="Year...">
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                    
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       
                                               
                                        </div>
                                        
                                
					          		</form>
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_awards">SUBMIT</button>
                            
					          	</div>
					        </li>

                    <?php
include_once "functions.php";
bug_report();
?>

            </div>
        	
	</div>
    
    <div id="awards_div" ><p></p></div>
 
    
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


//for awards
$(function() {
//twitter bootstrap script
	$("button#submit_awards").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_awards.php",
			data: $('form.awards').serialize(),
        		success: function(msg){
                    
                        if (msg == "fail_year")
                        {
                         alert ("Please enter a valid year");   
                        }
 	          		  $("#awards").html(msg);
                    //clear form.
                    $( '.awards' ).each(function(){
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
			url: "process_awards.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#awards").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#awards').load('process_awards.php');
    return false;
});
             
            

            
            
            
            
</script>
</body>
</html>