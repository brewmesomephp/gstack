<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register: GamerStack - Networking for the Game Industry</title>
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
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                          
            	
                <!-- start:awards -->
					        <li id="id-resume">
                                <form class="col-lg-12 awards" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
                                    <div class="text-center">
                                <img src="1439079184-gamerstack-logo-final.jpg" class="img-circle sq300">
                            </div>
                                    <div class='timeline-badge default'><i class='fa fa-envelope'></i></div>
					        	<h1 class="timeline-head">Request a Beta Account</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
                                <div class="timeline-panel word-experience" id="form_content">
                                    <div id="alarm"></div>
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-12 login-status">
					          					<div class="col-md-12 ">
					          						<input name="email" type="email" style="padding:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="E-mail..."> 
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="first_name" style="padding:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="First name..."> 
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="last_name" style="padding:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Last name..."> 
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="company" style="padding:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Company Name... (if applicable)"> 
					          					</div>
                                                <div class="col-sm-6 ">
                                                    <label for="role">Which of the Following Most Describes Your Game Industry Role</label>
                                                <select class="form-control" name="role">
                                                    <option>Gamer</option>
                                                    <option>Company</option>
                                                    <option>Animator</option>
                                                    <option>Assistant Producer</option>
                                                    <option>Audio Engineer</option>
                                                    <option>Creative Director</option>
                                                    <option>External Producer</option>
                                                    <option>Game Designer</option>
                                                    <option>Game Programmer</option>
                                                    <option>Game Artist</option>
                                                    <option>Lead Artist</option>
                                                    <option>Lead Programmer</option>
                                                    <option>Level Editor</option>
                                                    <option>Marketing Executive</option>
                                                    <option>Marketing Manager</option>
                                                    <option>Product Manager</option>
                                                    <option>Project Manager / Producer</option> 
                                                    <option>Public Relations Officer</option>
                                                    <option>QA Tester</option>
                                                    <option>Technical Artist</option>
                                                    <option>Writer</option>
                                                  
                                                </select>
                                                    
                                              </div>
                                                
                                                
                                                <div class="col-md-12 ">
					          						<textarea name="description" style="padding:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login"  placeholder="Describe why you want a beta account for GamerStack."></textarea> 
					          					</div>
					          				</div>
					          				
                                        
                                
					          		</form>
                                    <br /><br />
                                       <br>
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_login">SUBMIT</button>
                            
					          	</div>
					        </li>
                        <?php
include_once "functions.php";
bug_report();
?>
                    </div>
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
	$("button#submit_login").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_beta.php",
			data: $('form.awards').serialize(),
        		success: function(msg){
                    
                    
                      if (msg == "fail_pass")
                      {
                          $("#alarm").html("Make sure your passwords match.");
                      }
                      else if(msg == "fail_email")
                      {
                          $("#alarm").html("Invalid Email or Already Taken");
                      }
                    else if(msg == "fail_name")
                      {
                          $("#alarm").html("Invalid Name");
                      }
                      else
                      {
                          //$("#alarm").html("SUCCESS!");
                          //$("#form_content").html(msg);
                          $("#form_content").html("<h3>Request Sent. Your request will be reviewed soon!</h3>\
                                                  You will be notified via email if you have been accepted.<br />\
                                                  <a href='php_splash_main.php'>View GamerStack</a>");
                          
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