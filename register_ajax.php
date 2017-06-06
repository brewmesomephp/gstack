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
	<div class="container" id="main">
		<div class="row">
			
			<div class="col-md-offset-3 col-lg-6  col-md-12 col-sm-12 col-xs-12">
				<div id="content">
					<!-- start:navbar -->
					
					<!-- end:navbar -->
		<div class="main-content">
				        	 
				
                 
                <ul class="timeline"  style="background-color:#fff;">
                          
            	
                <!-- start:awards -->
					        <li id="id-resume">
                                <form class="col-lg-12 awards" style="float:left;">
					        	
                                    <div class="text-center">
                                <img src="logo.png" class="img-circle sq300 width:30%; min-width:150px; max-width:300px;">
                            </div>
                                    <?php
if (isset($_GET['role']))
{
    $role = $_GET['role'];
}
else
    $role = "Candidate";
?>
					        	<h1 class="timeline-head"><?=$role?></h1>
                                    
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
                                <div class="timeline-panel word-experience" id="form_content">
                                    <h2>Registration</h2>
                                    <div id="alarm"><h5>Companies, Register <a href="register_company_ajax.php">Here</a></h5></div>
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-12 login-status">
					          					<div class="col-md-12 col-xs-14">
					          						<input name="email" id="email" type="email" style="padding-left-left:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="E-mail..."> 
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="first_name" id="first_name" style="padding-left:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="First name..."> 
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="last_name" id="last_name" style="padding-left:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Last name..."> 
					          					</div>
					          					<div class="col-md-12 ">
					          						<input name="pass" id="pass" type="password" style="padding-left:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Password...">
					          					</div>
                                                <div class="col-md-12 ">
					          						<input name="pass2" id="pass2" type="password" style="padding-left:18px;font-size:16px;border-color:#34495e;" class="form-control input-lg login" placeholder="Re-enter Password...">
					          					</div>
                                                <div class="col-sm-12 ">
                                                    <label for="role">Which of the Following Most Describes Your Game Industry Role</label>
                                                <select class="form-control" name="role" id="role">
                                                    <?php
                                                        if ($role != "Candidate")
                                                        {
                                                            print "<option>$role</option>";
                                                        }
?>
                                                    <option>Gamer</option>
                                                    <option>YouTuber</option>
                                                    <option>Animator / Modeler</option>
                                                    <option>Producer</option>
                                                    <option>Audio</option>
                                                    <option>Director / Manager</option>
                                                    <option>Designer</option>
                                                    <option>Programmer</option>
                                                    <option>Artist</option>
                                                    <option>Marketing / PR</option>
                                                    <option>QA Tester</option>
                                                    <option>Writer</option>
                                                  
                                                </select>
                                                    
                                              </div>
					          				</div>
					          				
                                        
                                
					          		</form>

                                        <br>
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_register">SUBMIT</button>
                            
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
$(document).on("click","#submit_register",function(e){
         var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var role = $('#role').val();
    var pass = $('#pass').val();
    var pass2 = $('#pass2').val();
    var email = $('#email').val();
   
		   	$.ajax({
    		   	type: "POST",
			url: "process_register.php",
			data: {
                
                    'first_name':first_name, 
                    'last_name':last_name,
                    'role':role,
                    'email':email,
                    'pass':pass,
                    'pass2':pass2
                  },
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
                          $("#form_content").html("<h3>SUCCESS!! <a href='login_ajax.php'>Log in!</a></h3>");
                          
                      }
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