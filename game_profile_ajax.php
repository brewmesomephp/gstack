<?php
if(session_id() == ''){session_start();} if (empty($_SESSION)){header( 'Location: login_ajax.php' ) ;}include "connect.php"; 
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];
$gameid=$_GET['gameid'];
include_once "functions.php";
if (!get_account_type($sess_id))
{
	header( 'Location: php_profile_ajax.php' ) ;
}
?>





<?php
include_once "functions.php";
    $dbs = db_connection();
$query = "SELECT * FROM games WHERE id='$gameid' and userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();

    foreach($row as $row) 
    {
        $id = $row['id'];
        $image = $row['image'];
        $description = $row['description'];
        $headline = $row['headline'];
        $title = $row['title'];
        $genre = $row['genre'];
        $workers = $row['workers'];
        $start_month = $row['start_month'];
        $start_year = $row['start_year'];
        $end_month = $row['end_month'];
        $end_year = $row['end_year'];
        $engine = $row['engine'];
        $hiring=$row['hiring'];
        $website = $row['website'];
        if ($image == '')
            $image = "upload/default/default.jpg";
        else
            $image = "upload/".$image;
        
        if ($end_year == 0)
        {
            $end_year="";
        }
        if ($start_year == 0)
        {
            $start_year="";
        }
        if ($start_month == 0)
        {
            $start_month="";
        }
        
        if ($end_month == 0)
        {
            $end_month="";
        }
        if ($hiring == 0)
            $hiring="";
        
  
    }
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
							<?php include_once "check_percentage.php"; ?>

					        <!-- start:work -->
					        <li id="id-work">
								<div class="timeline-badge default"><i class="fa fa-briefcase"></i></div>
								<h1 class="timeline-head"><?= $title?> PROFILE</h1>
                                <h5><a href='game_profile_ajax.php?gameid=<?= $gameid?>'>Edit Game Profile</a> /
                                <a href='game_updates_ajax.php?gameid=<?= $gameid?>'>Edit Game Updates</a> /
                                <a href='screenshots_game_ajax.php?gameid=<?= $gameid ?>'>Edit Game Gallery</a> /
                                    <a href='game_listings.php'>Back to Listings</a></h5>
							</li>
							<li>
					          	<div class="timeline-badge danger"></div>
					          	<div class="timeline-panel">
                                    
                                    
                                    
                                    
                                    <form enctype="multipart/form-data" id="myform">
                                        <label for="role">Game Headline</label>
                                        <input type="text"  class="form-control input-lg" value="<?= $headline ?>"  name="headline" placeholder="Headline..."/> 
                                        <label for="workers">Number of Employees/Volunteers</label>
                                        <input type="text"  class="form-control input-lg" value="<?= $workers ?>"  name="workers" placeholder="Number of Employees/Volunteers..."/> 
                                        <label for="role">Game Website</label>
                                        <input type="text"  class="form-control input-lg" value="<?= $website ?>"  name="website" placeholder="Website..."/>
                                        <label for="role">Engine Used</label>
                                        <input type="text"  class="form-control input-lg" value="<?= $engine ?>"  name="engine" placeholder="Engine Used..."/>
                                        
                                                                      
                                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                                            
                                            <div class="col-md-12">
                                                <label for="role">Game Genre</label>
                                                <select class="form-control" name="genre">
                                                    <?php
                                                        if ($genre != '')
                                                        {
                                                            print "<option  value='$genre'>$genre</option>";
                                                        }
                                                    ?>
                                                    
                                                    <option>Action game</option>
                                                    <option>Action role-playing game</option>
                                                    <option>Action-adventure game</option>
                                                    <option>Adventure game</option>
                                                    <option>Affective videogames</option>
                                                    <option>Alternate reality game</option>
                                                    <option>Art game</option>
                                                    <option>Artillery game</option>
                                                    <option>Beat 'em up</option>
                                                    <option>Bishōjo game</option>
                                                    <option>List of BL games</option>
                                                    <option>Browser game</option>
                                                    <option>Business simulation game</option>
                                                    <option>City-building game</option>
                                                    <option>Collectible card game</option>
                                                    <option>Combat flight simulator</option>
                                                    <option>Construction and management simulation</option>
                                                    <option>Dating sim</option>
                                                    <option>Dungeon crawl</option>
                                                    <option>Escape the room</option>
                                                    <option>Falling-sand game</option>
                                                    <option>Fighting game</option>
                                                    <option>First-person shooter</option>
                                                    <option>God game</option>
                                                    <option>Government simulation game</option>
                                                    <option>Grand Theft Auto clone</option>
                                                    <option>Graphic adventure game</option>
                                                    <option>Hack and slash</option>
                                                    <option>Incremental game</option>
                                                    <option>Interactive movie</option>
                                                    <option>Kart racing game</option>
                                                    <option>Life simulation game</option>
                                                    <option>Light gun shooter</option>
                                                    <option>Massively multiplayer online first-person shooter game</option>
                                                    <option>Massively multiplayer online game</option>
                                                    <option>Massively multiplayer online real-time strategy game</option>
                                                    <option>Massively multiplayer online role-playing game</option>
                                                    <option>Metroidvania</option>
                                                    <option>MUD</option>
                                                    <option>Multiplayer online battle arena</option>
                                                    <option>Music video game</option>
                                                    <option>Non-game</option>
                                                    <option>Nonviolent video game</option>
                                                    <option>Open world</option>
                                                    <option>Otome game</option>
                                                    <option>Persistent browser-based game</option>
                                                    <option>Platform game</option>
                                                    <option>Programming game</option>
                                                    <option>Puzzle video game</option>
                                                    <option>Racing video game</option>
                                                    <option>Real-time strategy</option>
                                                    <option>Real-time tactics</option>
                                                    <option>Rhythm game</option>
                                                    <option>Roguelike</option>
                                                    <option>Role-playing video game</option>
                                                    <option>Shoot 'em up</option>
                                                    <option>Shooter game</option>
                                                    <option>Sim racing</option>
                                                    <option>Simulation video game</option>
                                                    <option>Social simulation game</option>
                                                    <option>Space flight simulator game</option>
                                                    <option>Sports game</option>
                                                    <option>Stealth game</option>
                                                    <option>Strategy video game</option>
                                                    <option>Survival game</option>
                                                    <option>Survival horror</option>
                                                    <option>Tactical role-playing game</option>
                                                    <option>Tactical shooter</option>
                                                    <option>Third-person shooter</option>
                                                    <option>Time management (video game genre)</option>
                                                    <option>Tower defense</option>
                                                    <option>Traditional game</option>
                                                    <option>Turn-based strategy</option>
                                                    <option>Turn-based tactics</option>
                                                    <option>Vehicle simulation game</option>
                                                    <option>List of vehicular combat games</option>
                                                    <option>Vertically scrolling video game</option>
                                                    <option>Visual novel</option>
                                                    <option>Wargame (video games)</option>
                                                </select>
                                                </div>
                                                <div class="col-md-2 ">
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                       <label for="date">Start Month</label>
                                               
                                                <select class="form-control"  name="start_month">
                                                    <?php
                                                        if ($start_month != '')
                                                        {
                                                            print "<option  >$start_month</option>";
                                                        }
                                                    ?>
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                  <option>6</option>
                                                  <option>7</option>
                                                  <option>8</option>
                                                  <option>9</option>
                                                  <option>10</option>
                                                  <option>11</option>
                                                  <option>12</option>
                                                </select>
                                        </div>
                                        <div class="col-md-2 ">
                                       <label for="date">Start Year</label>
                                                <input class=" form-control" id="start_year" name="start_year"  value="<?= $start_year ?>" placeholder="Start year...">
                                        </div>
                                        
                                        <div class="col-md-2 ">
                                                <label for="end_month">Release Month</label>
                                                <select class="form-control" name="end_month">
                                                    <?php
                                                        if ($end_month != '')
                                                        {
                                                            print "<option  >$end_month</option>";
                                                        }
                                                    ?>
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                  <option>6</option>
                                                  <option>7</option>
                                                  <option>8</option>
                                                  <option>9</option>
                                                  <option>10</option>
                                                  <option>11</option>
                                                  <option>12</option>
                                                </select>
                                        </div>
                                        <div class="col-md-2 ">
                                            
                                       <label for="date">Release Year</label>
                                                <input class=" form-control" id="end_year" placeholder="Release year..." value="<?= $end_year ?>"  name="end_year">
                                        </div>
                                            
                                            <div class="col-md-2 ">
                                            
                                       <label for="date">Looking for help?</label>
                                                <select class='form-control' name='hiring'>
                                                    <?php
                                                        if ($hiring != '')
                                                        {
                                                            print "<option  >$hiring</option>";
                                                        }
                                                    ?>
                                                <option>Yes</option>
                                                <option>No</option>
                                                    
                                                
                                                </select>
                                        </div>
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        
                                            </div>
        
        
        
        </div>



                                        <label for="role">Game Description</label>
                                        <textarea name="description"  class="form-control input-lg"  style="width:100%; height:100px;" placeholder="Description..."/><?= $description ?></textarea>
                                   <p id="submit_text" style="height:10px;color:green;"></p> <input type="button" value="Update Profile" class="formsubmit" />
                                    
                                    </form>
                                        <br>
                                <div class="hr-left"></div>


                                    <form enctype="multipart/form-data" id="image">   
                                        <label>Upload Your Default Image (Max 2mb, JPG, JPEG, PNG & GIF Allowed)</label>
                                        <input  class="form-control input-lg"  type="file" accept="image/*" name="fileToUpload" id="image" /> 
                                        <br>
                                        <input  class="form-control input-lg upload"  type="button" value="Upload Default Profile Image" />
                                    </form>
                                    <progress value="0" max="100"></progress>
                                    <hr>
                                    
                                    
                                    
                                    
					            	<div class="timeline-body" id="content_here_please">
                                        
                                            
                                        <!--start insertion here-->
					            		
                                        <!--end insertion here-->
					            	</div>
					          	</div>
					        </li>
					        <!-- end:work -->

					        

					        <!-- start:contact -->
					        <!-- start:contact -->
					        <li id="id-contact">
					        	<div class="timeline-badge default"><i class="fa fa-envelope"></i></div>
					        	<h1 class="timeline-head">CONTACT/BUGS</h1>
					        </li>
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Report Bugs</h1>
					          		<div class="hr-left"></div>
                                    
                                   
                                        
					          		<p id="message_return" style="clear:both;">Please report any bugs, suggestions, questions, comments, feedback, and conerns here! We appreciate you!</p>
					          		<form class="send_msg">
					          			<div class="row">
					          				
					          				<div class="col-md-12">
					          					<div class="form-group">
					          						<textarea class="form-control input-lg" name="message" rows="3" placeholder="Messages..."></textarea>
					          					</div>
					          				</div>
					          			</div>
					          			<div class="form-group">
					          				<button class="btn btn-lg btn-primary btn-block" type="button" id='btn_msg'>SEND</button>
					          			</div>
					          		</form>
                                    
                                    
                                        
                                            
                                        
					          	</div>
					        </li>
					       
					        <!-- end:contact -->
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

