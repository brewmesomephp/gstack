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
							

					        

					        <!-- start:resume -->
					        <li id="id-resume">
					        	<div class="timeline-badge default"><i class="fa fa-file"></i></div>
					        	<h1 class="timeline-head">RESUME</h1>
                                <div class="fb-share-button" data-href="http://www.gamerstack.io<?=$_SERVER['REQUEST_URI']?>" data-layout="button"></div>
					        </li>
                            
                            
                            <li id="profile">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Hello, I am <strong><?= strtoupper($first_name); ?> <?= strtoupper($last_name); ?></strong></h1>
					          		<h4><?= $skillset; ?></h4>
					          		<div class="hr-left"></div>
					          		
<p><?= $bio ?></p>
					          	</div>
					        </li>
                            
                            <li>
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Skills</h1>
						          	<div class="hr-left"></div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
<?php                                   
                                    
        $query = "SELECT * FROM skills WHERE userid='$userid' ORDER BY percent DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();


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
            <div class='skillbar-title' style='background: #16a085;'><span> $skill_name</span></div>
            <div class='skillbar-bar' style='background: #1abc9c;'></div>
            <div class='skill-bar-percent'>$percent%</div>
        </div> <!-- End Skill Bar -->
";
       /* 
        print "<div class='progress'>$skill_name:
  <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='$percent'
  aria-valuemin='0' aria-valuemax='100' style='width:$percent%; text-align:left;'>
    $percent%  <a class='remove' id='$id' href='#'>X</a>
  </div>
</div>";*/
    }
                                    
?>                               
                                    
                                    
                                    
   
					          	</div>
					        </li>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
           
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
					        <li id="resume">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Work Experience</h1>
                                    <?php                            
        $query = "SELECT * FROM experience WHERE userid='$userid' ORDER BY end_year DESC,end_month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $xp = $sql->fetchAll();

    //get the data
    $i=0;
    //show the data
    
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
                            
  ?>               
						          	
					          	</div>
					        </li>
					        <li id="resume">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Education</h1>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
<?php                            
        $query = "SELECT * FROM education WHERE userid='$userid' ORDER BY end_year DESC,end_month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $edu = $sql->fetchAll();
        

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
?>
                                 
					          	</div>
					        </li>
                            <li id="resume">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Organizations</h1>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
 <?php                                   
                                    
        $query = "SELECT * FROM organizations WHERE userid='$userid' ORDER BY year DESC,month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $orgs = $sql->fetchAll();


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
                <h3>Organization: $title</h3>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }
                                    ?>
                                    
                                    
 
					          	</div>
					        </li>
                            <li id="resume">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Recognition & Awards</h1>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
<?php                            
        $query = "SELECT * FROM awards WHERE userid='$userid' ORDER BY year DESC,month DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $awards = $sql->fetchAll();

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
                <h3>Award: $title</h3>
                <h4>$occupation</h4>
                <h4>$issuer</h4>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }
?>
                                    
 
					          	</div>
					        </li>
					        
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