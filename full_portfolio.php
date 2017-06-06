<?php
/*
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Bootstrap Filtered Portfolio</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style>
      body { margin: 50px 0; background: url(images/bglight.png); }
      .well { background: #fff; text-align: center; }
      .filter {}
  </style>
</head>
<body>

<div class="container well well-large">

  <h1>Bootstrap Filtered Portfolio</h1>

  <hr>

  <ul class="filter nav nav-pills">
    <li data-value="all"><a href="#">All</a></li>
    <li data-value="dog"><a href="#">Dog</a></li>
    <li data-value="cat"><a href="#">Cat</a></li>
    <li data-value="bird"><a href="#">Birds</a></li>
  </ul>

  <hr>

  <ul class="thumbnails">
    <li data-type="dog" data-id="id-1" class="span3">
      <a href="#" class="thumbnail" id="dog1"><img src="images/dog1.jpg" alt=""></a>
    </li>
    <li data-type="cat" data-id="id-2" class="span3">
      <a href="#" class="thumbnail" id="cat1"><img src="images/cat1.jpg" alt=""></a>
    </li>
    <li data-type="bird" data-id="id-3" class="span3">
      <a href="#" class="thumbnail" id="bird1"><img src="images/bird1.jpg" alt=""></a>
    </li>
    <li data-type="dog" data-id="id-4" class="span3">
      <a href="#" class="thumbnail" id="dog2"><img src="images/dog2.jpg" alt=""></a>
    </li>
    <li data-type="cat" data-id="id-5" class="span3">
      <a href="#" class="thumbnail" id="cat2"><img src="images/cat2.jpg" alt=""></a>
    </li>
    <li data-type="bird" data-id="id-6" class="span3">
      <a href="#" class="thumbnail" id="bird2"><img src="images/bird2.jpg" alt=""></a>
    </li>
    <li data-type="dog" data-id="id-7" class="span3">
      <a href="#" class="thumbnail" id="dog3"><img src="images/dog3.jpg" alt=""></a>
    </li>
    <li data-type="cat" data-id="id-8" class="span3">
      <a href="#" class="thumbnail" id="cat3"><img src="images/cat3.jpg" alt=""></a>
    </li>
    <li data-type="bird" data-id="id-9" class="span3">
      <a href="#" class="thumbnail" id="bird3"><img src="images/bird3.jpg" alt=""></a>
    </li>
    <li data-type="dog" data-id="id-10" class="span3">
      <a href="#" class="thumbnail" id="dog4"><img src="images/dog4.jpg" alt=""></a>
    </li>
    <li data-type="cat" data-id="id-11" class="span3">
      <a href="#" class="thumbnail" id="cat4"><img src="images/cat4.jpg" alt=""></a>
    </li>
    <li data-type="bird" data-id="id-12" class="span3">
      <a href="#" class="thumbnail" id="bird4"><img src="images/bird4.jpg" alt=""></a>
    </li>
    <li data-type="dog" data-id="id-13" class="span3">
      <a href="#" class="thumbnail" id="dog5"><img src="images/dog5.jpg" alt=""></a>
    </li>
    <li data-type="cat" data-id="id-14" class="span3">
      <a href="#" class="thumbnail" id="cat5"><img src="images/cat5.jpg" alt=""></a>
    </li>
    <li data-type="bird" data-id="id-15" class="span3">
      <a href="#" class="thumbnail" id="bird5"><img src="images/bird5.jpg" alt=""></a>
    </li>
  </ul>

</div>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<script type='text/javascript' src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/jquery.quicksand.js"></script>
<script>
    function gallery(){
            $('#dog1').click(function() { bootbox.alert('<img src="images/dog1.jpg"><h4>Dog ipsum dolor sit amet</h4>'); });
            $('#cat1').click(function() { bootbox.alert('<img src="images/cat1.jpg"><h4>Cat ipsum dolor sit amet</h4>'); });
            $('#bird1').click(function() { bootbox.alert('<img src="images/bird1.jpg"><h4>Bird ipsum dolor sit amet</h4>'); });
            $('#dog2').click(function() { bootbox.alert('<img src="images/dog2.jpg"><h4>Dog ipsum dolor sit amet</h4>'); });
            $('#cat2').click(function() { bootbox.alert('<img src="images/cat2.jpg"><h4>Cat ipsum dolor sit amet</h4>'); });
            $('#bird2').click(function() { bootbox.alert('<img src="images/bird2.jpg"><h4>Bird ipsum dolor sit amet</h4>'); });
            $('#dog3').click(function() { bootbox.alert('<img src="images/dog3.jpg"><h4>Dog ipsum dolor sit amet</h4>'); });
            $('#cat3').click(function() { bootbox.alert('<img src="images/cat3.jpg"><h4>Cat ipsum dolor sit amet</h4>'); });
            $('#bird3').click(function() { bootbox.alert('<img src="images/bird3.jpg"><h4>Bird ipsum dolor sit amet</h4>'); });
            $('#dog4').click(function() { bootbox.alert('<img src="images/dog4.jpg"><h4>Dog ipsum dolor sit amet</h4>'); });
            $('#cat4').click(function() { bootbox.alert('<img src="images/cat4.jpg"><h4>Cat ipsum dolor sit amet</h4>'); });
            $('#bird4').click(function() { bootbox.alert('<img src="images/bird4.jpg"><h4>Bird ipsum dolor sit amet</h4>'); });
            $('#dog5').click(function() { bootbox.alert('<img src="images/dog5.jpg"><h4>Dog ipsum dolor sit amet</h4>'); });
            $('#cat5').click(function() { bootbox.alert('<img src="images/cat5.jpg"><h4>Cat ipsum dolor sit amet</h4>'); });
            $('#bird5').click(function() { bootbox.alert('<img src="images/bird5.jpg"><h4>Bird ipsum dolor sit amet</h4>'); });
        }
    var $itemsHolder = $('ul.thumbnails');
    var $itemsClone = $itemsHolder.clone(); 
    var $filterClass = "";
    $('ul.filter li').click(function(e) {
    e.preventDefault();
    $filterClass = $(this).attr('data-value');
        if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
        else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
        $itemsHolder.quicksand(
          $filters,
          { duration: 1000 },
          gallery
          );
    });
    $(document).ready(gallery);
</script>

  
</body>
</html>
*/?>

