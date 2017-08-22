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
                          
            	
                <!-- start:jobs -->
					        <li id="id-resume">
                                
                                <form action="job_search_ajax.php?page=1" method="post" class="col-lg-12 jobs" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">Search for Jobs</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel jobs" id="jobs">
					          		
                                    
                                    
                                    
                                    
                                    
<?php
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];
    
    
$zip = "";
    $q="";
    $b="";
        include_once "functions.php";
    $dbs = db_connection();
        
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
        $page-=1;
        $lim = $page * 10;
        $end_lim = $lim + 10;
        $query_extension = " LIMIT $lim, $end_lim";
    }

    
    $q="";
    //add a new item to DB
    if (isset($_POST['search']) || isset($_GET['search']))
    {
        //
        print "<br />";
        
        
        if (isset($_POST['search']))
            $search  = $_POST['search'];
        else
            $search = $_GET['search'];
            
        
        $search= addslashes(strip_tags($search));
        
        
        
       if ((isset($_POST['zip']) && $_POST['zip'] != '') || (isset($_GET['zip']) && $_GET['zip'] != ''))
        {
            if (isset($_POST['zip']))
            {
                if ($_POST['zip'] != '')
                {
                    $zip = $_POST['zip'];
                    $miles = $_POST['miles'];
                }
            }
            if (isset($_GET['zip']))
            {
                if ($_GET['zip'] != '')
                {
                    $zip = $_GET['zip'];
                    $miles = $_GET['miles'];
                }
            }
            if ($zip != '')
            {
                $zip = addslashes(strip_tags($zip));
                include "zip.php";
                $q = "AND id IN (" . run_zip_query($zip, $miles, $dbs, "jobs") . ")";
                
            }
        }
        else
        {
            $zip = "";
        }
            
        //add more browsing functions inc permanent, remote, and volunteer
        $b = "";
        
        
        
        if (isset($_POST['volunteer']))
        {
            //this means that whole thing was a post function.
            if ($_POST['volunteer'] == 2)
            {
                $volunteer=2;
            }
            else if ($_POST['volunteer'] == 1)
            {
                $b = $b . " AND volunteer='0'";
                $volunteer = 1;
            }
            else if ($_POST['volunteer'] == 0)
            {
                $b = $b . " AND volunteer='1'";
                $volunteer = 0;
            }
            if ($_POST['remote'] == 2)
            {
                $remote=2;
            }
            else if ($_POST['remote'] == 1)
            {
                $b = $b . " AND remote='1'";
                $remote = 1;
            }
            else if ($_POST['remote'] == 0 )
            {
                $b = $b . " AND remote='0'";
                $remote = 0;
            }
            if ($_POST['permanent'] == 2)
            {
                $permanent=2;
            }
            else if ($_POST['permanent'] == 1)
            {
                $b = $b . " AND permanent=''";
                $permament = 1;
            }
            else if ($_POST['permanent'] == 0)
            {
                $b = $b . " AND volunteer!=''";
                $permanent = 0;
            }
            
        }
        
        if (isset($_GET['volunteer']))
        {
            //this means that whole thing was a GET function.
            if ($_GET['volunteer'] == 2)
            {
                $volunteer=2;
            }
            else if ($_GET['volunteer'] == 1)
            {
                $b = $b . " AND volunteer='0'";
                $volunteer = 1;
            }
            else if ($_GET['volunteer'] == 0)
            {
                $b = $b . " AND volunteer='1'";
                $volunteer = 0;
            }
            if ($_GET['remote'] == 2)
            {
                $remote=2;
            }
            else if ($_GET['remote'] == 1)
            {
                $b = $b . " AND remote='1'";
                $remote = 1;
            }
            else if ($_GET['remote'] == 0 )
            {
                $b = $b . " AND remote='0'";
                $remote = 0;
            }
            if ($_GET['permanent'] == 2)
            {
                $permanent=2;
            }
            else if ($_GET['permanent'] == 1)
            {
                $b = $b . " AND permanent=''";
                $permament = 1;
            }
            else if ($_GET['permanent'] == 0)
            {
                $b = $b . " AND volunteer!=''";
                $permanent = 0;
            }
            
            
        }
        $permanent_g = $permanent;
        $remote_g = $remote;
        $volunteer_g = $volunteer;
        //make sure this work
        

        $query = "INSERT INTO search  (query, userid, added) VALUES ('$search', '$sess_id', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    if (isset($_POST['zip']) || (isset($_GET['zip'])))
        {
            if (isset($_GET['zip']))
                $zip = addslashes(strip_tags($_GET['zip']));
            else
                $zip = addslashes(strip_tags($_POST['zip']));
        }
        else
        {
            $zip = "";
        }
    
     if (isset($search) && $search !='')
     {
        if(strlen($search) < 4)
        {
            $query = "SELECT * FROM jobs WHERE (title LIKE '%$search%' or description2 or company_name LIKE '%$search%' or description LIKE '%$search%') $q $b  ORDER BY added DESC";
            
        }
         else
        $query = "SELECT *
                    FROM jobs
                    WHERE MATCH(title, description, zip, company_name) AGAINST('$search*' IN BOOLEAN MODE)  $q $b  ORDER BY added DESC";
         
     }
    else if($zip != '')
    {
        $query = "SELECT * FROM jobs WHERE 1=1 $q $b  ORDER BY added DESC";
    }
    else if ($zip == '' && $b != "")
    {
        $query = "SELECT * FROM jobs WHERE 1=1 $b  ORDER BY added DESC";
    }
    elseif ($zip == '' && ((isset($_POST['search']) && $_POST['search'] == '') || (isset($_GET['search']) && $_GET['search'] == '')))
    {
        $query = "SELECT * FROM jobs ORDER BY added DESC";
    }
else
{
    $query = "SELECT * FROM jobs WHERE 1=1";
}
    
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        $sizeof = sizeof($row);
    
    if (isset($query_extension))
        $query = $query . $query_extension;
    
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

        

    $i=0;
    $data = $row;
    //show the data
    
        print "
        <h1>Jobs</h1>
        <h3>Search Job Title, Requirements, Skills Needed</h3>
        ";
    foreach($data as $row) 
    {   //"SELECT jobs.id, jobs.compensation, jobs.title, jobs.location, jobs.remote, jobs.description, jobs.start_day, jobs.start_month, jobs.start_year, jobs.volunteer, jobs.permanent, jobs.userid, users.company";
        $id = $row['id'];
        $compensation = $row['compensation'];
        $title = $row['title'];
        $location= $row['location'];
        $remote= $row['remote'];
        $description= $row['description'];
        $start_day = $row['start_day'];
        $start_month= $row['start_month'];
        $start_year= $row['start_year'];
        $volunteer= $row['volunteer'];
        $permanent = $row['permanent'];
        $userid = $row['userid'];
        
        if ($volunteer == 1)
        {
            $compensation = "Volunteer Position";
        }
        else
        {
            $compensation = "Paid Position";
        }

        
        //print "$compensation, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $volunteer";
        /*print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title: $compensation (<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $volunteer, $location $remote</small>
                <p>$description</p>
            </div>";*/
        
        $query = "SELECT * FROM `apply_now` WHERE jobid='$id' AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $applied = $sql->fetch();
        if ($applied){
            $inquire_now = "[Application Sent]";
        }
        else
            $inquire_now = "";

        
        
        
        print "
        <hr>
        <div class='work-experience'>
            <h3><a href='view_job.php?jobid=$id'>$title</a> $inquire_now</h3>
            <h4>Location: $location</h4>
            <h5>$compensation</h5>
            <small><i class='fa fa-calendar'></i>Start Date: $start_month/$start_day/$start_year</small>
            <p>$description</p>
            <p><a href='php_company.php?id=$userid'>Visit Company Page</a></p>
        </div>
        ";
  
    }

if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;
if (!isset($miles)) $miles='';
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
            print "<a href='job_search_ajax.php?page=$i&search=$search&zip=$zip&miles=$miles&volunteer=$volunteer_g&remote=$remote_g&permanent=$permanent_g'>$i</a>";
        
        if ($i < $pages)
            print ", ";
    }
    
    
}


