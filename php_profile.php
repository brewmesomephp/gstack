<?php if(session_id() == ''){session_start();} if (empty($_SESSION)){$li=0; ;}else{ include "connect.php"; $li=1;}



if (!isset($_GET['id']))
    {
        $userid=1;
    
    }
    else
    {
        $userid = $_GET['id'];
    }

    include_once "functions.php";
    $dbs = db_connection();
    
        $query = "SELECT * FROM users WHERE id='$userid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

        foreach($row as $user)
        {
            $id = $user['id'];
            $first_name = $user['first_name'];
            $last_name = $user['last_name'];
            $name = $first_name . " " . $last_name;
            $skillset = $user['skillset'];
            $picture = $user['picture'];
            $bio = $user['bio'];
            $image = "upload/$picture";
            $website = $user['website'];
            $account = $user['account'];
            $role = $user['role'];
            if ($role == "")
                $role = "User";
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
include_once "functions.php";
$u = get_user($_GET['id']);
$icon = $u['icon'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GamerStack - Networking for the Game Industry</title>
	<meta property="og:image" content="http://www.gamerstack.io/<?=$image?>" />
    <meta property="og:title" content="<?=$name?> - GamerStack - Game Industry Networking" />
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
	<div class="container" id="main">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div id="sidebar">
					<div class="sosmed">
						<div class="text-center">
							<a href="http://www.facebook.com/gamerstack"><i class="fa fa-facebook fa-2x" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
							<a href="http://twitter.com/gamerstack"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus fa-2x" data-toggle="tooltip" data-placement="top" title="Google Plus"></i></a>
						</div>
					</div>
					<div class="user">
						<div class="text-center">
							<img src="<?= $image ?>" class="img-circle sq200">
						</div>
						<div class="user-head">
							<h1><?= strtoupper($first_name); ?> <?= strtoupper($last_name); ?></h1>
                            <img src="<?=$icon?>" width="50">
                            <h3><?=$role?></h3>
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
                            if (!isset($_SESSION['id']))
                                $account = -1;
                                
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
					          		<h1>Hello, I am <strong><?= strtoupper($first_name); ?> <?= strtoupper($last_name); ?></strong></h1>
					          		<h4><?= $skillset; ?></h4>
					          		<div class="hr-left"></div>
					          		
                                    <p><?= $bio ?></p>
                                    <?= $website ?>
					          	</div>
					        </li>
					        
					        <!-- end:profile -->

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!-- start:current companies -->
					        
<?php
        $query = "SELECT * FROM company_workers WHERE userid='$userid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $companies = $sql->fetchAll();


        if (sizeof($companies) > 0)
        {
            
            
            print "
            
            <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Currently Working For</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            ";
            print "<ul class='list-inline' style='text-align:center'>";
                foreach($companies as $company)
                {
                    include_once "functions.php";
                    $company = get_user($company['companyid']);
                    $company_name = $company['name'];
                    $company_image = $company['image'];
                    $company_id = $company['id'];
                    $company_headline = $company['headline'];




                    print "<li style='max-width:200px;'><div class='text-center'>
                                <a  href='php_company.php?id=$company_id'><img src='upload/$company_image' class='img-circle sq200'></a>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a  href='php_company.php?id=$company_id'>$company_name</a></h1>
                                <div class='hr-center'></div>
                                <h4><a  href='php_company.php?id=$company_id'>$company_headline</a></h4>
                            </div>
                            <li>";
                }
            print "</ul></div>
                                    
					          	</div>
					        </li>";

        }
?>                            
                            
                                        
                                    
                            

					        
					        <!-- end:companies -->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            <!-- start:current projects -->
					        
<?php
        $query = "SELECT * FROM company_workers WHERE userid='$userid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $games = $sql->fetchAll();
        $gamelist = "";
        foreach($games as $game)
        {
            $gamelist = $gamelist . $game['games'] . ","; 
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
                                    <h1>Current Projects</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            
            <ul class='list-inline' style='text-align:center'>";
            
            
            
                foreach($gamelist as $game)
                {
                    $game_id = $game[0];
                    $link = $game[1];
                    $title = $game[2];
                    $game_image = $game[3];
                    $company_id = $game[4];
                    $company_name = $game[5];
                    $company_image = $game[6];




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
print "</ul></div>
                                    
					          	</div>
					        </li>
                            ";
        }
?>                            
                            
                                        
                                    
                            
                            
                            
                            
                            
                            
                            
                            
					        
					        <!-- end:projects -->
                            
                            
                            
                            
					        <!-- start:work -->
					        
					            		<?php                            
                            
                             $query = "SELECT * FROM portfolio WHERE userid='$userid' ORDER BY date_added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $pics = $sql->fetchAll();
       

if (sizeof($pics))
{
    print "<li id='id-work'>
								<div class='timeline-badge default'><i class='fa fa-briefcase'></i></div>
								<h1 class='timeline-head'>WORK</h1>
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
                $image = "upload/". $portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                
//                youtube
                
                $youtube = "";
                $youtube = $portfolio['youtube'];
                if (strlen($youtube) > 1){
//                    clean_youtube_link($youtube);
//                     make_embed_youtube($youtube);
//                     make_thumbnail_youtube($youtube);
                    $image = make_thumbnail_youtube($youtube);
                    $title.= "<img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:20px;width:auto;'>";
                }
                //$image = "<img src='upload/$image'>";



                //$url=
                echo "<li style='width:300px;'><a href='#thumb$i' class='thumbnail' style=\"background-image: url('$image')\">";
                    print "<h4>$title</h4><span class='description'>$caption</span></a>";
                print "</li>
                ";
 

            }
        print "</ul>"; // end the unordered list
    
    print "<p style='text-align:right'><a href='full_portfolio.php?userid=$userid'>View Full Portfolio</a></p>";

            //part 2 of insertion
        $i=0;
        print "<div class='portfolio-content'>";
        foreach($pics as $portfolio) 
            {
                $i++;
                $id = $portfolio['id'];
                $image = $portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                $image = "<img src='upload/$image'>";
            
                    $youtube = "";
                    $youtube = $portfolio['youtube'];

                if (strlen($youtube) > 1){
                        clean_youtube_link($youtube);
                         $image = make_embed_youtube($youtube);
                    print $image;
                         make_thumbnail_youtube($youtube);
                        $title.= " <img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:40px;width:auto;'>";
                    }
            
            


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
					        <li id="id-resume">
					        	<div class="timeline-badge default"><i class="fa fa-file"></i></div>
					        	<h1 class="timeline-head">RESUME</h1>
					        </li>
                            
                            
                            
                            
                            
                                    
                                    
                                    
                                    
                                    
                                    
                                    
<?php                                   
                                    
        $query = "SELECT * FROM skills WHERE userid='$userid' ORDER BY percent DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

if (sizeof($row) > 0)
{
    
    print "
    <li>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Skills</h1>
						          	<div class='hr-left'></div>
                                    ";
    //get the data

    $i=0;
    //show the data
    foreach($row as $skill) 
    {
        $id = $skill['skill'];
       // print $id . "<br />";
        $skill_name = $skill['skill_name'];
        $percent = $skill['percent'];
        /*iterate through these colors for bar
        #1abc9c
        #3498db
        #2c3e50
        #e74c3c
        #34495e
        #2ecc71
        #f1c40f
        */
        
        
        //skill bar
        print"
        <!--add new skill end-->
            <div class='skillbar clearfix' data-percent='$percent%'>
            <div class='skillbar-title' style='background: #34495e;'><span> $skill_name</span></div>
            <div class='skillbar-bar' style='background: #061577;'></div>
            <div class='skill-bar-percent'>$percent%</div>
        </div> <!-- End Skill Bar -->
";
       
    }
    print "</div>
					        </li>";
}//end sizeof
                                    
?>                               
                                    
                                    
                                    
   
					          	
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
      
                            
                            
					        
                                    <?php                            
        $query = "SELECT * FROM experience WHERE userid='$userid' ORDER BY end_year DESC,end_month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $xp = $sql->fetchAll();

    //get the data
    $i=0;
    //show the data
if(sizeof($xp) > 0)
{
    print "
    
    <li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Work Experience</h1>
    
    ";
    foreach($xp as $experience) 
    {
        $id = $experience['id'];
        $company_name = $experience['company'];
        $title = $experience['title'];
        $location= $experience['location'];
        $remote= $experience['remote'];
        $description= $experience['description'];
        $start_month= $experience['start_month'];
        $start_year= $experience['start_year'];
        $end_month= $experience['end_month'];
        $end_year= $experience['end_year'];
        $current= $experience['current'];
        $id = $experience['id'];
        
        
        if ($current == 1)
        {
            $current = "Still Here";
            
        }
        else
        {
            $current = "$end_month/$end_year";
        }
        if ($remote == 1)
        {
            $remote = "(Remote)";
        }
        else
        {
            $remote = "";   
        }
        
        //print "$company_name, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $current";
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title: $company_name </h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $current, $location $remote</small>
                <p>$description</p>
            </div>";
  
    }
    print "</div>
					        </li>";
}//end sizeof
                            
  ?>               
						          	
					          	
					        
                           
                                    
<?php                            
        $query = "SELECT * FROM education WHERE userid='$userid' ORDER BY end_year DESC,end_month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $edu = $sql->fetchAll();
        
if (sizeof($edu) > 0)
{
    print "
    
    <li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Education</h1>
    
    ";
    foreach($edu as $education) 
    {
        $id = $education['id'];
        $gpa = $education['gpa'];
        $school = $education['school'];
        $major= $education['major'];
        $degree = $education['degree'];
        $description= $education['description'];
        $start_month= $education['start_month'];
        $start_year= $education['start_year'];
        $end_month= $education['end_month'];
        $end_year= $education['end_year'];
        $current= $education['current'];
        $id = $education['id'];
        if ($current == 1)
        {
            $current = "Still Here";
        }
        else
        {
            $current = "$end_month/$end_year";
        }

        
        //print "$school, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $current";
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$school: $major ($gpa Average)</h2>
                <h4>$degree</h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $current</small>
                <p>$description</p>
            </div>";
  
    }
    print "</div>
					        </li>";
}//end sizof
?>
                                 
					          	
                         
                                    
 <?php                                   
                                    
        $query = "SELECT * FROM organizations WHERE userid='$userid' ORDER BY year DESC,month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $orgs = $sql->fetchAll();

if (sizeof($orgs) > 0)
{
    print "
    <li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Organizations</h1>
                                    ";
    foreach($orgs as $organization) 
    {
        $id = $organization['id'];
        $title = $organization['title'];
        $description= $organization['description'];
        $month= $organization['month'];
        $year= $organization['year'];
        


        
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
        $query = "SELECT * FROM awards WHERE userid='$userid' ORDER BY year DESC,month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $awards = $sql->fetchAll();
if (sizeof($awards) > 0)
{
    print "<li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Recognition & Awards</h1>";
    foreach($awards as $award) 
    {
        $id = $award['id'];
        $issuer = $award['issuer'];
        $occupation = $award['occupation'];
        $title = $award['title'];
        $description= $award['description'];
        $month= $award['month'];
        $year= $award['year'];
        $issuer = "Issued by: $issuer";
        $occupation = "Occupation: $occupation";
        


        
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title</h3>
                <h4>$occupation</h4>
                <h4>$issuer</h4>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }
    print "</div>
					        </li>";
} //end sizeof
?>
                                    
<!-- end:resume -->
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
                                    {
                                        $sess_id = -1;
                                    }
                                    if (!isset($_GET['id']))
                                    {
                                        $get_id = 0;
                                    }
                                    else
                                    {
                                        $get_id = $_GET['id'];
                                    }
                                    if (($get_id != $sess_id))
                                    {
                                        if (($my_account == 0 || $account == 1) && $sess_id != -1)
                                        { 
                                            print "<div class='form-group col-md-12'>
                                            <label id='interest_text'>Want more info?</label>
                                                <button class='btn btn-lg btn-primary btn-block' type='button' id='btn_interested'>Connect</button>
                                            </div>";
                                            
                                        }
                                        else if($sess_id == -1)
                                        { ?>
                                             <p class="text-center">
                                                <br>
                                                <a href="register.php" style="width:100%;" class="btn btn-danger btn-lg btn-huge lato">Register to Connect</a> 
                                            </p>
                                        <?php
                                            
                                        }
                                        else
                                        {
                                            print "<div class='form-group col-md-6'>
                                            <label id='interest_text'>Want more info?</label>
                                                <button class='btn btn-lg btn-primary btn-block' type='button' id='btn_interested'>Connect</button>
                                            </div>
                                            <div class='form-group col-md-6' >
                                                <label id='invite_text'>They already work for you?</label>
                                                <div class='col-md-12' id='btn_emp'><button class='btn btn-lg btn-primary btn-block' type='button' id='btn_worker'>Invite Employee</button></div>
                                            </div>";
                                        }
                                        
                                    }
                                    ?> 
                                        
					          		<p id="message_return" style="clear:both;"></p>

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
	<script src="js/checkmail.js"></script> 

            <script type='text/javascript' src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/jquery.quicksand.js"></script>
    <!-- end:javascript -->
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
                    $("#btn_worker").prop("disabled",true);
                      $(".send_msg").html("");
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
     
     
//step 1: click Invite Employee
$(function() {
//twitter bootstrap script
	$("#btn_worker").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_invite_workers.php?id=<?=$_GET['id']?>",
			data: $('form.send_msg').serialize(),
        		success: function(msg){
 	          		  $("#invite_text").html(msg);
                      $("#btn_emp").html("");
                    //clear form.
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});
     
//Step 2: What is xyz's Job title?
$(document).on("click",".submit_job_title",function(e){
    var invited_user_id = this.id;
    var job_title = $('#company_job_title'+invited_user_id).val();
     //alert(invited_user_id);
     $.ajax({
    		   	type: "POST",
			url: "process_invite_workers.php?set_title=true", 
			data: {
                'invited_user_id':invited_user_id,
                'job_title':job_title
            
            }
         ,
        		success: function(msg){
                    
                        
 	          		  $("#invite_text").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 }); 
     
//Step 3: Which game is xyz working on? -> Change this to Which game is xyz working on as "job title";
     //add game
 $(document).on("click",".add_game",function(e){
 var game_id = this.id;
     e.preventDefault();
     $.ajax({
    		   	type: "POST",
			url: "process_invite_workers.php?id="+game_id, 
			data: {
            
                'addgame':game_id,
                'userid':'<?=$_GET['id']?>'
            
            },
        		success: function(msg){
                    
                        
 	          		  $("#invite_text").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });
     
     
     
  

//Then click done     
     $(document).on("click",".done",function(e){
    
     //alert(invited_user_id);
         e.preventDefault();
     $("#invite_text").html("Requests Sent...")
     
 });

     
     //sends them a message that you are interested in them
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