<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){$li=0; ;}else{ include "connect.php"; $li=1;}

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
    $account = -1;
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
    <style>
    .thumbnails
        {
            margin-right:-20px;
        }
    ul.thumbnails li
        {
            width:260px;
        }
    .p_img
        {
           text-align:center !important;
            max-width:100%;
            max-height:100%;
        }

    </style>
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
                        
						<ul class="timeline">
<?php
include_once "functions.php";

if (isset($_GET['userid']))//user profile
{
    $userid = $_GET['userid'];
    $type = "portfolio";
    $get_param = "userid";
    $user = get_user($userid);
    $user_image = $user['image'];
    $user_name = $user['name'];
    
    print "<p class='text-center'><a href='php_profile.php?id=$userid'><img src='upload/$user_image' class='img-circle sq200'>
    <br />$user_name</a></p>";
}
elseif (isset($_GET['companyid'])) // //company profile
{
    $userid = $_GET['companyid'];
    $type = "company_portfolio";
    $get_param = "companyid";
    $user = get_user($userid);
    $user_image = $user['image'];
    $user_name = $user['name'];
    
    print "<p class='text-center'><a href='php_company.php?id=$userid'><img src='upload/$user_image' class='img-circle sq200'>
    <br />$user_name</a></p>";
}
elseif (isset($_GET['gameid'])) ////game profile
{
    $userid = $_GET['gameid'];
    $type = "game_screenshots";
    $get_param = "gameid";
    $game = get_game($userid);
    $game = $game[0];
    $game_image = $game['image'];
    $game_title = $game['title'];
    print "<p class='text-center'><a href='php_game.php?gameid=$userid'><img src='upload/$game_image' class='img-circle sq200'>
    <br />$game_title</a></p>";
}
else //nothing set
{
    $type = 0;
}
?>
					        <!-- start:work -->
					        <li id="id-work">
								<div class="timeline-badge default"><i class="fa fa-briefcase"></i></div>
								<h1 class="timeline-head">PORTFOLIO</h1>
                                <div class="fb-share-button" data-href="http://www.gamerstack.io<?=$_SERVER['REQUEST_URI']?>" data-layout="button"></div>
                                
							</li>
							<li>
					          	<div class="timeline-badge danger"></div>
					          	<div class="timeline-panel">
                                    
                                    
                                    


<?php


