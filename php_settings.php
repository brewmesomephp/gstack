<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 

if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];
include_once "functions.php";
if (get_account_type($sess_id))
{
	header( 'Location: php_company_profile_ajax.php' ) ;
}
?>











<?php
    
    //convert all connections to this tomorrow
        include_once "db.php";
        $sql = new Connector();
        $sql->connect();
        $dbs = $sql->get_db();


/*$query = "SELECT * FROM settings WHERE userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

    foreach($row as $row) 
    {
        
  
    }*/
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
                        
						<ul class="timeline">
							<?php include_once "check_percentage.php"; ?>

					        <!-- start:work -->
					        <li id="id-work">
								<div class="timeline-badge default"><i class="fa fa-briefcase"></i></div>
								<h1 class="timeline-head">Settings</h1>
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
					          	<div class="timeline-badge danger"></div>
					          	<div class="timeline-panel">
                                    
                                    
                                    <?php

include_once "functions.php";
$userid = $_SESSION['id'];

//echo json_encode(($_POST));
//print_r($_POST);

//auto update DB with UPDATE email_settings SET {POST_KEY} = {{VAL}} WHERE userid=$_SESSION['id'];
$dbs = db_connection();
$test = "SELECT * FROM mail_settings WHERE userid='$userid'";
$sql = $dbs->prepare($test);
$sql->execute();
$fetch = $sql->fetchAll();
$fetch = $fetch[0];
if (sizeof($fetch) < 1)
{
    $q = "INSERT INTO mail_settings (userid) VALUES('$userid')";
    $sql = $dbs->prepare($q);
    $sql->execute();
}
$account = $fetch['account'];
$msg = $fetch['msg'];
$jobs = $fetch['jobs'];
$notifications = $fetch['notifications'];
$news = $fetch['news'];

function checked($var, $option)
{
    if ($var == $option)
    {
        print " checked = 'checked'";
    }
} 

?>
                                <ul class='list-inline'>
                                                                    
                                    <li style='max-width:300px;'>
                                        <form action="process_settings.php" method="post" id="messages">  
                                            
                                            <h2>Messages</h2>
                                      <p id="options1"></p>
                                            <p class="msg_description" >Receive emails when someone sends you a message on GamerStack. </p>
                                        <div class="radio">
                                          <label><input type="radio" name="msg" value="1" <?php checked($msg, 1);?>>Notify me immediately</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="msg" value="2"<?php checked($msg, 2);?>>Once a day</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="msg"  value="3"<?php checked($msg, 3);?>>Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="msg"  value="0" <?php checked($msg, 0);?> >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s"/>
                                    
                                    </form>
                                    </li>
                                
                                    <li style='max-width:300px;'>
                                        <form action="process_settings.php" method="post" id="profile">  
                                            
                                    <h2>Notifications</h2>
                                      <p id="options2"></p>
                                            <p id="profile_description">Get email notification when you have a new notification (follows, likes, invites, etc)</p>
                                        <div class="radio">
                                          <label><input type="radio" name="notifications" value="1" <?php checked($notifications, 1);?>>Notify me immediately</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="notifications" value="2"<?php checked($notifications, 2);?>>Once a day</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="notifications"  value="3"<?php checked($notifications, 3);?>>Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="notifications"  value="0" <?php checked($notifications, 0);?> >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s2"/>
                                    
                                    </form>
                                    </li>
                                    
                                    <li  style='max-width:300px;'>
                                        <form action="process_settings.php" method="post" id="games">  
                                            
                                    <h2>Newsletter</h2>
                                      <p id="options3"></p>
                                            <p id="games_description">Get info on updates, new games, members, jobs, articles, etc.</p>
                                        <div class="radio">
                                          <label><input type="radio" name="news" value="1" <?php checked($news, 1);?>>Notify me immediately</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="news" value="2"<?php checked($news, 2);?>>Once a day</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="news"  value="3"<?php checked($news, 3);?>>Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="news"  value="0" <?php checked($news, 0);?> >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s3"/>
                                    
                                    </form>
                                    </li>
                                    
                                    <li  style='max-width:300px;'>
                                        <form action="process_settings.php" method="post" id="account">  
                                            
                                    <h2>Account</h2>
                                      <p id="options4"></p>
                                            <p class="account_info"> Get information regarding your account send to your email. </p>
                                        <div class="radio">
                                          <label><input type="radio" name="account" value="1" <?php checked($account, 1);?>>Immediately</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="account" value="0" <?php checked($account, 0);?>>Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s4"/>
                                    
                                    </form>
                                    </li>
                                    
                                    <li  style='max-width:300px;'>
                                        <form action="process_settings.php" method="post" id="candidates">  
                                            
                                    <h2>Jobs</h2>
                                      <p id="options10"></p>
                                            <p class="users_info"> Receive notifications when new jobs are posted </p>
                                        <div class="radio">
                                          <label><input type="radio" name="jobs" value="1" <?php checked($jobs, 1);?>>Notify me immediately</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="jobs" value="2"<?php checked($jobs, 2);?>>Once a day</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="jobs"  value="3"<?php checked($jobs, 3);?>>Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="jobs"  value="0" <?php checked($jobs, 0);?> >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s10"/>
                                    
                                    </form>
                                    </li>
                                    
                                    
                                    <?php /*
                                    <li  style='max-width:300px;'>
                                        <form action="process_settings.php" method="post" id="connections">  
                                            
                                    <h2>Connections</h2>
                                      <p id="options6"></p>
                                            <p id="connections_description">People can view your profile and then send you a request to connect. They can also request that you be labeled as working for their company and game within the site which will boost your reputation. Normally these types of requests are sent from people interested in your work and have questions for you. How often do you want to be notified via email about such requests?</p>
                                        <div class="radio">
                                          <label><input type="radio" name="msg" value="1">Notify me immediately</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="msg" value="2">Once a day</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="msg"  value="3">Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="msg"  value="0" >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s6"/>
                                    
                                    </form>
                                    </li>
                                    
                                    <li  style='max-width:300px;'>
                                    <form action="process_settings.php" method="post" id="industry">  
                                            
                                    <h2>Industry</h2>
                                      <p id="options7"></p>
                                            <p id="industry_description">People can view your profile and then send you a request to connect. They can also request that you be labeled as working for their company and game within the site which will boost your reputation. Normally these types of requests are sent from people interested in your work and have questions for you. How often do you want to be notified via email about such requests?</p>
                                        <div class="radio">
                                          <label><input type="radio" name="industry" value="1">Notify me immediately and then check up periodically</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="industry" value="2">Notify me daily and periodically</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="industry"  value="3">Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="industry"  value="0" >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s7"/>
                                    
                                    </form>
                                    </li>
                                    
                                    <li  style='max-width:300px;'>
                                    <form action="process_settings.php" method="post" id="professional">  
                                            
                                    <h2>Professional</h2>
                                      <p id="options8"></p>
                                            <p id="professional_description">People can view your profile and then send you a request to connect. They can also request that you be labeled as working for their company and game within the site which will boost your reputation. Normally these types of requests are sent from people interested in your work and have questions for you. How often do you want to be notified via email about such requests?</p>
                                        <div class="radio">
                                          <label><input type="radio" name="professional" value="1">Notify me immediately and then check up periodically</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="professional" value="2">Notify me daily and periodically</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="professional"  value="3">Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="professional"  value="0" >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s8"/>
                                    
                                    </form>
                                    </li>
                                
                                <li  style='max-width:300px;'>
                                <form action="process_settings.php" method="post" id="gamerstack">  
                                            
                                    <h2>GamerStack</h2>
                                      <p id="options9"></p>
                                            <p id="gamerstack_description">People can view your profile and then send you a request to connect. They can also request that you be labeled as working for their company and game within the site which will boost your reputation. Normally these types of requests are sent from people interested in your work and have questions for you. How often do you want to be notified via email about such requests?</p>
                                        <div class="radio">
                                          <label><input type="radio" name="gamerstack" value="1">Notify me immediately and then check up periodically</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="gamerstack" value="2">Notify me daily and periodically</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="gamerstack"  value="3">Weekly</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="gamerstack"  value="0" >Never</label>
                                        </div>
                                        <p id="submit_text" style="height:10px;color:green;"></p> 
                                        <input type="button" value="Update" class="formsubmit" id="s9"/>
                                    
                                    </form>
                                    </li>*/?>
                                    
                                    </ul>
                                        <br>
                                    
                                    
                                   
					          	</div>
					        </li>
                            
                            
					        <!-- end:work -->
					        <!-- start:contact -->
					        <?php
