<?php

session_start();
include_once "functions.php";
$userid = $_SESSION['id'];

//echo json_encode(($_POST));
//print_r($_POST);

//auto update DB with UPDATE email_settings SET {POST_KEY} = {{VAL}} WHERE userid=$_SESSION['id'];
$dbs = db_connection();
$test = "SELECT * FROM mail_settings WHERE userid='$userid'";
$sql = $dbs->prepare($test);
$sql->execute();
$fetch = $sql->fetchAll();
if (sizeof($fetch) < 1)
{
    $q = "INSERT INTO mail_settings (userid) VALUES('$userid')";
    $sql = $dbs->prepare($q);
    $sql->execute();
}
foreach ($_POST as $key => $entry)
{
     print $key . " updated";
    $query = "UPDATE mail_settings SET $key = '$entry' WHERE userid='$userid'";
    
}
$sql = $dbs->prepare($query);
$sql->execute();


    

?>