<?php if(session_id() == ''){session_start();} if (empty($_SESSION)){$li=0; ;}else{ include "connect.php"; $li=1;}



if (!isset($_GET['gameid']))
    {
        $gameid=1;
    }
    else
    {
        $gameid = $_GET['gameid'];
    }

    include_once "functions.php";
    $dbs = db_connection();
    
        $query = "SELECT * FROM games WHERE id='$gameid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

        foreach($row as $game)
        {
            $id = $game['id'];
            $gameid = $game['id'];
            $userid = $game['userid'];
            $companyid = $game['userid'];
            $image = $game['image'];
            $description = $game['description'];
            $title = $game['title'];
            $headline = $game['headline'];
            $genre = $game['genre'];
            $workers = $game['workers'];
            $start_month = $game['start_month'];
            $start_year = $game['start_year'];
            $end_month = $game['end_month'];
            $end_year = $game['end_year'];
            $engine = $game['engine'];
            $hiring=$game['hiring'];
            $website = $game['website'];
            if ($image == '')
                $image = "upload/default/default.jpg";
            else
                $image = "upload/".$image;

            if ($end_year == 0)
            {
                $end_year="";
            }
            if ($start_year == 0)
            {
                $start_year="";
            }
            if ($start_month == 0)
            {
                $start_month="";
            }

            if ($end_month == 0)
            {
                $end_month="";
            }
        }

