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
                          
            	
                <!-- start:skills -->
					        <li id="id-resume">
                                <form class="col-lg-12 skills" style="float:left;">
					        	
					        	<h1 class="timeline-head">skills</h1>
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
					          	<div class="timeline-panel skills" id="skills">
					          		<h1>Add Experience</h1>
                                    <div class="hr-left"></div>
						          	 <div id="skills_div" ><p></p></div>
    <!-- model content -->	
	<div>
	        
		<div>
            <h5><b>Input skills you possess with the percent value you would rate yourself in each. Ex: PhotoShop, C++, Character Creation, Unity Engine, 3DS Max, or any skill that is not a category choice for registration.</b></h5>
			<form class="contact" style="float:left;">		        	 
				Skill: <input class="input-large" id="skill_name" value="CSS" type="text" name="skill_name">
                %: <input class="input-large" id="percent" value="85" type="text" name="percent">
                
        <button class="btn btn-success submit_btn" type="button" id="submit">Add</button>
                
			</form>
            
		</div>

	</div>
    
    <div id="skill_div" ><p></p></div>
					        </li>
                                <?php
include_once "functions.php";
bug_report();
?>

                    
            </div>
        	
	</div>
    
   
 

    
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
            
            
            
            
$(document).on("click",".submit_btn",function(e){
 
    //alert ($(this).parent().parent().children().attr('class'));
    var skill = $('#skill_name').val();
    var percent = $('#percent').val();
     $.ajax({
    		   	type: "POST",
			url: "process.php",
			data: 
                {
         'skill_name':skill,
         'percent':percent
         
     
     },
        		success: function(msg){
                    
 	          		  $("#skill_div").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });
            
            


          
            
 $(document).on("click",".remove",function(e){
 var skill_number = this.id;
     $.ajax({
    		   	type: "GET",
			url: "process.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                        
 	          		  $("#skill_div").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#skill_div').load('process.php');
    return false;
});
             
            
            
$( document ).ajaxComplete(function() {
  //$( "#skill_div" ).append( "Triggered ajaxComplete handler." );
    jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});
     



    
            
            
</script>
</body>
</html>