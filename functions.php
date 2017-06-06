<?php
function get_user($id) //return a variable with most of the db info
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    
    $user;
    //add a new item to DB
        
            $query = "SELECT * FROM users WHERE id='$id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                $user['id'] = $row['id'];
                $user['company'] = $row['company'];
                $user['name'] = $row['first_name'] . " " . $row['last_name'];
                if ($row['account'] == 1)
                {
                    $user['name'] = $row['company'];
                }
                $user['account'] = $row['account'];
                $user['image'] = $row['picture'];
                $user['skillset'] = $row['skillset'];
                $user['headline'] = $row['skillset'];
                $user['notified'] = $row['notified'];
                $user['hash'] = $row['hash'];
                $user['verified'] = $row['verified'];
                $user['email'] = $row['email'];
                $user['role'] = $row['role'];
                if ($user['role'] == "")
                    $user['role'] = "User";
                
                
                $icon_loc = "images/roles/";
                
                switch($row['role'])
                {
                    case "Gamer":
                        $user['icon'] = $icon_loc . "gamer-100.png"; 
                        break;
                    case "YouTuber":
                        $user['icon'] = $icon_loc . "youtube-100.png"; 
                        break;
                    case "Animator / Modeler":
                        $user['icon'] = $icon_loc . "3d_modelling-100.png"; 
                        break;
                    case "Producer":
                        $user['icon'] = $icon_loc . "producer-100.png"; 
                        break;
                    case "Audio":
                        $user['icon'] = $icon_loc . "audio_engineer-100.png";
                        break;
                    case "Director / Manager":
                        $user['icon'] = $icon_loc . "director-100.png"; 
                        break;
                    case "Designer":
                        $user['icon'] = $icon_loc . "game_designer.png"; 
                        break;
                    case "Programmer":
                        $user['icon'] = $icon_loc . "programmer100.png"; 
                        break;
                    case "Artist":
                        $user['icon'] = $icon_loc . "game_artist-100.png"; 
                        break;
                    case "Marketing / PR":
                        $user['icon'] = $icon_loc . "marketing-100.png";
                        break;
                    case "QA Tester":
                        $user['icon'] = $icon_loc . "qa-100.png"; 
                        break;
                    case "Writer":
                        $user['icon'] = $icon_loc . "writer-100.png";
                        break;
                    default:
                        $user['icon'] = $icon_loc . "gamer-100.png"; 
                }
                
                
                
                
                
                
                
                
                
                
                if ($user['image'] == '')
                {
                    $user['image'] == 'default/default.jpg';
                }
                $user['bio'] = $row['bio'];
            }
            
    return $user;
}

function num_results($query) //return an int value of the num of rows in a returned query
{
    $dbs = db_connection();
    $sql = $dbs->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    $size = sizeof($data);
    return $size;
}

function db_connection()
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    try 
    {
        $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    return $dbs;
}

function get_user_by_email($email) //return a variable with most of the db info
{
    $id = $email;
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    
    $user;
    //add a new item to DB
        
            $query = "SELECT * FROM users WHERE lcase(email)=lcase('$id')";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
    if (sizeof($rows) > 0)
    {
            foreach($rows as $row)
            {
                $user['id'] = $row['id'];
                $user['company'] = $row['company'];
                $user['name'] = $row['first_name'] . " " . $row['last_name'];
                if ($row['account'] == 1)
                {
                    $user['name'] = $row['company'];
                }
                $user['account'] = $row['account'];
                $user['image'] = $row['picture'];
                $user['skillset'] = $row['skillset'];
                $user['headline'] = $row['skillset'];
                $user['notified'] = $row['notified'];
                $user['hash'] = $row['hash'];
                $user['verified'] = $row['verified'];
                $user['email'] = $row['email'];
                if ($user['image'] == '')
                {
                    $user['image'] == 'default/default.jpg';
                }
            }
    }
    if (sizeof($rows) == 0)
        $user = 0;
            
    return $user;
}

