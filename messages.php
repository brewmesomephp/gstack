<?php

if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
if (isset($_GET['id']))
{
    $contact_id = $_GET['id'];
}
else
    $contact_id = -1;
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
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel game_updates" id="game_updates">
					          		<h1>Messages</h1>
                                    <?php include_once "functions.php"; dashboard_links(); ?>
    
                                    
                                </div>
                    
					        </li>

                    
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
        <script>

$(function() {
//twitter bootstrap script
	$(document).on("click",".btn_msg",function(e){
        
        
        
        
        
        
        
        
        
    var to_id = this.id;
    var msg = $('#message').val();
    var to = $('#sendto').val();

     $.ajax({
    		   	type: "POST",
			url: "process_message.php", 
			data: {
            'to':to,
            'msg':msg
            
            },
        		success: function(msg){
                    
 	          		  $("#game_updates").html(msg);
                      $(".send_msg").html("");
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
 
            
            
            
            
            
         
            
    $(document).ready(function() {
    $('#game_updates').load('process_message_inbox.php?id=<?=$contact_id?>');
    return false;
});
             
            

            
            
            
            
</script>
</body>
</html>