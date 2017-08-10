<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];


    
    include_once "functions.php";
    $dbs = db_connection();
        
    
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