<?php 
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 



if (!isset($_GET['id']))
    {
        $userid=1;
    }
    else
    {
        $userid = $_GET['id'];
    }

    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    
        $query = "SELECT * FROM users WHERE id='$userid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

        foreach($row as $user)
        {
            $id = $user['id'];
            $first_name = $user['first_name'];
            $last_name = $user['last_name'];
            $skillset = $user['skillset'];
            $picture = $user['picture'];
            $bio = $user['bio'];
            $image = "upload/$picture";
            $website = $user['website'];
            $account = $user['account'];
            if ($website != '')
            {
                $website = "<p>Website: <a href='$website' target= '_blank'>$website</a></p>";
            }
            if ($picture == '')
            {
                $image = "upload/default/default.jpg";
            }
        }



        $query = "SELECT * FROM users WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $cur_user = $sql->fetchAll();
        foreach($cur_user as $cur_user)
        {
            $my_account = $cur_user['account'];
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
	<div class="container" id="main">
		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
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
                            
                            {
                                include "navbar.php";
                                navbar($userid, $account);
                            }
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
						<ul class="timeline">
                            <?php include_once "check_percentage.php"; ?>
							<!-- start:profile -->
							<li id="id-profile">
                                 <form class="col-lg-12 organizations" style="float:left;">	
								<div class="timeline-badge default"><i class="fa fa-user"></i></div>
								<h1 class="timeline-head">PROFILE</h1>
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
					        
					        <!-- end:profile -->
                            
                            <!-- Start Profile-->
					        <li>
                               
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel organizations" id="organizations">
					          		<h1>Add Organization</h1>
                                    <h3>What Organizations Are You a Part of?</h3>
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6">
					          					<div class="col-md-12 ">
					          						<input name="title" class="form-control input-lg" placeholder="Organization Name..."> 
					          					</div>
                                                
                                                <div class="col-md-3 ">
                                                
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
                                        <div class="col-md-4 ">
                                       <label for="date"></label>
                                                <input class=" form-control" id="year" name="year" placeholder="Year...">
                                        </div>
					          				</div>
					          				<div class="col-md-6">
					          					<div class="">
					          						<textarea name="description" class="form-control input-lg" rows="7" placeholder="Description..."></textarea>
					          					</div>
					          				</div>
					          			</div>
                                        
                                        
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                    
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       
                                               
                                        </div>
                                        
                                
					          		</form>
                                    
				            <button type="button" class="btn btn-lg btn-primary btn-success btn-block" id="submit_organizations">SUBMIT</button>
                            
					          	</div>
					        </li>

                    <?php
include_once "functions.php";
bug_report();
?>
            </div>
        	
	</div>
    
    <div id="organizations_div" ><p></p></div>
 
    
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


//for organizations
$(function() {
//twitter bootstrap script
	$("button#submit_organizations").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_organizations.php",
			data: $('form.organizations').serialize(),
        		success: function(msg){
                    
 	          		  $("#organizations").html(msg);
                    //clear form.
                    
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
			url: "process_organizations.php",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#organizations").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#organizations').load('process_organizations.php');
    return false;
});
             
            

            
            
            
            
</script>
</body>
</html>