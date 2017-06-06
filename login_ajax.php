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
	<div class="container text-center" id="main" >
		<div class="row text-center">
			<div class="col-md-offset-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
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
							
							
						</div>
					</nav>
					<!-- end:navbar -->        
            
            
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                          
            	
                <!-- start:awards -->
					        <li id="id-resume">
                                <form class="col-lg-12 awards" style="float:left;">
					        	
					        	<h1 class="timeline-head">GamerStack LOGIN</h1>
                                
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
					          						<input name="email" id="email" type="email" style="padding:18px;font-size:16px;border-color:#34495e;height:100%;" class="form-control input-lg login" placeholder="E-mail..."> 
					          					</div>
					          					<div class="col-md-12 ">
					          						<input name="pass" id="password" type="password" style="padding:18px;font-size:16px;border-color:#34495e;height:100%;" class="form-control input-lg login" placeholder="Password...">
					          					</div>
                                                <div class="col-md-12">
                                                Not a member of GamerStack? <a href="index.php">Register Today!</a>
                                                </div>
                                              
					          				</div>
					          				
                                        
                                
					          		</form>
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_login">SUBMIT</button>
                            
					          	</div>
					        </li>
                    <!-- start:contact -->
				       
					        <!-- end:contact -->

                    
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
    
	 <!-- end:javascript -->
        <script>


    $('#email').keypress(function (e) {
  if (e.which == 13) {
    $( "button#submit_login" ).trigger( "click" );
    return false;    //<---- Add this line
  }
});
    
    $('#password').keypress(function (e) {
  if (e.which == 13) {
    $( "button#submit_login" ).trigger( "click" );
    return false;    //<---- Add this line
  }
});
            
//for awards
$(function() {
//twitter bootstrap script
	$("button#submit_login").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_login.php",
			data: $('form.awards').serialize(),
        		success: function(msg){
                      if (msg == "fail_pass")
                      {
                          $("#alarm").html("Make sure your passwords match.");
                      }
                      else if(msg == "fail_email")
                      {
                          $("#alarm").html("Invalid email");
                      }
                      else
                      {
                          //$("#alarm").html("SUCCESS!");
                          if (msg == "0")
                          {
                                $("#form_content").html("<h3>SUCCESS! Redirecting You to  <a href='php_splash_candidate.php'>Profile</a></h3>");
                              setTimeout(function () {
                               window.location.href = "php_splash_candidate.php"; //will redirect to your blog page (an ex: blog.html)
                            }, 2000); //will call the function after 2 secs.
                          }
                          else if(msg == "1")
                          {
                              $("#form_content").html("<h3>SUCCESS! Redirecting You to  <a href='php_splash_company.php'>Profile</a></h3>");
                              setTimeout(function () {
                               window.location.href = "php_splash_company.php"; //will redirect to your blog page (an ex: blog.html)
                            }, 2000); //will call the function after 2 secs.
                          }
                          else if(msg == "2")
                          {
                              $("#alarm").html("You must verify your email first before you can log in. Didn't receive the email? <a href='verify.php'>Click Here</a>");
                          }
                          else
                          {
                              
                            $("#alarm").html("An unknown error occurred. Please check your information then try again.");   
                          }
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