if ($type)
{
    //pagination
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
        $page = 1;
    
    $lim = $page * 10;
    $start_lim = $lim - 10;
    $end_lim = $lim;
    $lim_query = " LIMIT $start_lim, $end_lim ";
    
    if ($type != "game_screenshots")
        $query = "SELECT * FROM $type WHERE userid='$userid' $lim_query";
    else
        $query = "SELECT * FROM $type WHERE gameid='$userid' $lim_query";
    
    //server connection
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
    //end server connection
    
    $sql = $dbs->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    
    if (sizeof($data) > 0)
    {
        ?>
            <ul class="thumbnails list-inline">
        <?php
        foreach($data as $image)
        {
            $id = $image['id'];
            $userid = $image['userid'];
            $title = $image['title'];
            $caption = $image['caption'];
            $description = $image['description'];
            $img = "upload/".$image['image'];
            $date_added = $image['date_added'];
            
    
                $youtube = "";
                $youtube = $image['youtube'];

            if (strlen($youtube) > 1){
                    clean_youtube_link($youtube);
                     $img = make_embed_youtube($youtube);
                     $img = make_thumbnail_youtube($youtube);
                    $title.= " <img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:40px;width:auto;'>";
                }
            
            if ($type=="game_screenshots")
            {
                $gameid = $image['gameid'];
            }
            ?>
                <li data-type="pf" data-id="id-1" class="span3">
                  <a href="#" class="thumbnail" id="<?=$id?>"><img src="<?=$img?>" alt=""></a>
                </li>
                
            <?php
            
            /*
            game : id, gameid, userid, title, caption, description, image, date_added
            user and company: id, userid, title, caption, description, image, date_added
            */
        }?>
        
        </ul>
        <?php
        
        $sizeof = sizeof($data);
        if ($sizeof > 10)
        {
            if (($sizeof/10) != (intval($sizeof/10)))
                $pages = intval($sizeof/10)+1;
            else
                $pages = $sizeof/10;

            print "<br />$sizeof results on $pages Pages<br />";
            for ($i = 1; $i <= $pages; $i++)
            {
                if ($i == $page)
                    print $i;
                else
                    print "<a href='full_portfolio.php?page=$i&$get_param=$userid'>$i</a>";

                if ($i < $pages)
                    print ", ";
            }


        }
        
        
    }
    else
    {
        print "No results";
    }


    
}
?>

                                    

  

                                    
                                    
                                    
					            	<div class="timeline-body" id="content_here_please">
                                        
                                            
                                        <!--start insertion here-->
					            		
                                        <!--end insertion here-->
					            	</div>
					          	</div>
					        </li>
					        <!-- end:work -->

					        

					        <!-- start:contact -->
					    

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
    function gallery(){
        
        <?php
        foreach($data as $image)
        {
            $id = $image['id'];
            $userid = $image['userid'];
            $title = addslashes($image['title']);
            $caption = addslashes($image['caption']);
            $description = $image['description'];
            $img = "upload/".$image['image'];
            $date_added = $image['date_added'];
            
            
            
            if ($type=="game_screenshots")
            {
                $gameid = $image['gameid'];
            }
            $img_size = getimagesize("$img");
            if ($img_size[0] > 500 || $image['youtube'] == true)
                $size = "large";
            else
                $size = "small";
            
            
            
                     $youtube = "";
                $youtube = $image['youtube'];

            if (strlen($youtube) > 1){
                     $video = make_embed_youtube($youtube);
               
//                    $title.= " <img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:40px;width:auto;'>";
                }

            ?>
            
        <?php
            if (strlen($youtube)>0){
                ?>
                    $('#<?=$id?>').click(function() { bootbox.alert({size:'<?=$size?>', message: '<div class="p_img"><?=$video?></div><h4><?=$title?></h4><h3><?=$caption?></h3>'}); });

        <?php
            }
            else{
            ?>
            $('#<?=$id?>').click(function() { bootbox.alert({size:'<?=$size?>', message: '<div class="p_img"><img src="<?=$img?>" class="img-responsive"></div><h4><?=$title?></h4><h3><?=$caption?></h3>'}); });
        <?php }/*
            game : id, gameid, userid, title, caption, description, image, date_added
            user and company: id, userid, title, caption, description, image, date_added
            */
        
        }
    
    
    
    ?>
            
        }
    var $itemsHolder = $('ul.thumbnails');
    var $itemsClone = $itemsHolder.clone(); 
    var $filterClass = "";
    $('ul.filter li').click(function(e) {
    e.preventDefault();
    $filterClass = $(this).attr('data-value');
        if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
        else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
        $itemsHolder.quicksand(
          $filters,
          { duration: 1000 },
          gallery
          );
    });
    $(document).ready(gallery);
</script>
 
    <?php if (!isset($_SESSION['id'])) { ?> <script src="js/register.js"></script>  <?php  }  ?>
    
</body>
</html>