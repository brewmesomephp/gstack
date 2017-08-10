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
                          
            	
                <!-- start:company -->
					        <li id="id-resume">
                                <form action="company_search_ajax.php?page=1" method="POST" class="col-lg-12 company" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">Company Search</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
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
            $query = "SELECT * FROM users WHERE (first_name LIKE '%$search%' or last_name LIKE '%$search%' or skillset LIKE '%$search%' or bio LIKE '%$search%' or totalskills LIKE '%$search%' or role LIKE '%$search%') $q $b AND account='1'";
        }
         else
        $query = "SELECT *
                    FROM users
                    WHERE MATCH(email, first_name, last_name, skillset, bio, totalskills, role, zip) AGAINST('$search*' IN BOOLEAN MODE)  $q AND account='1'";
         
         //ALTER TABLE `users` ADD FULLTEXT(`email`, `first_name`, `last_name`, `skillset`, `bio`, `totalskills`, `role`, `zip`);
     }
    else if ($zip != '')
    {
        $query = "SELECT * FROM users WHERE account='1' $q";
        
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
    //show the data
    
        print "
        <h1>Game Companies</h1>
        <h3>Searches Company Names, About, Headlines, Company Type</h3>
        ";
if (sizeof($data) <= 0)
{
    print "No results.";
}
//print sizeof($data);
    foreach($data as $row) 
    {

        $i++;
        $id = $row['id'];
        $image = $row['picture'];
        $bio = $row['bio'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $skillset = $row['skillset'];
        if ($image == '')
            $image = "upload/default/default.jpg";
        else
            $image = "upload/".$image;
        $company_name = $row['company'];

        $first_name =strtoupper($first_name);
        $last_name = strtoupper($last_name);
        

        print "<div class='user'>
                            <div class='text-center'>
                                <img src='$image' class='img-circle sq200'>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a href='php_company.php?id=$id'>$company_name</a></h1>
                                <div class='hr-center'></div>
                                <h4>$skillset</h4>
                                
                            </div>
                            
                            $bio
                            <div class='hr-left'></div>";
        
  
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
            print "<a href='company_search_ajax.php?page=$i&search=$search&zip=$zip&miles=$miles'>$i</a>";
        
        if ($i < $pages)
            print ", ";
    }
    
    
}




    

?>

<div class="timeline-panel company" id="company">
                                    
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
					          				<div class="col-md-2">
					          					<div class="">
					          						<button type="submit" class="btn btn-lg btn-primary btn-success btn-block" id="submit_company">SUBMIT</button>
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
    
    <div id="company_div" ><p></p></div>
 
    
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