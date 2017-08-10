<?php
if(session_id() == ''){session_start();}
if (!isset($_SESSION['id']))
    {
        print "";
    }
else
    {
$sess_id = $_SESSION['id'];

include_once "functions.php";
    $dbs = db_connection();
        
        
$query = "SELECT * FROM users WHERE id='$sess_id'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        
//start the Unordered List (Thumbnails)
    foreach($row as $row) 
    {        
        $userid = $row['id'];
        $account = $row['account'];
    }
        
        
        
}
?>