<?php 

include_once "functions.php";



    include_once "functions.php";
    $dbs = db_connection();
    
        $query = "SELECT * FROM users WHERE id='4'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

        foreach($row as $user)
        {
            $id = $user['id'];
            $first_name = $user['first_name'];
            $last_name = $user['last_name'];
            $company = $user['company'];
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



        $query = "SELECT * FROM users WHERE id='4'";
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
	 <meta property="og:image" content="http://www.gamerstack.io/logo.png" />
    <meta property="og:title" content="GamerStack - Game Industry Networking" />
    <meta property="og:description" content="Create games, follow companies, browse jobs, connect with game industry professionals, show off your work. Add your company, post your games, gain a following, increase popularity, increase number of players. " />
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
	<div class="container" id="main">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div id="sidebar">
					<div class="sosmed">
						<div class="text-center">
							<a href="http://facebook.com/gamerstack"><i class="fa fa-facebook fa-2x" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
							<a href="http://twitter.com/gamerstack"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus fa-2x" data-toggle="tooltip" data-placement="top" title="Google Plus"></i></a>
						</div>
					</div>
					<div class="user">
						<div class="text-center">
							<img src="<?= $image ?>" class="img-circle sq200">
						</div>
						<div class="user-head">
							<h1><?=$company?></h1>
							<div class="hr-center"></div>
							<h5><?=$skillset?></h5>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
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
                                navbar_short();
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
							<!-- start:profile -->
							<li id="id-profile">
								<div class="timeline-badge default"><i class="fa fa-user"></i></div>
								<h1 class="timeline-head">PROFILE</h1>
                                <div class="fb-share-button" data-href="http://www.gamerstack.io<?=$_SERVER['REQUEST_URI']?>" data-layout="button"></div>
                                
							</li>
					        

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!-- start:current companies -->
					        
<?php
        $query = "SELECT * FROM users WHERE account='1' and picture!='' ORDER BY added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $companies = $sql->fetchAll();


        if (sizeof($companies) > 0)
        {
            
            
            print "
            
            <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Latest Companies</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            ";
                print "";
            ?>  <ul class='list-inline' style='text-align:center'> <?php
                foreach($companies as $company)
                {
                    
                    $company_name = $company['company'];
                    $company_image = $company['picture'];
                    $company_id = $company['id'];
                    $company_headline = $company['skillset'];




                    print "<li style='max-width:200px;'><div class='text-center'>
                                <a  href='php_company.php?id=$company_id'><img src='upload/$company_image' class='img-circle sq200'></a>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a  href='php_company.php?gameid=$company_id'>$company_name</a></h1>
                                <div class='hr-center'></div>
                                <h4><a  href='php_company.php?id=$company_id'>$company_headline</a></h4>
                            </div>
                            </li>
                            ";
                }
                            ?> </ul> <?php
            print "";
            print "</div>
                                    
					          	</div>
					        </li>";

        }
?>                            
                            
                                        
                                    
                            

					        
					        <!-- end:companies -->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            <!-- start:current projects -->
					        
<?php
        $query = "SELECT * FROM games WHERE image!='' ORDER BY added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $games = $sql->fetchAll();
        $gamelist = "";
        foreach($games as $game)
        {
            $gamelist = $gamelist . $game['id'] . ","; 
        }
        $gamelist = explode(",",$gamelist); 
        include_once "functions.php";

        $gamelist = get_games_links_with_id_by_array($gamelist);
        //now print out the list of games.

        if (sizeof($gamelist) > 0)
        {
            print "
            
            <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Latest Projects</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            
            ";
            
                            ?> <ul class='list-inline' style='text-align:center'> <?php
            
                foreach($gamelist as $game)
                {
                    $game_id = $game[0];
                    $link = $game[1];
                    $title = $game[2];
                    $game_image = $game[3];
                    $company_id = $game[4];
                    $company_name = $game[5];
                    $company_image = $game[6];
                    if ($game_image == '')
                    {
                        $game_image = "default/default.jpg";
                    }



                    
                    print "<li style='max-width:200px;'><div class='text-center'>
                                <a  href='php_game.php?gameid=$game_id'><img src='upload/$game_image' class='img-circle sq200'></a>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a  href='php_game.php?gameid=$game_id'>$title</a></h1>
                                <div class='hr-center'></div>
                                <h4>Company: <a  href='php_company.php?id=$company_id'>$company_name</a></h4>
                            </div>
                            </li>";
                }
                            ?> </ul> <?php
print "</div>
                                    
					          	</div>
					        </li>
                            ";
        }
?>                            
                            
                                        

					        
					        <!-- end:projects -->
                            
                            
<!-- start:current contributors -->
					        

                                    
                    <!-- start:current contributors -->
					        
<?php
        $query = "SELECT * FROM users WHERE picture!='' AND account='0' ORDER BY added DESC LIMIT 3";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $workers = $sql->fetchAll();
        if (sizeof($workers) > 0)
        {
            print "
            
            <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Latest Candidates</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            <ul class='list-inline' style='text-align:center'>";
            
            include_once "functions.php";
                foreach($workers as $worker)
                {
                    $name = $worker['first_name'] . " " . $worker['last_name'];
                    $title = $worker['skillset'];
                    $image = $worker['picture'];
                    $workerid = $worker['id'];
                    
                    $u = get_user($workerid);
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
					        
					        <!-- end:contributors -->
                            
                            
					        <!-- start:work -->
					        
					            		<?php                            
                            
                             $query = "SELECT * FROM company_portfolio ORDER BY date_added DESC LIMIT 9";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $pics = $sql->fetchAll();
       

if (sizeof($pics))
{
    print "<li id='id-work'>
								<div class='timeline-badge default'><i class='fa fa-briefcase'></i></div>
								<h1 class='timeline-head'>LATEST COMPANY UPLOADS</h1>
							</li>
							<li>
					          	<div class='timeline-badge danger'></div>
					          	<div class='timeline-panel'>
					            	<div class='timeline-body'>";
    
    
    
    
            $i=0;
        //start the Unordered List (Thumbnails)
        print "<ul class='thumbs'>";
            foreach($pics as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $userid = $portfolio['userid'];
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

            //part 2 of insertion
        $i=0;
        print "<div class='portfolio-content'>";
        foreach($pics as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $theuser = $portfolio['userid'];
                $image = $portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                $image = "<img src='upload/$image'>";
                
                include_once "functions.php";
                $userinfo = get_user($theuser);
                $username = $userinfo['company'];

                print "
                <div id='thumb$i'>
                    <div class='media'>$image</div>
                    <h1>$title</h1>
                    <h3> by <a href='php_profile.php?id=$theuser'>$username</a></h3>
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

                            
                            <!-- start:work -->
					        
					            		<?php                            
                            
                             $query = "SELECT * FROM portfolio ORDER BY date_added DESC LIMIT 9";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $pics = $sql->fetchAll();
       

if (sizeof($pics))
{
    print "<li id='id-work'>
								<div class='timeline-badge default'><i class='fa fa-briefcase'></i></div>
								<h1 class='timeline-head'>LATEST USER PORTFOLIO UPLOADS</h1>
							</li>
							<li>
					          	<div class='timeline-badge danger'></div>
					          	<div class='timeline-panel'>
					            	<div class='timeline-body'>";
    
    
    
    
            $i=0;
        //start the Unordered List (Thumbnails)
        print "<ul class='thumbs'>";
            foreach($pics as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $userid = $portfolio['userid'];
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

            //part 2 of insertion
        $i=0;
        print "<div class='portfolio-content'>";
        foreach($pics as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $theuser = $portfolio['userid'];
                $image = $portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                $image = "<img src='upload/$image'>";
                
                include_once "functions.php";
                $userinfo = get_user($theuser);
                $username = $userinfo['name'];

                print "
                <div id='thumb$i'>
                    <div class='media'>$image</div>
                    <h1>$title</h1>
                    <h3> by <a href='php_profile.php?id=$theuser'>$username</a></h3>
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
                            
                            
					        <!-- start:jobs -->

                            
                            <?php                                    
        $query = "SELECT * FROM jobs ORDER BY added DESC LIMIT 5";
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
						          	<h1>Latest Job Listings</h1>";
    
    foreach($jobs as $job) 
    {
        $id = $job['id'];
        $theid = $job['userid'];
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
        include_once "functions.php";
        $username = get_user($theid);
        $username = $username['name'];
        
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
            <h2><a href='php_company.php?id=$theid'>$username</a></h2>
            <h3>$title</h3>
            <h4>Location: $location</h4>
            <h5>$compensation</h5>
            <small><i class='fa fa-calendar'></i>Start Date: $start_month/$start_day/$start_year</small>
            <p>$description</p>
        </div>
        ";
        
        
        
        
  
    }
print "</div>
					        </li>";
}//end sizeof


    

?>
		
                            
                            
                            
                                    
                                    
                                    
                                    
                                    
                                    
                                    
 
                            
                            
					        
    

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
		<div class="container">
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

 
     $(document).on("click",".done",function(e){
    
     //alert(invited_user_id);
         e.preventDefault();
     $("#invite_text").html("Requests Sent...")
     
 });


     
     
     
    </script>
</body>
</html>