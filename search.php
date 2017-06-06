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
                            include_once "navbar.php";
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
                          
            	
                <!-- start:awards -->
					        <li id="id-resume">
                                <form class="col-lg-12 awards" style="float:left;">
					        	
                                    <div class="text-center">
                                <img src="logo.png" class="img-circle sq300 width:30%; min-width:150px; max-width:300px;">
                            </div>
                                    
                                    
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
                                <div class="timeline-panel word-experience" id="form_content">
                                    <div class="hr-left"></div>
                                    
					        	<h3 class="text-center">Search</h3>
					          			<div class="row">
					          				<div class="col-md-12 login-status text-center">
                                                <ul class="list-inline">
                                                    <li style='margin-top:10px;'><a href="candidate_search_ajax.php" style="padding-bottom:10px;" class="btn btn-danger btn-lg btn-huge lato" >Candidates</a></li> 
                                                <li style='margin-top:10px;'><a href="company_search_ajax.php" style="padding-bottom:10px;" class="btn btn-danger btn-lg btn-huge lato" >Companies</a></li> 
                                                    <li style='margin-top:10px;'><a href="job_search_ajax.php" style="padding-bottom:10px;" class="btn btn-danger btn-lg btn-huge lato" >Jobs</a></li> 
                                                    <li style='margin-top:10px;'><a href="game_search_ajax.php" style="padding-bottom:10px;" class="btn btn-danger btn-lg btn-huge lato" >Games</a></li> 
                                                </ul>
					          				</div>
					          				
                                        
                                
                                    <br /><br />
                                    
                                    
                                        <br>
                            
					          	</div>
					        </li>

                    </div>
            </div>
        	
	</div>
    
    <div id="awards_div" ><p></p></div>
 	
                


</body>
</html>