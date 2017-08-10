<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$gameid=$_GET['gameid'];
$sess_id = $_SESSION['id'];



function getContent($sess_id) 
{
    
   include_once "functions.php";
    $dbs = db_connection();
        
    
    $gameid=$_GET['gameid'];
    //add a new item to DB
    if (isset($_POST['title'])) 
    {
        //
        print "<br />";
        
        
        
        $title= addslashes(strip_tags($_POST['title']));
        $description= addslashes(strip_tags($_POST['description']));
        
        

        $query = "INSERT INTO game_updates  (title, gameid, userid, description, added_on) VALUES ('$title', '$gameid', '$sess_id', '$description', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM game_updates WHERE id=$id and gameid='$gameid' and userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    $gameid=$_GET['gameid'];
    
        $query = "SELECT * FROM game_updates WHERE userid='$sess_id' AND gameid='$gameid' ORDER BY added_on DESC LIMIT 10";
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
        <h1>Add Updates</h1>
        ";
    foreach($data as $row) 
    {
        $id = $row['id'];
        $title = $row['title'];
        $description= $row['description'];
        $added = $row['added_on'];
        


        
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title(<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $added</small>
                <p>$description</p>
            </div>";
  
    }




    

?>

