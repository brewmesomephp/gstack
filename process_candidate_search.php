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
        
    
    
    $q = "";
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
                $q = "AND id IN (" . run_zip_query($zip, $miles, $dbs, "users") . ")";
                
            }
        }

            

        $query = "INSERT INTO search  (query, userid, added) VALUES ('$search', '$sess_id', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
    }
    if (isset($_POST['zip']))
        {
            $zip = addslashes(strip_tags($_POST['zip']));
        }
        else
        $zip = "";
    
     if (isset($search) && $search != '')
     {
         
         if(strlen($search) < 4)
        {
            $query = "SELECT * FROM users WHERE (first_name LIKE '%$search%' or last_name LIKE '%$search%' or skillset LIKE '%search%' or bio LIKE '%$search%' or totalskills LIKE '%$search%' or role LIKE '%$search%' or zip LIKE '%$search%') $q $b";
        }
         else
        $query = "SELECT *
                    FROM users
                    WHERE MATCH(email, first_name, last_name, skillset, bio, totalskills, role, zip) AGAINST('$search*' IN BOOLEAN MODE) $q AND account='0';";
     }
    else if($zip != '')
    {
        $query = "SELECT * FROM users WHERE account='0' $q";
    }
    else
    {
        $query = "SELECT * FROM users WHERE 1=2";
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
        <h1>Candidate Search</h1>
        <h3>Searches in Skills, Job Title, Bio, Name</h3>
        ";
    foreach($data as $row) 
    {

        $i++;
        $id = $row['id'];
        $image = $row['picture'];
        $bio = $row['bio'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $skillset = $row['skillset'];
        if ($image == '')
            $image = "upload/default/default.jpg";
        else
            $image = "upload/".$image;

        $first_name =strtoupper($first_name);
        $last_name = strtoupper($last_name);
        

        print "<div class='user'>
                            <div class='text-center'>
                                <img src='$image' class='img-circle sq200'>
                            </div>
                            <div class='user-head text-center' >
                                <h1><a href='php_profile.php?id=$id'>$first_name $last_name</a></h1>
                                <div class='hr-center'></div>
                                <h4>$skillset</h4>
                                
                            </div>
                            
                            $bio
                            <div class='hr-left'></div>";
  
    }
if (sizeof($data) <= 0)
{
    print "No results.";
}




    

?>

