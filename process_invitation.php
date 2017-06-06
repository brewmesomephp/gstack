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
        
    
    
    //add a new item to DB
    if (isset($_POST['emails'])) 
    {
        //
        $email = addslashes(strip_tags($_POST['emails']));
        $email = str_replace(" ", "", $email);
        $emails = explode(",", $email);
        $good_emails = array();
        $bad_emails = array();
        if (sizeof($emails) > 0)
        {
            include_once "functions.php";
            foreach ($emails as $email)
            {
                //make sure the emails are valid and not already registered
                if (validate_email($email))
                {
                    if (get_user_by_email($email) == 0)
                        array_push($good_emails, $email);
                    else
                        array_push($bad_emails, $email);
                }
                else
                    array_push($bad_emails, $email);
            }
        }
        
        
        
        if (sizeof($good_emails) > 0)
        {
            //start sending them
            $user = get_user($sess_id);
            $name = $user['name'];
            
            
            $subject = "$name Wants You to Join GamerStack: The Video Game Industry Network";

            $headers = "From: Joe@gamerstack.io\r\n";
            $headers .= "Reply-To: Joe@gamerstack.io\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            include_once "email/invite.php";
            print "<h3 style='color:green'>Success :)</h3>Invitations sent to: <ul class='list-inline'>"; 
            
            ob_start();
            send_mail($sess_id);
            $msg = ob_get_clean();
            
            foreach($good_emails as $email)
            {
                $to = $email;
                mail($to, $subject, $msg, $headers);
                
                print "<li>$to</li>";
                
                
            }
            print "</ul><br />";
            
            
        }
        
        if (sizeof($bad_emails) > 0)
        {
            print "<h3 style='color:red'>Problems :(</h3>Invitations could not be sent to: <ul class='list-inline'>";
            foreach($bad_emails as $email)
            {
                print "<li>$email</li>";
            }
            print "</ul><br />";
        }
        
        ?>

<?php
        
        
        
        
        //use this email
        
}



    

?>