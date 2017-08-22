<?php
include "connect.php"; if (empty($_SESSION)){$not_in = true; ;} else {$not_in = false;}
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
                            if ($not_in == true)
                            {
                                
                            }
                            else
                            {
                                include "navbar.php";
                                navbar($userid, $account);
                            }
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
                          
            	
                <!-- start:jobs -->
					        <li id="id-resume">
                                
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">View Job</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel jobs" id="jobs">
					          		
                                    
                                    
                                    
                                    
                                    
<?php
if (!isset($_SESSION['id']))
    {
        print "";
        $loggedin=false;
    }
else{
        $userid = $_SESSION['id'];
        $sess_id = $_SESSION['id'];
        $loggedin = 1;

    }

include_once "functions.php";


if (isset($_GET['jobid']))
{
    $jobid = $_GET['jobid'];
    $job = get_job($jobid);
    $company = get_user($job['userid']);
    $companyid = $job['userid'];
    $company_name = $company['name'];
    print "<h2><a href='php_company.php?id={$company['id']}'>$company_name</a></h2>";
    
    //Gets the cover letter, strips it of malicious code, inserts into application db and message db
    if (isset($_GET['apply'])){
        if (isset($_POST['cover']) && $loggedin){
            
            $cover = $_POST['cover'];
            $dbs = db_connection();
            $cover= addslashes(strip_tags($_POST['cover'])); 
            
            $sess_id = $_SESSION['id'];
            $query = "SELECT * FROM `apply_now` WHERE jobid='$jobid' AND userid='$sess_id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $applied = $sql->fetch();
            if (!$applied){
                //adds application
                $query = "INSERT INTO apply_now (userid, jobid, message, time_applied, companyid) VALUES('$userid', '$jobid', '$cover', CURRENT_TIMESTAMP, '$companyid')";
                $sql = $dbs->prepare($query);
                $sql->execute();


                //            Adds as a message to the database
                $query2 = "INSERT INTO messages (fromid, toid, message, added, jobid) VALUES ('$userid', '$companyid', '$cover', CURRENT_TIMESTAMP, '$jobid')";
                $sql = $dbs->prepare($query2);
                $sql->execute();
                
            }
            

            
//            Now add a client side (company respond to the application) 8/3/17
            
            
            
//                $query = "UPDATE users SET bio = '$bio', first_name='$first_name', last_name='$last_name', skillset='$skillset', zip='$zip'
//        , address='$address', city='$city', state='$state', country='$country', website='$website' WHERE id='$sess_id'";
            print_job($job, 1);
            }
            else{
                print_job($job);
            }
        
    }
    else{
            
            print_job($job);
    }
}


?>    
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          			
                                        
                                
				            
                            
					          	</div>
					        </li>

                    
            </div>
        	
	</div>
    
    <div id="jobs_div" ><p></p></div>
 
    
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