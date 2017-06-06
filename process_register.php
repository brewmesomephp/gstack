<?php
session_start();
function getContent() 
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
        
    
    
    //add a new item to DB
    if (isset($_POST['email'])) 
    {
        //
        $email = addslashes(strip_tags($_POST['email']));
        $first_name = addslashes(strip_tags($_POST['first_name']));
        $last_name = addslashes(strip_tags($_POST['last_name']));
        $pass = addslashes(strip_tags($_POST['pass']));
        $pass2= addslashes(strip_tags($_POST['pass2']));
        $role = addslashes(strip_tags($_POST['role']));
        include_once "functions.php";
        if (!validate_email($email))
        {
            return "fail_email";
        }
        
        if (!validate_name($first_name . $last_name))
            return "fail_name";
        
        
        $query = "SELECT * FROM users WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        if (sizeof($row) == 0)
        {
                if ($pass == $pass2)
                {
                    if (isset($_POST['company']))
                    {
                        $company = 1;
                        $company_name = addslashes(strip_tags($_POST['company_name']));
                        if (!validate_alphanumeric_punct($company_name))
                        {
                            return "fail_name";
                        }
                        $hash = md5( rand(0,1000) );
                        $query = "INSERT INTO users (email, password, account, added, role, first_name, last_name, company, hash, bio, verified) VALUES ('$email', '$pass', '$company', CURRENT_TIMESTAMP, '$role', '$first_name', '$last_name', '$company_name', '$hash', '', 1)";
                    }
                    else
                    {
                        $hash = md5( rand(0,1000) );
                        $company = 0;
                        $query = "INSERT INTO users (email, password, account, added, role, first_name, last_name, hash, bio, verified) VALUES ('$email', '$pass', '$company', CURRENT_TIMESTAMP, '$role', '$first_name', '$last_name', '$hash', '', 1)";
                        
                        
                    }
                    
                    $sql = $dbs->prepare($query);
                    $sql->execute();
                    
                    
                    
                }
                else
                {
                    return "fail_pass";
                }
        }
        else
        {
            return "fail_email";
        }
    
    
        $query = "SELECT * FROM users WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        
        $email_link = "http://www.gamerstack.io/verify.php?id={$row[0][0]}&hash=$hash";
        $to = $email;
        $subject = "GamerStack Email Verification";
        
        $headers = "From: Joe@gamerstack.io\r\n";
        $headers .= "Reply-To: Joe@gamerstack.io\r\n";
        $headers .= "BCC: Joe@gamerstack.io\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        
        //use this email
        
        include "email/verification.php";
        
        ob_start();
        send_mail($row[0][0], $hash);
        $msg = ob_get_clean();
        mail($to, $subject, $msg, $headers);
        
        return $row[0][0];
}
}
    //get the data
    $data = getContent();
    print $data;


    

?>