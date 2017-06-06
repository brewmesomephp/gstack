<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];


    
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
        
    
    include_once "functions.php";
    
    //add a new item to DB
    if (isset($_POST['title'])) 
    {
        $company = get_user($sess_id);
        $company_name = $company['name'];
        //
        $title = strip_tags($_POST['title']);
        $genre = strip_tags($_POST['genre']);
        $title = addslashes($title);
        $genre = addslashes($genre);
        $query = "INSERT INTO games (userid, title, genre, company_name, added) VALUES ('$sess_id', '$title', '$genre', '$company_name', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
                    $sql->execute();
        return 1;
        
        
}

    //get the data
    $data = getContent();
    print $data;



    

?>