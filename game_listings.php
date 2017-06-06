<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
$sess_id = $_SESSION['id'];
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
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
		<div class="main-content">
				        	 
				
                
                <ul class="timeline"  style="background-color:#fff;">
                    <?php include_once "check_percentage.php"; ?>
                          
            	
                <!-- start:achievements -->
					        <li id="id-resume">
                                <form class="col-lg-12 achievements" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">Game Listings</h1>
                                
					        </li>
					        
                    
                    <li id="profile">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
                                    <h1>Current Projects</h1>
                                    
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
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

        
        $query = "SELECT * FROM games WHERE userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $games = $sql->fetchAll();
        $i=0;
        if (sizeof($games) > 0)
        {
                foreach($games as $game)
                {
                    $game_title = $game['title'];
                    $game_headline = $game['headline'];
                    $game_image = $game['image'];
                    $gameid = $game['id'];
                    if ($game_image == "")
                        $game_image = "default/default.jpg";




                    print "<div class='col-md-4'><div class='text-center'>
                   
                                <a  href='php_game.php?gameid=$gameid'><img src='upload/$game_image' class='img-circle sq200'></a>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a  href='php_game.php?gameid=$gameid'>$game_title</a></h1>
                                <div class='hr-center'></div>
                                <h4>$game_headline</h4>
                                <h5><a href='game_profile_ajax.php?gameid=$gameid'>Edit Profile</a> /
                                <a href='game_updates_ajax.php?gameid=$gameid'>Edit Updates</a> /
                                <a href='screenshots_game_ajax.php?gameid=$gameid'>Edit Gallery</a></h5>
                            </div>
                            </div>";
                }

        }
?>                            
                            
                                        
                                    </div>
                                    <div><a href="register_game_ajax.php">Add New Game Listing</a></div>
                                    
					          	</div>
					        </li>
                    
                    
                    
            </div>
        	
	</div>
    
    <div id="achievements_div" ><p></p></div>
 
    
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


            

            
            
            
            
</script>
</body>
</html>