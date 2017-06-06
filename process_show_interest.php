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
    if (isset($_GET['id'])) 
    {
        $to_id = $_GET['id'];
        if ($to_id != $sess_id)
        {
            $query = "SELECT * FROM show_interest WHERE fromid='$sess_id' AND toid='$to_id'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $rows = $sql->fetchAll();
            if (sizeof($rows) <= 0)
            {
                $query = "INSERT INTO show_interest (fromid, toid) VALUES ('$sess_id', '$to_id')";
                $sql = $dbs->prepare($query);
                $sql->execute();
                print "You have shown interest.";
            }
            else
            {
                print "You have requested to connect...";
            }
        }
        
        
    }
    
    
}
    //get the data
    $data = getContent($sess_id);
    




    

?>