$query = "SELECT * FROM users WHERE id='$userid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $companies = $sql->fetchAll();

        foreach($companies as $company)
        {
            $company_name = $company['company'];
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
    <meta property="og:image" content="http://www.gamerstack.io/<?=$image?>" />
    <meta property="og:title" content="<?=$title?> - GamerStack - Game Industry Networking" />
    <meta property="og:description" content="<?=$description?> " />
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
                        <div class="user">
                            <div class="text-center">
                                <img src="<?= $image ?>" class="img-circle sq300">
                            </div>
                            <div class="user-head text-center" >
                                <h1><?= $title ?></h1>
                                <div class="hr-center"></div>
                                <h3>Company: <a href="php_company.php?id=<?=$userid?>"><?= $company_name?></a></h3>
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
					          		<h1><strong><?= $title ?></strong></h1>
					          		<h4><?= $headline; ?></h4>
					          		<div class="hr-left"></div>
					          		<?php
if ($start_year != '' || $end_year != '')
{
?> Start: <?= $start_month?> / <?=$start_year?> End: <?=$end_month?>/ <?=$end_year?> <?php
}
?>
                                    <p><?= $description ?></p>
                                    <?=$website?>
					          	</div>
					        </li>
                            <li id="personal-info">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
                                    
					          		<h1>Game Info</h1>
                                    
					          		<div class="hr-left"></div>

					          		<div class="btn-group">
                                        <button type="button" disabled class="btn btn-primary">Name</button>
                                        <button type="button" disabled class="btn btn-default"><?= $title ?></button>
                                        
									</div>
                                    <div class="btn-group">
                                        <button type="button" disabled class="btn btn-primary">Company Name</button>
                                        <button type="button" disabled class="btn btn-default"><?= $company_name ?></button>
                                        
									</div>
                                    
                                    <?php
if ($start_year != '' || $end_year != '')
{
                                    ?>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">date of inception</button>
									  	<button type="button" disabled class="btn btn-default"><?= $start_month ?>/<?= $start_year?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">deadline</button>
									  	<button type="button" disabled class="btn btn-default"><?= $end_month ?>/<?= $end_year?></button>
									</div>
                                    
                                    <?php
}
?>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Genre</button>
									  	<button type="button" disabled class="btn btn-default"><?= $genre ?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Workers</button>
									  	<button type="button" disabled class="btn btn-default"><?= $workers ?></button>
									</div>
                                    <div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Seeking Help</button>
									  	<button type="button" disabled class="btn btn-default"><?= $hiring?></button>
									</div>
                                    <div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Engine</button>
									  	<button type="button" disabled class="btn btn-default"><?= $engine?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Website</button>
									  	<button type="button" disabled class="btn btn-default"><?=$website?></button>
									</div>
                                    
					          	</div>
					        </li>
					        <!-- end:profile -->

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                   <!-- start:current contributors -->         
<?php
        $query = "SELECT * FROM company_workers WHERE companyid='$companyid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $workers = $sql->fetchAll();
        $game_workers=false;
        foreach($workers as $worker)
        {
            $gamelist = $worker['games'];
            $gamelist = explode(",",$gamelist);
            if (in_array($gameid, $gamelist))
                $game_workers = true;
            
                
        }
        if ($game_workers == true)
        {
            
            print "
					        <li id='profile'>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
                                    <h1>Current Contributors</h1>
                                    
                                   <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
            
            
            
            include_once "functions.php";
            print "<ul class='list-inline' style='text-align:center'>";
                foreach($workers as $worker)
                {
                    $worker_info = get_user($worker['userid']);
                    $name = $worker_info['name'];
                    $title = $worker['title'];
                    $image = $worker_info['image'];
                    $workerid = $worker['userid'];
                    $games = $worker['games'];
                    $u = get_user($worker['userid']);
                    $role = $u['role'];
                    $icon = $u['icon'];
                    $games = explode(",",$games);
                    $inarray = in_array($id, $games);
                    
                    if ($inarray == true)
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
					        </li>
                            
                            
                            
					       ";

        }
?>                             <!-- end:contributors -->
                            
                                        
                                    
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
					        
					        <!-- end:profile -->

					        <!-- start:work -->
					        
                                        
                                        
                                        
                                        
                                        
                                        
<?php
        $i = "";
        $query = "SELECT * FROM game_screenshots WHERE gameid='{$_GET['gameid']}' ORDER BY date_added DESC LIMIT 6";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $c_p = $sql->fetchAll();
if (sizeof($c_p) > 0)
{

    print "
    <li id='id-work'>
								<div class='timeline-badge default'><i class='fa fa-briefcase'></i></div>
								<h1 class='timeline-head'>GALLERY / SCREENSHOTS</h1>
							</li>
							<li>
					          	<div class='timeline-badge danger'></div>
					          	<div class='timeline-panel'>
					            	<div class='timeline-body'>
					            		
                                        ";
    
    

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
    print "<p style='text-align:right'><a href='full_portfolio.php?gameid={$_GET['gameid']}'>View Full Portfolio</a></p>";
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
    print "</div>
					          	</div>";
                                
     
					        print "</li>";
}
    //end part 2
?>                                        
                                        
    	
<!-- end:work -->

                            <!-- start:updates-->
                            
<?php
        $query = "SELECT * FROM game_updates WHERE gameid='$gameid' ORDER BY added_on DESC LIMIT 10";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $updates = $sql->fetchAll();
if (sizeof($updates) > 0)
{

    print "
    
    <li id='id-resume'>
					        	<div class='timeline-badge default'><i class='fa fa-file'></i></div>
					        	<h1 class='timeline-head'>Updates</h1>
					        </li>
					        <li id='resume'>
					          	<div class='timeline-badge warning'></div>
					          	<div class='timeline-panel'>
						          	<h1>Updates</h1>
    
    ";

    foreach($updates as $update) 
    {
        $id = $update['id'];
        $title = $update['title'];
        $description= $update['description'];
        $added = $update['added_on'];
        


        
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title</h3>
                <small><i class='fa fa-calendar'></i> $added</small>
                <p>$description</p>
            </div>";
  
    }
print "</div>
					        </li>";
}


    

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
	<script src="js/checkmail.js"></script> 
    
            <script type='text/javascript' src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/jquery.quicksand.js"></script>
    <!-- end:javascript -->
    
            <?php
include_once "functions.php";
bug_report_js();
?>
    <?php if (!isset($_SESSION['id'])) { ?> <script src="js/register.js"></script>  <?php  }  ?>
</body>
</html>