include_once "functions.php";
bug_report();
?>
					        <!-- end:contact -->
					    </ul>
					</div>
					<!-- end:main content -->
				</div>
			</div>
		</div>
	</div>
	<!-- end:main -->

	<!-- start:footer -->
	<footer>
		<div class="container-fluid">
			<div class="text-center">
				<p>Copyright &copy; 2017. All Rights Reserved.</p>
			</div>
		</div>
	</footer>
	<!-- end:footer -->

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
    
    
    //update all
     $('.formsubmit').on("click", function(e) {
        e.preventDefault();
         if (event.target.id == "s")
         {
             var setting="#messages";
             var display="#options1";
         }
         else if(event.target.id=="s2")
         {
             var setting="#profile";
             var display="#options2";
         }
         else if(event.target.id=="s3")
         {
             var setting="#games";
             var display="#options3";
         }
         else if(event.target.id=="s4")
         {
             var setting="#account";
             var display="#options4";
         }
         else if(event.target.id=="s5")
         {
             var setting="#jobs";
             var display="#options5";
         }
         else if(event.target.id=="s6")
         {
             var setting="#connections";
             var display="#options6";
         }
         else if(event.target.id=="s7")
         {
             var setting="#industry";
             var display="#options7";
         }
         else if(event.target.id=="s8")
         {
             var setting="#professional";
             var display="#options8";
         }
         else if(event.target.id=="s9")
         {
             var setting="#gamerstack";
             var display="#options9";
         }
         else if(event.target.id=="s10")
         {
             var setting="#candidates";
             var display="#options10";
         }
         var msg = $(setting).serialize();
        
         $.post('process_settings.php', msg, function (data) {
             
            //j_vars = JSON.parse(data);
             //$.each(j_vars, function(key, value){
            //console.log(key, value);
//});
             var font = "<p style='color:green'>" + data + "</p>";
             $(display).html(font);
         });
                });

        
    
    </script>

    
    
</body>
</html>