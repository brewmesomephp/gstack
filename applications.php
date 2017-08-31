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
					          	<div class="timeline-panel game_updates" id="">
					          		<h1>Job Applications</h1>
                                    <?php include_once "functions.php"; dashboard_links(); ?>
    
                                    <div class="hr-left"></div>
						          	<div class="work-experience">

<?php
include_once "functions.php";

    
    //add a new item to DB
            print "<h3>Recent Applications</h3>";
            $user = get_user($sess_id);



            //If the person is a Candidate, query for all of those applications. 
            if ($user['account'] == 0){
                $query = "SELECT * FROM `apply_now` WHERE `userid`='$sess_id' ORDER BY `time_applied` DESC";
            }
            //If this is a Company, query for all of those applications.
            else{
                $query = "SELECT * FROM `apply_now` WHERE `companyid`='$sess_id' ORDER BY `time_applied` DESC";
            }


            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();

            //display the apps now
            foreach($rows as $row)
            {
                $fromid = $row['userid'];
                $GLOBALS['fromid'] = $fromid;
                $from = get_user($fromid);
                $jobid = $row['jobid'];
                $id = $row['id'];
                $read = $row['read'];
                $status = $row['status'];
                $time_read = $row['time_read'];
                $time_responded = $row['time_responded'];
                $company_id = $row['companyid'];
                
                //gets company name
                $company_data = get_user($company_id);
                $company_name = $company_data['name'];
                
                
//                row in db of job
                $job = get_job($jobid);
                $title = $job['title'];
                
                
                //if the job application is from a USER not a company [tbh i dont know why this is here cuz they all are from users]
                if ($from['account'] == 0)
                {
                    //display the link to view the app 
                    print "<b><a href='php_profile.php?id=$fromid'>".$from['name']. "</a></b> applied for <b><a href='view_job.php?jobid=$jobid'>$title</a></b>";
                    if (isset($_GET['viewapp']) && $id == $_GET['viewapp']){
                        
                        
                        //mark as read if not already
                        $viewapp = $_GET['viewapp'];
                        $query2 = "UPDATE `apply_now` SET `read`='1', `time_read`=CURRENT_TIMESTAMP WHERE `id`='$viewapp' AND `read`='0'";
                        $sql = $dbs->prepare($query2);
                        $sql->execute();
                        
                        
                        //now check if it is accepted
                        if (isset($_GET['a'])){
                            $a = $_GET['a'];
                            if ($user['id'] == $company_id){
                                if ($a){
                                    $app_id = $viewapp;
                                    print "<br />Accepted.";
                                    $query = "UPDATE apply_now SET status='1' WHERE  id='$app_id'";
                                    //now message all team members
                                    //add to 
                                    
                                    //                          company,     applicatoin id
                                    
                                    $applicant = $from['name'];
                                    $applicant_id = $from['id'];
                                    $userLink = "<a href='php_profile.php?id=$applicant_id'>$applicant</a>";
                                    $this_job = getJobByAppId($app_id);
                                    $title_of_this_job = $this_job['title'];
                                    $company_message = "$userLink just joined the $company_name team! Send him a message to welcome $applicant";
                                    $jobtitle = $title;
                                    print "<h1>$company_message</h1>";
                                    
                                    //i think we're going to move this to when someone is accepted and accepts an invitation, etc
//                                    send_message_to_company_users($company_id, $company_message);
                                    
                                    //now give them the choice to make it public?
                                    print "<h2>Which game is this job for?</h2>";
                                    print "<p class='gamelist'>";
                                    $possible_games = get_games($company_id);
                                    foreach($possible_games as $game){
                                        $game = array_to_object($game);
                                        $id = $game->id;
                                        print "<a href='#' id='$game->id' class='add_game'>$game->title</a> | ";
                                    }
                                    print "<a href='#' class='add_game' id='-1'>N/A</a> </p>";

                                }
                                else{
                                    print "<br />Denied.";
                                    $query = "UPDATE apply_now SET status='-1' WHERE id='$app_id'";
                                }
                                $sql = $dbs->prepare($query);
                                $sql->execute();

                            }
                        }
                        
                        $message = $row['message'];
//                        display message
                        
                        print "<h2>" . $from['name'] . " &#8212; $title</h2>";
                        print "<br><b style='padding-left:20px;'>Cover Letter</b><br>";
                        print "<p style='padding-left:20px;'>$message</p>";
                        if ($user['account'] == 1){
                            print "<u><a href='applications.php?viewapp=$id&a=1&fromid=$fromid' id='$id'>Accept</a></u> / <u><a href='applications.php?viewapp=$id&a=0&fromid=$fromid'  id='$id'>Decline</a></u><br />  ";                   
                        }
                        
                        
                        ?>
                                                                                                        <div id="game_updates"><p></p></div>

                        <form class='send_msg'>
                        <div class='row'>

                            <div class='col-md-10'>
                                <div class='form-group'>
                                    <textarea class='form-control input-lg' name='message' rows='1' id='message' placeholder='Message...'></textarea>
                                    <input type='hidden' value='<?=$fromid?>' id='sendto' name='sendto'>
                                </div>
                            </div>
                            <div class='form-group col-md-2'>
                            <button class='btn btn-lg btn-primary btn-block btn_msg' type='button' id='<?=$fromid?>'>SEND</button>
                        </div>
                        </div>

                    </form>
                                        <?php
                    }
                    else{
                        if ($user['account'] == 1){

                            print "<br /><a href='applications.php?viewapp=$id&fromid=$fromid'>[View Application]</a> <a href='applications.php?viewapp=$id&a=1' id='$id'>Accept</a> / <a href='applications.php?viewapp=$id&a=0'  id='$id'>Decline</a><br />  ";
                        }
                        else{
                            print " -> <a href='applications.php?viewapp=$id&fromid=$fromid'>[View Application]</a> <br />  ";

                        }
                        
                    }

                    print "<br />";
                    
                }
                else
                {
                                        print "<a href='php_profile.php?id=$fromid'>".$from['name']. "</a> applied for $title.<br />";

//                    print "<a href='php_company.php?id=$fromid'>".$from['name']. "</a> wants to connect with you.<br />";
                }
            }
            

   
