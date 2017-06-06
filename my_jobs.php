<?php

if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
if (isset($_GET['id']))
{
    $contact_id = $_GET['id'];
}
else
    $contact_id = -1;
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
					          		<h1>My Jobs</h1>
                                    <h5><a href='messages.php'>Messages</a> / <a href='notifications.php'>Notifications</a> / <a href='showed_interest.php'>Requests to Connect</a> /   <a href='invites.php'>Invites</a></h5>

                                    <div class="hr-left"></div>
						          	<div class="work-experience">
                                        
            <h3>Jobs</h3> <div class='hr-left'></div><div id='final' class='row'>
<?php
include_once "functions.php";

        
    //add a new item to DB

            $query = "SELECT * FROM company_workers WHERE userid='$sess_id' ORDER BY addedon DESC";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                
                $companyid = $row['companyid'];
                $jobid = $row['id'];
                $title = $row['title'];
                $company = get_user($companyid);
                
                
                
                
                
                
                
                $job_title = "                  

                                                <form id='add_title'>
                                                    <div class='col-md-7'><input class='job_title form-control input-lg' id='txt$jobid' name='title' value='$title' placeholder='Job title...'></div>
                                            

                                            <div class='col-md-3'>
                                            <button type='button' class='btn btn-lg btn-primary btn-success btn-block add_title' id='$jobid'>Edit Job title</button></div>
                                            <a class='remove' id='$jobid'>Remove Job</a>
                                            
                                            </form>
                                            ";
                
                
                
                
                
                
                
                
                
                print "<div class='row'><div class='col-md-2' id='company_link$jobid'><a href='php_company.php?id=$companyid'>".$company['company'] . 
                    "</a> </div><div class='col-md-10' id='row_job_title'>$job_title</div>";
                
                
            }
            
        
        
        
    
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



//remove
$(document).on("click",".remove",function(e){
 var job_num = this.id;
     alert("removing: " + job_num);
     $.ajax({
    		   	type: "GET",
			url: "accept_company.php?remove=true",
			data: 'remove_id=' + job_num,
        		success: function(msg){
                    
                       $("#company_link"+job_num).html("")
 	          		  $("#final").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });
            
            
            
$(document).on("click",".add_title",function(e){
 var add_id = this.id;
    //alert ($(this).parent().parent().children().attr('class'));
    var title = $('#txt'+add_id).val();
    

     $.ajax({
    		   	type: "POST",
			url: "accept_company.php", 
			data: {
            'edit':add_id,
                'title':title
            }
         
         ,
        		success: function(msg){
                    
                      $("#final").html(msg);
 	          		  //
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });
            
            
            
            
            
            
</script>
</body>
</html>