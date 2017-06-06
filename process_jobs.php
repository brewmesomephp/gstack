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
        
        $query = "SELECT * FROM users WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        foreach ($row as $user)
        {
            $zip = $user['zip'];
        }
    
     $query1 = "UPDATE jobs SET zip='$zip' WHERE userid='$sess_id'";
        $sql = $dbs->prepare($query1);
        $sql->execute();
    
    include_once "functions.php";
    
    //add a new item to DB
    if (isset($_POST['compensation'])) 
    {
        //
        print "<br />";
        
        $company = get_user($sess_id);
        $company_name = $company['name'];
        
        $title = addslashes(strip_tags($_POST['title']));
        $location= addslashes(strip_tags($_POST['location']));
        $remote= addslashes(strip_tags($_POST['remote']));
        $compensation = addslashes(strip_tags($_POST['compensation']));
        $description= addslashes(strip_tags($_POST['description']));
        $description2= addslashes(strip_tags($_POST['description2']));
        $start_day = addslashes(strip_tags($_POST['start_day']));
        $start_month= addslashes(strip_tags($_POST['start_month']));
        $start_year= addslashes(strip_tags($_POST['start_year']));
        $volunteer= addslashes(strip_tags($_POST['volunteer']));
        if (isset($_POST['permanent']))
            $permanent= addslashes(strip_tags($_POST['permanent']));
        else
            $permanent='';
        
        if ($volunteer == 'on')
            $volunteer = 1;
        else
            $volunteer = 0;
        
        if ($remote == 'on')
            $remote = 1;
        else
            $remote = 0;
        
    
        $query = "INSERT INTO jobs VALUES ('', '$sess_id', '$title', '$description', '$description2', '$location', '$remote', '$volunteer', '$compensation', '$permanent', '$start_day', '$start_month', '$start_year', '$zip', '$company_name',  CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    
    //remove an item from DB
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        //
        $query = "DELETE FROM jobs WHERE id=$id AND userid='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        print "<br />";
    }
    
    
    
    
    
        $query = "SELECT * FROM jobs WHERE userid='$sess_id' ORDER BY added DESC";
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
        <h1>Add Jobs</h1>
        ";
    foreach($data as $row) 
    {
        $id = $row['id'];
        $compensation = $row['compensation'];
        $title = $row['title'];
        $location= $row['location'];
        $remote= $row['remote'];
        $description= $row['description'];
        $description2= $row['description2'];
        $start_day = $row['start_day'];
        $start_month= $row['start_month'];
        $start_year= $row['start_year'];
        $volunteer= $row['volunteer'];
        $permanent = $row['permanent'];
        
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
        
        //print "$compensation, $title, $location, $remote, $description, $start_month, $start_year, $end_month, $end_year, $volunteer";
        /*print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$title: $compensation (<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $start_month/$start_year - $volunteer, $location $remote</small>
                <p>$description</p>
            </div>";*/
        print "
        <hr>
        <div class='work-experience'>
            <h3>$title (<a class='remove' id='$id' href='#'>X</a>)</h3>
            <h4>Location: $location</h4>
            <h5>$compensation</h5>
            <small><i class='fa fa-calendar'></i>Start Date: $start_month/$start_day/$start_year</small>
            <p>$description</p>
            <p>$description2</p>
        </div>
        ";
        
        
        
        
  
    }




    

?>

