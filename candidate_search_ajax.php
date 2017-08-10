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
                          
            	
                <!-- start:candidate -->
					        <li id="id-resume">
                                <form action="candidate_search_ajax.php?page=1" method="post" class="col-lg-12 candidate" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">Candidate Search</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel candidate" id="candidate">
                                    
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

//begin pagination
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
        $page-=1;
        $lim = $page * 10;
        $end_lim = $lim + 10;
        $query_extension = " LIMIT $lim, $end_lim";
    }
    $q = "";
    
    
    $q = "";
    //add a new item to DB
    if (isset($_POST['search']) || isset($_GET['search'])) 
    {
        //
        print "<br />";
        
        
        
       if (isset($_POST['search']))
            $search  = $_POST['search'];
        else
            $search = $_GET['search'];
        
        if (isset($_POST['role']))
        {
            $role = $_POST['role'];
        }
        elseif(isset($_GET['role']))
            $role = $_GET['role'];
        else
            $role = "";
        
        if ($role == "Any Role" || $role == "")
        {
            $q_role = " ";
        }
        else
            $q_role = " AND role = '$role' ";
            
        
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
                $q = "AND id IN (" . run_zip_query($zip, $miles, $dbs, "users") . ")";
                
            }
        }

            

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
    
     //thesee next following ifs are about if they leave search blank, and zip blank
     if ((isset($_POST['search']) && $_POST['search'] != '') || (isset($_GET['search']) && $_GET['search'] != ''))
     {
         if(strlen($search) < 4)
        {
            $query = "SELECT * FROM users WHERE (first_name LIKE '%$search%' or last_name LIKE '%$search%' or skillset LIKE '%search%' or bio LIKE '%$search%' or totalskills LIKE '%$search%' or role LIKE '%$search%' or zip LIKE '%$search%') AND account='0' $q $b $q_role  ORDER BY picture DESC";
        }
         else
        $query = "SELECT *
                    FROM users
                    WHERE MATCH(email, first_name, last_name, skillset, bio, totalskills, role, zip) AGAINST('$search*' IN BOOLEAN MODE) $q AND account='0' $q_role ORDER BY picture DESC ;";
     }
    else if($zip != '')
    {
        $query = "SELECT * FROM users WHERE account='0' $q $q_role";
    }
    elseif ($zip == '' && ((isset($_POST['search']) && $_POST['search'] == '') || (isset($_GET['search']) && $_GET['search'] == '')))
    {
        $query = "SELECT * FROM users WHERE account='0' $q_role ORDER BY picture DESC";
    }
    else
    {
        $query = "SELECT * FROM users WHERE 1=2";
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
    include_once "functions.php";
        print "
        <h1>Candidate Search</h1>
        <h3>Searches in Skills, Job Title, Bio, Name</h3>
        <ul class='list-inline' style='text-align:center'>";

    foreach($data as $row) 
    {

        $i++;
        $id = $row['id'];
        $image = $row['picture'];
        $bio = $row['bio'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $skillset = $row['skillset'];
        $u = get_user($id);
        $role_text = $u['role'];
        $icon = $u['icon'];
        
        if ($image == '')
            $image = "upload/default/default.jpg";
        else
            $image = "upload/".$image;

        $first_name =strtoupper($first_name);
        $last_name = strtoupper($last_name);
        

        print "<li style='margin: 10px 10px 10px 10px'><div class='user' style=' max-width:175px;'>
                            <div class='text-center'>
                                <img src='$image' class='img-circle sq200'>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a href='php_profile.php?id=$id'>$first_name $last_name</a></h1>
                                <div class='hr-center'></div>
                                <h4>$skillset</h4>
                                <p align='center'><img src='$icon' style='max-width: 30px;'></p>
                                <h5><b>$role_text</b></h5>
                                
                                
                            </div>
                            <div class='hr-left'></div></li>";
  
    }
print "</ul>";
if (sizeof($data) <= 0)
{
    print "No results.";
}

if (!isset($zip)) $zip='';
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
        if ($i == $_GET['page'])
            print $i;
        else
            print "<a href='candidate_search_ajax.php?page=$i&search=$search&zip=$zip&miles=$miles&role=$role'>$i</a>";
        
        if ($i < $pages)
            print ", ";
    }
    
    
}


?>


                                    
                                </div>
                                <div class="timeline-panel word-experience">
                                    <div class="hr-left"></div>
                                    
					          		<p>Please fill out the form below</p>
					          			<div class="row">
					          				<div class="col-md-5">
					          					
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
					          				<div class="col-md-3">
					          					<div class="">
                                                    
                                                    
                                                    <select class="form-control input-lg" name="role" id="role">
                                                    <option>Any Role</option>
                                                    <option>Gamer</option>
                                                    <option>YouTuber</option>
                                                    <option>Animator / Modeler</option>
                                                    <option>Producer</option>
                                                    <option>Audio</option>
                                                    <option>Director / Manager</option>
                                                    <option>Designer</option>
                                                    <option>Programmer</option>
                                                    <option>Artist</option>
                                                    <option>Marketing / PR</option>
                                                    <option>QA Tester</option>
                                                    <option>Writer</option>
                                                  
                                                </select>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
					          						
					          					</div>
					          				</div>
					          			</div>
                                        
                                        <div class="row">
                                    <div class="col-md-12" style="text-align:right;">
                                            
                                            <button type="submit" class="btn btn-lg btn-primary btn-success btn-block" id="submit_candidate">SUBMIT</button>
                                            </div>
                                    
                                    </div>
                                            
                                        
                                
					          		</form>
                                    
				            
                            
					          	</div>
					        </li>


                    
            </div>
        	
	</div>
    
    <div id="candidate_div" ><p></p></div>
 
    
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
                          
            

            
            
            
            
</script>
</body>
</html>