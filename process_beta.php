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
        $role = addslashes(strip_tags($_POST['role']));
        $description = addslashes(strip_tags($_POST['description']));
        $company = addslashes(strip_tags($_POST['company']));
        include_once "functions.php";
        if (!validate_email($email))
        {
            return "fail_email";
        }
        
        if (!validate_name($first_name . $last_name))
            return "fail_name";
        
        
        $query = "SELECT * FROM beta WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        if (sizeof($row) == 0)
        {
                if (1 == 1)
                {
                    
                        $query = "INSERT INTO beta (email, added, role, first_name, last_name, company, ip, description) VALUES ('$email', CURRENT_TIMESTAMP, '$role', '$first_name', '$last_name', '$company', '{$_SERVER['REMOTE_ADDR']}', '$description')";
                    
                    
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
        
    
    
        $query = "SELECT * FROM beta WHERE email='$email'";
        $sql = $dbs->prepare($query);
        $sql->execute();
        $row = $sql->fetchAll();
        
        return $row[0][0];
}
}
    //get the data
    $data = getContent();
    print $data;



    

?>