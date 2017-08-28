<?php
session_start();
$sess_id = $_SESSION['id'];

include_once "functions.php";
$dbs = db_connection();

//if they are adding a title
if (isset($_GET['add']))
{
    $add = $_GET['add'];
    $title = $_GET['title'];
    $insert = "UPDATE company_workers SET title='$title' WHERE id='$add'";
    $sql = $dbs->prepare($insert);
    $sql->execute();
    print "Added Job Title: $title <br />";
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $query = "SELECT * FROM company_worker_invites WHERE id='$id'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $rows = $sql->fetchAll();
    foreach($rows as $row)
    {
        $fromid =$row['fromid'];
    }
}

if (isset($_GET['remove']))
{
    $remove = $_GET['remove'];
    $id = $_GET['remove_id'];
    //delete from pending
    $q3 = "DELETE FROM company_workers WHERE id='$id'";
    $sql = $dbs->prepare($q3);
    $sql->execute();
    print "Successfully removed Job Position";
}

if (isset($_GET['gameid'])){
}

if (isset($_POST['edit']))
{
    $edit = $_POST['edit'];
    $title  = addslashes(strip_tags($_POST['title']));
    
     
    $insert = "UPDATE company_workers SET title='$title' WHERE id='$edit'";
    $sql = $dbs->prepare($insert);
    $sql->execute();
    
    
    
    

    
    
    $query = "SELECT * FROM company_workers WHERE userid='$sess_id' ORDER BY addedon DESC";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                
                $companyid = $row['companyid'];
                $jobid = $row['id'];
                $title = $row['title'];
                $company = get_user($companyid);
                

                
                
                print "<div class='row'><div class='col-md-2' id='company_link'><a href='php_company.php?id=$companyid'>".$company['company'] . 
                    "</a> </div>";
                
                
            }

    
    
    
    //loop that prints all edits
    
}

if (isset($_GET['accept']))   
{
    if ($_GET['accept'] == "true")
    {
        
        $query = "SELECT * FROM company_worker_invites WHERE toid='$sess_id' AND fromid = '$fromid'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $rows = $sql->fetchAll();
        foreach($rows as $row)
        {
            $title = $row['job_title'];
            $games = $row['games'];
        }
        
        //check if there already exists this person working for this game. and if so, replace the title
        $check_game = "SELECT * FROM company_workers WHERE userid='$sess_id' AND companyid='$fromid' AND games='$games'";
        $sql = $dbs->prepare($check_game);
        $sql->execute();
        $existing_position = $sql->fetchAll();
        if (sizeof($existing_position)){
            $update_job_title = "UPDATE company_workers SET title='$title' WHERE userid='$sess_id' AND companyid='$fromid' AND games='$games'";
            print "<h1>$update_job_title</h1>";
            $sql = $dbs->prepare($update_job_title);
            $sql->execute();
            print "This person already works for this game...";
        }
        else{
            print "This person does not already work for this game apparently";
        //make a permanent worker
        $q2 = "INSERT INTO company_workers (userid, companyid, title, games) VALUES ('$sess_id', '$fromid', '$title', '$games')";
        $sql = $dbs->prepare($q2);
        $sql->execute();
        
        }
        

        //get the id from here so that we can send it back in the Job Title Form
        $q4 = "SELECT * FROM company_workers WHERE userid='$sess_id' AND companyid = '$fromid'";
            $sql = $dbs->prepare($q4);
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row)
            {
                $row_id = $row['id'];
            }

        $id = $_GET['id'];

        





        print "Accepted.";
    }
    else
        print "Not Accepted.";

//delete from pending
$q3 = "DELETE FROM company_worker_invites WHERE id='$id'";
$sql = $dbs->prepare($q3);
$sql->execute();
}

?>