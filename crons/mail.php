<?php
include "../functions.php";
$dbs = db_connection();

//get all unread mail
$query = "SELECT * FROM messages WHERE opened='0'";
$sql = $dbs->prepare($query);
$sql->execute();
$unreadMail = $sql->fetchAll();

//get the list of all users with unread mail
$users = array();
foreach($unreadMail as $message)
{
    array_push($users, $message['toid']);
}
$users = array_unique($users); //non-repeat array of unopened message recipients
$users = array_values($users);



/*foreach ($all_users as $user)
{
 
    $sql = $dbs->prepare("INSERT INTO mail_settings (userid) VALUES('{$user['id']}')");
    $sql->execute();
}
*/

//check if each user should get a notice (2 or 3)
$mail_sent = 0;
for ($i = 0; $i < sizeof($users); $i++)
{
    
    
    $query = "SELECT * FROM mail_settings WHERE userid='{$users[$i]}'";
    $sql = $dbs->prepare($query);
    $sql->execute();
    $user_list = $sql->fetchAll();
    $user = get_user($users[$i]);
    $email = $user['email'];

    $to = $email;
    $subject = "New Messages on GamerStack!";

    $headers = "From: Joe@gamerstack.io\r\n";
    $headers .= "Reply-To: Joe@gamerstack.io\r\n";
    $headers .= "BCC: Joe@gamerstack.io\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    include_once "../email/messages/message_user.php";

    ob_start();
    send_mail();
    $msg = ob_get_clean();

    //if they are due, send it today.
    if ($user_list[0]['msg'] == 2){
        $last_sent = strtotime($user_list[0]['msg'] . " + 1 day");
        $now = strtotime(date("Y-m-d H:i:s"));

        if ($now > $last_sent){
            
            
            mail($to, $subject, $msg, $headers);
            
            //now update to be current timestamp
            
            $query = "UPDATE mail_settings SET last_msg = CURRENT_TIMESTAMP WHERE userid='{$users[$i]}'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $mail_sent++;
        }
        
    }
    elseif($user_list[0]['msg'] == 3){
        $last_sent = strtotime($user_list[0]['msg'] . " + 7 days");
        $now = strtotime(date("Y-m-d H:i:s"));

        if ($now > $last_sent){
            
            
            mail($to, $subject, $msg, $headers);
            
            //now update to be current timestamp
            
            $query = "UPDATE mail_settings SET last_msg = CURRENT_TIMESTAMP WHERE userid='{$users[$i]}'";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $mail_sent++;
        }
        print $mail_sent . " is the number of messages sent";
        
    
    }
}



?>