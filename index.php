<?php

include_once "functions.php";
    $dbs = db_connection();


//        function getUserThumbnailsAndInfo($limit=8){
//            
//            return $thumbnailInfo;
//        }
//
//        function getProjectThumbnailsAndInfo($limit=8){
//            
//            return $thumbnailInfo;
//        }
        $query = "SELECT * FROM users WHERE picture!='' AND account='0' AND picture!='default/default.jpg' ORDER BY added DESC LIMIT 8";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $workers = $sql->fetchAll();
        $i = 0;
        if (sizeof($workers) > 0)
        {
                foreach($workers as $worker)
                {
                    $i++;
                    $name = $worker['first_name'] . " " . $worker['last_name'];
                    $title = $worker['skillset'];
                    $image = $worker['picture'];
                    $workerid = $worker['id'];
                    $account = $worker['account'];
                    $img[$i] = $image;
                    if ($account == 1)
                    {
                        $url[$i] = "php_company.php?id=$workerid";
                    }
                    else
                        $url[$i] = "php_profile.php?id=$workerid";
                    
                    $caption[$i] = "$name";
                    

                }
                           
        }//end sizeof
        


?> 
<!DOCTYPE html>
<html>
  <head>
      <meta name="google-site-verification" content="s50kHHbCIAABsQJZlF0b7GX0H5aEAPiIko4Db03eubU" />
    <meta charset="utf-8">
    <title>GamerStack Beta [&#946;] - Networking for the Video Game Industry</title>
    <meta name="description" content="Create games, follow companies, browse jobs, connect with game industry professionals, show off your work. Add your company, post your games, gain a following, increase popularity, increase number of players." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
      <meta property="og:image" content="http://www.gamerstack.io/logo.png" />
    <meta property="og:title" content="GamerStack - Game Industry Networking" />
    <meta property="og:description" content="Create games, follow companies, browse jobs, connect with game industry professionals, show off your work. Add your company, post your games, gain a following, increase popularity, increase number of players. " />
      <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >


<!--
Remote
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
-->
      
<!--      Local-->
      <link rel="stylesheet" href="css/index/bootstrap.min.css" />
    <link href="css/index/font-awesome.min.css" rel="stylesheet" />
    <link href="css/index/animate.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body >
    <nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-danger" href="#">GamerStack Beta [&#946;]</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapsible">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#section1">Start</a></li>
                <li><a href="#section2">Users</a></li>
                <li><a href="#section3">About</a></li>
                <li><a href="#section4">Companies</a></li>
                
                <li>&nbsp;</li>
            </ul>
            <ul class="nav navbar-nav navsbar-right">
                <li><a href="login_ajax.php"><i class="fa fa-terminal fa-lg"> Login</i></a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">GamerStack Beta [&#946;]</h1>
        <h2 class="text-center lato animate slideInDown">Networking for the <b>Video Game</b> Industry</h2>
        <p class="text-center">
            <br>
            <a href="register.php" class="btn btn-danger btn-lg btn-huge lato" >Register Now</a> <br />
            <a href="login_ajax.php">Log In</a>
        </p>
    </div>
    <a href="#section2">
		<div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
		</div>
        </a>
</section>

      
<section class="container-fluid" id="section2">
    <div class="container v-center">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Users</h1>
                <hr>
            </div>
        </div>
        <?php $workers = getCandidateThumbnailsAndInfo($dbs, 4, 1); ?>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Businesses</h1>
                <hr>
            </div>
        </div>
        <?php $businesses = getBusinessThumbnailsAndInfo($dbs, 4, 1); ?>
        
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Games</h1>
                <hr>
            </div>
        </div>
        <?php $projects = getProjectThumbnailsAndInfo($dbs, 4, 1) ?>
        
        
        <?php $jobs = getJobList($dbs, 5, 1); ?> 
        
        
        
        
        
        
        
        
        
        
        
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInLeft animate">
                            <div class="panel-heading">
                            <h3>Jobs</h3></div>
                            <div class="panel-body">
                                <p>Land a job in the game industry by browsing companies, games, and jobs.</p>
                                <hr><a href="register.php">GO</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInUp animate">
                            <div class="panel-heading">
                            <h3>Connect</h3></div>
                            <div class="panel-body">
                                <p>Network and connect with other Video Game Industry Professionals</p>
                                <hr><a href="register.php">GO</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInRight animate">
                            <div class="panel-heading">
                            <h3>Build</h3></div>
                            <div class="panel-body">
                                <p>Build your professional presence with a resume, portfolio, and online personality.</p>
                                <hr><a href="register.php">GO</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
</section>

      
      
      
      
<?php
/*
 include_once "functions.php";
    $dbs = db_connection();
        
        
        $query = "SELECT * FROM users WHERE picture!='' AND picture!='default/default.jpg' ORDER BY added DESC LIMIT 8";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $workers = $sql->fetchAll();
        $i = 0;
        if (sizeof($workers) > 0)
        {
                foreach($workers as $worker)
                {
                    $i++;
                    $name = $worker['first_name'] . " " . $worker['last_name'];
                    $title = $worker['skillset'];
                    $image = $worker['picture'];
                    $workerid = $worker['id'];
                    $account = $worker['account'];
                    $img[$i] = $image;
                    if ($account == 1)
                    {
                        $url[$i] = "php_company.php?id=$workerid";
                    }
                    else
                        $url[$i] = "php_profile.php?id=$workerid";
                    

                }
                           
        }//end sizeof
        */

$i = 0;
$img[++$i] = "gamer-100.png";
$caption[$i] = "Gamer";

$img[++$i] = "youtube-100.png";
$caption[$i] = "Twitch.tv / YouTuber";

$img[++$i] = "3d_modelling-100.png";
$caption[$i] = "Animator / Modeler";

$img[++$i] = "producer-100.png";
$caption[$i] = "Producer";

$img[++$i] = "audio_engineer-100.png";
$caption[$i] = "Audio";
//direct
$img[++$i] = "director-100.png";
$caption[$i] = "Director / Manager";

$img[++$i] = "game_designer.png";
$caption[$i] = "Designer";

$img[++$i] = "programmer100.png";
$caption[$i] = "Programmer";

$img[++$i] = "game_artist-100.png";
$caption[$i] = "Artist";

$img[++$i] = "marketing-100.png";
$caption[$i] = "Marketing / PR";

$img[++$i] = "qa-100.png";
$caption[$i] = "QA Tester";

$img[++$i] = "writer-100.png";
$caption[$i] = "Writer";
for ($z = 1; $z <= 12; $z++)
{
    $url[$z] = "register_ajax.php?role={$caption[$z]}";
}
$caption[13] = "";
?> 
      
      
      
      
      

<section class="container-fluid" id="section1">
    <h2 class="text-center"></h2>
    <div class="container-fluid v-center">
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[1]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[1]?>">
                    </a><br /><a href="<?=$url[1]?>"><?=$caption[1]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[2]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[2]?>">
                    </a><br /><a href="<?=$url[2]?>"><?=$caption[2]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[3]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[3]?>">
                    </a><br /><a href="<?=$url[3]?>"><?=$caption[3]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[4]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[4]?>">
                    </a><br /><a href="<?=$url[4]?>"><?=$caption[4]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[5]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[5]?>">
                    </a><br /><a href="<?=$url[5]?>"><?=$caption[5]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[6]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[6]?>">
                    </a><br /><a href="<?=$url[6]?>"><?=$caption[6]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[7]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[7]?>">
                    </a><br /><a href="<?=$url[7]?>"><?=$caption[7]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[8]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[8]?>">
                    </a><br /><a href="<?=$url[8]?>"><?=$caption[8]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[9]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[9]?>">
                    </a><br /><a href="<?=$url[9]?>"><?=$caption[9]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[10]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[10]?>">
                    </a><br /><a href="<?=$url[10]?>"><?=$caption[10]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[11]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[11]?>">
                    </a><br /><a href="<?=$url[11]?>"><?=$caption[11]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="<?=$url[12]?>">
                        <img style="width:100px;height:100px;" class="img-circle img-responsive img-thumbnail" src="images/roles/<?=$img[12]?>">
                    </a><br /><a href="<?=$url[12]?>"><?=$caption[12]?></a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
</section>

<section class="container-fluid" id="section3">
    <h1 class="text-center">A Video Game Revolution</h1>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center lato slideInUp animate">Add <strong>Your</strong> Touch to the Game Industry.</h3>
            <br>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-1">Create games, follow companies, browse jobs, connect with game industry professionals, show off your work.</div>
                <div class="col-xs-2"></div>
                <div class="col-xs-4 text-right">Add your company, post your games, gain a following, increase popularity, increase number of players.</div>
            </div>
            <br>
            <p class="text-center">
                <!--<img src="img/bgcompanies.jpg" class="img-responsive thumbnail center-block ">-->
            </p>
        </div>
    </div>
</section>

<section id="section4">
    <div class="container v-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Companies</h1>
                <hr>
            </div>
        </div>
        <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInLeft animate">
                            <div class="panel-heading">
                            <h3>Candidates</h3></div>
                            <div class="panel-body">
                                <p>Search through qualified candidates to find the best ones for your games.</p>
                                <hr><a href="register.php">GO</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInUp animate">
                            <div class="panel-heading">
                            <h3>Games</h3></div>
                            <div class="panel-body">
                                <p>Post your games, creating a following while attracting potential candidates to work on them.</p>
                                <hr><a href="register.php">GO</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInRight animate">
                            <div class="panel-heading">
                            <h3>Grow</h3></div>
                            <div class="panel-body">
                                <p>Grow your business by turning leads into sales and ultimately getting more players of your games</p>
                                <hr><a href="register.php">GO</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
        <p class="text-center">
            <br>
            <a href="register.php" class="btn btn-danger btn-lg btn-huge lato">Register Now</a> <br />
            <a href="login_ajax.php">Log In</a>
        </p>
</section>
    




<div class="scroll-up">
	<a href="#"><i class="fa fa-angle-up"></i></a>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><img src="//placehold.it/110" class="img-circle"><br>Login</h2>
            </div>
            <div class="modal-body row">
                <h6 class="text-center">COMPLETE THESE FIELDS TO SIGN UP</h6>
                <form class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger btn-lg btn-block">Sign In</button>
                        <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <h6 class="text-center"><a href="">Privacy is important to us. Click here to read why.</a></h6>
            </div>
        </div>
    </div>
</div>
    
    
    
    
    <!--scripts loaded here-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
      <!-- start:javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/gamerstack.js"></script>
	<script src="js/portfolio.jquery.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.jeditable.js"></script>
    
    <script src="js/scripts.js"></script>
	<script src="js/checkmail.js"></script> <!-- end:javascript -->
        <?php
include_once "functions.php";
bug_report_js();
?>
        <script>

            



          
            
            
</script>
  </body>
</html>