function get_job($id) //return a variable with the job array
{
 /*jobs
id, userid, title, description, location, remote, volunteer, compensation, permanent , start_day, start_month, start_year, zip, added*/
   
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    try 
    {
        $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    

        $jobid = $id; //job ID

        $query = "SELECT * FROM jobs WHERE id='$jobid' ORDER BY added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $jobs = $sql->fetchAll();
        $jobs = $jobs[0];
    return $jobs;
}

function print_job($job) //prints the job by id
{
    $id = $job['id'];
    
    $compensation = $job['compensation'];
    $title = $job['title'];
    $location= $job['location'];
    $remote= $job['remote'];
    $description= $job['description'];
    $description2 = $job['description2'];
    $start_day = $job['start_day'];
    $start_month= $job['start_month'];
    $start_year= $job['start_year'];
    $volunteer= $job['volunteer'];
    $permanent = $job['permanent'];
    $userid = $job['userid'];

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
    print "
    <hr>
    <div class='work-experience'>
        <h3>$title</h3>
        <h4>Location: $location</h4>
        <h5>$compensation</h5>
        <small><i class='fa fa-calendar'></i>Start Date: $start_month/$start_day/$start_year</small>
        <p>$description</p>
        <p>$description2</p>
        <p><a href='php_company.php?id=$userid'>Inquire Now</a></p>
    </div>
    ";
}

function get_user_by_job($id)
{
    
}

function get_account_type($id)
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    
    $user;
    //add a new item to DB
        
            $query = "SELECT * FROM users WHERE id='$id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                $account_type = $row['account'];
            }
            
    return $account_type;
}

function get_games($id)
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    
    $user;
    //add a new item to DB
    
        
            $query = "SELECT * FROM games WHERE userid='$id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $games = $sql->fetchAll();
            return $games;
}

function get_game($id) //return the db var for the game
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        
    
    $user;
    //add a new item to DB
    
        
            $query = "SELECT * FROM games WHERE id='$id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $games = $sql->fetchAll();
            return $games;
}

function get_games_links_by_array($id_list)
{
    //remove empty spaces
    $id_list = array_values(array_filter($id_list));
    
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

    try 
    {
        $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


    $i = 0;
    $game_links = array();
    for($i = 0; $i < sizeof($id_list); $i++)
    {
        $id = $id_list[$i];
        $query = "SELECT * FROM games WHERE id='$id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $games = $sql->fetchAll();
        foreach($games as $game)
        {
            $id = $game['id'];
            $title = $game['title'];
            $link = "<a  href='php_game.php?gameid=$id'>$title</a>";
            
            
            array_push($game_links, $link);
        }
    }
        return $game_links;
}



function get_games_links_with_id_by_array($id_list)
{
    //remove empty spaces
    $id_list = array_values(array_filter($id_list));
    
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

    try 
    {
        $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // set the PDO error mode to exception
        $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


    $i = 0;
    $game_links = array();
    for($i = 0; $i < sizeof($id_list); $i++)
    {
        $id = $id_list[$i];
        $query = "SELECT * FROM games WHERE id='$id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $games = $sql->fetchAll();
        foreach($games as $game)
        {
            $id = $game['id'];
            $title = $game['title'];
            $link = "<a href='php_game.php?gameid=$id' >$title</a>";
            $companyid = $game['userid'];
            
            
            $array = array();
            //game
            array_push($array, $id); //0
            array_push($array, $link); //1
            array_push($array, $title); //2
            array_push($array, $game['image']); //3
            array_push($array, $companyid); //4
            
            //company
            $company = get_user($companyid);
            array_push($array, $company['name']); //5 
            array_push($array, $company['image']); //6 
            
            
            array_push($game_links, $array);
        }
    }
        return $game_links;
}

function get_company_by_game($id)
{
        $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    
    $query = "SELECT * FROM games WHERE id='$id'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $games = $sql->fetchAll();
    foreach($games as $game)
    {
        $companyid = $game['userid'];
    }
    return $companyid;
}


function dashboard_links()
{
    $account_type = get_account_type($_SESSION['id']);
    $type="";
    $invites = "/   <a href='invites.php'>Invites</a>";
    if ($account_type == 1)
    {
        $type="company_"; 
        $invites = "";
    }
    print "<h5><a href='messages.php'>Messages</a> / <a href='notifications.php'>Notifications</a> / <a href='{$type}job_listings.php'>Manage My Jobs</a> / <a href='showed_interest.php'>Requests to Connect</a> $invites</h5>";
}

function validate_email($email)
{
        
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return 0; 
    }
    else
        return 1;
}

function validate_url($url)
{
    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            return 1;
        } else {
            return 0;
     }
}

function validate_current_year($year)
{
    if (ctype_digit($year))
    { 
        if(($year > 1900) && ($year < 2016))
        {}
        else
            return 0;
    }
    else
         return 0;
    return 1;
}
function validate_year($year)
{
    if (ctype_digit($year))
    { 
        if(($year > 1900))
        {}
        else
            return 0;
    }
    else
        return 0;
    return 1;
}

function validate_number($number)
{
    if (!ctype_digit($number))
        return 0;
    else
        return 1;
}

function validate_alphanumeric($string)
{
    return ctype_alnum ( $string ); 
}

