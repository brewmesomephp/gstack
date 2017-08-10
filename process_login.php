<?php

function getContent() 
{
    
    include_once "functions.php";
    $dbs = db_connection();
        
    
    
//    add a new item to DB
        if (isset($_POST['email'])) 
        {

        $email = strip_tags($_POST['email']);
        $pass = strip_tags($_POST['pass']);
        
        $email = addslashes($email);
        $pass = addslashes($pass);
        

        
        include_once "functions.php";
        if (!validate_email($email))
        {
            return "fail_email";
        }
        
        
        
        $query = "SELECT * FROM users WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        if (sizeof($row) == 1)
        {
                $userid = $row[0][0];
                $password = $row[0][2];
                
                if ($pass == $password)
                {
                    $query = "INSERT INTO logins (userid, success, login_time, email, password) VALUES ('$userid', '1', CURRENT_TIMESTAMP,                     '$email', '$pass' )";
                    $sql = $dbs->prepare($query);
                    $sql->execute();
                    if ($row[0]['verified'] == '0')
                    {
                        return 2;
                    }
                    session_start();
                    $_SESSION['id'] = $userid;
                }
                else
                {
                    $query = "INSERT INTO logins (success, login_time, email, password) VALUES ('0', CURRENT_TIMESTAMP, '$email', '$pass' )";
                    $sql = $dbs->prepare($query);
                    $sql->execute();
                    return "fail_pass";
                    
                }
        }
        else
        {
            $query = "INSERT INTO logins (success, login_time, email, password) VALUES ('0', CURRENT_TIMESTAMP,'$email', '$pass' )";
                    $sql = $dbs->prepare($query);
                    $sql->execute();
            return "fail_email"; //returns that the email is incorrect
            
        }
        
    
    
 
    
    
    
    
        $query = "SELECT * FROM users WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        
        foreach($row as $data)
        {
         $company = $data['account'];   
        }
        return $company;
}
}
    //get the data
    $data = getContent();
    print $data;



    

?>