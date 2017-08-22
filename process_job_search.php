<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "you need to log in or nothing will work.";
    }
$sess_id = $_SESSION['id'];



function getContent($sess_id) 
{
    
$zip = "";
    $q="";
    $b="";
        include_once "functions.php";
    $dbs = db_connection();
        
    
    $q="";
    //add a new item to DB
    if (isset($_POST['search'])) 
    {
        //
        print "<br />";
        
        
        $search= addslashes(strip_tags($_POST['search']));
        
        
        
        if (isset($_POST['zip']))
        {
            if ($_POST['zip'] != '')
            {
                $zip = addslashes(strip_tags($_POST['zip']));
                $miles = $_POST['miles'];
                include "zip.php";
                $q = "AND id IN (" . run_zip_query($zip, $miles, $dbs, "jobs") . ")";
                
                
            }
        }
        
        if (isset($_POST['zip']))
        {
            $zip = addslashes(strip_tags($_POST['zip']));
        }
        else
        {
            $zip = "";
        }
            
        //add more browsing functions inc permanent, remote, and volunteer
        $b = "";
        if ($_POST['volunteer'] == 2)
        {
        }
        else if ($_POST['volunteer'] == 1)
        {
            $b = $b . " AND volunteer='0'";
        }
        else if ($_POST['volunteer'] == 0)
        {
            $b = $b . " AND volunteer='1'";
        }
        if ($_POST['remote'] == 2)
        {
            
        }
        else if ($_POST['remote'] == 1)
        {
            $b = $b . " AND remote='1'";
        }
        else if ($_POST['remote'] == 0)
        {
            $b = $b . " AND remote='0'";
        }
        if ($_POST['permanent'] == 2)
        {
            
        }
        else if ($_POST['permanent'] == 1)
        {
            $b = $b . " AND permanent=''";
        }
        else if ($_POST['permanent'] == 0)
        {
            $b = $b . " AND volunteer!=''";
        }
        

        $query = "INSERT INTO search  (query, userid, added) VALUES ('$search', '$sess_id', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
     if (isset($search) && $search !='')
     {
        if(strlen($search) < 4)
        {
            $query = "SELECT * FROM jobs WHERE (title LIKE '%$search%' or description LIKE '%$search%') $q $b";
            
        }
         else
        $query = "SELECT *
                    FROM jobs
                    WHERE MATCH(title, description, zip) AGAINST('$search*' IN BOOLEAN MODE)  $q $b;";
         
     }
    else if($zip != '')
    {
        $query = "SELECT * FROM jobs WHERE 1=1 $q $b";
    }
    else if ($zip == '' && $b != "")
    {
        $query = "SELECT * FROM jobs WHERE 1=1 $b";
    }
    else
    {
        $query = "SELECT * FROM jobs WHERE 1=2";
    }
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        return $row;
}
    //get the data
    $data = getContent($sess_id);
    $i=0;
    //show the data
    
        print "
        <h1>Jobs</h1>
        <h3>Search Job Title, Requirements, Skills Needed</h3>
        ";
    foreach($data as $row) 
    {
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
        if ($remote == 1)
        {
            $location = "Remote";
        }
        if ($permanent == 1)
        {
           $permanent = "Permanent Position"; 
        }
        else
        {
            $permanent = "Temporary Position";
        }
        
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



if (sizeof($data) <= 0)
{
    print "No results.";
}
    

?>

