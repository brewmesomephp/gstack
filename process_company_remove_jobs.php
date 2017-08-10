<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];


    
    include_once "functions.php";
    $dbs = db_connection();
        
    
    if (isset($_GET['removejob'])) 
    {
        if ($_GET['id'] != -1)
        {
            $user_id = $_GET['id'];
            $query = "DELETE FROM company_workers WHERE userid='$user_id' AND companyid='$sess_id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            print "REMOVED";
        }
    }
    
    
    

    
    
    /*
    if (isset($_GET['removegame']))
    select all records from company_workers where userid=$sess_id
    foreach -> explode record of games. find ID in exploded record -> if it's a match, delete from record -> replace record
    */
    if (isset($_GET['removegame'])) 
    {
        //print "GOT HERE";
        if ($_GET['id'] != -1)
        {
            $split = explode("-", $_GET['id']);
            $game = $split[0];
            $user = $split[1];
            
            include_once "functions.php";
            $companyid = get_company_by_game($game);
            
            //this will find your record of having this job
            $query = "SELECT * FROM company_workers WHERE userid='$user' AND companyid='$sess_id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $jobs = $sql->fetchAll();
            foreach($jobs as $job)
            {
                $jobid = $job['id'];
                $games = $job['games'];

            }
            
            $str_to_find = ",$game";
            
            $games = str_replace($str_to_find, "", $games);
            //update record
            $query = "UPDATE company_workers SET games='$games' WHERE id='$jobid'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            print "REMOVED";
        }
    }
    
    
    
    
    
    
       
    


    

?>

