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
        
        
        $occupation = addslashes(strip_tags($_POST['occupation']));
        $issuer = addslashes(strip_tags($_POST['issuer']));
        
        $title= addslashes(strip_tags($_POST['title']));
        $description= addslashes(strip_tags($_POST['description']));
        $month= addslashes(strip_tags($_POST['month']));
        $year= addslashes(strip_tags($_POST['year']));
            include_once "functions.php";
            
        
        

        $query = "INSERT INTO awards VALUES ('', '$sess_id', '$title', '$occupation', '$issuer', '$month', '$year', '$description')";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM awards WHERE id=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM awards WHERE userid='$sess_id' ORDER BY year DESC,month DESC";
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
        <h1>Add Awards</h1>
        ";
    foreach($data as $row) 
    {
        $id = $row['id'];
        $issuer = $row['issuer'];
        $occupation = $row['occupation'];
        $title = $row['title'];
        $description= $row['description'];
        $month= $row['month'];
        $year= $row['year'];
        $issuer = "Issued by: $issuer";
        $occupation = "Occupation: $occupation";
        


        
        print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h2>$title(<a class='remove' id='$id' href='#'>X</a>)</h2>
                <h3>$occupation</h3>
                <h4>$issuer</h4>
                <small><i class='fa fa-calendar'></i> $month/$year</small>
                <p>$description</p>
            </div>";
  
    }




    

?>

