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
                          
            	
                <!-- start:awards -->
					        <li id="id-resume">
                                <form class="col-lg-12 awards" style="float:left;">
					        	
                                    <div class="text-center">
                                <img src="logo.png" class="img-circle sq300 width:30%; min-width:150px; max-width:300px;">
                            </div>
                                    
					        	<h1 class="timeline-head">Invite People</h1>
                                    
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
                                <div class="timeline-panel word-experience">
                                    <div id="alarm"></div>
                                    <div class="hr-left"></div>
                                    
                                    <p align='center'><b>Please enter emails of the people you'd like to invite to join GamerStack separated by commas</b></p>
					          			<div class="row">
					          				<div class="col-md-6 login-status">
					          					<div class="col-md-12 col-xs-14">
					          						<input name="emails" id="emails" type="email" style="padding-left-left:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Emails"> 
                                                    <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_invite">INVITE</button>
					          					</div>
					          				</div>
                                            <div class="col-md-6">
					          					<div class="col-md-12 col-xs-14" id="form_content">
					          						<h4>Invite People</h4>Invite the people you know to join GamerStack. Connecting with people will only help you. In most cases, people find their next business opportunity or job through an acquantance. Send your friends and acquaintances invitations to join to increase your odds of doing something even greater than you can imagine.
					          					</div>
					          				</div>
					          				
                                        
                                
					          		</form>
                                    <br /><br />
                                    
                                        <br>
				            
                                    <?php
?>
                            
					          	</div>
					        </li>

                    </div>
            </div>
        	
	</div>
    
    <div id="awards_div" ><p></p></div>
 	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/gamerstack.js"></script>
	<script src="js/portfolio.jquery.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.jeditable.js"></script>
    <script>
                
                //for awards
$(document).on("click","#submit_invite",function(e){

    var emails = $('#emails').val();
   
		   	$.ajax({
    		   	type: "POST",
			url: "process_invitation.php",
			data: {
                
                   
                    'emails':emails
                  },
        		success: function(msg){
                      
                          //$("#alarm").html("SUCCESS!");
                    if (msg != '')
                          $("#form_content").html(msg);
                          
                      
 	          		  //$("#alarm").html(msg);
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
                </script>

</body>
</html>