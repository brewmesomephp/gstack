<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];



function getContent($sess_id) 
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
        
    
    
    //add a new item to DB
    if (isset($_POST['title'])) 
    {
        //
        print "<br />";
        
        
        
        $title= addslashes(strip_tags($_POST['title']));
        $description= addslashes(strip_tags($_POST['description']));
        $month= addslashes(strip_tags($_POST['month']));
        $year= addslashes(strip_tags($_POST['year']));
        
        
        

        $query = "INSERT INTO company_achievements  (title, userid, month, year, description, added_on) VALUES ('$title', '$sess_id', '$month', '$year', '$description', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM company_achievements WHERE id=$id and userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM company_achievements WHERE userid='$sess_id' ORDER BY year DESC,month DESC";
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
        <h1>Add Achievements</h1>
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
                <h3>$title(<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }




    

?>