if (sizeof($data) <= 0)
{
    print "No results.";
}
    

?>


                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-6">
					          					
					          						<input name="search" id="search" class="form-control input-lg" placeholder="Search..."> 
				
					          				</div>
                                            <div class="col-md-2">
					          					
					          						<input name="zip" id="zip" class="form-control input-lg" placeholder="Zip...">  
                                                   
					          				</div>
                                            
                                            <div class="col-md-2">
					          					
					          						<select name='miles' class="form-control input-lg" >
                                                        <option value="5">5 Miles</option>
                                                        <option value="10">10 Miles</option>
                                                        <option value="25">25 Miles</option>
                                                        <option value="50">50 Miles</option>
                                                        <option value="100">100 Miles</option>
                                                        <option value="250">250 Miles</option>
                                                
                                                </select>  
                                                   
					          				</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                                        <fieldset id="group1">
                                                    <label class="radio-inline"><input type="radio" name="remote" value="2" checked="checked">Remote & On-Site</label>
                                                <label class="radio-inline"><input type="radio" name="remote" value="0" >On-Site Only</label>
                                                <label class="radio-inline"><input type="radio" name="remote" value="1">Remote Only</label>
                                                </fieldset>

                                                <fieldset id="group2">
                                                    <label class="radio-inline"><input type="radio" name="volunteer" value="2" checked="checked">Volunteer & Paid</label>
                                                <label class="radio-inline"><input type="radio" name="volunteer" value="1" >Paid Only</label>
                                                <label class="radio-inline"><input type="radio" name="volunteer" value="0" >Volunteer Only</label>
                                                </fieldset>

                                                <fieldset id="group3">
                                                    <label class="radio-inline"><input type="radio" name="permanent" value="2"  checked="checked">Permanent & Temp</label>
                                                <label class="radio-inline"><input type="radio" name="permanent" value="1" >Permanent Only</label>
                                                <label class="radio-inline"><input type="radio" name="permanent" value="0" >Temporary Only</label>
                                                </fieldset>
                                        </div>
					          				<div class="col-md-2">
					          					<div class="">
					          						<button type="submit" class="btn btn-lg btn-primary btn-success btn-block" id="submit_jobs">SUBMIT</button>
					          					</div>
					          				</div>
					          			</div>
                                        
                                        
                                            <div class="col-md-2 ">
                                                
                                       
                                        </div>
                                        <div class="col-md-2 ">
                                       <label for="date"></label>
                                               
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                    
                                        <div class="col-md-2 ">
                                                
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       
                                               
                                        </div>
                                        
                                
					          		</form>
                                    
				            
                            
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