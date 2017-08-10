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
            $company_id = $_GET['id'];
            $query = "DELETE FROM company_workers WHERE userid='$sess_id' AND companyid='$company_id'";
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
            $game_id = $_GET['id'];
            include_once "functions.php";
            $companyid = get_company_by_game($game_id);
            
            //this will find your record of having this job
            $query = "SELECT * FROM company_workers WHERE userid='$sess_id' AND companyid='$companyid'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $jobs = $sql->fetchAll();
            foreach($jobs as $job)
            {
                $jobid = $job['id'];
                $games = $job['games'];
                print "GAMES 1: $games\n";

            }
            
            $str_to_find = ",$game_id";
            print "str_to_find: $str_to_find\n";
            
            $games = str_replace($str_to_find, "", $games);
            print "GAMES 2: $games\n";
            //update record
            $query = "UPDATE company_workers SET games='$games' WHERE id='$jobid'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            
        }
    }
    
    
    
    
    
    
       
    


    

?>