function validate_alphanumeric_punct($string)
{
    if(preg_match("/[^a-zA-Z0-9\s\p{P}]/", $string)) {
       return 0;
    }
    return 1;
}

function validate_name($name)
{
    if (!preg_match('/^[a-z0-9\040\.\-]+$/i', $name)){
      return 0; 
    }
    else
        return 1;
    return 1;
}

function get_notifications($id)
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    
    $new = 0;

    //get number of unviewed interested_in
    $query = "SELECT * FROM show_interest WHERE viewed='0' AND toid='$id'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $results = $sql->fetchAll();
    $new += sizeof($results);
    //get number of unviewed invites
    $query = "SELECT * FROM company_worker_invites WHERE viewed='0' AND toid='$id'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $results = $sql->fetchAll();
    $new += sizeof($results);
    //add them up
    return $new;
}

function num_new_mail($id)
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    
    $new = 0;
    //get number of unread messages
    $query = "SELECT * FROM messages WHERE opened='0' AND toid='$id'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $results = $sql->fetchAll();
    $new += sizeof($results);
    
    return $new;
}

function mail_setting($id)
{
    $servername = "localhost";    $username = "cm3rt"; $password = "Laceration6?"; $db = "gamerstack";
    
    
    

        try 
        {
            $dbs = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $dbs->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    
    $new = 0;
    //get number of unread messages
    $query = "SELECT * FROM mail_settings WHERE userid='$id'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $results = $sql->fetchAll();
    $results = $results[0]['msg'];
    
    return $results;
}

function bug_report()
{
    print "
    <!-- start:contact -->
					        <li id='id-contact'>
					        	<div class='timeline-badge default'><i class='fa fa-envelope'></i></div>
					        	<h1 class='timeline-head'>BUGS</h1>
					        </li>
					        <li>
					          	<div class='timeline-badge primary'></div>
					          	<div class='timeline-panel'>
					          		<h1>Report Bugs</h1>
					          		<div class='hr-left'></div>
                                    
                                   
                                        
					          		<p id='message_return' style='clear:both;'>Please report bugs and suggestions here. We will personally respond via the email you've registered, as well as on your account. Thank you.</p>
					          		<form class='send_msg'>
					          			<div class='row'>
					          				
					          				<div class='col-md-12'>
					          					<div class='form-group'>
					          						<textarea class='form-control input-lg' name='message' rows='3' placeholder='Messages...'></textarea>
					          					</div>
					          				</div>
					          			</div>
					          			<div class='form-group'>
					          				<button class='btn btn-lg btn-primary btn-block' type='button' id='btn_msg'>SEND</button>
					          			</div>
					          		</form>
                                    
                                    
                                        
                                            
                                        
					          	</div>
					        </li>
					       
					        <!-- end:contact -->   ";
    
    
}

function bug_report_js()
{
 
     print "<script>
//for jobs
$(function() {
//twitter bootstrap script
	$('#btn_msg').click(function(){
        
		   	$.ajax({
    		   	type: 'POST',
			url: 'process_message.php?id=4',
			data: $('form.send_msg').serialize(),
        		success: function(msg){
                    
                        
 	          		  $('#message_return').html(msg);
                    $('#btn_worker').prop('disabled',true);
                      $('.send_msg').html('');
                    //clear form.
                   
 		        },
			error: function(){
				alert('failure');
				}
      			});
	});
});</script>";
}

function make_website($url)
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;

}

function make_embed_youtube($url){
    //https://youtu.be/tPFz04LSa2U
    if (str_replace("youtu.be", "", $url) != $url)
    {
    return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$url);
    }
    return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$url);

}

function make_thumbnail_youtube($videoURL){
     $videoURL = clean_youtube_link($videoURL);
    $urlArr = explode("/",$videoURL);
$urlArrNum = count($urlArr);

// Youtube video ID
$youtubeVideoId = $urlArr[$urlArrNum - 1];

// Generate youtube thumbnail url
$thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';

// Display thumbnail image
    $thumbURL = str_replace("watch?v=", "", $thumbURL);
return "$thumbURL";
}

function clean_youtube_link($youtube) {
    if (str_replace("youtu.be", "youtube.com/watch?v=", $youtube) != $youtube){
        $youtube = str_replace("youtub.be", "youtube.com/watch?v=", $youtube);
        return $youtube;

    }
       // https://youtu.be/tPFz04LSa2U
   // https://www.youtube.com/watch?v=tPFz04LSa2U&list=RDQMxTrgY-F_qD0
    return substr($youtube, 0, strpos($youtube, "list")-1);
  
}

?>