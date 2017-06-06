<?php if(session_id() == ''){session_start();} if (empty($_SESSION)){$li=0; ;}else{ include "connect.php"; $li=1;}



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
            $headline = $user['skillset'];
            $picture = $user['picture'];
            $bio = $user['bio'];
            $image = "upload/$picture";
            $company_name = $user['company'];
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
        
if ($li == 1)
{
$query = "SELECT * FROM users WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $cur_user = $sql->fetchAll();
        foreach($cur_user as $cur_user)
        {
            $my_account = $cur_user['account'];
        }
}
else
{
    //used for getting people to sign up
    $my_account = -1;   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GamerStack - Networking for the Game Industry</title>
	<meta property="og:image" content="http://www.gamerstack.io/<?=$image?>" />
    <meta property="og:title" content="<?=$company_name?> - GamerStack - Game Industry Networking" />
    <meta property="og:description" content="<?=$bio?> " />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
                                if (isset($_SESSION['id']))
                                {
                                    $session_id = $_SESSION['id'];
                                }
                                else
                                    $session_id = -1;
                                navbar($session_id, $account);
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
                        <div class="user">
                            <div class="text-center">
                                <img src="<?= $image ?>" class="img-circle sq300">
                            </div>
                            <div class="user-head text-center" >
                                <h1><?= $company_name ?></h1>
                                <div class="hr-center"></div>
                                <h4><?= $headline ?></h4>
                            </div>
                        </div>
                        
						<ul class="timeline">
							
                            
                            <!-- start:profile -->
							<li id="id-profile">
								<div class="timeline-badge default"><i class="fa fa-user"></i></div>
								<h1 class="timeline-head">PROFILE</h1>
                                <div class="fb-share-button" data-href="http://www.gamerstack.io<?=$_SERVER['REQUEST_URI']?>" data-layout="button"></div>
							</li>
					        <li id="profile">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1><strong><?= $company_name ?></strong></h1>
					          		<h4><?= $headline; ?></h4>
					          		<div class="hr-left"></div>
					          		
                                    <p><?= $bio ?></p>
                                    <?= $website ?>
					          	</div>
					        </li>
                            
       
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!-- start:current projects -->
					        
<?php
        $query = "SELECT * FROM games WHERE userid='$userid' LIMIT 3";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $games = $sql->fetchAll();
        if (sizeof($games) > 0)
        {
            
            print "
            
            <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Current Projects</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            ";
            print "<ul class='list-inline' style='text-align:center'>";
            
            
                foreach($games as $game)
                {
                    $game_title = $game['title'];
                    $game_headline = $game['headline'];
                    $game_image = $game['image'];
                    $gameid = $game['id'];
                    if ($game_image == '')
                    {
                        $game_image = 'default/default.jpg';   
                    }



                    print "<li style='max-width:200px;'><div class='text-center'>
                                <a  href='php_game.php?gameid=$gameid'><img src='upload/$game_image' class='img-circle sq200'></a>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a  href='php_game.php?gameid=$gameid'>$game_title</a></h1>
                                <div class='hr-center'></div>
                                <h4>$game_headline</h4>
                            </div>
                            </li>";
                }
            
print "</ul></div>"; 
            
            print "<p align='right'><a href='game_search_ajax.php?page=1&search=$company_name&hiring=Either'>View All Games by $company_name</a></p>";
            print "
                                    
					          	</div>";
            
					        print "</li>";
        }//end sizeof
?>                            
                            
                                        

                            
					        
					        <!-- end:projects -->
                            
                            
                            
          
                            
                            
                            
                            
                            
                            <!-- start:current contributors -->
					        
<?php
        $query = "SELECT * FROM company_workers WHERE companyid='$userid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $workers = $sql->fetchAll();
        if (sizeof($workers) > 0)
        {
            print "
            
            <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Current Contributors</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            ";
            
            
            
            include_once "functions.php";
            print "<ul class='list-inline' style='text-align:center'>";
                foreach($workers as $worker)
                {
                    $worker_info = get_user($worker['userid']);
                    $name = $worker_info['name'];
                    $title = $worker['title'];
                    $image = $worker_info['image'];
                    $workerid = $worker['userid'];
                    $u = get_user($worker['userid']);
                    $role = $u['role'];
                    $icon = $u['icon'];
                        




                    print "<li style='max-width:200px;'><div class='text-center'>
                                <a  href='php_profile.php?id=$workerid'><img src='upload/$image' class='img-circle sq200'></a>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a  href='php_profile.php?id=$workerid'>$name</a></h1>
                                <div class='hr-center'></div>
                                <h4>$title</h4>
                                <p align='center'><img src='$icon' style='max-width: 30px;'></p>
                                <h5><b>$role</b></h5>
                            </div>
                            </li>";
                }
print "</ul></div>
                                    
					          	</div>
					        </li>";
        }//end sizeof
?>                            
                            
                                        
                                    
                    
					        
					        <!-- end:contributors -->
                            
                            
                            

                            

					        <!-- start:work -->
					        
                       
                                        
<?php
        $i = "";
        $query = "SELECT * FROM company_portfolio WHERE userid='$userid' ORDER BY date_added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $c_p = $sql->fetchAll();
        
if (sizeof($c_p) > 0)
{
    print "<li id='id-work'>
								<div class='timeline-badge default'><i class='fa fa-briefcase'></i></div>
								<h1 class='timeline-head'>WORK</h1>
							</li>
							<li>
					          	<div class='timeline-badge danger'></div>
					          	<div class='timeline-panel'>
					            	<div class='timeline-body'>";
        //start the Unordered List (Thumbnails)
        print "<ul class='thumbs'>";
            foreach($c_p as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $image = $portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                //$image = "<img src='upload/$image'>";



                //$url=
                echo "<li style='width:300px;'><a href='#thumb$i' class='thumbnail' style=\"background-image: url('upload/$image')\">";
                    print "<h4>$title</h4><span class='description'>$caption</span></a>";
                print "</li>
                ";


            }
        print "</ul>"; // end the unordered list
    
    print "<p style='text-align:right'><a href='full_portfolio.php?companyid={$_GET['id']}'>View Full Portfolio</a></p>";

            //part 2 of insertion
        $i=0;
        print "<div class='portfolio-content'>";
        foreach($c_p as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $image = $portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                $image = "<img src='upload/$image'>";


                print "
                <div id='thumb$i'>
                    <div class='media'>$image</div>
                    <h1>$title</h1>
                    <p>$description</p>
                    
                </div>";



            }
        print "</div>";
        //end part 2
    print "</div>
					          	</div>
					        </li>";
}
?>                                        
                                        
                                        
      
					            	
					        <!-- end:work -->

					        <!-- start:resume -->
					        
                                    
<?php                                    
        $query = "SELECT * FROM jobs WHERE userid='$userid' ORDER BY added DESC LIMIT 3";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $jobs = $sql->fetchAll();
        

if (sizeof($jobs) > 0)
{
    
    print "<li id='id-resume'>
					        	<div class='timeline-badge default'><i class='fa fa-file'></i></div>
					        	<h1 class='timeline-head'>JOBS</h1>
					        </li>
					        <li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Job Listings</h1>";
    
    foreach($jobs as $job) 
    {
        $id = $job['id'];
        $compensation = $job['compensation'];
        $title = $job['title'];
        $location= $job['location'];
        $remote= $job['remote'];
        $description= $job['description'];
        $start_day = $job['start_day'];
        $start_month= $job['start_month'];
        $start_year= $job['start_year'];
        $volunteer= $job['volunteer'];
        $permanent = $job['permanent'];
        if ($permanent == '')
        {
            $permanent = " ";
        }
        
        if ($volunteer == 1)
        {
            $compensation = "Volunteer Position";
        }
        else
        {
            $compensation = "Paid Position";
        }
        if ($remote == 1)
        {
            $location = "Remote";
        }
        if ($permanent == 1)
        {
           $permanent = "Permanent Position"; 
        }
        else
        {
            $permanent = "Temporary Position";
        }
        
        //print "$compensation, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $volunteer";
        /*print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title: $compensation (<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $volunteer, $location $remote</small>
                <p>$description</p>
            </div>";*/
        print "
        <hr>
        <div class='work-experience'>
            <h3>$title</h3>
            <h4>Location: $location</h4>
            <h5>$compensation</h5>
            <small><i class='fa fa-calendar'></i>Start Date: $start_month/$start_day/$start_year</small>
            <p>$description</p>
            <p align='right'><a href='view_job.php?jobid=$id'>View Full Job Description</a>
        </div>
        ";
        
        
        
        
  
    }
    print "<p align='right'><a href='job_search_ajax.php?page=1&search=$company_name'>View All Listings By $company_name</a>";
print "</div>
					        </li>";
}//end sizeof


    

?>
					          	
					        
<?php
        $query = "SELECT * FROM company_achievements WHERE userid='$userid' ORDER BY year DESC,month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $achievements = $sql->fetchAll();
if (sizeof($achievements) > 0)
{
    print "<li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Achievements</h1>";
    foreach($achievements as $achievement) 
    {
        $id = $achievement['id'];
        $title = $achievement['title'];
        $description= $achievement['description'];
        $month= $achievement['month'];
        $year= $achievement['year'];
        


        
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title</h3>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }
    print "</div>
					        </li>";
}//end sizeof



    

?>
					          	
					        
<?php
if ($sess_id != $_GET['id'])
    {
?>
					        <!-- start:contact -->
					        <li id="id-contact">
					        	<div class="timeline-badge default"><i class="fa fa-envelope"></i></div>
					        	<h1 class="timeline-head">CONTACT</h1>
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Contact Me</h1>
					          		<div class="hr-left"></div>
                                    <?php
                                    
                                    if (!isset($_SESSION['id']))
                                        $sess_id = -1;
                                    if ($_GET['id'] != $sess_id)
                                    {
                                        if (($my_account == 0 || $account == 1) && $sess_id != -1)
                                        { 
                                            print "<div class='form-group col-md-12'>
                                            <label id='interest_text'>Want more info?</label>
                                                <button class='btn btn-lg btn-primary btn-block' type='button' id='btn_interested'>Connect</button>
                                            </div>";
                                            
                                        }
                                        else
                                        { ?>
                                             <p class="text-center">
                                                <br>
                                                <a href="register.php" style="width:100%;" class="btn btn-danger btn-lg btn-huge lato">Register to Connect</a> 
                                            </p>
                                        <?php }
                                    }
                                    ?>
					          		<p id="message_return">Inquire about a job, ask questions, get in touch.</p>
					          		<form class="send_msg">
					          			<div class="row">
					          				
					          				<div class="col-md-12">
					          					<div class="form-group">
					          						<textarea class="form-control input-lg" name="message" rows="7" placeholder="Messages..."></textarea>
					          					</div>
					          				</div>
					          			</div>
					          			<div class="form-group">
                                        <?php
if ($sess_id != -1)
{
    ?>
                                        <button class="btn btn-lg btn-primary btn-block" type="button" id='btn_msg'>SEND</button>
    <?php
}
else
{
    ?>
                                            
                                    <a href="register.php" style="width:100%;" class="btn btn-danger btn-lg btn-huge lato">Register to Message</a> 
    <?php
}
?>
					          				
					          			</div>
					          		</form>
                                    
                                    
                                        
                                    
                                        
                                    
                                    
                                    
					          	</div>
					        </li>
					        <?php
}
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
    
            <script type='text/javascript' src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/jquery.quicksand.js"></script>
    
    <script>
    //for jobs
$(function() {
//twitter bootstrap script
	$("#btn_msg").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_message.php?id=<?=$_GET['id']?>",
			data: $('form.send_msg').serialize(),
        		success: function(msg){
                    
                        
 	          		  $("#message_return").html(msg);
                      $(".send_msg").html("");
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
        

     
     $(function() {
//twitter bootstrap script
	$("#btn_interested").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_show_interest.php?id=<?=$_GET['id']?>",
			data: $('form.send_msg').serialize(),
        		success: function(msg){
                    
                        
 	          		  $("#interest_text").html(msg);
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
      


    </script>
    
<?php if (!isset($_SESSION['id'])) { ?> <script src="js/register.js"></script>  <?php  }  ?>
    
</body>
</html>