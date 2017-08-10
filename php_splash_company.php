<?php 
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_splash_candidate.php' ) ;
}


    include_once "functions.php";
    $dbs = db_connection();
    
        $query = "SELECT * FROM users WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

        foreach($row as $user)
        {
            $id = $user['id'];
            $first_name = $user['first_name'];
            $last_name = $user['last_name'];
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



        $query = "SELECT * FROM users WHERE id='$sess_id'";
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
							<h1><?= strtoupper($first_name); ?> <?= strtoupper($last_name); ?></h1>
							<div class="hr-center"></div>
							<h5><?$skillset?></h5>
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
                                navbar($_SESSION['id'], $account);
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
                                <?php include_once "check_percentage.php"; ?>
								<div class="timeline-badge default"><i class="fa fa-user"></i></div>
								<h1 class="timeline-head">PROFILE</h1>
                                <h5>
								<a href="php_company_profile_ajax.php">Profile</a> /
								<a href="company_achievements_ajax.php">Achievements</a> /
								<a href="company_portfolio_ajax.php">Portfolio</a> /
								<a href="jobs_ajax.php">Jobs</a> 
                            </h5>
							</li>
					        
					        
					        <!-- end:profile -->

                 
                            

                            
                            
                            
                            
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
            
            ";
            
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


                    ?> <ul class='list-inline' style='text-align:center'> <?php

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
                            <li>";
                }
                            ?> </ul> <?php
print "</div>
                                    
					          	</div>
					        </li>";
        }//end sizeof
?>                            
                            
                                        
                                    
                    
					        
					        <!-- end:contributors -->
                            
                            
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
                $image = "upload/".$portfolio['image'];
                $caption = $portfolio['caption'];
                $title = $portfolio['title'];
                $description= $portfolio['description'];
                $date_added= $portfolio['date_added'];
                //$image = "<img src='upload/$image'>";

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


                //$url=
                echo "<li style='width:300px;'><a href='#thumb$i' class='thumbnail' style=\"background-image: url('$image')\">";
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
            
                    $youtube = "";
                    $youtube = $portfolio['youtube'];
 
                if (strlen($youtube) > 1){
                        clean_youtube_link($youtube);
                         $image = make_embed_youtube($youtube);
                    print $image;
                         make_thumbnail_youtube($youtube);
                        $title.= " <img src='https://www.youtube.com/yt/brand/media/image/YouTube-icon-full_color.png' style='padding-left:20px;max-height:40px;width:auto;'>";
                    }
            
                
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

					      
					        
    

					        <?php
include_once "functions.php";
bug_report();
?>
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
//for jobs

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
     
     $(function() {
//twitter bootstrap script
	$("#btn_interested").click(function(){
        
		   	$.ajax({
    		   	type: "POST",
			url: "process_show_interest.php?id=<?=$_GET['id']?>",
			data: $('form.send_msg').serialize(),
        		success: function(msg){
                     
 	          		  $("#interested_text").html(msg);
                    //clear form.
                   
 		        },
			error: function(){
				alert("failure");
				}
      			});
	});
});

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
     
     $(document).on("click",".done",function(e){
    
     //alert(invited_user_id);
         e.preventDefault();
     $("#invite_text").html("Requests Sent...")
     
 });


     
     
     
    </script>
</body>
</html>