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
                          
            	
                <!-- start:game_updates -->
					        <li id="id-resume">
                                <?php include_once "check_percentage.php"; ?>
                               <form class="col-lg-12 game_updates" style="float:left;">   
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel game_updates" id="game_updates">
					          		<h1>Job Applications</h1>
                                    <?php include_once "functions.php"; dashboard_links(); ?>
    
                                    <div class="hr-left"></div>
						          	<div class="work-experience">
<?php
include_once "functions.php";

        
    //add a new item to DB
            print "<h3>Recent Applications</h3>";
            $query = "SELECT * FROM `apply_now` WHERE `companyid`='$sess_id' ORDER BY `time_applied` DESC";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                $fromid = $row['userid'];
                $from = get_user($fromid);
                $jobid = $row['jobid'];
                $id = $row['id'];
                $read = $row['read'];
                $status = $row['status'];
                $time_read = $row['time_read'];
                $time_responded = $row['time_responded'];
                
                 
                
//                row in db of job
                $job = get_job($jobid);
                $title = $job['title'];
                
                
                
                if ($from['account'] == 0)
                {
                    
                    print "<b><a href='php_profile.php?id=$fromid'>".$from['name']. "</a></b> applied for <b><a href='view_job.php?jobid=$jobid'>$title</a></b>";
                    if (isset($_GET['viewapp']) && $id == $_GET['viewapp']){
                        $viewapp = $_GET['viewapp'];
                        $query2 = "UPDATE `apply_now` SET `read`='1', `time_read`=CURRENT_TIMESTAMP WHERE `id`='$viewapp' AND `read`='0'";
                        $sql = $dbs->prepare($query2);
                        $sql->execute();
                        $message = $row['message'];
                        print "<br><b style='padding-left:20px;'>Cover Letter</b><br>";
                        print "<p style='padding-left:20px;'>$message</p>";
                        print "<i>[View Application]</i>  <a href='applications.php?viewapp=$id&a=1' class='accept' id='$id'>Accept</a> / <a href='applications.php?viewapp=$id&a=0' class='decline' id='$id'>Decline</a><br />  ";
                    }
                    else{
//                        print "<br /><a href='applications.php?viewapp=$id'>[View Application]</a> <a href='applications.php?viewapp=$id&a=1' class='accept' id='$id'>Accept</a> / <a href='applications.php?viewapp=$id&a=0' class='decline' id='$id'>Decline</a><br />  ";
                        
                    }
                    
                    
                    print "<br />";
                    
                }
                else
                {
                                        print "<a href='php_profile.php?id=$fromid'>".$from['name']. "</a> applied for $title.<br />";

//                    print "<a href='php_company.php?id=$fromid'>".$from['name']. "</a> wants to connect with you.<br />";
                }
            }
            
            print "<h3>Invites</h3>";
            print "<ul>\n";
            $query = "SELECT * FROM company_worker_invites WHERE toid='$sess_id' AND viewed='0' ORDER BY viewed ASC";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                $fromid = $row['fromid']; 
                $from = get_user($fromid);
                $id = $row['id'];
                $title = $row['job_title'];
                $game_ids = $row['games'];
                $game_ids = explode(",",$game_ids);
                $game_links = get_games_links_by_array($game_ids);
                
                
                if ($from['account'] == 0)
                {
                    
                }
                else
                {
                    print "<li id='company$id'><a href='php_company.php?id=$fromid'>".$from['company']. "</a> Says you work";
                    if (sizeof($game_links) > 0)
                    {
                        print " on ";
                        for ($i = 0; $i < sizeof($game_links); $i++)
                             {
                                 print $game_links[$i];
                                if ($i < (sizeof($game_links)-1))
                                {
                                    if ($i == (sizeof($game_links) - 2))
                                    {
                                        print " and ";
                                    }
                                    else
                                        print ", ";
                                }
                             }
                    }
                    
                    
                    print " with the job title <u>$title</u>. 
                    (<a href='applications.php?viewapp=$id&a=1' class='accept' id='$id'>Accept</a> / <a href='applications.php?viewapp=$id&a=0' class='decline' id='$id'>Decline</a>)</li>";
                }
            }
    print "</ul>";
                $query = "UPDATE company_worker_invites SET viewed='1' WHERE toid='$sess_id'";
                $sql = $dbs->prepare($query);
                $sql->execute();
                $query = "UPDATE show_interest SET viewed='1' WHERE toid='$sess_id'";
                $sql = $dbs->prepare($query);
                $sql->execute();
   
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


                $(document).on("click",".accept",function(e){
 var company_number = this.id;
     $.ajax({
    		   	type: "GET",
			url: "accept_company.php?accept=true",
			data: 'id=' + company_number,
        		success: function(msg){
                    
                        
 	          		  $("#company"+company_number).html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });
            
            
            
   $(document).on("click",".decline",function(e){
 var company_number = this.id;
     alert(company_number);
     $.ajax({
    		   	type: "GET",
			url: "accept_company.php?accept=false",
			data: 'id=' + company_number,
        		success: function(msg){
                    
                        
 	          		  $("#company"+company_number).html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });  
            
            
</script>
</body>
</html>