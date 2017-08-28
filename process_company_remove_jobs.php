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
            $id = $_GET['id'];
            include_once "functions.php";
            
            //this will find your record of having this job
            $query = "DELETE FROM company_workers WHERE id='$id';";
            $sql = $dbs->prepare($query);
            $sql->execute();
            
            print "REMOVED";
        }
    }
    
    
    
    
    
    
       
    


    

?>

