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
        
    
    
    //add a new item to DB
    if (isset($_POST['title'])) 
    {
        //
        print "<br />";
        
        
        
        $title= addslashes(strip_tags($_POST['title']));
        $description= addslashes(strip_tags($_POST['description']));
        $month= addslashes(strip_tags($_POST['month']));
        $year= addslashes(strip_tags($_POST['year']));
        
        
        $query = "INSERT INTO organizations VALUES ('', '$sess_id', '$title', '$month', '$year', '$description')";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM organizations WHERE id=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM organizations WHERE userid='$sess_id' ORDER BY year DESC,month DESC";
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
        <h1>Add Organization</h1>
        <h3>What Organizations Are You a Part of?</h3>
        ";
    foreach($data as $row) 
    {
        $id = $row['id'];
        $title = $row['title'];
        $description= $row['description'];
        $month= $row['month'];
        $year= $row['year'];
        


        
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h2>$title(<a class='remove' id='$id' href='#'>&#10005;</a>)</h2>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }




    

?>

