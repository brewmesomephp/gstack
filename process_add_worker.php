<?php

session_start();
$sess_id = $_SESSION['id'];

include_once "functions.php";
$dbs = db_connection();

if (isset($_GET['add_game'])){
    print_r($_POST);
}

?>