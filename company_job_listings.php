<?php

if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
}
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
					          		<h1>Your Official GamerStack Jobs</h1>
                                    <?php include_once "functions.php"; dashboard_links(); ?>

                                    <div class="hr-left"></div>
						          	<div class="work-experience">
<?php
include_once "functions.php";

        
    //add a new item to DB
            print "<h3>Company Job Positions</h3>
            
            <ul>";

            $query = "SELECT * FROM company_workers WHERE companyid='$sess_id' ORDER BY addedon DESC";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                $companyid = $row['companyid']; 
                $userid = $row['userid'];
                $from = get_user($companyid);
                $id = $row['id'];
                $cand = get_user($userid);
                $cand_name = $cand['name'];
                $title = $row['title'];
                $game_ids = $row['games'];
                $game_ids = explode(",",$game_ids);
                $game_links = get_games_links_with_id_by_array($game_ids);
                
                
                if ($from['account'] == 0)
                {
                    
                }
                else
                {
                    print "<li id='user$userid'><a  href='php_profile.php?id=$userid'>$cand_name</a> works at <a href='php_company.php?id=$companyid' >".$from['company']. "</a> with the job title <u>$title</u> <a href='#' class='remove_user' id='$userid'><b>(REMOVE)</b></a>";
                    if (sizeof($game_links) > 0)
                    {
                        print "<ul> ";
                        for ($i = 0; $i < sizeof($game_links); $i++)
                             {
                                print "<li id='game_{$game_links[$i][0]}-$userid'>".$game_links[$i][1]." <a href='#' class='remove_game' id='{$game_links[$i][0]}-$userid'><b>(REMOVE)</b></a></li>";
                                
                             }
                        print "</ul>";
                    }
                    
                    
                   // print "  
                    //(<a href='#' class='accept' id='$id'>Accept</a> / <a href='#' class='decline' id='$id'>Decline</a>)</li>";
                }
            }
print "</ul>";
            

        
        
        
    
?>
						          	</div>
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


             
$(document).on("click",".remove_user",function(e){
    var user_id = this.id;
     
     
     e.preventDefault();
    
     $.ajax({
    		   	type: "GET",
			url: "process_company_remove_jobs.php?removejob=true",
			data: 'id=' + user_id,
        		success: function(msg){
                    
 	          		  $("#user"+user_id).html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
     
 });    
            
$(document).on("click",".remove_game",function(e){
    var game_id = this.id;
    
     
     e.preventDefault();
    
     $.ajax({
    		   	type: "GET",
			url: "process_company_remove_jobs.php?removegame=true",
			data: 'id=' + game_id,
        		success: function(msg){
 	          		  $("#game_"+game_id).html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
     
 }); 

            
            
            
            
</script>
</body>
</html>