<?php 
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];

function getContent($sess_id) 
{
    
    include_once "functions.php";
    $dbs = db_connection();
        
    
    //if they set the job title
    if (isset($_GET['set_title'])) //url: "process_invite_workers.php?invited_user_id="+invited_user_id+"&job_title="+job_title+"&set_title=true",
    {
        $invited_user_id = $_POST['invited_user_id'];
        $job_title = addslashes(strip_tags($_POST['job_title']));
        //add title to the database and then send a list of games with the input boxes to edit data 
        $query = "UPDATE company_worker_invites SET job_title='$job_title' WHERE fromid='$sess_id' AND toid='$invited_user_id'";
//      $query = "UPDATE company_worker_invites SET job_title='$job_title' WHERE fromid='$sess_id' AND toid='$invited_user_id'  AND job_title='' ORDER BY id DESC LIMIT 1";

        $sql = $dbs->prepare($query);
        $sql->execute();
        
        
        
        include_once "functions.php";
        $user = get_user($invited_user_id);
        $name = $user['name'];

        //gets games by userid
        $games = get_games($sess_id);
        
        
        
        print "Which games is $name working on? (click all that apply)<br />";
        
        $i = 0;
        foreach($games as $game)
        {
            if (($i > 0) && ($i < (sizeof($games))))
                print " / ";
            $i++;
            $title = $game['title'];
            $id = $game['id'];
            print "<a href='#' id='$id' class='add_game'>$title</a>";
        } 
        print "<br /><a href='#' class='done' id='done'>(DONE)</a>";

    }
    if (isset($_POST['addgame'])) //url: "process_invite_workers.php?addgame="+game_id+"&userid=$_GET['id']
    {
        //added to game
        $game = addslashes(strip_tags($_POST['addgame']));
        $invited = addslashes(strip_tags($_POST['userid']));
        
        include_once "functions.php";
        $invited_user = get_user($invited);
        $username = $invited_user['name'];
        
        //1. update worker invite
        $query1 = "UPDATE company_worker_invites SET games=CONCAT(games, ',$game') WHERE fromid='$sess_id' AND toid='$invited'";
        $sql = $dbs->prepare($query1);
        $sql->execute();
        
        
        //2. now get the list of games already in the invite
        $query2 = "SELECT games FROM company_worker_invites WHERE fromid='$sess_id' AND toid='$invited'";
        $sql = $dbs->prepare($query2);
        $sql->execute();
        $game_list = $sql->fetchAll();
        foreach($game_list as $game_id)
        {
            //since theres only one this should suffice
            $gamelist = $game_id['games'];
        }
        $already_invited = explode(",", $gamelist); //separate into an array
        $already_invited = array_filter($already_invited); //clear blank spaces
        $already_invited = array_values($already_invited);
        
        //3. get list of games by company
        $game_ids = array();
        $games = get_games($sess_id);
        
        foreach ($games as $game)
        {
            array_push($game_ids, $game['id']);
        }
        
        
        /*4. now remove the games that have already been added in the profile
        //array array_diff ( array $array1 , array $array2 [, array $... ] )/*/
        $game_ids = array_diff($game_ids, $already_invited);
        $game_ids = array_values($game_ids);
        
        $i=0;
        if (sizeof($game_ids) > 0)
        {
            print "Which games is $username working on? (click all that apply)<br />";
             for ($i=0; $i<sizeof($game_ids);$i++)
                {
                    $game_id = $game_ids[$i]; //game id
                    $games = get_game($game_id);
                    $title = $games[0]['title'];


                    if (($i > 0) && ($i < (sizeof($game_ids))))
                        print " / ";
                    
                    print  "<a href='#' id='$game_id' class='add_game'>$title</a>";   
                }
                print "<br /><a href='#' class='done' id='done'>(DONE)</a>";
        }
        else
        {
            print "Requests Sent...";
        }
       

        
    }
    //add a new item to DB
    elseif (isset($_GET['id'])) //url: "process_invite_workers.php?id=$_GET['id']
    {
        $invite_id = $_GET['id']; //id of the person being invited
        
        $query2 = "SELECT * FROM company_workers WHERE companyid='$sess_id' AND userid='$invite_id'";
            $sql = $dbs->prepare($query2);
            $sql->execute();
            $rows2 = $sql->fetchAll();
        
        
        if ($invite_id != $sess_id)
        {
            $query = "SELECT * FROM company_worker_invites WHERE fromid='$sess_id' AND toid='$invite_id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            
            
            if ((sizeof($rows) <= 0))
            {
                if (sizeof($rows2) <= 0)
                {
                    $query = "INSERT INTO company_worker_invites (fromid, toid, games, job_title) VALUES ('$sess_id', '$invite_id', '0', 'Employee')";
                    $sql = $dbs->prepare($query);
                    $sql->execute();

                    include_once "functions.php";
                    $user = get_user($invite_id);
                    $name = $user['name'];


                    $games = get_games($sess_id);

                    //now add a What is the job title Input and Submit
                    print "What is $name's job title?";

                    //INSERT CODE WITH JOB TITLE NAME
                    print "
                    <form class='job_title'> 
                    <div class='col-md-8 '>

                            <input type='text' class='form-control input-lg' name='company_job_title' id='company_job_title$invite_id'> 
                    </div>


                    <div class='col-md-4'>  
                        <button type='button' class='btn btn-lg btn-primary btn-success btn-block submit_job_title' id='$invite_id'>Add</button>
                    </div>

                    </form>";

                }
                else
                {
                    print "Already Set Up...";
                }
                
                
                
            }
            else
            {
                print "Request Already Pending...";
            }
        }
        
        
    }
    else
    {
        
    }
    
    
}
    //get the data
    $data = getContent($sess_id);
    




    

?>

