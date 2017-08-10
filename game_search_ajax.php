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
                          
            	
                <!-- start:game -->
					        <li id="id-resume">
                                <form action="game_search_ajax.php?page=1" method="post" class="col-lg-12 game" style="float:left;">
					        	<div class='timeline-badge default'><i class='fa fa-terminal'></i></div>
					        	<h1 class="timeline-head">Game Search</h1>
                                
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel game" id="game">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
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
        
         if (isset($_POST['search']))
            $search  = $_POST['search'];
        else
            $search = $_GET['search'];
         
         if (isset($_POST['hiring']))
            $hiring  = $_POST['hiring'];
        else
            $hiring = $_GET['hiring'];
        
        $search= addslashes(strip_tags($search));
        $hiring = addslashes(strip_tags($hiring));
                             
        if($hiring != 'Either')
        {
            $q = "AND hiring='$hiring'";
        }

            

        $query = "INSERT INTO search  (query, userid, added) VALUES ('$search', '$sess_id', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    if (isset($_POST['hiring']))
            $hiring  = $_POST['hiring'];
        elseif (isset($_GET['hiring']))
            $hiring = $_GET['hiring'];
    else
        $hiring = "";
     if (isset($search) && $search != '')
     {
         
         if(strlen($search) < 4)
        {
             $query = "SELECT *
                    FROM games
                    WHERE (company_name LIKE '%$search%' OR title LIKE '%$search%' OR headline LIKE '%$search%' OR description LIKE '%$search%' OR engine LIKE '%$search%') $q  ORDER BY added DESC";
        }
         else
        $query = "SELECT *
                    FROM games
                    WHERE MATCH(title, headline, description, engine, company_name) AGAINST('$search*' IN BOOLEAN MODE) $q ORDER BY added DESC";
         //ALTER TABLE `games` ADD FULLTEXT(`title`, `headline`, `description`, `engine`);
     }
    else if($hiring != 'Either')
        {
            $query = "SELECT 
            *
            FROM games
                    WHERE hiring='$hiring'";
        
        if ($hiring == ''){
                    $query = "SELECT * FROM games ORDER BY added DESC";

        }
        }
    elseif ($search == '')
    {
        $query = "SELECT * FROM games ORDER BY added DESC";
    } 
    else
    {
        $query = "SELECT * FROM games ORDER BY added DESC";
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

    //get the data
    $data = $row;
    $i=0;
    //show the data
    
        print "
        <h1>Games</h1>
        <h3>Searches Game Titles, Headlines, Descriptions, Engine Used</h3>
        <ul class='list-inline' style='text-align:center'>
        ";
    foreach($data as $game) 
    {

            $id = $game['id'];
            $userid=$game['userid'];
            $image = $game['image'];
            $description = $game['description'];
            $title = $game['title'];
            $headline = $game['headline'];
            $genre = $game['genre'];
           
            $engine = $game['engine'];
            $hiring=$game['hiring'];
            $website = $game['website'];
            $company =$game['company_name'];
            if ($image == '')
                $image = "upload/default/default.jpg";
            else
                $image = "upload/".$image;


        
        
        
        

        print "<li style='margin: 10px 10px 10px 10px'><div style='max-width:175px;'>
                                        <div class='text-center'>
                                            <a  href='php_game.php?gameid=$id'><img src='$image' class='img-circle sq200'></a>
                                        </div>
                                        <div class='user-head text-center' >
                                            <h1><a  href='php_game.php?gameid=$id'> $title </a></h1>
                                            <h2>By <a href='php_company.php?id=$userid'>$company</a></h2>
                                            <div class='hr-center'></div>
                                            <h4>$headline</h4>
                            <div class='hr-left'></div>
                                        </div>
                                    </div></li>";
  
    }
print "</ul>";
if ($sizeof > 10)
{
    if (($sizeof/10) != (intval($sizeof/10)))
        $pages = intval($sizeof/10)+1;
    else
        $pages = $sizeof/10;
    if (isset($_POST['hiring']))
    {
        if ($_POST['hiring'] == "Either")
        {
            $hiring = "Either";
        }
    }
    elseif (isset($_GET['hiring']))
    {
        
        if ($_GET['hiring'] == "Either")
        {
            $hiring = "Either";
        }
    }
    
    print "<br />$sizeof results on $pages Pages<br />";
    for ($i = 1; $i <= $pages; $i++)
    {
        if ($i == $_GET['page'])
            print $i;
        else
            print "<a href='game_search_ajax.php?page=$i&search=$search&hiring=$hiring'>$i</a>";
        
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
					          				<div class="col-md-8">
					          					<label>Search for...</label>
					          						<input name="search" id="search" class="form-control input-lg" placeholder="Search..."> 
				
					          				</div>
                                            
                                            <div class="col-md-2">
                                                <label>Hiring</label>
                                            <select name="hiring" class="form-control input-lg">
                                            <option>Either</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                                
                                            </select>
                                            </div>
                                            
					          				<div class="col-md-2">
					          					<div class="">
                                                    <label></label>
					          						<button type="submit" class="btn btn-lg btn-primary btn-success btn-block" id="submit_game">SUBMIT</button>
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
    
    <div id="game_div" ><p></p></div>
 
    
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