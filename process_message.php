<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];



function getContent($sess_id) 
{
    
}
       
print "
        <h1>Messages</h1>";
        include_once "functions.php"; dashboard_links(); 
    print "<div class='hr-left'></div>";
 if (isset($_POST['message'])) 
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
        
    
    
        
        
        $message= strip_tags($_POST['message']);
        $message = addslashes($message);
        $fromid = $_SESSION['id'];
        $toid = $_GET['id'];
        
        
        
        $query = "INSERT INTO messages (fromid, toid, message, added) VALUES ('$fromid', '$toid', '$message', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
     
        
        include_once "functions.php";
        //check and send the email to the user
        if (mail_setting($toid) == 1)
        {
            $user = get_user($toid);
            $email = $user['email'];

            $to = $email;
            $subject = "New Messages on GamerStack!";

            $headers = "From: Joe@gamerstack.io\r\n";
            $headers .= "Reply-To: Joe@gamerstack.io\r\n";
            $headers .= "BCC: Joe@gamerstack.io\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            include_once "email/messages/message_user.php";
        
            ob_start();
            send_mail();
            $msg = ob_get_clean();
            mail($to, $subject, $msg, $headers);
        }
     
     print "Message Sent";
    }



if (isset($_POST['to']))
{
    $contact_id = $_POST['to'];
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
    
    if (isset($_POST['msg']))
    {
        $message= strip_tags($_POST['msg']);
        $message = addslashes($message);
        
        $fromid = $_SESSION['id'];
        $toid = $_POST['to'];
        $query = "INSERT INTO messages (fromid, toid, message, added) VALUES ('$fromid', '$toid', '$message', CURRENT_TIMESTAMP)";
        $sql = $dbs->prepare($query);
        $sql->execute();
        include_once "functions.php";
        //check and send the email to the user
        if (mail_setting($toid) == 1)
        {
            $user = get_user($toid);
            $email = $user['email'];

            $to = $email;
            $subject = "New Messages on GamerStack!";

            $headers = "From: Joe@gamerstack.io\r\n";
            $headers .= "Reply-To: Joe@gamerstack.io\r\n";
            $headers .= "BCC: Joe@gamerstack.io\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            include_once "email/messages/message_user.php";
        
            ob_start();
            send_mail();
            $msg = ob_get_clean();
            mail($to, $subject, $msg, $headers);
        }
        
    }
    
        $query = "SELECT * FROM messages WHERE (toid='$sess_id' OR fromid='$sess_id') AND (toid='$contact_id' OR fromid='$contact_id') ORDER BY opened ASC, added DESC LIMIT 15";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $contacts = $sql->fetchAll();
        $contacts = array_reverse($contacts);
    
        foreach($contacts as $contact)
        {
            $from_id = $contact['fromid'];
            $q = "SELECT * FROM users WHERE id='$from_id'";
            $sql = $dbs->prepare($q);
            $sql->execute();
            $row = $sql->fetchAll();
            foreach($row as $user)
            {
                if ($contact['toid'] == $sess_id)
                {
                    //
                    $q = "UPDATE messages SET opened='1' WHERE fromid='{$contact['fromid']}' AND toid='$sess_id'";
                    $sql = $dbs->prepare($q);
                    $sql->execute();
                    
                    //
                }
                if ($user['account'] == '1')
                {
                     $name = $user['company'];
                }
                else
                {
                    $name = $user['first_name'] . " " . $user['last_name'];
                }
                print $name . ": " . stripslashes($contact['message']) . "<br />"; 
                
            }
            
            if ($contact['fromid'] != $_SESSION['id'])
            {
                $to = $contact['fromid'];
            }
            else
                $to = $contact['toid'];
            
            
        }
        print "
                    <div class='row'>

                        <div class='col-md-10'>
                            <div class='form-group'>
                                <textarea class='form-control input-lg' name='message' rows='1' id='message' placeholder='Message...'></textarea>
                                <input type='hidden' value='$to' id='sendto' name='sendto'>
                            </div>
                        </div>
                        <div class='form-group col-md-2'>
                        <button class='btn btn-lg btn-primary btn-block btn_msg' type='button' id='$to'>SEND</button>
                    </div>
                    </div>
                    ";
    
    
        $query = "SELECT * FROM messages WHERE toid='$sess_id' OR fromid='$sess_id' ORDER BY opened ASC, added DESC";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $people = $sql->fetchAll();
        $i=0;
    //show the data
    
        
    $contact=NULL;
    foreach($people as $row) 
    {
        
        $id = $row['id'];
        $fromid = $row['fromid'];
        $toid=$row['toid'];
        
        
        
        $add_from = true;
        $add_to = true;
        for ($a = 0; $a < sizeof($contact); $a++)
        {
            
            if ($contact[$a] != $fromid)
            {
                $add_from = false;
            }
            if ($contact[$a] == $toid)
            {
                $add_to = false;
            }
            
            
        }
        if ($add_from == true)
        {
            if ($fromid != $_SESSION['id'])
                $contact[sizeof($contact)] = $fromid;
        }
        if ($add_to == true)
        {
            if ($toid != $_SESSION['id'])
                $contact[sizeof($contact)] = $toid;
        }
            
        $subject = $row['subject'];
        $message= $row['message'];
        $added = $row['added'];
        
        /*print "
        <div class='hr-left'></div>
            <div class='work-experience'>
                <h3>$subject(<a class='remove' id='$id' href='#'>X</a>)</h3>
                <small><i class='fa fa-calendar'></i> $added</small>
            </div>";*/
  
    }
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
    $contact = array_unique($contact);
    $contact = array_values($contact);
    if (sizeof($contact) > 0)
        for ($x = 0; $x <= (sizeof($contact)-1); $x++)
        {
            $contact_id = $contact[$x];
            $unread = "SELECT * FROM messages WHERE fromid='{$contact[$x]}' AND toid='$sess_id' AND opened='0'";
            $sql = $dbs->prepare($unread);
            $sql->execute();
            $row = $sql->fetchAll();
            if (sizeof($row) > 0)
                $unread=true;
            else
                $unread=false;
            
        
        
            $q = "SELECT * FROM users WHERE id='$contact_id'";
            $sql = $dbs->prepare($q);
            $sql->execute();
            $row = $sql->fetchAll();
            foreach($row as $user)
            {
                $contact_id = $contact[$x];
            $unread = "SELECT * FROM messages WHERE fromid='{$contact[$x]}' AND toid='$sess_id' AND opened='0'";
            $sql = $dbs->prepare($unread);
            $sql->execute();
            $row = $sql->fetchAll();
            if (sizeof($row) > 0)
                $unread=true;
            else
                $unread=false;
            
        
        
            $q = "SELECT * FROM users WHERE id='$contact_id'";
            $sql = $dbs->prepare($q);
            $sql->execute();
            $row = $sql->fetchAll();
                foreach($row as $user)
                {
                    if ($user['account'] == '1')
                    {
                         $name = $user['company'];
                    }
                    else
                    {
                        $name = $user['first_name'] . " " . $user['last_name'];
                    }
                    if ($unread == true)
                    {
                        print "<b><a href='messages.php?id={$contact[$x]}'>" . $name . "</a> UNREAD </b> <br />";
                    }
                    else
                        print "<a href='messages.php?id={$contact[$x]}'>" . $name . "</a> <br />";
                }
            }
        }
}





    

?>

