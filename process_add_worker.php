<?php

session_start();
$sess_id = $_SESSION['id'];

include_once "functions.php";
$dbs = db_connection();

if (isset($_GET['add_game'])){
    $_JSON = $_POST;
    $invite = array_to_object($_JSON);
//    print_r($_POST);
    $q = "INSERT INTO `company_worker_invites`
    (`fromid`, `toid`, `added`, `games`, `job_title`)
    VALUES ('$invite->companyid', '$invite->userid', 'CURRENT_TIMESTAMP', '$invite->game_id', '$invite->jobtitle');";
    
    
    $sql = $dbs->prepare($q);
    $sql->execute();
    
    print "Invitation Sent to User";
}

?>