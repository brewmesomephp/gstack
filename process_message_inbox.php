<?php
session_start();
if (!isset($_SESSION['id']))
    {
        print "";
    }
$sess_id = $_SESSION['id'];


function getContent($sess_id, $display_contacts=1) 
{
    if ((!isset($_GET['display_header'])) || $_GET['display_header'] == 1){
    print "
        <h1>Messages</h1>";
        include_once "functions.php"; dashboard_links(); 
    print "<div class='hr-left'></div>";
    }
    include_once "functions.php";
    $dbs = db_connection();
        
    
    if (isset($_GET['id'])) 
    {
        if ($_GET['id'] != -1)
        {
            $additional_query = "";
            //the following is for job applications. the additional query will poll the DB for if and only if the messages are labeled within the job application title.
            if (isset($_GET['app']))
            {
                $app = $_GET['app'];
                $additional_query = " AND jobid='$app' ";
                print "getting where jobid = $app";
                    
            }
            $contact_id = $_GET['id'];
            $query = "SELECT * FROM messages WHERE (toid='$sess_id' OR fromid='$sess_id') AND (toid='$contact_id' OR fromid='$contact_id') $additional_query ORDER BY opened ASC, added DESC ";
            $sql = $dbs->prepare($query);
            $sql->execute();
            $contacts = $sql->fetchAll();
            $contacts = array_reverse($contacts);
            foreach($contacts as $contact)
            {
                $from_id = $contact['fromid'];
                
                //if this is a message regarding a job, provides a notification stating so. then links them to the app to respond.
                $jobid = $contact['jobid'];
                if ($jobid != 0)
                {
                    //append a message to the username stating that they will have to go to the application page to respond
                }
                
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
                    if ($contact['jobid'] != 0){
                        $app = $contact['jobid'];
                        print "<a href='applications.php?viewapp=$app'>[JOB APPLICATION RESPONSE]</a>";
                    }
                    print $name . ": " . $contact['message'] . "<br />";

                }
                if ($contact['fromid'] != $_SESSION['id'])
                {
                    $to = $contact['fromid'];
                }
                else
                    $to = $contact['toid'];


            }
/*                  print "<form class='send_msg'>
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

                   </form>";
*/
        }
    }
    
    
    
    
    if ($display_contacts == 1)    {
        
        $query = "SELECT * FROM messages WHERE toid='$sess_id' OR fromid='$sess_id' ORDER BY opened ASC, added DESC ";
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
        include_once "functions.php";
    $dbs = db_connection();
    if (sizeof($contact) == 0)
    {
        $contact[0] = "0";
    }
    $contact = array_unique($contact);
    $contact = array_values($contact);
    
    if (sizeof($contact) > 0)
        for ($x = 0; $x <= (sizeof($contact) - 1); $x++)
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

    //get the data
if (!isset($_GET['display_contacts'])){
    $data = getContent($sess_id, 1);
    
}   
else
{
    if ($_GET['display_contacts'] == 1)
    {
        $data = getContent($sess_id, 1);
    }
    else{
        $data = getContent($sess_id, 0);
    }
    
}
    


    

?>

