<?php
session_start();
if (isset($_SESSION['id']))
{
    $query = "SELECT * FROM messages WHERE toid='{$_SESSION['id']}' AND opened='0' AND appid='0' ORDER BY added ASC";
    include_once "functions.php";
    $dbs = db_connection();
    
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        $size_row = sizeof($row);
    
        if ($size_row == 0)
        {
            $last_message = 0;
            $query = "UPDATE users SET notified = CURRENT_TIMESTAMP WHERE id='{$_SESSION['id']}'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $size = 0;
            $notify = "false";
            
        }
         else
         {
            foreach ($row as $rows)
                $last_message = $rows['added'];
             
            include_once "functions.php";
            $user = get_user($_SESSION['id']);
    
            $notified = $user['notified'];
             
            if ($notified < $last_message)
            {
                $notify = "true";
                $query = "UPDATE users SET notified = CURRENT_TIMESTAMP WHERE id='{$_SESSION['id']}'";
                $sql = $dbs->prepare($query);
        $sql->execute();
            }
             else
                 $notify = "false";

         }
        //see when the last time a message was added
   
    
    
        
    
        //get how many unopened message
        $size = sizeof($row);
    
        //check when the last time they got a notification
        
        //if the last time they got a notification was before their last message then notify them
        //but only if they actually have unopened messages
        
    
        
        print $size . $notify;
}
?>