?>
						          	</div>
                                </div>
					        </li>    
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
        
<?php if (isset($_GET['viewapp'])){ 
       $sess_id = $_SESSION['id'];
       
       $app = $_GET['viewapp'];
//        $contact_id = $_GET['fromid'];
        $user = get_user($_SESSION['id']);
       //shape this code up asap... im brain dead right now and i know its sloppy. im surprised i can think
       if ($user['account'] == 0){
                $query = "SELECT * FROM `apply_now` WHERE `userid`='$sess_id' AND `id`='$app'  ORDER BY `time_applied` DESC";
                $sql = $dbs->prepare($query);
                $sql->execute();
                $rows = $sql->fetchAll();
                foreach ($rows as $row)
                    $contact_id = $row['companyid'];
            }
            //If this is a Company, query for all of those applications.
            else{
                $query = "SELECT * FROM `apply_now` WHERE `companyid`='$sess_id' AND `id`='$app' ORDER BY `time_applied` DESC";
                $sql = $dbs->prepare($query);
                $sql->execute();
                $rows = $sql->fetchAll();
                foreach ($rows as $row)
                    $contact_id = $row['userid'];
            }

        $app = $_GET['viewapp'];
       
       
             
       
       

       
       
       
       
       
       
        ?>
                    
                            <script>

            
            //twitter bootstrap script
                $(document).on("click",".add_game",function(e){
                e.preventDefault();
                var game_id = this.id;
                var userid = <?=$applicant_id?>;
                var companyid = <?=$sess_id?>;
                var jobtitle = "<?=$jobtitle?>";
                //must add current job title as well, ffs. or grab it from the application
                
                alert ("game_id: " + game_id + ", userid: " + userid + ", companyid: " + companyid + ", jobtitle: " + jobtitle);
                
                 $.ajax({
                            type: "POST",
                        url: "process_add_worker.php?add_game=1", 
                        data: {
                        'game_id':game_id,
                        'userid':userid,
                        'companyid':companyid,
                        'jobtitle':jobtitle
                        },
                            success: function(msg){
                                  $(".gamelist").html(msg);
                            },
                        error: function(){
                            alert("failure. please report as bug.");
                            }
                        });
                });
            
                                
                                

$(function() {
//twitter bootstrap script
	$(document).on("click",".btn_msg",function(e){
    var to_id = this.id;
    var msg = $('#message').val();
    var to = $('#sendto').val();
     $.ajax({
    		   	type: "POST",
			url: "process_message.php?display_contacts=0&display_header=0&app=<?=$app?>", 
			data: {
            'to':<?=$contact_id?>,
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
    $('#game_updates').load('process_message_inbox.php?id=<?=$contact_id?>&display_contacts=0&display_header=0&app=<?=$app?>');
    return false;
});
                 
            
</script>
                    <?php } ?>
</body>
</html>