<script>
    //make two diff ajax forms, one for upload and one for profileupdate
$(document).ready(function () { 
        $('body').on('click', '.upload', function(){
            // Get the form data. This serializes the entire form. pritty easy huh!
            var form = new FormData($('#image')[0]);

            // Make the ajax call
            $.ajax({
                url: 'process_game_profile.php?img=true&gameid=<?=$gameid?>',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
                },
                //add beforesend handler to validate or something
                //beforeSend: functionname,
                success: function (res) {
                    $('#submit_text').html("Profile Updated");
                    $('#content_here_please').html(res);
                    
                },
                //add error handler for when a error occurs if you want!
                //error: errorfunction,
                data: form,
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false
            });
        });
    }); 
    
    
    //for submit data
$(document).ready(function () { 
        $('body').on('click', '.formsubmit', function(){
            // Get the form data. This serializes the entire form. pritty easy huh!
            var form = new FormData($('#myform')[0]);

            // Make the ajax call
            $.ajax({
                url: 'process_game_profile.php?img=false&gameid=<?=$gameid?>',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
                },
                //add beforesend handler to validate or something
                //beforeSend: functionname,
                success: function (res) {
                    $('#content_here_please').html(res);
                    alert (res);
                },
                //add error handler for when a error occurs if you want!
                //error: errorfunction,
                data: form,
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false
            });
        });
    }); 

    // Yes outside of the .ready space becouse this is a function not an event listner!
    function progress(e){
        if(e.lengthComputable){
            //this makes a nice fancy progress bar
            $('progress').attr({value:e.loaded,max:e.total});
        }
    }
    
    
    
    
          
            
 $(document).on("click",".remove",function(e){
 var skill_number = this.id;
     
     $.ajax({
    		   	type: "GET",
			url: "process_game_profile.php?gameid=<?=$gameid?>",
			data: 'id=' + skill_number,
        		success: function(msg){
                    
                        
 	          		  $("#content_here_please").html(msg)
 		        },
			error: function(){
				alert("failure");
				}
      			});
     
 });           
            
    $(document).ready(function() {
    $('#content_here_please').load('process_game_profile.php?gameid=<?=$gameid?>');
    return false;
});
            
    

    
    $( document ).ajaxComplete(function() {
  //$( "#skill_div" ).append( "Triggered ajaxComplete handler." );
    $(document).ready(function() {
    $('.thumbs').portfolio({
        cols: 3,
        transition: 'slideDown'
    });
});
        
});
    
    
    
    
    
    </script>

    
    <?php
include_once "functions.php";
bug_report_js();
?>
</body>
</html>