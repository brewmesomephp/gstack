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
    $account = -1;
}


print "connected too";
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
                                <img src="<?= $image ?>" class="img-circle sq200">
                            </div>
                            <div class="user-head text-center" >
                                <h1><?= strtoupper($first_name); ?> <?= strtoupper($last_name); ?></h1>
                                <div class="hr-center"></div>
                                <h5><?= $skillset ?></h5>
                            </div>
                        </div>
                        <div class="link-me">
                            <div class="text-center">
                                <a href="#"><i class="fa fa-download fa-2x" data-toggle="tooltip" data-placement="top" title="Download My CV"></i></a>
                                <a href="#"><i class="fa fa-flag fa-2x" data-toggle="tooltip" data-placement="top" title="Get in Touch"></i></a>
                                <a href="#"><i class="fa fa-money fa-2x" data-toggle="tooltip" data-placement="top" title="Hire Me"></i></a>
                            </div>
                            <div class="hr-center"></div>
                        </div>
						<ul class="timeline">
							

					        <!-- start:work -->
					        <li id="id-work">
								<div class="timeline-badge default"><i class="fa fa-briefcase"></i></div>
								<h1 class="timeline-head">WORK</h1>
                                <div class="fb-share-button" data-href="http://www.gamerstack.io<?=$_SERVER['REQUEST_URI']?>" data-layout="button"></div>
							</li>
							<li>
					          	<div class="timeline-badge danger"></div>
					          	<div class="timeline-panel">
                                
                                    
                                    
                                    
                                    
					            	<div class="timeline-body" id="content_here_please">
                                        


<?php
function getContent($userid) 
{
    
    include_once "functions.php";
    $dbs = db_connection();
    
        $query = "SELECT * FROM portfolio WHERE userid='$userid' ORDER BY date_added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        return $row;
}
//add an X to it
    //get the data
    $data = getContent($userid);
    $i=0;
    //show the data
    
        print "
        <h1>Portfolio Experience</h1>
        ";

    $i=0;
//start the Unordered List (Thumbnails)
print "<ul class='thumbs'>";
    foreach($data as $row) 
    {
        $i++;
        $id = $row['id'];
        $image = $row['image'];
        $caption = $row['caption'];
        $title = $row['title'];
        $description= $row['description'];
        $date_added= $row['date_added'];
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
foreach($data as $row) 
    {
        $i++;
        $id = $row['id'];
        $image = $row['image'];
        $caption = $row['caption'];
        $title = $row['title'];
        $description= $row['description'];
        $date_added= $row['date_added'];
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


    

?>
                                        
					            	</div>
					          	</div>
					        </li>
					        <!-- end:work -->

					        
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
                            <?php } ?>
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